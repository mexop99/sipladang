<div class="card card-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-info ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="widget-user-image">
            <img class="img-circle elevation-2"
                src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar">
        </div>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username">{{ $user->name }}</h3>
        <h5 class="widget-user-desc">{{ $user->email }}</h5>
        
    </div>
    <div class="card-footer p-0">
        <table class="table table-hover table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <th>roles</th>
                <td>
                    @foreach(json_decode($user->roles) as $item)
                        @if($item == "ADMIN")
                            <span class="badge badge-success">{{ $item }}</span>
                        @else
                            <span class="badge badge-danger">{{ $item }}</span>
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($user->status == "ACTIVE")
                        <span class="badge badge-primary">{{ $user->status }}</span>
                    @else
                        <span class="badge badge-danger">{{ $user->status }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $user->address }}</td>
            </tr>
        </table>
    </div>
</div>
<!-- /.widget-user -->
