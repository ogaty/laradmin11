@extends('admin/layouts')

@section('before_styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
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
                <input type="text" name="title" id="title" class="longtext" value="new news">
            </div>
        </div>

        <div class="form-field">
            <div>
                <label for="title" class="mainlabel">body</label>
            </div>
            <textarea class="editor"></textarea>
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

@endsection

@section('before_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.2/tinymce.min.js" integrity="sha512-2T0G/zn88pKqnmUStXKW0BSPIW3Y2sky5Bl6HER5TwPGqCsLTVzAQRZMum/ptf5mRwYylP1lcvnLkgn6chASuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        tinymce.init({
            selector: '.editor',  // change this value according to your HTML
            plugins: 'a_tinymce_plugin image code media',
            toolbar1: 'h1 h2 h3 h4 | undo redo | fontsize | bold italic underline | alignleft aligncenter alignright | blockquote removeformat',
            toolbar2: 'link image media | code',
            a_plugin_option: true,
            a_configuration_option: 400,
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', async () => {
                        const params = new FormData();
                        params.append("img", file);
                        params.append("path", "/news6");

                        const headers = {
                            "accept": "application/json",
                            "Content-Type": "multipart/form-data"
                        };

                        await axios.post('/file/upload', params, {
                            headers: headers,
                            withCredentials: true,
                            rejectUnauthorized: false
                        })
                        .then(function (response) {
                            const url = response.data.path;
                            console.log(response.data.path)
                            let x = 'https://minio.ogatism.net:20443/main/';
                            cb(x + url, {title: file.name});
                        })
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            }
        });
    </script>
@endsection
