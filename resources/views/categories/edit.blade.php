@extends('layouts.global2')
@section('title', 'Edit Categories')
@section('headcontent', 'Edit Categories')

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
            <form action="{{ route('categories.update', [$category->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="avatar">Image</label>
                    <br>
                    <img src="{{ asset('storage/' . $category->image) }}" alt="" srcset=""
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

                <div class="form-group">
                    <label for="name" class="">Name Category</label>
                    <input type="text"
                        class="form-control {{ $errors->first('name') ? "is-invalid":"" }}"
                        placeholder="Full Name" name="name" id="name"
                        value="{{ old('name') ? old('name') : $category->name }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="">Slug</label>
                    <input type="text" value="{{ $category->slug }}" disabled class="form-control">
                </div>

                <div class="form-group">
                    <label>Parent Category</label>
                    <select class="form-control" name="parent_id">
                        <option value="">-</option>
                        @if($category->parent)
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ $category->parent->id == $item->id ? "selected" : "" }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        @endif
                        @foreach($categories as $item)
                            @if($category->id != $item->id)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
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
