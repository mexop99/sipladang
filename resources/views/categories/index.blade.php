@extends('layouts.global2')
@section('title', 'Categories')
@section('headcontent', 'Categories')


<!-- DataTables -->
@section('stylesheet')
<link rel="stylesheet"
    href="{{ asset('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="col-12">
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
                <table class="table table-hover" id="dataTableCategory">
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
                                        &minus;
                                    @endif
                                </td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <img src="{{ asset('storage/' .$item->image) }}"
                                        alt="Image categori" srcset="" width="10%">
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
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
</script>
<script
    src="{{ asset('adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script
    src="{{ asset('adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
</script>
<script>
    $(function () {
        $('#dataTableCategory').DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });
    })

</script>
@endsection
