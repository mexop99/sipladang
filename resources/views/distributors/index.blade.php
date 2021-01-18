@extends('layouts.global2')
@section('title', 'Distributors')
@section('headcontent', 'Distributors')

@section('stylesheet')
<!-- DataTables -->
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
        <a href="{{ route('distributors.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            New
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataDistributors" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($distributors as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2" role="group" aria-label="first group">
                                        <a href="{{ route('distributors.edit', [$item->id]) }}"
                                            type="button" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('distributors.show', [$item->id]) }}"
                                            type="button" class="btn btn-info btn-sm" title="Detail">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <form
                                            action="{{ route('distributors.destroy', [$item->id]) }}"
                                            method="post"
                                            onsubmit="return confirm('Move Distributor:{{ $item->name }}  to Trash?')">
                                            @csrf
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
        $('#dataDistributors').DataTable({
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
