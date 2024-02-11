<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}" style="width: 40px" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($link == 'dash') active @endif">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->role == 2)
        <!-- Heading -->
        <div class="sidebar-heading">
            Report
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item @if ($link == 'report-anggota') active @endif">
            <a class="nav-link" href="/dashboard/report-anggota">
                <i class="fas fa-users"></i>
                <span>Laporan Anggota</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item @if ($link == 'report-simpanan') active @endif">
            <a class="nav-link" href="/dashboard/report-simpanan">
                <i class="fas fa-box"></i>
                <span>Laporan Simpanan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item @if ($link == 'report-pinjaman') active @endif">
            <a class="nav-link" href="/dashboard/report-pinjaman">
                <i class="fas fa-hand-holding-usd"></i>
                <span>Laporan Pinjaman</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item @if ($link == 'report-angsuran') active @endif">
            <a class="nav-link" href="/dashboard/report-angsuran">
                <i class="fas fa-dollar-sign"></i>
                <span>Laporan Angsuran</span></a>
        </li>
    @else
        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item @if ($link == 'anggota') active @endif">
            <a class="nav-link" href="/dashboard/anggota">
                <i class="fas fa-users"></i>
                <span>Anggota</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item @if ($link == 'simpanan') active @endif">
            <a class="nav-link" href="/dashboard/simpanan">
                <i class="fas fa-box"></i>
                <span>Simpanan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item @if ($link == 'pinjaman') active @endif">
            <a class="nav-link" href="/dashboard/pinjaman">
                <i class="fas fa-hand-holding-usd"></i>
                <span>Pinjaman</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @if ($link == 'angsuran' || $link == 'bayar') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-dollar-sign"></i>
                <span>Angsuran</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Angsuran:</h6>
                    <a class="collapse-item @if ($link == 'bayar') active @endif"
                        href="/dashboard/angsuran/bayar">Bayar Angsuran</a>
                    <a class="collapse-item @if ($link == 'angsuran') active @endif" href="/dashboard/angsuran">Data
                        Angsuran</a>
                </div>
            </div>
        </li>

        <li class="nav-item @if ($link == 'user') active @endif">
            <a class="nav-link " href="/dashboard/user">
                <i class="fas fa-fw fa-user"></i>
                <span>Manage User</span></a>
        </li>
        <hr class="sidebar-divider">
    @endif


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
