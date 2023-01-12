@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lapor</h1>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="section-title">Lapor Barang Rusak
                        <form class="card-header-form">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </h4>
                    <div class="card-header-action">
                        <div class="card-header>">
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                    <td>{{ $item->room->name }}</td>
                                    <td><a id="report_item" data-target="#reportModal" data-toggle="modal"
                                            class="btn btn-outline-danger" data-item_code="{{ $item->item_code }}"
                                            data-item_name="{{ $item->name }}"
                                            data-supplier_name="{{ $item->supplier->name }}"
                                            data-supplier_contact="{{ $item->supplier->phone }}"
                                            data-item_type="{{ $item->itemType->name }}"
                                            data-exp_date="{{ $item->exp_date }}">Lapor
                                            Barang Rusak</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                      {!! $items->links() !!}
                  </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal goes here --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="reportModal">
        <div class="modal-dialog modal-lg modal-dialog-centered lg-8" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lapor Data Barang Rusak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('report-item') }}">
                        <div class="row">
                            {{ csrf_field() }}

                            <input type="hidden" id="item_code_hidden" name="item_code">
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
                                <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // var btn = document.getElementById("report_item");

        // btn.onclick = function() {

        //     // Retrieve data from the button's data-attributes
        //     var item_code = this.dataset.item_code;
        //     var item_name = this.dataset.item_name;
        //     var supplier_name = this.dataset.supplier_name;
        //     var supplier_contact = this.dataset.supplier_contact;
        //     var item_type = this.dataset.item_type;
        //     var exp_date = this.dataset.exp_date;

        //     document.getElementById('item_code').value = item_code;
        //     document.getElementById('item_code_hidden').value = item_code;
        //     document.getElementById('item_name').value = item_name;
        //     document.getElementById('supplier_name').value = supplier_name;
        //     document.getElementById('supplier_contact').value = supplier_contact;
        //     document.getElementById('item_type').value = item_type;
        //     document.getElementById('exp_date').value = exp_date;

        // }

        $(document).ready(function() {
            $('#reportModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var id = button.data('id'); // Nilai data-id yang diambil dari tombol
                var name = button.data('name'); // Nilai data-name yang diambil dari tombol

                var item_code = button.data('item_code');
                var item_name = button.data('item_name');
                var supplier_name = button.data('supplier_name');
                var supplier_contact = button.data('supplier_contact');
                var item_type = button.data('item_type');
                var exp_date = button.data('exp_date');
                $('#reportModal #item_code').val(item_code);
                $('#reportModal #item_code_hidden').val(item_code);
                $('#reportModal #item_name').val(item_name);
                $('#reportModal #supplier_name').val(supplier_name);
                $('#reportModal #supplier_contact').val(supplier_contact);
                $('#reportModal #item_type').val(item_type);
                $('#reportModal #exp_date').val(exp_date);
            });
        });
    </script>
@endpush
