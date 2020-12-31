@extends('layouts.global2')
@section('title', 'Detail Distributor')
@section('headcontent', 'Detail Distributor')

@section('content')
<div class="row">
    <div class="col-2"></div>
    <div class="col-lg-8">
        <div class="card shadow mb-4 p-3 card-info card-outline">
            
            {{-- BUTTON --}}
            <div class="mb-4">
                <a href="{{ route('distributors.edit', [$distributor->id]) }}"
                    type="button" class="btn btn-outline-info btn-sm" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
            {{-- NAME --}}
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama Distributor</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name') ? old('name') : $distributor->name }}" readonly>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- EMAIL --}}
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        value="{{ old('email') ? old('email') : $distributor->email }}" readonly>
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
                        value="{{ old('phone') ? old('phone') : $distributor->phone }}" readonly>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- ADDRESS --}}
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea name="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        id="address"
                        rows="5" readonly>{{ old('address') ? old('address') : $distributor->address }}</textarea>
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
                        rows="5" readonly>{{ old('desc') ? old('desc') : $distributor->desc }}</textarea>
                    @error('desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
@endsection
