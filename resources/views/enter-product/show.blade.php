@extends('layouts.global2')
@section('title', 'Show Produk Masuk')
@section('headcontent', 'Show Produk Masuk')

@section('content')
<div class="col-12">
    <div class="card shadow mb-4 col-md-9 p-2 card-info card-outline">
        <div class="card-header py-3">
            {{-- BUTTON --}}
            <a href="{{ route('enter-product.edit', [$enterProduct->id]) }}" type="button"
                class="btn btn-outline-info btn-sm" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
        </div>
        <div class="card-body">
            {{-- DATE TIME --}}
            <div class="form-group">
                <label for="enter_date">Tanggal Masuk</label> <br>
                <input type="text" class="form-control" value="{{ $enterProduct->enter_date }}" readonly>
            </div>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name" class="">Nama Driver</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" id="name"
                    value="{{ $enterProduct->name }}" readonly>
            </div>

            {{-- DESC --}}
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea name="desc" id="desc" class="form-control" readonly>{{ $enterProduct->desc }}</textarea>
            </div>

            {{-- DISTRIBUTORS --}}
            <div class="form-group">
                <label>Distributor</label>
                <select class="form-control select2bs4" style="width: 100%;" name="distributor_id" disabled>
                    <option selected value="">--Pilih Distributor--</option>
                    @foreach ($distributors as $item)
                    <option value="{{ $item->id }}" {{$item->id == $enterProduct->distributor_id ? 'selected' : '' }}>{{ $item->name }}</option>                                
                    @endforeach
                </select>
            </div>

            {{-- VEHICLE --}}
            <div class="form-group">
                <label>Kendaraan</label>
                <select class="form-control select2bs4" style="width: 100%;" name="vehicle_id" disabled>
                    <option selected value="">--Pilih Kendaraan--</option>
                    @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}" {{$item->id == $enterProduct->vehicle_id ? "selected" : "" }}>{{ $item->name }}</option>                                
                    @endforeach
                </select>
            </div>

        </div>
    </div>
</div>
@endsection
