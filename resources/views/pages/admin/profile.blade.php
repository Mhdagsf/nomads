@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile Admin</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 text-center border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5" width="150px"
                                    src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}">
                                <span class="font-weight-bold mt-2">{{ Auth::user()->name }}</span>
                                <span class="text-black-50">{{ Auth::user()->email }}</span>

                                <div class="form-group mt-3">
                                    <label class="small">Change Photo</label>
                                    <input type="file" name="avatar" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <div class="form-group">
                                    <label class="labels">Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', Auth::user()->name) }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="labels">Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', Auth::user()->email) }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="labels">Username</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->username }}"
                                        readonly>
                                    <small class="text-muted">Username cannot be changed.</small>
                                </div>

                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">
                                        Update Admin Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
