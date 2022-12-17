@extends('layouts.app')

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
                  <div class="card-header">
                    <h4 class="section-title">List Data Barang
                    <form class="card-header-form">
                      <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                      </div>
                    </form>
                    </h4>
                    <div class="card-header-action">
                        <button class="btn btn-outline-primary" id="modal" data-target="#exampleModal" data-toggle="modal">
                            Tambah data barang
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
                          <th scope="col">Kode Barang</th>
                          <th scope="col">Nama Barang</th>
                          <th scope="col">Jenis Barang</th>
                          <th scope="col">Tanggal Kadaluarsa</th>
                          <th scope="col">Lokasi Ruangan</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mamank kesbor</td>
                          <td>Terminal</td>
                          <td>contoh@gmail.com</td>
                          <td>R-301</td>
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
          <h5 class="modal-title">Tambah Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="" action="">
            <p>Tambahkan data barang dengan lengkap!</p>
            <div class="form-group">
              <label>Kode</label>
                <input type="text" class="form-control" placeholder="Kode Barang" name="">
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama Barang" name="">
            </div>
            <div class="form-group">
              <label>Jenis Barang</label>
                <input type="text" class="form-control" placeholder="Jenis Barang" name="">
            </div>
            <div class="form-group">
              <label>Tanggal</label>
                <input type="date" class="form-control" placeholder="Tanggal Kadaluarsa" name="">
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                  <input type="text" class="form-control" placeholder="Lokasi Ruangan" name="">
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
