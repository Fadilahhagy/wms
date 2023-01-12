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
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="condition" value="1" class="selectgroup-input"
                                        onclick="redirect('/room/{{ $room->room_code }}/items/condition/1')"
                                        {{ request()->is('room/*/items/condition/1') ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Baik</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="condition" value="2" class="selectgroup-input"
                                        onclick="redirect('/room/{{ $room->room_code }}/items/condition/2')"
                                        {{ request()->is('room/*/items/condition/2') ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Rusak</span>
                                </label>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jenis Barang</th>
                                        <th scope="col">Tanggal Kadaluarsa</th>
                                        <th scope="col"
                                            class="{{ request()->is('room/*/items/condition/2') ? 'd-none' : '' }}">Ubah
                                            Kondisi</th>
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
                                            <td class="{{ request()->is('room/*/items/condition/2') ? 'd-none' : '' }}">
                                                <a href="" class="btn btn-sm btn-outline-danger"
                                                    data-id="{{ $item->item_code }}" data-name="{{ $item->name }}"
                                                    id="editConditionBtn" data-target="#editConditionModal"
                                                    data-toggle="modal">Barang Rusak
                                                </a>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <button type="button" class="btn btn-icon btn-sm btn-danger"
                                                        id="deleteBtn" data-target="#deleteModal" data-toggle="modal"
                                                        data-id="{{ $item->item_code }}" data-name="{{ $item->name }}">
                                                        <i class="fa-sharp fa-solid fa-trash"> </i>
                                                    </button>
                                                    <a href="/items/form/{{ $item->item_code }}"
                                                        class="btn btn-icon btn-sm btn-warning" style="margin-left: 5px">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    {{-- Modal Delete Barang --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Anda Yakin ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="text-body">Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <form method="POST" action="{{ url('/items') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="item_id" name="item_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit Kondisi Barang --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="editConditionModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Anda Yakin ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="text-body">Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <form method="POST" action="{{ url('/items/edit-condition') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="item_id" name="item_id">
                        <button type="submit" class="btn btn-danger">Ubah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Modal Delete JS --}}
    <script>
        $(document).ready(function() {
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var id = button.data('id'); // Nilai data-id yang diambil dari tombol
                var name = button.data('name'); // Nilai data-name yang diambil dari tombol
                var modal = $(this);
                modal.find('.modal-title').text('Data dengan ID ' + id);
                modal.find('.modal-body input#item_id').val(id);
                modal.find('.modal-body #text-body').text("Anda yakin akan menghapus data " + name + "?");
            });
        });

        // Modal Edit Condition
        $(document).ready(function() {
            $('#editConditionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var id = button.data('id'); // Nilai data-id yang diambil dari tombol
                var name = button.data('name'); // Nilai data-name yang diambil dari tombol
                var modal = $(this);
                modal.find('.modal-title').text('Data dengan ID ' + id);
                modal.find('.modal-body input#item_id').val(id);
                modal.find('.modal-body #text-body').html("Anda yakin akan mengubah  data barang " + name +
                    " menjadi <b>data barang rusak</b>");
            });
        });

        function redirect(url) {
            window.location.href = url;
        }
    </script>
@endpush
