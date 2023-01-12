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
                        <button class="btn btn-outline-success mb-2">
                            Export Data ke Excel
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Lokasi Ruangan</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Hubungi Supplier</th>
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
                                                <button type="submit" id="btn_action"
                                                    class="btn btn-sm btn-outline-primary" data-target="#detailModal"
                                                    data-toggle="modal" class="btn btn-outline-danger"
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
                                        <td>
                                            @if ($item->is_accepted === 1)
                                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                                    data-target="#callSupplierModal"
                                                    data-no_telp="{{ $item->item->supplier->phone }}"
                                                    data-email="{{ $item->item->supplier->email }}">Hubungi</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $reports->links() !!}
                        </div>
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
                            <input type="text" class="form-control" disabled name="supplier_name" id="supplier_name">
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
                            <textarea class="form-control" aria-label="With textarea" disabled name="description" id="description"></textarea>
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
                                    <button type="submit" class="btn btn-danger">Tolak Laporan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Call supplier --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="callSupplierModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hubungi Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="text-body">Pilih Metode untuk menghubungi supplier</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a href="" type="button" class="btn btn-success whatsapp" target="_blank">
                        Whatsapp
                    </a>
                    <a href="" type="button" class="btn btn-danger gmail" target="_blank">
                        G-mail
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#detailModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var id = button.data('id'); // Nilai data-id yang diambil dari tombol
                var name = button.data('name'); // Nilai data-name yang diambil dari tombol

                var item_code = button.data('item_code');
                var item_name = button.data('item_name');
                var supplier_name = button.data('supplier_name');
                var supplier_contact = button.data('supplier_contact');
                var item_type = button.data('item_type');
                var exp_date = button.data('exp_date');
                var description = button.data('description');
                var id = button.data('id');

                $('#detailModal #item_code').val(item_code);
                $('#detailModal #report_id').val(id);
                $('#detailModal #item_name').val(item_name);
                $('#detailModal #supplier_name').val(supplier_name);
                $('#detailModal #supplier_contact').val(supplier_contact);
                $('#detailModal #item_type').val(item_type);
                $('#detailModal #exp_date').val(exp_date);
                $('#detailModal #description').val(description);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#callSupplierModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var no_telp = button.data('no_telp'); // Nilai data-id yang diambil dari tombol
                var email = button.data('email'); // Nilai data-name yang diambil dari tombol
                console.log(no_telp);
                $("#callSupplierModal .whatsapp").attr("href",
                    "https://wa.me/" + no_telp +
                    "?text={{ urlencode('Halo admin, saya ingin bertanya tentang produk Anda.') }}"
                );
                $("#callSupplierModal .gmail").attr("href",
                    "mailto:" + email +
                    "?subject=Pengajuan&barang&rusak=Halo admin, saya ingin melakukan pengajuan barang"
                );



            });
        });
    </script>
@endpush
