@extends('layouts.global2')
@section('title', 'Show Vehicle')
@section('headcontent', 'Show Vehicle')

@section('content')
<div class="col-12">
    <div class="card shadow mb-4 col-md-9 p-2 card-info card-outline">
        <div class="card-header py-3">
            {{-- BUTTON --}}
            <a href="{{ route('vehicles.edit', [$vehicle->id]) }}" type="button"
                class="btn btn-outline-info btn-sm" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
        </div>
        <div class="card-body">
            {{-- IMAGE --}}
            <div class="form-group">
                <label for="avatar">Image</label> <br>
                <img src="{{ asset('storage/' . $vehicle->image) }}" alt="" srcset=""
                    class="brand-image">
            </div>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name" class="">Nama Kendaran</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" id="name"
                    value="{{ $vehicle->name }}" readonly>
            </div>

            {{-- DESC --}}
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea name="desc" id="desc" class="form-control" readonly>{{ $vehicle->desc }}</textarea>
            </div>
        </div>
    </div>
</div>
@endsection
