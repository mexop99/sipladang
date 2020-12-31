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
                <form action="{{ route('enter-product.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- DATE --}}
                    <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text"
                                class="form-control datetimepicker-input @error('date') is-invalid @enderror"
                                data-target="#datetimepicker1" data-toggle="datetimepicker" name="enter_date"
                                value="{{ old('date') }}" autocomplete="off" />
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            @error('enter_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- PLAT NOMOR --}}
                    <div class="form-group">
                        <label for="plat_number">Plat Nomor</label>
                        <input value="{{ old('plat_number') }}" type="text"
                            class="form-control @error('plat_number') is-invalid @enderror" placeholder="L 12xx ...."
                            name="plat_number" id="plat_number">
                        @error('plat_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NAME --}}
                    <div class="form-group">
                        <label for="name">Nama Sopir</label>
                        <input value="{{ old('name') }}" type="text"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Cak Jar ..."
                            name="name" id="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DESC --}}
                    <div class="form-group">
                        <label for="desc">Keterangan</label>
                        <textarea name="desc" id="desc" cols="30" rows="4"
                            class="form-control @error('desc') is-invalid @enderror"
                            placeholder="keterangan tambahan...">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DISTRIBUTORS --}}
                    <div class="form-group">
                        <label>Distributor</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="distributor_id">
                            <option selected value="">--Pilih Distributor--</option>
                            @foreach($distributors as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- VEHICLE --}}
                    <div class="form-group">
                        <label>Kendaraan</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="vehicle_id">
                            <option selected value="">--Pilih Kendaraan--</option>
                            @foreach($vehicles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
