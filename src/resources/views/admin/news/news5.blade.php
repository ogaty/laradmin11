@extends('admin/layouts')

@section('before_styles')
    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
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
            <textarea id="editor" class="ck_editor" name="body">
                <p>This is some sample content.</p>
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

@endsection

@section('before_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/41.4.2/ckeditor.min.js" integrity="sha512-z5R1qDiHpqoswJJOldglYtCSpaDg3JUEoZL/M/4LDCL6XUwB2cHmCtzCXWcCbA3CCuGxTCxdKA9ybTJu2zqTng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
            }

            // Aborts the upload process.
            abort() {
                // Reject the promise returned from the upload() method.
                server.abortUpload();
            }
        }

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
        }

        let editor = ClassicEditor
            .create(
                document.querySelector( '#editor' ),
                {
                    extraPlugins: [ MyCustomUploadAdapterPlugin ]
                }
            )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
