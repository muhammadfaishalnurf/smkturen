
<?php $__env->startSection('main'); ?>
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
<div class="page-heading" id="read">
    <div class="row">
        <div class="col">
        </div>
        <div class="col  d-lg-flex justify-content-end">

            <div class="dropdown float-end">
                <a class="admin-profil dropdown-toggle img-wrap-profil show" type="button" data-bs-toggle="dropdown" aria-expanded="true" fdprocessedid="v47gfo">
                    <img src="https://manpro.getaplikasi.id/assets/images/faces/user_defaulth.jpg" alt="#" class="mb-2 profil-border rounded-circle">
                </a>
                <ul class="dropdown-menu" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 52px, 0px);">
                    <li><a class="dropdown-item" href="/profil_pengguna">Profil</a></li>
                    <li>
                        <form action="" method="POST">
                            <input type="hidden"> <a href="/logout" class="btn border-0">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                <span>Log Out</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Perpustakaan</h4>
            </div>
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard_admin">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Perpustakaan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="fullscreen-overlay" style="display: none;">
            <div class="loading-container">
                <img src="https://manpro.getaplikasi.id/assets/images/svg-loaders/puff.svg" class="me-4" style="width: 3rem" alt="audio">
                Loading...
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Data Peminjaman Buku
                <div class="row mt-3">
                    <div>
                        <a href="/database/tambah" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div id="table_vendor_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row g-2 align-item-center pt-2">
                        <div class="col-auto">Show</div>
                        <div class="col-auto">
                            <select name="table_vendor_length" aria-controls="table_vendor" class="form-select form-select-sm" fdprocessedid="zrst8">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-auto col-md-6">entries</div>
                        <div class="col-auto">
                            <label for="search" class="col-form-table">Search: </label>
                        </div>
                        <div class="col-auto search">
                            <input type="search" id="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="table_vendor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="table_vendor_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="300px">Judul</th>
                                        <th>Jml_buku</th>
                                        <th>Kode_buku</th>
                                        <th width="200px">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                ?>
                                <tbody class="alldata">
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->judul); ?></td>
                                        <td><?php echo e($item->jml_buku); ?></td>
                                        <td><?php echo e($item->kode_buku); ?></td>
                                        <td>
                                            <a href="/database/update/<?php echo e($item->id); ?>" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo e($item->id); ?>"><i class="bi bi-pencil-square"></i></a>
                                            <a href="/database/hapus/<?php echo e($item->id); ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tbody id="Content" class="searchdata">
                                </tbody>

                            </table>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $('#search').on('keyup', function() {

                                    $value = $(this).val();
                                    if ($value) {
                                        $('.alldata').hide();
                                        $('.searchdata').show();
                                    } else {
                                        $('.alldata').show();
                                        $('.searchdata').hide();
                                    }

                                    $.ajax({

                                        type: 'get',
                                        url: "<?php echo e(URL::to('search')); ?>",
                                        data: {
                                            'search': $value
                                        },

                                        success: function(data) {
                                            console.log(data);
                                            $('#Content').html(data);
                                        }
                                    });

                                })
                            </script>

                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-auto col-md-9">
                            <div class="dataTables_info" id="table_vendor_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
                        </div> -->
                        <div class="col-auto">
                            <div class="dataTables_paginate paging_simple_numbers" id="table_vendor_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="table_vendor_previous"><a href="#" aria-controls="table_vendor" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="table_vendor" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item next disabled" id="table_vendor_next"><a href="#" aria-controls="table_vendor" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal-update -->
<form action="/database/update" method="post">
    <div class="modal fade" id="exampleModal-<?php echo e($per->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <?php echo csrf_field(); ?>
                        <div class="form-grup">
                            <input type="hidden" class="form-control" name="id" value="<?php echo e($per->id); ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" required="required" value="<?php echo e($per->judul); ?>">
                        </div>
                        <div class="form-grup">
                            <label class="form-label">Jml_Buku</label>
                            <input type="number" class="form-control" name="jml_buku" required="required" value="<?php echo e($per->jml_buku); ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kode_Buku</label>
                            <input type="text" class="form-control" name="kode_buku" required="required" value="<?php echo e($per->kode_buku); ?>">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                </div>
            </div>
        </div>
    </div>
</form>



<!-- Modal-tambah -->
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
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" required="required">
                        </div>
                        <div class="form-grup">
                            <label class="form-label">Jml_Buku</label>
                            <input type="number" class="form-control" name="jml_buku" required="required">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kode_Buku</label>
                            <input type="text" class="form-control" name="kode_buku" required="required">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Simpan Data" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Git\smkturen\faishal\crud\resources\views/layouts/database.blade.php ENDPATH**/ ?>