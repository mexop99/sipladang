@extends('layouts.global2')
@section('title', 'List Product')
@section('headcontent', 'List Product')

@section('content')

@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="mb-2">
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
        </span>
        <span class="text">
            Add Product
        </span>
    </a>
</div>
<div class="card shadow mb-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-responsive-lg table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($users as $no => $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if($item->status == "ACTIVE")
                                    <span class="badge badge-primary">{{ $item->status }}</span>
                                @else
                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2" role="group" aria-label="first group">
                                        <a href="{{ route('users.edit', [$item->id]) }}"
                                            type="button" class="btn btn-primary btn-sm" title="Edit User">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#" data-id="{{ $item->id }}" type="button"
                                            class="btn btn-info btn-sm" title="show user">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <form
                                            action="{{ route('users.destroy', [$item->id]) }}"
                                            method="post" onsubmit="return confirm('Move Product to Trash?')">
                                            @csrf
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus User">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
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
    $('.btn-info').on('click', function () {
        var id = $(this).data('id')
        $.ajax({
            url: `/users/${id}`,
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