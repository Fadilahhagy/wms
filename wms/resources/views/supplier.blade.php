@extends('layouts.app')

@section('content')
<!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Supplier</h1>
            </div>
              <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="section-title">List Data Supplier
                    <form class="card-header-form">
                      <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                      </div>
                    </form>
                    </h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-outline-primary">
                        Tambah data supplier
                      </a>
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
@endsection
