
<?php $__env->startSection('main'); ?>
<h3>Tambah Data Buku</h3>
<a href="/database" class="btn btn-primary">Kembali</a>
<br>
<br>
<form action="/database/store" method="post">
    <?php echo csrf_field(); ?>
    Judul <input type="text" name="judul" required="required"><br>
    Jml_buku <input type="text" name="jml_buku" required="required"><br>
    Kode_buku <input type="text" name="kode_buku" required="required"><br>
    <input type="submit" value="Simpan Data" class="btn btn-success">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\alif_github\smkturen\alif_laravel\crud\resources\views/layouts/tambah.blade.php ENDPATH**/ ?>