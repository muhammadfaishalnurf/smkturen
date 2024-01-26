@extends('layouts.base')
@section('main')

<div class ="container ">
<h3 class="mb-3">Edit Futsal</h3>

<a class="btn btn-warning " href="/database">
    Kembali </a>

<br/>
<br/>

 @foreach($database as $item)
 <form action="/database/update" method="post">
    @csrf

    <input type="hidden" name="id" value="{{ $item->id }}"><br/>
 <div class="mb-1"> 
    <label  for="exampleInputEmail1" class="form-label">  Nama Club</label>
  <input type="type" class="form-control" required="required" name="nama_club" value="{{ $item->nama_club }}"><br/>
</div>
   <div class="mb-1">
    <label  for="exampleInputEmail1" class="form-label">Anggota</label> 
    <input type="type" class="form-control" required="required" name="anggota" value="{{ $item->anggota }}"><br/> 
</div>
    <div class="mb-1"> 
        <label  for="exampleInputEmail1" class="form-label">Waktu Pendaftaran</label>
        <input type="type" class = "form-control" required="required" name="waktu_pendaftaran" value="{{ $item->waktu_pendaftaran}}"><br/>
    <div>
    <input type="submit" class="btn btn-success" value ="Simpan">
   
</form>
</div>
@endforeach
@endsection