<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-primary navbar-light py-2">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/img/brand/logo.png')}}" class="navbar-brand-img" alt="...">
            <span class="nav-link-inner--text">SIRAJA</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <div class="navbar-collapse-header">
                <div class="row">
                <div class="col-6 collapse-brand">
                    <a href="dashboard.html">
                    <img src="{{ asset('assets/img/brand/blue.png')}}">
                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    </button>
                </div>
                </div>
            </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
                <a href="{{ route('create-desa-adat') }}" class="nav-link">
                    <i class="ni ni-planet"></i>
                    <span class="nav-link-inner--text">Pendaftaran Desa</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="ni ni-world-2"></i>
                    <span class="nav-link-inner--text">Tentang Kami</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/login" class="btn btn-primary">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Login</span>
                </a>
            </li>
        </ul>
        <hr class="d-lg-none" />
        </div>
    </div>
</nav>
