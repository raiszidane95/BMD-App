@extends('layouts.navbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class=" col-4 alert alert-info">
            <strong>Hallo</strong>, Selamat Datang
            <span type="button" class="alert-close" onclick="this.parentElement.style.display='none';"
                style="float: right; top: 0px">&times;</span><br>
            <b>{{ $user->name }}</b>.
        </div>

        <!-- Content Row -->
        <div class="row">
            @if ($user->role->name == 'KT' || $user->role->name == 'KTT')
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Gaji</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                        {{ number_format($countGaji, 0, ',', '.') }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Jam Kerja</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $hours = floor($countJamKerja / 3600);
                                        $minutes = floor(($countJamKerja % 3600) / 60);
                                        ?>
                                        {{ sprintf('%02d:%02d', $hours, $minutes) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Karyawan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Jabatan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $roles->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Status
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        @if ($user->role->name == 'KT')
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                Karyawan Tetap</div>
                                        @elseif ($user->role->name == 'KTT')
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                Karyawan Tidak Tetap</div>
                                        @elseif ($user->role->name == 'admin')
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                Admin</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
