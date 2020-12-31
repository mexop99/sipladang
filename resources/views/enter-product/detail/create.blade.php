@extends('layouts.global2')
@section('title', 'Add Enter Product')
@section('headcontent', 'Add Enter Product')

@section('stylesheet')
<link rel="stylesheet"
    href="{{ asset('adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('adminlte3/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show col-md-9" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4 col-md-9 p-2 card-primary card-outline">
            <div class="card-header py-3">
            </div>
            <div class="card-body">

                {{-- FORM ADD --}}
                <form action="{{ route('enter-product.detail.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- product_id --}}
                    <div class="form-group">
                        <label>Distributor</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="product_id">
                            <option selected value="">--Pilih Product--</option>
                            @foreach($products as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->id .'-'. $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- QTY --}}
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <input value="{{ old('qty') }}" type="text"
                            class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty">
                        @error('qty')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">
                            Save
                        </span>
                    </button>
                    <a href="{{ route('vehicles.index') }}" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">
                            Cancel
                        </span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Moment -->
<script src="{{ asset('adminlte3/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/moment/locale/id.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="{{ asset('adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg==" crossorigin="anonymous"></script> --}}
<!-- Select2 -->
<script src="{{ asset('adminlte3/plugins/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
    // date tempusdominus
    $(function () {
        $('#datetimepicker1').datetimepicker({
            // format: 'L'
        });
    });

    //Initialize Select2 Elements
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

</script>
@endsection
