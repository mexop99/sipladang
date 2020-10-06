@extends('layouts.global')
@section('title')
| List User
@endsection

@section('stylesheet')
<!-- Custom styles for this page -->
<link href="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet">
@endsection

@section('headcontent')
List User
@endsection

@section('content')

<div class="mb-4">
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
        </span>
        <span class="text">
            Create User
        </span>
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $no => $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status }}</td>
                            <td> TODO;</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="buttons menu">
                                    <a href="{{ route('users.edit', [$item->id]) }}"
                                        type="button" class="btn btn-primary">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#" type="button" class="btn btn-info">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
