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
                  <div class="card-header">
                    <h4 class="section-title">List Data Ruangan
                    <form class="card-header-form">
                      <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                      </div>
                    </form>
                    </h4>
                    <div class="card-header-action">
                      <button class="btn btn-outline-primary" id="modal" data-target="#exampleModal" data-toggle="modal">
                        Tambah data Ruangan
                      </button>
                      <div class="card-header>">
                    </div>
                    </div>
                  </div>
                  <div class="card-body">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Ruangan</th>
                          <th scope="col">Jenis Ruangan</th>
                          <th scope="col">Jenis Barang</th>
                          <th scope="col">No telp.</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td><a id="modal" data-target="#exampleModal2" data-toggle="modal" href="#">A069</a></td>
                          <td>VVIP</td>
                          <td>Komputer</td>
                          <td>06969</td>
                          <td>
                            <a href="" class="btn btn-outline-primary">Edit</a>
                          </td>
                        </tr>
                        </tr>
                      </tbody>
                    </table> 
                  </div>
                </div>   
        </section>
      </div>

{{-- Modal goes here --}}
      <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data Ruangan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="" action="">
                <p>Tambahkan data ruangan dengan lengkap!</p>
                <div class="form-group">
                  <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Ruangan" name="">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                    <input type="text" class="form-control" placeholder="Jenis Ruangan" name="">
                </div>
                <div class="form-group">
                  <label>Jenis Barang</label>
                    <input type="text" class="form-control" placeholder="Jenis Barang" name="">
                </div>
                <div class="form-group">
                  <label>No telp.</label>
                    <input type="text" class="form-control" placeholder="No telp. Supplier" name="">
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
