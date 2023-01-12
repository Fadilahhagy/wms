@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pengguna</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="section-title">List Data Pengguna</h4>
                        <form class="card-header-form w-25">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role->name }}</td>
                                        @if ($item->is_active == 1)
                                            <td><span class="text-success">Aktif</span></td>
                                        @else
                                            <td><span class="text-danger">Tidak Aktif</span></td>
                                        @endif
                                        <td>
                                            @if ($item->is_active != 1)
                                                <a href="" class="btn btn-icon btn-sm btn-success" href=""
                                                    id="edit-button" data-target="#edit-modal" data-toggle="modal"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                                    <i class="fa-solid fa-check"></i>
                                                </a>
                                            @endif
                                            <a href="" class="btn btn-icon btn-sm btn-danger" id="delete-button"
                                                data-target="#delete-modal" data-toggle="modal"
                                                data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                                <i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal Delete pengguna --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
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
                    <form method="POST" action="{{ url('/users') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="user_id" name="user_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Pengguna --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
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
                    <form method="POST" action="{{ url('/users') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="user_id" name="user_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Modal Delete JS --}}
    <script>
        // Get the button that opens the modal
        var btn = document.getElementById("delete-button");

        btn.onclick = function() {

            // Retrieve data from the button's data-attributes
            var id = this.dataset.id;
            var name = this.dataset.name;
            // Use the data in the modal
            document.querySelector('#delete-modal #user_id').value = id;
            document.querySelector('#delete-modal #text-body').innerHTML =
                "<p>Anda yakin akan menghapus pengguna <b>" + name +
                "</b>?</p>";
        }
    </script>


    {{-- Modal Edit JS --}}
    <script>
        // Get the button that opens the modal
        var btn = document.getElementById("edit-button");

        btn.onclick = function() {

            // Retrieve data from the button's data-attributes
            var id = this.dataset.id;
            var name = this.dataset.name;

            console.log(name);
            // Use the data in the modal
            document.querySelector('#edit-modal #user_id').value = id;
            document.querySelector('#edit-modal #text-body').innerHTML =
                "<p>Anda yakin akan meng-aktifkan pengguna <b>" +
                name +
                "</b>?</p>";
        }
    </script>
@endpush
