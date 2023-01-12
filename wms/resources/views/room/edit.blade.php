@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Ruangan</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Ruangan </h4>
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
                        <form method="post" action="{{ url('/room/' . $room->room_code) }}">
                            @method('PUT')
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kode Ruangan</label>
                                        <input type="text" class="form-control" name="room_code"
                                            value="{{ $room->room_code }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Ruangan</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $room->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Jenis Ruangan</label>
                                        <select class="form-control select1" name="room_type">
                                            @foreach ($room_types as $item)
                                                <option value="{{ $item->id }}" @if ($item->id == $room->type_room_id) @selected(true) @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @foreach ($room->itemTypes as $item)
                                <div class="row capacity-container">
                                    <div class="col-6 capacity-option">
                                        <div class="form-group">
                                            <label>Kapasitas Ruangan</label>
                                            <select class="form-control select1"
                                                name="item_room_types[{{ $loop->index }}][id]">
                                                @foreach ($item_types as $item_type)
                                                    <option value="{{ $item_type->id }}"
                                                        {{ $item_type->id == $item['id'] ? 'selected' : '' }}>
                                                        {{ $item_type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5 capacity-form">
                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input type="number" class="form-control "
                                                name="item_room_types[{{ $loop->index }}][capacity]"
                                                value="{{ $item->pivot->capacity }}">
                                        </div>
                                    </div>
                                    <div class="col-1 capacity-button mt-4 @if ($loop->index == 0)
                                        d-none
                                    @endif">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-icon btn-danger" id="remove-capacity">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row container-button-add-capacity">
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary" id="add-capacity" data-item-count="{{count($item_types)}}">Tambah Kapasitas Ruangan</button>
                                </div>
                            </div>
                            
                            <div class="mx-auto justify-content-center mt-5" style="width: 50%;">
                                <button type="submit" class="btn btn-outline-primary container"
                                    name="submit">Konfirmasi</a>
                                    <button type="button" class="btn btn-outline-danger container mt-2"
                                        data-dismiss="modal">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
   $(document).ready(function() {
    $('#add-capacity').click(function() {
            // Menentukan Index
            var newIndex = $('.capacity-container').length;

            
            if (newIndex >= $(this).data("item-count")) {
                $("#add-capacity").hide();
                return;
            }

            $('.container-button-add-capacity').before(`
            <div class="row capacity-container">
                <div class="col-6 capacity-option">
                <div class="form-group">
                    <label>Kapasitas Ruangan</label>
                    <select class="form-control select1" name="item_room_types[${newIndex}][id]">
                    @foreach ($item_types as $item_type)
                        <option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
                    @endforeach
                    </select>
                </div>
                </div>
                <div class="col-5 capacity-form">
                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="number" class="form-control" name="item_room_types[${newIndex}][capacity]">
                </div>
                </div>
                <div class="col-1 capacity-button mt-4">
                <div class="form-group">
                    <button type="button" class="btn btn-icon btn-danger" id="remove-capacity">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </div>
            `);
        });



        $(document).on('click', "#remove-capacity", function(){
            $(this).closest('.capacity-container').remove();
            var itemCount =  $("#add-capacity").data("item-count");
            if($('.capacity-container').length < itemCount){
                $("#add-capacity").show();
            }
        });
    });
  </script>
@endpush
