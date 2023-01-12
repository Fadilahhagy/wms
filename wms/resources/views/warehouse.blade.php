@extends('layouts.app')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
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
                <div class="card-header ">
                    <h4 class="section-title">List Data Barang
                        <form class="card-header-form">
                          <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search..." id="search">
                          </div>
                        </form>
                        </h4>
                        <div class="card-header-action">
                          <div class="buttons">
                          <button class="btn btn-outline-primary" id="modal" data-target="#exampleModal" data-toggle="modal">
                            Tambah data barang
                          </button>
                          </div>
                          <div class="card-header>">
                        </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="condition" value="1" class="selectgroup-input"
                                onclick="redirect('/items/condition/1')"
                                {{ request()->is('items/condition/1') ? 'checked' : '' }}>
                            <span class="selectgroup-button">Baik</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="condition" value="2" class="selectgroup-input"
                                onclick="redirect('/items/condition/2')"
                                {{ request()->is('items/condition/2') ? 'checked' : '' }}>
                            <span class="selectgroup-button">Rusak</span>
                        </label>
                    </div>
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
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
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
                                <th scope="col" class="{{ request()->is('items/condition/2') ? 'd-none' : '' }}">Ubah
                                    Kondisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->item_code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->itemType->name }}</td>
                                    <td>{{ $item->exp_date }}</td>
                                    <td>{{ $item->room->name }}</td>
                                    <td class="{{ request()->is('items/condition/2') ? 'd-none' : '' }}">
                                        <a href="" class="btn btn-sm btn-outline-danger"
                                            data-id="{{ $item->item_code }}" data-name="{{ $item->name }}"
                                            id="editConditionBtn" data-target="#editConditionModal"
                                            data-toggle="modal">Barang Rusak
                                        </a>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <button type="button" class="btn btn-icon btn-sm btn-danger" id="deleteBtn"
                                                data-target="#deleteModal" data-toggle="modal"
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

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal Tambah Barang --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header container bg-primary">
                    <h5 class="text-white text-center">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                                    <select class="form-control select2" name="item_supplier">
                                        @foreach ($suppliers as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
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
                                            <input type="radio" name="condition" value="1"
                                                class="selectgroup-input" checked="">
                                            <span class="selectgroup-button">Baik</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="condition" value="2"
                                                class="selectgroup-input">
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
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>


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
                $('#deleteModal #item_id').val(id);
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
                $('#editConditionModal #item_id').val(id);
                modal.find('.modal-body #text-body').html("Anda yakin akan mengubah  data barang " + name +
                    " menjadi <b>data barang rusak</b>");
            });
        });

        function redirect(url) {
            window.location.href = url;
        }

        // Live Search
        $(document).ready(function() {
            var url = "";

            if (window.location.pathname == "/items/condition/1") {
                url = "/items/condition/1"
            } else {
                url = "/items/condition/2"
            }
            var typingTimer;
            var doneTimingInterval = 500;
            $("#search").on("keyup", function() {
                clearTimeout(typingTimer);
                var value = $(this).val().toLowerCase();
                typingTimer = setTimeout(() => {
                    $.get(url + "/live_search?q=" + value, function(data) {
                        $("#result").html("");
                        console.log(data);
                        $.each(data, function(key, value) {
                            $("#result").append(`<tr>
                                <th scope="row">${key+1}</th>
                                <td>${value.item_code}</td>
                                <td>${value.name}</td>
                                <td>${value.item_type.name}</td>
                                <td>${value.exp_date}</td>
                                <td>${value.room.name}</td>
                                <td class="{{ request()->is('items/condition/2') ? 'd-none' : '' }}">
                                    <a href="" class="btn btn-sm btn-outline-danger"
                                        data-id="${value.item_code }" data-name="${value.name }"
                                        id="editConditionBtn" data-target="#editConditionModal"
                                        data-toggle="modal">Barang Rusak
                                    </a>
                                </td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="btn btn-icon btn-sm btn-danger" id="deleteBtn"
                                            data-target="#deleteModal" data-toggle="modal"
                                            data-id="${value.item_code }" data-name="${value.name }">
                                            <i class="fa-sharp fa-solid fa-trash"> </i>
                                        </button>
                                        <a href="/items/form/${value.item_code }"
                                            class="btn btn-icon btn-sm btn-warning" style="margin-left: 5px">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>`);
                        });
                    });
                }, doneTimingInterval);
            });
        });
    </script>
@endpush
