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

                {{-- FORM ADD VEHICLES --}}
                <form action="{{ route('vehicles.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- IMAGE --}}
                    <div class="form-group">
                        <label for="avatar" class="text-gray-900">Image</label>
                        <div class="custom-file">
                            <input name="image" type="file"
                                class="custom-file-input {{ $errors->first('image') ? "is-invalid":"" }}"
                                id="image" aria-describedby="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        </div>
                        
                    </div>

                    {{-- NAME --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="{{ old('name') }}" type="text"
                            class="form-control @error('name') is-invalid @enderror" placeholder="jenis kendaraan ..."
                            name="name" id="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DESC --}}
                    <div class="form-group">
                        <label for="desc">Keterangan</label>
                        <textarea name="desc" id="desc" cols="30" rows="4"
                            class="form-control @error('desc') is-invalid @enderror"
                            placeholder="keterangan tambahan...">{{ old('desc') }}</textarea>
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
                    <a href="{{ route('vehicles.index') }}" class="btn btn-danger btn-icon-split">
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
