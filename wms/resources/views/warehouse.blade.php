@extends('layouts.app')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Warehouse</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">WMS</a></div>
                    <div class="breadcrumb-item"><a href="#">Warehouse</a></div>
                    <div class="breadcrumb-item">List Data Barang</div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h4>List Data Barang</h4>
                    <form class="card-header-form">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </form>
                </div>
                <div class="card-body">
                    <button class="btn btn-outline-primary mb-2" id="modal" data-target="#exampleModal"
                        data-toggle="modal">
                        Tambah data barang
                    </button>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Tanggal Kadaluarsa</th>
                                <th scope="col">Lokasi Ruangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->item_code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->itemType->name }}</td>
                                    <td>{{ $item->exp_date }}</td>
                                    <td>{{ $item->room->name }}</td>
                                    <td>
                                        <a href="" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal goes here --}}


    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header container bg-primary">
                    <h5 class="text-white text-center">Tambah Data Barang</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>

                <div class="modal-body">
                    <form method="post" action="{{ url('items') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Kadaluarsa</label>
                                    <input type="text" class="form-control datepicker" name="exp_date"
                                        value="{{ old('exp_date') }}">
                                </div>


                                <div class="form-group">
                                    <label>Jenis Barang</label>
                                    <select class="form-control select2" name="type_item">
                                        @foreach ($itemTypes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select class="form-control select2">
                                        <option>Supplier 1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Ruangan</label>
                                    <select class="form-control select2" name="room">
                                        @foreach ($rooms as $item)
                                            <option value="{{ $item->room_code }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kondisi</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="condition" value="1" class="selectgroup-input"
                                                checked="">
                                            <span class="selectgroup-button">Baik</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="condition" value="2" class="selectgroup-input">
                                            <span class="selectgroup-button">Rusak</span>
                                        </label>

                                    </div>
                                </div>

                            </div>
                            <div class="mx-auto justify-content-center" style="width: 50%;">
                                <button type="submit" class="btn btn-outline-primary container"
                                    name="submit">Konfirmasi</a>
                                    <button type="button" class="btn btn-outline-danger container mt-2"
                                        data-dismiss="modal">Cancel</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
