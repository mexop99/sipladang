@extends('layouts.global2')
@section('title', 'Add Distributors')
@section('headcontent', 'Add Distributors')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4 col-md-9 p-2 card-primary card-outline">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                {{-- FORM ADD USER --}}
                <form action="{{ route('distributors.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- NAME --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="{{ old('name') }}" type="text"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Nama PT /CV ..."
                            name="name" id="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-group">
                        <label for="email">email</label>
                        <input value="{{ old('email') }}" type=""
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="ptalamajaya@mail.com..." name="email" id="email" autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PHONE --}}
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input value="{{ old('phone') }}" type="number"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="08123456*** ..."
                            name="phone" id="phone" autocomplete="off">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ADDRESS --}}
                    <div class="form-group">
                        <label for="address">Adress</label>
                        <textarea name="address" id="address" cols="30" rows="4"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="Jl. kutisari 2 ... ">{{ old('address') }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DESC --}}
                    <div class="form-group">
                        <label for="desc">Keterangan</label>
                        <textarea name="desc" id="desc" cols="30" rows="4"
                            class="form-control @error('desc') is-invalid @enderror"
                            placeholder="distributor komputer">{{ old('desc') }}</textarea>
                            @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">
                            Save
                        </span>
                    </button>
                    <a href="{{ route('distributors.index') }}" class="btn btn-danger btn-icon-split">
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
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection
