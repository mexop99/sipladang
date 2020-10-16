@extends('layouts.global2')
@section('title', 'Create Category')
@section('headcontent', 'Create Category')


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

            {{-- FORM ADD CATEGORIES --}}
            <form action="{{ route('categories.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="avatar" class="text-gray-900">Image</label>
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

                <div class="form-group">
                    <label for="name" class="text-gray-900">Name Category</label>
                    <input value="{{ old('name') }}" type="text"
                        class="form-control {{ $errors->first('name') ? "is-invalid":"" }}"
                        placeholder="Full Name" name="name" id="name">
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>

                <div class="form-group">
                    <label>Parent Category</label>
                    <select class="form-control" name="parent_id">
                        <option value="">-</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">
                        Save
                    </span>
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-danger btn-icon-split">
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
