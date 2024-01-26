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
<div>
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

                        <a type="submit" href="login" class="btn border-0">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            <span>Log Out</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

</br>
<div class="card">
    <div class="card-header">
        <h3>Absensi Siswa/Siswi</h3>
    </div>
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active::before" aria-current="page">Absensi Siswa/Siswi</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header ">
        <form action="/database/cari" method="get">
            <div class="row align-items-center grid-gap-3">
                <div class="col-auto p-2 g-col-3 ">
                    <a class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1"> Absen</a>
                </div>
                <div class="col-auto ml-7 ms-auto mb-2 mb-lg-0">
                    <label for="search" class="col-form-label">Search :</label>
                </div>
                <div class="col-auto p-2 g-col-3">
                    <input type="search" name="cari" id="search" placeholder="Masukkan Judul" value="{{ old('cari') }}"
                        class="form-control">
                </div>
            </div>
        </form>

        <br>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel1">Absen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/database/store" method="post">
                            @csrf
                            <form>

                                <input type="hidden" name="id">
                                <div class="mb-3">

                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_siswa" required>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jam Masuk</label>
                                    <input type="time" class="form-control" name="jam_masuk" required>
                                </div>
                                <div class="modal-footer col-auto mb-3 ms-auto mb-2 mb-lg-0">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jam Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($database as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->nama_siswa}}</td>
                    <td>{{$item->jam_masuk}}</td>
                    <td>
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}"
                            class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                        <a href="/database/hapus/{{$item->id}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>
        <div>
            <ul class="pagination">
                <li class="previous disabled ms-auto mb-2 mb-lg-0" id="table_vendor_preious">
                    <a href="#" aria-controls="table_vendor" data-dt-idx="0" class="page-link">Previous</a>
                </li>
                <li class="active">
                    <a href="#" aria-controls="table_vendor" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="next disabled margin-left-4px" id="table_vendor_next">
                    <a href="#" aria-controls="table_vendor" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>

@foreach($database as $item)
<div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit absen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/database/update" method="post">
                    @csrf
                    <form>

                        <input type="hidden" name="id" value="{{$item->id}}">
                        <div class="mb-3">

                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_siswa" required
                                value="{{$item->nama_siswa}}">

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam Masuk</label>
                            <input type="time" class="form-control" name="jam_masuk" readonly
                                value="{{$item->jam_masuk}}">
                        </div>
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
@endsection