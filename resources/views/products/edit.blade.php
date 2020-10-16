@extends('layouts.global2')
@section('title', 'Edit Products')
@section('headcontent', 'Edit Products')

@section('content')
{{-- ALERT STATUS --}}
@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- FORM EDIT CATEGORIES --}}
<form action="{{ route('products.update', [$product->id]) }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">

    <div class="row">
        {{-- CARD CONTENT --}}
        <div class="col-6">
            <div class="card shadow p-2 card-primary card-outline">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    {{-- SKU --}}
                    <div class="form-group">
                        <label for="sku">SKU
                            <span>
                                <a href="#" title="SKU: penomoran kode barang pada inventory anda!">
                                    <i class="fas fa-question-circle text-dark"></i>
                                </a>
                            </span>
                        </label>
                        <input type="text" class="form-control"
                            value="{{ old('sku') ? old('sku') : $product->sku }}"
                            name="sku" id="sku" placeholder="Stock Keeping Unit" autocomplete="off">
                    </div>

                    {{-- NAME --}}
                    <div class="form-group">
                        <label for="name">Nama Product</label>
                        <input
                            value="{{ old('name') ? old('name') : $product->name }}"
                            type="text"
                            class="form-control {{ $errors->first('name') ? "is-invalid":"" }}"
                            placeholder="Full Name" name="name" id="name">
                    </div>

                    {{-- SLUG --}}
                    <div class="form-group">
                        <label for="name" class="">Slug</label>
                        <input type="text"
                            value="{{ old('slug') ? old('slug') : $product->slug }}"
                            disabled class="form-control">
                    </div>

                    {{-- DESC --}}
                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <textarea name="desc" id="desc" class="form-control" cols="20" rows="10"
                            placeholder="tulis keterangan product!">{{ old('desc') ? old('desc') : $product->desc }}</textarea>
                    </div>

                    {{-- CATEGORY --}}
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">-</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $product->category_id ? "selected" : "" }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- PRICE --}}
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ old('price') ? old('price') : $product->price }}">
                    </div>

                    {{-- STOCK --}}
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control"
                            value="{{ old('stock') ? old('stock') : $product->stock }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card shadow p-2 card-primary card-outline">
                <div class="card-body">
                    {{-- IMAGE --}}
                    <div class="form-group">
                        <label for="image">Image</label>
                        <br>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="image"
                            srcset="" class="brand-image" width="250px">
                        <br>
                        <span class="text-muted">curent image</span>
                        <div class="custom-file">
                            <input name="image" type="file"
                                class="custom-file-input {{ $errors->first('image') ? "is-invalid":"" }}"
                                id="image" aria-describedby="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            {{-- BUTTON --}}
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save text-white-50"></i>
                Update
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-danger">
                <i class="fas fa-times text-white-50"></i>
                Cancel
            </a>
        </div>

    </div>
</form>
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
