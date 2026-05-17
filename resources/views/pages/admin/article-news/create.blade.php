@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Article News</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('article-news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Article News">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="editor" name="content" class="form-control" placeholder="Content Article News">
                                {{ old('content') }}
                             </textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Pilih Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="author_id">Pilih Author</label>
                        <select name="author_id" class="form-control" required>
                            <option value="">Pilih Author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>

                <script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@40.0.0/build/ckeditor.js"></script>
                <script>
                    // Custom Upload Adapter untuk CKEditor 5
                    class MyUploadAdapter {
                        constructor(loader) {
                            this.loader = loader;
                            this.uploadUrl = '{{ route('article-news.upload') }}';
                            this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        }

                        upload() {
                            return this.loader.file.then(file => new Promise((resolve, reject) => {
                                const data = new FormData();
                                data.append('upload', file);

                                const xhr = new XMLHttpRequest();
                                xhr.open('POST', this.uploadUrl, true);
                                xhr.setRequestHeader('X-CSRF-TOKEN', this.csrfToken);
                                xhr.setRequestHeader('Accept', 'application/json');

                                xhr.onload = () => {
                                    if (xhr.status >= 200 && xhr.status < 300) {
                                        const response = JSON.parse(xhr.responseText);
                                        resolve({ default: response.urls.default });
                                    } else {
                                        reject('Upload gagal: ' + xhr.statusText);
                                    }
                                };

                                xhr.onerror = () => reject('Upload gagal. Periksa koneksi.');
                                xhr.send(data);
                            }));
                        }

                        abort() {}
                    }

                    function MyUploadAdapterPlugin(editor) {
                        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                            return new MyUploadAdapter(loader);
                        };
                    }

                    document.addEventListener("DOMContentLoaded", function () {
                        ClassicEditor
                            .create(document.querySelector('#editor'), {
                                extraPlugins: [MyUploadAdapterPlugin],
                            })
                            .then(editor => {
                                editor.editing.view.change(writer => {
                                    writer.setStyle('min-height', '300px', editor.editing.view.document.getRoot());
                                });
                            })
                            .catch(error => {
                                console.error('CKEditor error:', error);
                            });
                    });
                </script>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
