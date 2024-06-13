@extends('admin/layouts')

@section('before_styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    {{ $message }}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $key => $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ $url }}/add" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-field">
            <div>
                <label for="title" class="mainlabel">category</label>
            </div>
            <div>
                <select name="news_category_id" class="form-select">
                    <option value="1">AAA</option>
                </select>
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="title" class="mainlabel">title</label>
            </div>
            <div>
                <input type="text" name="title" id="title" class="longtext">
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="title" class="mainlabel">body</label>
            </div>
            <div id="editor">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br /></p>
            </div>
            <textarea name="body" style="display:none" id="body-result">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br /></p>
            </textarea>
        </div>

        <div class="form-buttons">
            <div>
                <input type="submit" value="submit1" name="submit1" class="submit_button">
            </div>
            <div>
                <input type="submit" value="submit2" name="submit2" class="submit_button">
            </div>
        </div>
    </form>

    <dialog id="dialog">
        <div id="container"></div>
        <button onclick="clickSet()">set</button>
        <button onclick="document.getElementById('dialog').close()">close</button>
    </dialog>

@endsection

@section('after_scripts')
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Initialize Quill editor -->
    <script>
        const container = [
            ['bold', 'underline', 'italic', 'strike'],
            [{ 'font': [] }],
            [{ size: ['small', false, 'large', 'huge'] }],
            [{'align': []}],
            ['link'],
            ['image', 's3image', 'library', 'video'],
            ['blockquote', 'code-block']
        ];
        const quill = new Quill('#editor', {
            modules: {
                toolbar: {
                    container: container,
                    handlers: {
                        // 本来の動作を上書きできる
                        s3image: s3upload,
                        library: library
                    }
                }
            },
            theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("body-result").innerHTML = quill.container.firstChild.innerHTML;
        });

        document.querySelector(".ql-s3image").innerHTML = `
        <svg viewBox="0 0 18 18"><rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect><circle class="ql-fill" cx="6" cy="7" r="1"></circle><polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline></svg>
        `;

        document.querySelector(".ql-library").innerHTML = `
        <svg viewBox="0 0 18 18"><rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect><circle class="ql-fill" cx="6" cy="7" r="1"></circle><polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline></svg>
        `;

        // 画像送信用のダイアログを自前で用意
        function selectLocalImage() {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('name', 'up_file');

            // Listen upload local image and save to server
            input.onchange = () => {
                const file = input.files[0];
                // file type is only image.
                if (/^image\//.test(file.type)) {
                    saveToServer(file);
                } else {
                    console.warn('You could only upload images.');
                }
            };
            input.click();
        }

        // ファイル保存APIを叩く
        async function saveToServer(file) {
            const params = new FormData();
            params.append("img", file);

            const headers = {
                "accept": "application/json",
                "Content-Type": "multipart/form-data"
            };

            await axios.post('/api/file/upload', params, {
                headers: headers, withCredentials: true,
                rejectUnauthorized: false
            })
            .then(function (response) {
                const url = response.data.path;
                console.log(response.data.path)
                insertToEditor(url);
            })

            return false;
        }

        function insertToEditor(url) {
            // push image url to rich editor.
            const range = quill.getSelection();
            let x = 'https://minio.ogatism.net:20001/main/';
            quill.insertEmbed(range.index, 'image', x + url);
        }

        // handler
        function s3upload() {
            selectLocalImage();
        }

        // handler
        async function library() {
            var dialog = document.getElementById('dialog')
            var container = document.getElementById('container')
            container.innerHTML = "";

            dialog.show();

            const headers = {
                "accept": "application/json"
            };

            await axios.get('/file/list', { headers: headers, withCredentials: true })
                .then(function (response) {
                    const files = response.data.files;
                    for (file of files) {
                        var img = document.createElement("img")
                        let x = 'https://minio.ogatism.net:20001/main/';
                        img.src = x + file
                        let radio = document.createElement("input")
                        radio.type = "radio"
                        radio.dataset.url = x + file
                        radio.name = "images"
                        let label = document.createElement("label")
                        label.append(radio)
                        label.append(img)
                        container.append(label)
                    }
                })
        }

        function clickSet() {
            let obj = document.querySelector("input[name='images']:checked")
            const range = quill.getSelection();
            quill.insertEmbed(range.index, 'image', obj.dataset.url);
            document.getElementById('dialog').close()
        }

        function testButton(value) {
            if (value) {
                const href = prompt('Enter the URL');
                this.quill.format('link', href);
            } else {
                this.quill.format('link', false);
            }
        }
    </script>
@endsection
