@extends('layouts.global2')
@section('title', 'Edit Vehicle')
@section('headcontent', 'Edit Vehicle')

@section('content')
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

            {{-- FORM --}}
            <form action="{{ route('vehicles.update', [$vehicle->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                {{-- IMAGE --}}
                <div class="form-group">
                    <label for="avatar">Image</label>
                    <br>
                    <img src="{{ asset('storage/' . $vehicle->image) }}" alt="" srcset=""
                        class="brand-image">
                    <br>
                    <span class="text-muted">curent image</span>
                    <div class="custom-file">
                        <input name="image" type="file"
                            class="custom-file-input {{ $errors->first('image') ? "is-invalid":"" }}"
                            id="image" aria-describedby="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                </div>

                {{-- NAME --}}
                <div class="form-group">
                    <label for="name" class="">Nama Kendaran</label>
                    <input type="text"
                        class="form-control {{ $errors->first('name') ? "is-invalid":"" }}"
                        placeholder="Full Name" name="name" id="name"
                        value="{{ old('name') ? old('name') : $vehicle->name }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>

                {{-- DESC --}}
                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <textarea name="desc" id="desc"
                        class="form-control">{{ old('desc') ? old('desc') : $vehicle->desc }}</textarea>
                </div>

                {{-- BUTTON --}}
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
