 @extends('layouts.admin')

 @section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Edit Author</h1>
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
                 <form action="{{ route('author.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf

                     <div class="form-group">
                         <label for="name">Nama</label>
                         <input type="text" value="{{ $item->name }}" name="name" class="form-control"
                             placeholder="Nama Author">
                     </div>
                     <div class="form-group">
                         <label for="occupation">Pekerjaan</label>
                         <input type="text" value="{{ $item->occupation }}" name="occupation" class="form-control"
                             placeholder="Pekerjaan Author">
                     </div>
                     <div class="form-group">
                         <label for="avatar">Avatar</label>
                         <!-- Tampilkan gambar lama jika ada -->
                         @if ($item->avatar)
                             <div class="mb-3">
                                 <img src="{{ Storage::url($item->avatar) }}" alt="Current Avatar"
                                     style="max-width: 200px; border-radius: 5px;">
                                 <p class="text-muted mt-2">Gambar Saat Ini</p>
                             </div>
                         @endif
                         <!-- Input file baru -->
                         <input type="file" name="avatar" class="form-control" accept="image/*">
                         <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                     </div>



                     <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                 </form>
             </div>
         </div>


     </div>
     <!-- /.container-fluid -->
 @endsection
