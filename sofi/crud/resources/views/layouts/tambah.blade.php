<!-- @extends('layouts.base')
@section('main')
<h3>Tambah Data Buku</h3>
<a href="/database" class="btn btn-primary">Kembali</a>
<br>
<br>
<form action="/database/store" method="post">
    @csrf
    Judul <input type="text" name="judul" required="required"><br>
    Jml_buku <input type="text" name="jml_buku" required="required"><br>
    Kode_buku <input type="text" name="kode_buku" required="required"><br>
    <input type="submit" value="Simpan Data" class="btn btn-success">
</form>
@endsection -->