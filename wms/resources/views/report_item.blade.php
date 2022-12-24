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
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">No telp.</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mamank kesbor</td>
                          <td>Terminal</td>
                          <td>contoh@gmail.com</td>
                          <td>06969</td>
                          <td>
                            <a id="modal" data-target="#exampleModal" data-toggle="modal" class="btn btn-outline-danger">Lapor Barang Rusak</a>
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
    <div class="modal-dialog modal-xl modal-dialog-centered xl-4" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lapor Data Barang Rusak</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Kode Barang</label>
              <input value="A069" class="form-control" disabled>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nama Supplier : </label>
              <b class="form-control">PT Mamank Kesbor Jaya 3x</b>
            </div>
            <div class="col-md-6">
              <label class="form-label mt-3">Nama Barang</label>
              <input value="Komputer Dell i69" class="form-control" disabled>
            </div>
            <div class="col-md-6">
              <label class="form-label mt-3">Kontak Supplier</label>
              <input value="08696969420" class="form-control" disabled>
            </div>
            <div class="col-md-12">
              <label class="form-label mt-3">Jenis Barang</label>
              <input value="Komputer" class="form-control" disabled>
            </div>
            <div class="col-md-12">
              <label class="form-label mt-3">Tanggal Kadaluarsa</label>
              <input value="69 Desemberia 420" class="form-control" disabled>
            </div>
              <div class="col-md-12 mt-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea"></textarea>
              </div>
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-primary">Konfirmasi</button>
              <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
      </div>
    </div>
  </div>
@endsection
