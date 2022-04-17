<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Sistem Surat Menyurat</title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard" />
    <!--  Social tags      -->
    <meta name="keywords" content="dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon dashboard">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta itemprop="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta name="twitter:description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard/index.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/logo.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.min.css?v=1.2.0') }}" type="text/css">

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Sidenav -->
    @if(Auth::user()->role == 'Super Admin')
      @include('superadmin.layouts.sidenav')
    @else
      @include('admin.layouts.sidenav')
    @endif

    <!-- Main content -->
    <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.layouts.navbar')

    <!-- Header -->
    <!-- Header -->
    @include('admin.layouts.header')

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <a href="#">
                        <img src="/assets/img/profile/{{ Auth::user()->foto == '' ? 'default.jpg' : Auth::user()->foto  }}" alt="Image placeholder" class="card-img-top">
                    </a>
                  <div class="card-body pt-3">
                    <div class="text-center">
                      <h5 class="h3">
                        {{ Auth::user()->penduduk->nama }}<span class="font-weight-light">, 27</span>
                      </h5>
                      <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i>{{ Auth::user()->desaadat->desadat_nama }}
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Profile </h3>
                    </div>
                    <div class="col-4 text-right">
                      <a href="#!" class="btn btn-sm btn-primary">Setting</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form>
                    <h6 class="heading-small text-muted mb-4">Data Pengguna</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">NIK</label>
                            <input type="text" name="penduduk_id" class="form-control" placeholder="NIK" value="{{Auth::user()->penduduk->nik}}" disabled>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{Auth::user()->penduduk->nama }}" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{ Auth::user()->penduduk->tempat_lahir }}" disabled>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ showDateTime(Auth::user()->penduduk->tanggal_lahir, 'd F Y') }}" disabled>
                          </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Jenis Kelamin</label>
                              <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" value="{{ Auth::user()->penduduk->jenis_kelamin }}" disabled>
                            </div>
                          </div>
                      </div>
                    </div>

                    <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Username</label>
                              <input type="text" name="username" class="form-control" placeholder="Username" value="{{ Auth::user()->username }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                              <label class="form-control-label" for="input-email">Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-address">Alamat</label>
                            <input name="alamat" class="form-control" placeholder="Alamat" value="{{ Auth::user()->penduduk->alamat }}" type="text" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-city">Nomor Telpon</label>
                            <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telpon" value="{{ Auth::user()->nomor_telepon }}" disabled>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-country">Desa</label>
                            <input type="text" name="nama_desa" class="form-control" placeholder="Desa" value="{{ Auth::user()->desaadat->desadat_nama }}" disabled>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-country">Kode Pos</label>
                            <input type="number" name="kode_pos" class="form-control" placeholder="Kode Pos" value="{{ Auth::user()->desaadat->desadat_kode_pos }}" disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Informasi Pribadi</h6>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-city">Pekerjaan</label>
                              <input type="text" name="nama_profesi" class="form-control" placeholder="Pekerjaan" value="{{ Auth::user()->penduduk->profesi->profesi }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-country">Kewarganegaraan</label>
                              <input type="text" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan" value="{{ Auth::user()->penduduk->kewarganegaraan }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-country">Golongan Darah</label>
                              <input type="text" name="golongan_darah" class="form-control" placeholder="Golongan Darah" value="{{ Auth::user()->penduduk->golongan_darah }}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Data Orang Tua</h6>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-city">Ayah</label>
                              <input type="text" name="nama_ayah" class="form-control" placeholder="Ayah" value="{{ Auth::user()->penduduk->ayahkandung->nama ?? "Tidak Diketahui" }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-country">Ibu</label>
                              <input type="text" name="nama_ibu" class="form-control" placeholder="Ibu" value="{{ Auth::user()->penduduk->ibukandung->nama ?? "Tidak Diketahui" }}" disabled>
                            </div>
                        </div>
                    </div>
                    {{--  @endforeach  --}}

                  </form>
                </div>
              </div>
            </div>
        </div>
        <!-- Footer -->
        @include('admin.layouts.footer')

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-12">
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label" for="input-username">Username</label>
                                <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label" for="input-email">Email address</label>
                                <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label" for="input-first-name">First name</label>
                                <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Last name</label>
                                <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="form-control-label" for="input-address">Address</label>
                                <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label" for="input-city">City</label>
                                <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label" for="input-country">Country</label>
                                <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label" for="input-country">Postal code</label>
                                <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code">
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                            <label class="form-control-label">About Me</label>
                            <textarea rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Nonaktifkan</button>
                </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- Sweet-Alert -->
    @include('sweetalert::alert')

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.min.js?v=1.2.0') }}"></script>
    <script>
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
        n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

    try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

    } catch (err) {
        console.log('Facebook Track Error:', err);
    }
    </script>
    <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
</body>

</html>
