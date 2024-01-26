@extends('layouts.base')
@section('main')



<div class= "container ">
<h3 class="mb-3 " >Tambah Futsal</h3>


<a class="btn btn-warning" href="/database">
    Kembali </a>

<form action="/database/store" method="post">
    @csrf
    <div class="mb-1">
   <label  for="exampleInputEmail1" class="form-label"> Nama Club</label>
    <input type="text" name="nama_club" class= "form-control"required="required"><br/>
</div>
  <div class ="mb-1">
      <label for="exampleInputEmail1" class="form-label">Anggota</label>
      <input type="text" name="anggota" class = "form-control" required ="required"><br/>
     </div>
   <div class ="mb-1"> 
    <label  for="exampleInputEmail1" class="form-label">Waktu pendaftaran</label>
    <input type="time" name="waktu_pendaftaran" class="form-control" required="required"><br/>
</div>
    <input type="submit" class="btn btn-success" value ="Simpan">
</div>
   
</form>
</div>

@endsection