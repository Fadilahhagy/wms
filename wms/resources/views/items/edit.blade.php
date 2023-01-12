@extends('layouts.app')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Ruangan</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Barang </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('items/' . $item->item_code) }}">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $item->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Kadaluarsa</label>
                                        <input type="text" class="form-control datepicker" name="exp_date"
                                            value="{{ $item->exp_date }}">
                                    </div>


                                    <div class="form-group">
                                        <label>Jenis Barang</label>
                                        <select class="form-control select1" name="type_item">
                                            @foreach ($itemTypes as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $item->type_item_id ? 'selected' : '' }}>
                                                    {{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="form-control select1" name="item_supplier">
                                            @foreach ($suppliers as $row)
                                                <option value="{{ $row->id }}"
                                                    @if ($row->id == $item->supplier_id) @selected(true) @endif>
                                                    {{ $row->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Ruangan</label>
                                        <select class="form-control select1" name="room">
                                            @foreach ($rooms as $row)
                                                <option value="{{ $row->room_code }}"
                                                    @if ($row->room_code == $item->room_code) @selected(true) @endif>
                                                    {{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($item->condition == 2)
                                        <div class="form-group">
                                            <label class="form-label">Kondisi</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="condition" value="1"
                                                        class="selectgroup-input"
                                                        {{ $item->condition == 1 ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">Baik</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="condition" value="2"
                                                        class="selectgroup-input"
                                                        {{ $item->condition == 2 ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">Rusak</span>
                                                </label>

                                            </div>
                                        </div>
                                    @endif


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
        </section>
    </div>
@endsection

@push('scripts')
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
