@extends('layouts.global2')
@section('title', 'Edit Distributors')
@section('headcontent', 'Edit Distributors')

@section('content')
<form action="{{ route('distributors.update', [$distributor->id]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-lg-8">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show " role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card shadow mb-4 p-3 card-primary card-outline">
                {{-- NAME --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Distributor</label>
                    <div class="col-sm-9">
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            value="{{ old('name') ? old('name') : $distributor->name }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- EMAIL --}}
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            value="{{ old('email') ? old('email') : $distributor->email }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- PHONE --}}
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">No. Telp</label>
                    <div class="col-sm-9">
                        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            value="{{ old('phone') ? old('phone') : $distributor->phone }}">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- ADDRESS --}}
                <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <textarea name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            rows="5">{{ old('address') ? old('address') : $distributor->address }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- DESC --}}
                <div class="form-group row">
                    <label for="desc" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea name="desc" type="text" class="form-control @error('desc') is-invalid @enderror" id="desc"
                            rows="5">{{ old('desc') ? old('desc') : $distributor->desc }}</textarea>
                            @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- BUTTON --}}
                <div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-save text-white-50"></i>
                        Update
                    </button>
                    <a href="{{ route('distributors.index') }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-times text-white-50"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</form>
@endsection
