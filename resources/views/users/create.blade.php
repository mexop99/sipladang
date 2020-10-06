@extends('layouts.global')
@section('title')
| Create User
@endsection

@section('headcontent')
Create User
@endsection

@section('content')
@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="card shadow mb-4 col-md-9 p-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
    </div>
    <div class="card-body">
        {{-- FORM ADD USER --}}
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name" class="text-gray-900">Name</label>
                <input value="{{ old('name') }}" type="text"
                    class="form-control {{ $errors->first('name') ? "is-invalid":"" }}"
                    placeholder="Full Name" name="name" id="name">
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="text-gray-900">Username</label>
                <input value="{{ old('username') }}" type="text"
                    class="form-control {{ $errors->first('username') ? "is-invalid":"" }}"
                    placeholder="username" name="username" id="username">
                <div class="invalid-feedback">
                    {{ $errors->first('username') }}
                </div>
            </div>

            <div class="form-group">
                <h6 for="" class="text-gray-900">Roles</h6>
                <div class="form-check form-check-inline">
                    <input type="checkbox"
                        class="form-check-input {{ $errors->first('roles') ? "is-invalid":"" }}"
                        name="roles[]" id="ADMIN" value="ADMIN">
                    <label for="ADMIN" class="text-gray-900 form-check-label">ADMINISTRATOR</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="checkbox"
                        class="form-check-input {{ $errors->first('roles') ? "is-invalid":"" }}"
                        name="roles[]" id="STAFF" value="STAFF">
                    <label for="STAFF" class="text-gray-900 form-check-label">STAFF</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="checkbox"
                        class="form-check-input {{ $errors->first('roles') ? "is-invalid":"" }}"
                        name="roles[]" id="CUSTOMER" value="CUSTOMER">
                    <label for="CUSTOMER" class="text-gray-900 form-check-label">CUSTOMER</label>
                </div>

                <div class="invalid-feedback">
                    {{ $errors->first('roles') }}
                </div>
            </div>

            <div class="form-group">
                <label for="address" class="text-gray-900">Adress</label>
                <textarea name="address" id="address" cols="30" rows="4"
                    class="form-control {{ $errors->first('address') ? "is-invalid":"" }}">{{ old('address') }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('address') }}
                </div>
            </div>

            <div class="form-group custom-file">
                <label for="avatar" class="text-gray-900">Avatar</label>
                <div class="custom-file">
                    <input name="avatar" type="file"
                        class="custom-file-input {{ $errors->first('avatar') ? "is-invalid":"" }}"
                        id="avatar" aria-describedby="avatar">
                    <label class="custom-file-label" for="avatar">Choose file</label>
                </div>

                <div class="invalid-feedback">
                    {{ $errors->first('avatar') }}
                </div>
            </div>

            <hr class="my-3">

            <div class="form-group">
                <label for="email" class="text-gray-900">Email</label>
                <input value="{{ old('email') }}" type="email" name="email" id="email"
                    class="form-control {{ $errors->first('email') ? "is-invalid":"" }}"
                    placeholder="example@mail.com">
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="text-gray-900">Password</label>
                <input type="password" name="password" id="password" placeholder="********"
                    class="form-control {{ $errors->first('password') ? "is-invalid":"" }}">
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>

            <div class="form-group">
                <label for="password2" class="text-gray-900">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" placeholder="********"
                    class="form-control {{ $errors->first('password2') ? "is-invalid":"" }}">
                <div class="invalid-feedback">
                    {{ $errors->first('password2') }}
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">
                    Save
                </span>
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-times"></i>
                </span>
                <span class="text">
                    Cancel
                </span>
            </a>
        </form>
    </div>
</div>

@endsection
