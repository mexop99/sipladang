@extends('layouts.global2')
@section('title', 'List Product')
{{-- @section('headcontent', 'List Product') --}}

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- BUTTON ADD PRODUCT --}}
        <div class="mb-2">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">
                    Add Product
                </span>
            </a>
        </div>

        <div class="row">
            {{-- FORM SEARCHING --}}
            <div class="col-md-9">
                <form action="{{ route('products.index') }}">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" id="keyword"
                            value="{{ Request::get('keyword') }}" class="form-control"
                            placeholder="Filter berdasarkan SKU">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Published</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('products.trash') }}">Trash</a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- TABLE LIST DATA --}}
        <div class="card shadow mb-2">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products_trash as $no => $item)
                                <tr>
                                    <th>{{ $item->sku }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="first group">
                                                <a href="{{ route('products.restore', [$item->id]) }}"
                                                    type="button" class="btn btn-primary btn-sm" title="Restore">
                                                    <i class="fas fa-trash-restore-alt"></i>
                                                </a>
                                                <a href="#" data-id="{{ $item->id }}" type="button"
                                                    class="btn btn-info btn-sm btn-trash" title="Show Detail">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                {{-- <a href="{{ route('products.show-trash', [$item->id]) }}" data-id="{{ $item->id }}" type="button" target="_blank"
                                                    class="btn btn-info btn-sm" title="Show Detail">
                                                    <i class="fas fa-info-circle"></i>
                                                </a> --}}
                                            </div>
                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                <form
                                                    action="{{ route('products.delete-permanent', [$item->id]) }}"
                                                    method="post"
                                                    onsubmit="return confirm('Product will be delete PERMANENT?')">
                                                    @csrf
                                                    <input type="hidden" value="DELETE" name="_method">
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        title="Hapus PERMANENT">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    {{ $products_trash->appends(Request::all())->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modal-info">
    <div class="modal-dialog">
        {{-- <div class="modal-content"> --}}
        <div class="modal-body">
            <p>One fine body&hellip;</p>
        </div>
        {{-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> --}}
        {{-- </div> --}}
    </div>
</div>
@endsection

@section('script')

<script>
    // script untuk modal-info
    $('.btn-trash').on('click', function () {
        var id = $(this).data('id')
        $.ajax({
            url: `products/${id}/show-trash`,
            method: "GET",
            success: function (data) {
                $('#modal-info').find('.modal-body').html(data)
                $('#modal-info').modal('show')
            },
            error: function (data) {
                console.log(error)
            }
        })
    });
</script>
@endsection
