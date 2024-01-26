<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($no++); ?></td>
            <td><?php echo e($item->judul); ?></td>
            <td><?php echo e($item->jml_buku); ?></td>
            <td><?php echo e($item->kode_buku); ?></td>
            <td>
                <a href="/database/edit/<?php echo e($item->id); ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo e($item->id); ?>">Edit</a>
                <a href="/database/hapus/<?php echo e($item->id); ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\Git\smkturen\faishal\crud\resources\views/layouts/ajaxpage.blade.php ENDPATH**/ ?>