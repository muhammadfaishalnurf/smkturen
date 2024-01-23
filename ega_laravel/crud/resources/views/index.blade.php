@extends("layouts.base")
@section('main')
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
<section class="row">



    <h3>Sekolah</h3>


    
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Followers</h6>
                                <h6 class="font-extrabold mb-0">183.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Following</h6>
                                <h6 class="font-extrabold mb-0">80.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                <h6 class="font-extrabold mb-0">112</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                                        <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">Europe</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0">862</h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-europe"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi text-success" width="32" height="32" fill="blue" style="width:10px">
                                        <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">America</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0">375</h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-america"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                                        <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0">1025</h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-indonesia"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Comment seng gak guna</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="assets/images/faces/5.jpg">
                                                </div>
                                                <p class="font-bold ms-3 mb-0">Disamarkan</p>
                                            </div>
                                        </td>
                                        <td class="col-auto">
                                            <p class=" mb-0">Inpo Duda min</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="assets/images/faces/2.jpg">
                                                </div>
                                                <p class="font-bold ms-3 mb-0">Disamarkan</p>
                                            </div>
                                        </td>
                                        <td class="col-auto">
                                            <p class=" mb-0">P balappppp</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-4">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">Sigit rendang</h5>
                        <h6 class="text-muted mb-0">@SigitRendang</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Recent Messages</h4>
            </div>
            <div class="card-content pb-4">
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="assets/images/faces/4.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Febri stang</h5>
                        <h6 class="text-muted mb-0">@FebriStang</h6>
                    </div>
                </div>
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="assets/images/faces/5.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Dean Kopling</h5>
                        <h6 class="text-muted mb-0">@DeanKopling</h6>
                    </div>
                </div>
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="assets/images/faces/1.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Iwan shock braker</h5>
                        <h6 class="text-muted mb-0">@IwaShockBraker</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Visitors Profile</h4>
            </div>
            <div class="card-body">
                <div id="chart-visitors-profile"></div>
            </div>
        </div>
    </div>
</section>
@endsection