@extends('layouts.base')
@section('main')
<style>
    .img-wrap-profil {
        width: 50px;
        height: 50px;
    }

    .profil-border {
        border: 3px solid #555DF9;
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
</style>
<div class="col d-lg-flex justify-content-end">

  <div class="dropdown float-end">
    <a class="admin-profil dropdown-toggle img-wrap-profil" type="button" data-bs-toggle="dropdown"
      aria-expanded="fal  se">
      <img src="https://manpro.getaplikasi.id/assets/images/faces/user_defaulth.jpg" alt="#"
        class="mb-2 profil-border rounded-circle" width="3%">
    </a>
    <ul class="dropdown-menu" style="">
      <li><a class="dropdown-item" href="/profil_pengguna">Profil</a></li>
      <li>
        <form action="" method="POST">
            <a href="sesi" type="submit"
            class="btn border-0">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
            <span>Log Out</span>
          </a>
        </form>
      </li>
    </ul>
  </div>
</div>
<div class="page-content">
  <section class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Buku Perpustakaan</h4>
      </div>
      <div class="card-body">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="fullscreen-overlay" style="display: none;">
      <div class="loading-container">
        <img src="https://manpro.getaplikasi.id/assets/images/svg-loaders/puff.svg" class="me-4" style="width: 3rem"
          alt="audio">
        Loading...
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        Data Buku
        <div class="row mt-3">
          <div>
            <a href="/database/tambah" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+
              Tambah Data Buku</a>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <div id="table_vendor_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_length" id="table_vendor_length"><label>Show</label><label> <select name="table_vendor_length"
                    aria-controls="table_vendor" class="form-select form-select-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select></label> <label> entries</label></div>
            </div>
            <form action="/database/search" method="get">
              <div class="row g-3 align-items-center float-end">
                <div class="col-auto">
                  <label for="search" class="col-form-label">Search :</label>
                </div>
                <div class="col-auto">
                  <input type="search" name="search" id="search" value="{{ old('search') }}"
                    class="form-control form-control-sm">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Jml_buku</th>
                  <th>Kode_buku</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              @php
              $number = 1;
              @endphp
              <tbody class="alldata">
                @foreach($database as $item)
                <tr>
                  <td>{{ $number++ }}</td>
                  <td>{{$item->judul}}</td>
                  <td>{{$item->jml_buku}}</td>
                  <td>{{$item->kode_buku}}</td>
                  <td>
                    <a href="/database/edit/{{$item->id}}" class="btn btn-warning" data-bs-toggle="modal"
                      data-bs-target="#exampleModal-{{ $item->id }}"><i class="bi bi-pencil-square"></i></a>
                    <a href="/database/hapus/{{$item->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>

              <tbody id="Content" class="searchdata">

              </tbody>

            </table>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script type="text/javascript">
              $('#search').on('keyup',function()
              {
                $value=$(this).val();

                if($value) {
                  $('.alldata').hide();
                  $('.searchdata').show();
                }

                else{
                  $('.alldata').show();
                  $('.searchdata').hide();
                }
                
                $.ajax({
                  type:'get',
                  url:'{{URL::to('search')}}',
                  data:{'search':$value},

                  success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                  }
                });
              })
            </script>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="table_vendor_info" role="status" aria-live="polite">Showing 1 to 2 of 2
              entries</div>
          </div>
          <div class="col-sm-12 col-md-7 d-flex flex-row-reverse">
            <div class="dataTables_paginate paging_simple_numbers" id="table_vendor_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="table_vendor_previous"><a href="#"
                    aria-controls="table_vendor" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                <li class="paginate_button page-item active"><a href="#" aria-controls="table_vendor" data-dt-idx="1"
                    tabindex="0" class="page-link">1</a></li>
                <li class="paginate_button page-item next disabled" id="table_vendor_next"><a href="#"
                    aria-controls="table_vendor" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>

@foreach($database as $item)
<!-- Modal -->
<form action="/database/update" method="post">
  <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Judul</label>
              <input type="text" required="required" name="judul" value="{{ $item->judul }}" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              jml_buku
              <input type="number" required="required" name="jml_buku" value="{{ $item->jml_buku }}"
                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              kode_buku
              <input type="text" required="required" name="kode_buku" value="{{ $item->kode_buku }}"
                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-outline-primary" value="Simpan Data">
        </div>
      </div>
    </div>
  </div>
</form>
@endforeach

@foreach($database as $item)
<!-- Modal -->
<form action="/database/store" method="post">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Judul</label>
              <input type="text" required="required" name="judul" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              jml_buku
              <input type="number" required="required" name="jml_buku" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              kode_buku
              <input type="text" required="required" name="kode_buku" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-outline-primary" value="Simpan Data">
        </div>
      </div>
    </div>
  </div>
</form>
@endforeach
@endsection
