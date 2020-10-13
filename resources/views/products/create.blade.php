@extends('layouts.global2')
@section('title', 'Add Product')
@section('headcontent', 'Add Product')

{{-- SECTION CONTENT --}}
@section('content')

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
        {{-- FORM ADD PRODUCT --}}
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- IMAGE --}}
            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="custom-file">
                    <input name="image" type="file"
                        class="custom-file-input {{ $errors->first('image') ? "is-invalid":"" }}"
                        id="image" aria-describedby="image">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>

            {{-- SKU --}}
            <div class="form-group">
                <label for="sku">SKU
                    <span>
                        <a href="#" title="SKU: penomoran kode barang pada inventory anda!">
                            <i class="fas fa-question-circle text-dark"></i>
                        </a>
                    </span>
                </label>
                <input type="text" class="form-control" value="{{ old('sku') }}" name="sku" id="sku"
                    placeholder="Stock Keeping Unit">
            </div>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Nama Product</label>
                <input value="{{ old('name') }}" type="text"
                    class="form-control {{ $errors->first('name') ? "is-invalid":"" }}"
                    placeholder="Full Name" name="name" id="name">
            </div>


            {{-- DESC --}}
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea name="desc" id="desc" class="form-control" cols="20" rows="10" placeholder="tulis keterangan product!"></textarea>
            </div>

            {{-- CATEGORY --}}
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="parent_id">
                    <option value="">-</option>
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- PRICE --}}
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>

            {{-- STOCK --}}
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control">
            </div>

            {{-- BUTTON --}}
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save text-white-50"></i>
                Save
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-danger">
                <i class="fas fa-times text-white-50"></i>
                Cancel
            </a>
        </form>
    </div>
</div>
@endsection


{{-- SECTION SCRIP --}}
@section('script')
<script src="{{ asset('adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection
