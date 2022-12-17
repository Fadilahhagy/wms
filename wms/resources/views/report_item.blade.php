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
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lapor Data Barang Rusak</h5>
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
              <label>Tanggal : </label>
              <u><i>69 Desemberia 420</i></u>
            </div>
            <div class="form-group">
                <label>Lokasi : </label>
                <u><i>Gudang A069</i></u>
            </div>
            <div class="form-group">
                <label>Deskripsi : </label>
                <u><i>Rusak bagian CPU</i></u>
            </div>
            <div class="form-group">
                <label>Nama Supplier : </label>
                <u><i>PT Mamank Kesbor</i></u>
            </div>
            <div class="form-group">
                <label>Kontak Supplier : </label>
                <u><i>089696942069</i></u>
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
