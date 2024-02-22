<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kasir Toko Kita</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-home"></i>
            <span>Halaman Utama</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        CRUD
    </div>

    <!-- Auth role -->
    @if (Auth::user()->role == 'admin')
        <!-- Nav Item - User -->
        <li class="nav-item">
            <a class="nav-link" href="/CrudUser">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span></a>
        </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/barang">
            <i class="fas fa-fw fa-table"></i>
            <span>Master Barang</span></a>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="/transaksi">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaksi Pembelian Barang</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
