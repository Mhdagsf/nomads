 @extends('layouts.admin')

 @section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Tambah Author</h1>
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
                 <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf

                     <div class="form-group">
                         <label for="name">Nama</label>
                         <input type="text" name="name" class="form-control" placeholder="Nama Author">
                     </div>
                     <div class="form-group">
                         <label for="occupation">Pekerjaan</label>
                         <input type="text" name="occupation" class="form-control" placeholder="Pekerjaan Author">
                     </div>
                     <div class="form-group">
                         <label for="avatar">Avatar</label>
                         <input type="file" name="avatar" class="form-control">
                     </div>


                     <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                 </form>
             </div>
         </div>


     </div>
     <!-- /.container-fluid -->
 @endsection
