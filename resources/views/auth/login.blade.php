<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/brand/logo.png')}}">
    <title>
    Sistem Surat Menyurat
    </title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-design-system" />
    <!--  Social tags      -->
    <meta name="keywords" content="design system, bootstrap 4 design system, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon design system">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Argon - Free Design System for Bootstrap 4 by Creative Tim">
    <meta itemprop="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/90/original/opt_argon_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon - Free Design System for Bootstrap 4 by Creative Tim">
    <meta name="twitter:description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/90/original/opt_argon_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon Design System by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/argon-design-system/index.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/90/original/opt_argon_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a Design System for Bootstrap 4." />
    <meta property="og:site_name" content="Creative Tim" />
    <!--  -->
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('asset/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('asset/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('asset/css/argon-design-system.min.css?v=1.2.2') }}" rel="stylesheet" />
</head>

<body class="main-content color-swatch-header bg-secondary">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Navbar -->
    @include('theme.navbar')
    <!-- End Navbar -->
    <div class="wrapper">
        <!-- Header -->
        <div class="header bg-gradient-secondary py-0 py-sm-9 pt-lg-5">
            <div class="container">
                <div class="header-body text-center mb-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-6 col-md-8 px-5">
                            <h1 class="text-primary display-2">Selamat Datang!</h1>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div> --}}
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-white border-0 mb-0">
                        {{-- Error Alert --}}
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-body px-lg-5 py-lg-2">
                            <div class="text-center text-muted mb-4">
                                <div class="col-lg-10 col-10 mx-md-auto">
                                    <img class="ml-lg-10" src="{{ asset('assets/img/brand/login.png')}}" width="100%">
                                </div>
                                <small>Login dengan</small>
                            </div>
                            <form action="{{ url('loginsession') }}" method="POST" id="logForm">
                            {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    @error('login_gagal')
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" name="email" placeholder="Email atau Nomor Telepon" type="text">
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" name="password" placeholder="Password" type="password">
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                    <span class="text-muted">Remember me</span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-6">
                        <a href="#" class="text-primary"><small>Lupa Password?</small></a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="/register" class="text-primary"><small>Create new account</small></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    {{--  <br /><br />  --}}
    <!-- Footer -->
    @include('theme.footer')
    <!-- Footer -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('asset/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('asset/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('asset/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('asset/js/argon-design-system.min.js?v=1.2.2') }}" type="text/javascript"></script> <!-- Sharrre libray -->
    <script src="{{ asset('asset/demo/jquery.sharrre.js') }}"></script>
    {{-- <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.min.js?v=1.2.0') }}"></script> --}}
    <script>
    $(document).ready(function() {



        // Goolge Analytics Code Don't Delete

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-46172202-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
        })();

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


        //
        //

    });
    </script>
    <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
    window.TrackJS &&
        TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
        });
    </script>
</body>

</html>
