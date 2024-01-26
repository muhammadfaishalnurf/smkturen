
<?php $__env->startSection('main'); ?>
<h3>Edit Data Buku</h3>
<a href="/database">Kembali</a>
<br>
<br>
<?php $__currentLoopData = $database; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form action="/database/update" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id" value="<?php echo e($p->id); ?>">
    Judul <input type="text" name="judul" required="required" value="<?php echo e($p->judul); ?>"><br>
    Jml_buku <input type="number" name="jml_buku" required="required" value="<?php echo e($p->jml_buku); ?>"><br>
    Kode_buku <input type="text" name="kode_buku" required="required" value="<?php echo e($p->kode_buku); ?>"><br>
    <input type="submit" value="Simpan Data" class="btn btn-success">
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Git\smkturen\faishal\crud\resources\views/layouts/edit.blade.php ENDPATH**/ ?>