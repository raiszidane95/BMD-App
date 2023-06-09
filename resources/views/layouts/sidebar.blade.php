<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-level-up-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Tables -->
    @if ($user->role->name == 'KT')
        <li class="nav-item">
            <a class="nav-link" href="absensi">
                <i class="fas fa-fw fa-table"></i>
                <span>Absensi</span>
            </a>
        </li>
    @endif

    @if ($user->role->name == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="karyawan">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Karyawan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="presensi">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Presensi Karyawan</span>
            </a>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
