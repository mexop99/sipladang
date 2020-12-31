<!-- show product detail -->
<div class="card card-primary card-outline">
    <button type="button" class="close text-right mr-2" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                src="{{ asset('storage/' . $product->image) }}" alt="product image">
        </div>

        <h3 class="profile-username text-center">{{ $product->name }}</h3>

        <p class="text-muted text-center">{{ $product->sku }}</p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>ID</b> <a class="float-right">{{ $product->id }}</a>
            </li>
            <li class="list-group-item">
                <b>Slug</b> <a class="float-right">{{ $product->slug }}</a>
            </li>
            <li class="list-group-item">
                <b>Category</b> <a class="float-right">{{ $product->category->name }}</a>
            </li>
            <li class="list-group-item">
                <b>Price</b> <a class="float-right">{{ $product->price }}</a>
            </li>
            <li class="list-group-item">
                <b>Stock</b> <a class="float-right">{{ $product->stock }}</a>
            </li>
            <li class="list-group-item">
                <b>Status</b>
                <a class="float-right">
                    @if($product->status == 'PUBLISH')
                        <span class="badge badge-success">{{ $product->status }}</span>
                    @else
                        <span class="badge badge-danger">{{ $product->status }}</span>
                    @endif
                </a>
            </li>
            <li class="list-group-item">
                <b>Created by</b> <a class="float-right">{{ $product->createdBy->name }}</a>
            </li>
            <li class="list-group-item">
                <b>Updated by</b>
                <a class="float-right">
                    
                    @if($product->updatedBy)
                    {{ $product->updatedBy->name }}
                    @else
                        &minus;
                    @endif
                </a>
            </li>
            <li class="list-group-item">
                <b>Deleted by</b> 
                <a class="float-right">
                    @if($product->deleteBy)
                        {{ $product->deleteBy->name }}
                    @else
                        &minus;
                    @endif
                </a>
            </li>
            <li class="list-group-item">
                <b>Created at</b> <a class="float-right">{{ $product->created_at }}</a>
            </li>
            <li class="list-group-item">
                <b>Updated at</b> <a class="float-right">{{ $product->updated_at }}</a>
            </li>
        </ul>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
