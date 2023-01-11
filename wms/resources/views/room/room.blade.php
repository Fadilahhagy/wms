@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ruangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">WMS</a></div>
                    <div class="breadcrumb-item"><a href="#">Ruangan</a></div>
                    <div class="breadcrumb-item">List Data Ruangan</div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header ">
                    <h4>List Data Barang</h4>
                    <form class="card-header-form" style="width: 20%;">
                        <input type="text" name="search" class="form-control" placeholder="Search..." id="search">
                    </form>
                </div>
                <div class="card-body">
                    <button class="btn btn-outline-primary mb-2" id="modal" data-target="#modal-tambah-ruangan"
                        data-toggle="modal">
                        Tambah data Ruangan
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
                                <th scope="col">Kode Ruangan.</th>
                                <th scope="col">Nama Ruangan</th>
                                <th scope="col">Jenis Ruangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            @foreach ($rooms as $room)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $room->room_code }}</td>
                                    <td><a
                                            href="{{ url('/room/' . $room->room_code . '/items/condition/1') }}">{{ $room->name }}</a>
                                    </td>
                                    <td>{{ $room->roomType->name }}</td>
                                    <td>
                                        <a href="/room/form/{{ $room->room_code }}" class="btn btn-outline-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal goes here --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-ruangan">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center">
                    <h5 class="modal-title text-white">Tambah Data Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{-- Hidden Class --}}

                <div class="hidden" data-item_type="{{ $item_types->count() }}" id="room-count"></div>

                <div class="modal-body">
                    <form method="post" action="{{ url('room') }}" class="form-room">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Kode Ruangan</label>
                                    <input type="text" class="form-control" name="room_code"
                                        value="{{ old('room_code') }}">
                                </div>

                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input type="text" class="form-control datepicker" name="name"
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Ruangan</label>
                                    <select class="form-control select1" name="room_type">
                                        @foreach ($room_types as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row capacity-container">
                            <div class="col-6 capacity-option">
                                <div class="form-group">
                                    <label>Kapasitas Ruangan</label>
                                    <select class="form-control select1" name="item_room_types[0][id]">
                                        @foreach ($item_types as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-5 capacity-form">
                                <div class="form-group">
                                    <label>Kapasitas</label>
                                    <input type="number" class="form-control datepicker"
                                        name="item_room_types[0][capacity]" value="{{ old('capacity') }}">
                                </div>
                            </div>
                            <div class="col-1 capacity-button mt-4 d-none">
                                <div class="form-group">
                                    <button type="button" class="btn btn-icon btn-danger" id="remove-capacity">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row container-button-add-capacity">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" id="add-capacity">Tambah Kapasitas
                                    Ruangan</button>
                            </div>
                        </div>
                        <div class="mx-auto justify-content-center mt-5" style="width: 50%;">
                            <button type="submit" class="btn btn-outline-primary container" name="submit">Konfirmasi</a>
                                <button type="button" class="btn btn-outline-danger container mt-2"
                                    data-dismiss="modal">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal2">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="" action="">
                        <div class="form-group">
                            <label>Kode Barang : </label>
                            <u><i>DF-6969</i></u>
                        </div>
                        <div class="form-group">
                            <label>Nama Barang : </label>
                            <u><i>Komputer Dell i7</i></u>
                        </div>
                        <div class="form-group">
                            <label>Jenis Barang : </label>
                            <u><i>Komputer</i></u>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kadaluarsa: </label>
                            <u><i>42 Septemberia 69</i></u>
                        </div>
                        <div class="form-group">
                            <label>Supplier : </label>
                            <u><i>Sarkoncak</i></u>
                        </div>
                        <div class="form-group mb-0">
                        </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var i = 0;
        var count = 0;

        $(document).ready(function() {
            count = parseInt($('#room-count').data('item_type')) - 1;
            $("#add-capacity").click(function() {
                if (count > 0) {
                    ++i;
                    var container = $('.capacity-container:first').clone();
                    container.find('select').val('').attr('name', 'item_room_types[' + i + '][id]');
                    container.find('input').val('').attr('name', 'item_room_types[' + i + '][capacity]');

                    container.find('.capacity-button').removeClass('d-none');

                    container.insertBefore('.container-button-add-capacity');
                    count--;
                    if (count <= 0) {
                        console.log($('.container-button-add-capacity').attr('class'));
                        $('.container-button-add-capacity').addClass('d-none');
                    }
                } else {
                    alert('Tidak bisa menambahkan field kapasitas kembali');
                }

            });

            $(document).on('click', '#remove-capacity', function() {
                $(this).parents('.capacity-container').remove();
                $('.container-button-add-capacity').removeClass('d-none');
                count++;
            });

            var url = "";
            var typingTImer;
            var doneTimingInterval = 500;

            $("#search").on("keyup", function() {
                clearTimeout(typingTImer);
                var value = $(this).val().toLowerCase();
                typingTImer = setTimeout(() => {
                    $.get('/room/live_search?q=' + value, function(data) {
                        $("#result").html("");
                        console.log(data);
                        $.each(data, function(key, value) {
                            $("#result").append(`
                                <tr>
                                    <th scope="row">${key+1}</th>
                                    <td>${value.room_code}</td>
                                    <td><a
                                            href="/room/${value.room_code}/items/condition/1">{{ $room->name }}</a>
                                    </td>
                                    <td>${value.room_type.name}</td>
                                    <td>
                                        <a href="/room/${value.room_code}/items/condition/1" class="btn btn-outline-primary">Edit</a>
                                    </td>
                                </tr>
                            `);
                        });
                    });
                }, doneTimingInterval);
            })
        });
    </script>
@endpush
