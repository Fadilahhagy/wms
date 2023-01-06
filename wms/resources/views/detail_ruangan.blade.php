@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Ruangan</h1>
            </div>

            <div class="section-body">
                <div class="container-fluid">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kapasitas Ruangan</h4>
                            </div>
                            <div class="card-body p-2">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Capacity</th>
                                        </tr>
                                        @foreach ($room->itemTypes as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->pivot->capacity }}</td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Barang</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jenis Barang</th>
                                        <th scope="col">Tanggal Kadaluarsa</th>
                                        <th scope="col">Lokasi Ruangan</th>
                                        <th scope="col">Ubah Kondisi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($room->items as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->item_code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->itemType->name }}</td>
                                            <td>{{ $item->exp_date }}</td>
                                            <td>{{ $item->room->name }}</td>
                                            <td><a href="" class="btn btn-sm btn-outline-danger"
                                                    data-id="{{ $item->item_code }}" data-name="{{ $item->name }}"
                                                    id="editConditionBtn" data-target="#editConditionModal"
                                                    data-toggle="modal">Ubah
                                                    Ke Barang Rusak</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-icon btn-sm btn-danger" id="deleteBtn"
                                                    data-target="#deleteModal" data-toggle="modal"
                                                    data-id="{{ $item->item_code }}" data-name="{{ $item->name }}">
                                                    <i class="fa-sharp fa-solid fa-trash"> </i>
                                                </a>
                                                <a href="" class="btn btn-icon btn-sm btn-warning"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
