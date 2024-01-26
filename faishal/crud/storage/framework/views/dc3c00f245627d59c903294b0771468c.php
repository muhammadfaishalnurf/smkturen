
<?php $__env->startSection('main'); ?>
<a href="/database/tambah" class="btn btn-primary">+ Tambah Data</a>
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
    <?php
    $no = 1;
    ?>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($no++); ?></td>
            <td><?php echo e($item->judul); ?></td>
            <td><?php echo e($item->jml_buku); ?></td>
            <td><?php echo e($item->kode_buku); ?></td>
            <td>
                <a href="/database/edit/<?php echo e($item->id); ?>">Edit</a>
                <a href="/database/hapus/<?php echo e($item->id); ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\alif_github\smkturen\alif_laravel\crud\resources\views/layouts/database.blade.php ENDPATH**/ ?>