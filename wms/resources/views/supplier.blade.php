@extends('layouts.app')

@section('content')

<!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Supplier</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">WMS</a></div>
                <div class="breadcrumb-item"><a href="#">Supplier</a></div>
                <div class="breadcrumb-item">List Data Supplier</div>
              </div>
            </div>
              <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="section-title">List Data Supplier
                    <form action="{{ route('supplier.search') }}" method="GET" class="card-header-form">
                      <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                      </div>
                    </form>
                    </h4>
                    <div class="card-header-action">
                      <div class="buttons">
                      <button class="btn btn-outline-primary" id="modal" data-target="#exampleModal" data-toggle="modal">
                        Tambah data supplier
                      </button>
                      </div>
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
                          <th scope="col">ID</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">No telp.</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($suppliers as $supplier)
                        <tr>
                          <th scope="row">{{ $supplier->id }}</th>
                          <td>{{ $supplier->name }}</td>
                          <td>{{ $supplier->address }}</td>
                          <td>{{ $supplier->email }}</td>
                          <td>{{ $supplier->phone }}</td>
                          <td>
                            <button data-id="{{$supplier->id}}" data-toggle="modal" data-target="#exampleModal2" class="btn btn-outline-primary edit">Edit</button>
                            <form method="POST" action="{{ route('supplier.delete') }}">
                              @csrf
                              @method('DELETE')
                              <input type="hidden" id="id" name="id" value="{{ $supplier->id }}">
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                        </tr>
                        @empty
                          <div class="alert alert-danger">
                            Data supplier belum tersedia.
                          </div>
                        @endforelse
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $suppliers->links() !!}
                    </div>
                  </div>
                </div>   
        </section>
      </div>

{{-- Modal create supplier goes here  --}}
      <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data Supplier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <p>Tambahkan data supplier dengan lengkap!</p>
                <div class="form-group">
                  <label>Nama</label>
                    <input type="hidden" name="user_id">
                    <input type="text" class="form-control" placeholder="Nama Supplier" name="name">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="Alamat Supplier" name="address">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                    <input type="email" class="form-control" placeholder="E-mail Supplier" name="email">
                </div>
                <div class="form-group">
                  <label>No telp.</label>
                    <input type="text" class="form-control" placeholder="No telp. Supplier" name="phone">
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

{{-- Modal edit goes here --}}
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal2" data-target="#exampleModal2">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
          @csrf
          @method('PUT')
          <p>Edit data supplier!</p>
          <div class="form-group">
            <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama Supplier" name="name" id="name_supplier">
          </div>
          <div class="form-group">
            <label>Alamat</label>
              <input type="text" class="form-control" placeholder="Alamat Supplier" name="address" id="address_supplier">
          </div>
          <div class="form-group">
            <label>E-mail</label>
              <input type="email" class="form-control" placeholder="E-mail Supplier" name="email" id="email_supplier">
          </div>
          <div class="form-group">
            <label>No telp.</label>
              <input type="text" class="form-control" placeholder="No telp. Supplier" name="phone" id="phone_supplier">
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
  $(document).ready(function(){
    //edit data
    $('.edit').on("click",function(){
      var id = $(this).attr('data-id');
      $.ajax({
        url : "{{route('supplier.edit')}}?id="+id,
        type : "GET",
        dataType : "JSON",
        success : function(supplier){
          $('#id').val(supplier.id);
          $('#name_supplier').val(supplier.name);
          $('#address_supplier').val(supplier.address);
          $('#email_supplier').val(supplier.email);
          $('#phone_supplier').val(supplier.phone);
        }
      });
    });
  });
</script>
@endpush