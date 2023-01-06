@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Laporan</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="section-title">List Data Laporan</h4>
                        <form class="card-header-form w-25">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Lokasi Ruangan</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reports as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->item_code }}</td>
                                    <td>{{ $item->item->name }}</td>
                                    <td>{{ $item->item->room->name }}</td>
                                    <td>{{ $item->item->supplier->name }}</td>
                                    <td>
                                        @if ($item->is_accepted === 0)
                                            <button type="submit"
                                                    id="btn_action"
                                                    class="btn btn-sm btn-outline-primary"
                                                    data-target="#detailModal" data-toggle="modal"
                                                    class="btn btn-outline-danger"
                                                    data-id="{{ $item->id }}"
                                                    data-item_code="{{ $item->item->item_code }}"
                                                    data-item_name="{{ $item->item->name }}"
                                                    data-supplier_name="{{ $item->item->supplier->name }}"
                                                    data-supplier_contact="{{ $item->item->supplier->phone }}"
                                                    data-item_type="{{ $item->item->itemType->name }}"
                                                    data-exp_date="{{ $item->item->exp_date }}"
                                                    data-description="{{ $item->description }}">
                                                Tindak Laporan
                                            </button>
                                        @elseif($item->is_accepted === 1)
                                            <p class="text-success mt-2"><b>Laporan telah disetujui</b></p>
                                        @else
                                            <p class="text-danger mt-3"><b>Laporan telah ditolak</b></p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal goes here --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
        <div class="modal-dialog modal-lg modal-dialog-centered lg-8" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lapor Data Barang Rusak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Kode Barang</label>
                            <input type="text" id="item_code" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Supplier : </label>
                            <input type="text" class="form-control" disabled name="supplier_name"
                                   id="supplier_name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label mt-3">Nama Barang</label>
                            <input type="text" class="form-control" disabled name="item_name" id="item_name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label mt-3">Kontak Supplier</label>
                            <input type="text" class="form-control" disabled name="supplier_contact"
                                   id="supplier_contact">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label mt-3">Jenis Barang</label>
                            <input type="text" class="form-control" disabled name="item_type" id="item_type">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label mt-3">Tanggal Kadaluarsa</label>
                            <input type="text" class="form-control" disabled name="exp_date" id="exp_date">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" aria-label="With textarea" disabled name="description"
                                      id="description"></textarea>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row mx-auto">
                                <form class="mr-2" action="{{ url('/acc-report') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="report_id" name="report_id">
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </form>
                                <form action="{{ url('/decline-report') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="report_id" name="report_id">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        var btn = document.getElementById("btn_action");

        btn.onclick = function () {

            // Retrieve data from the button's data-attributes
            var id = this.dataset.id;
            var item_code = this.dataset.item_code;
            var item_name = this.dataset.item_name;
            var supplier_name = this.dataset.supplier_name;
            var supplier_contact = this.dataset.supplier_contact;
            var item_type = this.dataset.item_type;
            var exp_date = this.dataset.exp_date;
            var desc = this.dataset.description;

            document.getElementById('report_id').value = id;
            document.getElementById('item_code').value = item_code;
            document.getElementById('item_name').value = item_name;
            document.getElementById('supplier_name').value = supplier_name;
            document.getElementById('supplier_contact').value = supplier_contact;
            document.getElementById('item_type').value = item_type;
            document.getElementById('exp_date').value = exp_date;
            document.getElementById('description').value = desc;

        }
    </script>
@endpush
