@extends('layouts.global2')
@section('title', 'Categories')
@section('headcontent', 'Categories')

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
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-icon-split">
        <span class="icon">
            <i class="nav-icon fas fa-tags"></i>
        </span>
        <span class="text">
            Create Categories
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
                        <th>Nama Category</th>
                        <th>Parent Category</th>
                        <th>slug</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $no => $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if($item->parent)
                                    {{ $item->parent->name }}
                                @else
                                    0
                                @endif
                            </td>
                            <td>{{ $item->slug }}</td>
                            <td>
                                <img src="{{ asset('storage/' .$item->image) }}"
                                    alt="Image categori" srcset="" width="15%">
                            </td>
                            <td>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2" role="group" aria-label="first group">
                                        <a href="{{ route('categories.edit', [$item->id]) }}"
                                            type="button" class="btn btn-primary btn-sm" title="Edit User">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        {{-- <a href="#" data-id="{{ $item->id }}"
                                        type="button"
                                        class="btn btn-info btn-sm" title="show user">
                                        <i class="fas fa-info-circle"></i>
                                        </a> --}}
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <form
                                            action="{{ route('categories.destroy', [$item->id]) }}"
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
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            {{ $categories->appends(Request::all())->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
