@extends('layouts.base')
@section('main')

@php
$no = 1;
@endphp

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
      aria-expanded="false">
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
<br/>
<br/>


<div class="card">
    <div class="card-header">
        <h3>Profile Futsal</h3>
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Futsal</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <form action="/database/cari" method="get">
            <div class="row g-3 align-items-center">
                <div class="col-auto p-2 g-col-3">
                    <a class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal1">Tambah
                        Futsal</a>
                </div>



                <div class="col-auto ms-auto mb-1 mb-lg-0">
                    <label for="search" class="col-form-label">Search :</label>
                </div>
                <div class="col-auto">
                    <input type="search" name="cari" id="search" placeholder="Masukkan Nama Club"
                        value="{{ old('cari') }}" class="form-control">
                </div>
            </div>
        </form>
        <br />
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Futsal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/database/store" method="post">
                            @csrf
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label"> Nama Club</label>
                                <input type="text" name="nama_club" class="form-control" required="required"><br />
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Anggota</label>
                                <input type="text" name="anggota" class="form-control" required="required"><br />
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Waktu pendaftaran</label>
                                <input type="time" name="waktu_pendaftaran" class="form-control"
                                    required="required"><br />
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="dataTables_lenght" id="table_futsal_lenght">


                <label>
                    show
                    <select name="table_vendor_length" aria-controls="table_vendor" class="form-select form-select-sm">
                        <option value="10">10</option>slot
                        <option value="25">25</option>slot
                        <option value="50">50</option>slot
                        <option value="100">100</option>slot
                    </select>
                    entries
                </label>
            </div>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th> NO</th>
                    <th>Nama club</th>
                    <th>Anggota</th>
                    <th>Waktu Pendaftaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($database as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item-> nama_club}}</td>
                    <td>{{$item-> anggota}}</td>
                    <td>{{$item-> waktu_pendaftaran}}</td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}"
                            class="btn btn-primary  bi-pencil-square"></a>
                        <a href="/database/hapus/{{$item->id}}" class="btn btn-success  bi-trash3"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="dataTables_info" id="table_vendor_info" role="status" aria-live="polite">
            Showing 1 to 2 of 2 entries
        </div>
    </div>
</div>





@foreach($database as $item)
<div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Futsl</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/database/update" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <form>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label"> Nama Club</label>
                            <input type="text" name="nama_club" class="form-control" required="required"
                                value="{{ $item->nama_club }}"><br /><br />
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Anggota</label>
                            <input type="text" name="anggota" class="form-control" required="required"
                                value="{{ $item->anggota }}"><br /><br />
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Waktu pendaftaran</label>
                            <input type="time" name="waktu_pendaftaran" class="form-control" required="required"
                                value="{{ $item->waktu_pendaftaran}}"><br /><br />
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection