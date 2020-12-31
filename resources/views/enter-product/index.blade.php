@extends('layouts.global2')
@section('title', 'Produk Masuk')
@section('headcontent', 'Produk Masuk')

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

    {{-- BUTTON TO ADD --}}
    <div class="mb-2">
        <a href="{{ route('enter-product.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            New
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Produk masuk</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataVehicles" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Driver</th>
                        <th>Plat Nomor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enterProducts as $item)
                        <tr>
                            <td><span>#</span>
                                {{ $item->id }}
                            </td>
                            <td>{{ $item->enter_date }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->plat_number }}</td>
                            <td>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2" role="group" aria-label="first group">
                                        <a href="{{ route('enter-product.edit', [$item->id]) }}"
                                            type="button" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('enter-product.show', [$item->id]) }}"
                                            type="button" class="btn btn-info btn-sm" title="Detail">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="{{ route('enter-product.detail.index', [$item->id]) }}"
                                            type="button" class="btn btn-danger btn-sm" title="Detail">
                                            <i class="fas fa-angle-double-right"></i>
                                        </a>
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
        $('#dataVehicles').DataTable({
            "responsive": true,
            "autoWidth": false
        });
    })

</script>
@endsection
