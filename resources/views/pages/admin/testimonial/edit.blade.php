 @extends('layouts.admin')

 @section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Ubah Testimonial</h1>

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
                 <form action="{{ route('testimonial.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf
                     <div class="form-group">
                         <label for="travel_packages_id">Paket Travel</label>
                         <select name="travel_packages_id" class="form-control" required>
                             <option value="{{ $item->travel_packages_id }}">Jangan diubah</option>
                             @foreach ($travel_packages as $travel_package)
                                 <option value="{{ $travel_package->id }}">
                                     {{ $travel_package->title }}
                                 </option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="name">Nama</label>
                         <input type="text" name="name" class="form-control" placeholder="Nama"
                             value="{{ $item->name }}">
                     </div>
                     <div class="form-group">
                         <label for="text">Deskripsi</label>
                         <textarea name="text" class="form-control" placeholder="Deskripsi" rows="5">{{ $item->text }}</textarea>
                     </div>
                     <div class="form-group">
                         <label for="image">Image</label>

                         <!-- Tampilkan gambar lama jika ada -->
                         @if ($item->image)
                             <div class="mb-3">
                                 <img src="{{ Storage::url($item->image) }}" alt="Current Image"
                                     style="max-width: 200px; border-radius: 5px;">
                                 <p class="text-muted mt-2">Gambar Saat Ini</p>
                             </div>
                         @endif
                         <!-- Input file baru -->
                         <input type="file" name="image" class="form-control" accept="image/*">
                         <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                     </div>
                     <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                 </form>
             </div>
         </div>


     </div>
     <!-- /.container-fluid -->
 @endsection
