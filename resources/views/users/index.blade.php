@extends('layouts.global2')
@section('title')
| List User
@endsection

@section('headcontent')
List User
@endsection

@section('content')

<div class="mb-2">
    <a href="{{ route('users.create') }}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
        </span>
        <span class="text">
            Create User
        </span>
    </a>
</div>
<div class="card shadow mb-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-responsive-lg" id="dataTable" width="100%" cellspacing="0">
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
                                    <a href="#"
                                        type="button" class="btn btn-info " title="show user" data-toggle="modal">
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
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalMdTitle"></h4>
            </div>
            <div class="modal-body">
                <div class="modalError"></div>
                <div id="modalMdContent">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection
