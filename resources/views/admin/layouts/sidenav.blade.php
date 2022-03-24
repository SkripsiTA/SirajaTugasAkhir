<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center" style="margin-bottom:20px;">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="/assets/img/logo-desa/{{ Auth::user()->desaadat->desadat_logo == '' ? 'mail.png' : Auth::user()->desaadat->desadat_logo  }}" class="navbar-brand-img" alt="...">
            <p class="brand-text font-weight-light" style="margin-bottom: 10px;">Desa Pakraman {{ Auth::user()->desaadat->desadat_nama }}</p>
        </a>
        </div>
        <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.html">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Manajemen Master Data</span>
            </h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('prajuru-banjar-adat') }}">
                    <i class="ni ni-building"></i>
                    <span class="nav-link-text">Prajuru Banjar Adat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('prajuru-desa-adat') }}">
                    <i class="ni ni-badge"></i>
                    <span class="nav-link-text">Prajuru Desa Adat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/nomor-surat">
                    <i class="ni ni-books"></i>
                    <span class="nav-link-text">Nomor Surat</span>
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Manajemen Layanan Surat</span>
            </h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="icons.html">
                    <i class="ni ni-email-83"></i>
                    <span class="nav-link-text">Surat Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard-surat-keluar') }}">
                    <i class="ni ni-send"></i>
                    <span class="nav-link-text">Surat Keluar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="icons.html">
                    <i class="ni ni-atom"></i>
                    <span class="nav-link-text">Surat Layanan Masyarakat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="icons.html">
                    <i class="ni ni-folder-17"></i>
                    <span class="nav-link-text">Manajemen Arsip Surat</span>
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Agenda Acara</span>
            </h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="icons.html">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span class="nav-link-text">Agenda Acara</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</nav>
