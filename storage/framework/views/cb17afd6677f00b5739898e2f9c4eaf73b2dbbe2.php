<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/brand/mail.png')); ?>">
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
    <link href="<?php echo e(asset('asset/css/nucleo-icons.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('asset/css/nucleo-svg.css')); ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo e(asset('asset/css/font-awesome.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('asset/css/nucleo-svg.css')); ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="<?php echo e(asset('asset/css/argon-design-system.min.css?v=1.2.2')); ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <style>
        section {
            padding: 100px;
        }
        .form-section{
            display: none;
        }
        .form-section.current {
            display: inherit;
        }
        .btn-primary, .btn-success {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .parsley-errors-list{
            margin: 2px 0 3px;
            font-size: small;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
</head>

<body class="main-content color-swatch-header bg-secondary">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Navbar -->
    <?php echo $__env->make('theme.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Navbar -->
    <div class="wrapper">
        <!-- Header -->
        <div class="header bg-gradient-secondary py-0 py-sm-8 pt-lg-0">

        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6 text-center">
            <div class="row justify-content-center">
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                    <div class="card-header py-lg-7">
                        <div class="row text-center">
                        <div class="col-12">
                            <div class="text-center text-muted mb-4">
                                <div class="col-sm-10 col-10 mx-md-auto">
                                    <img class="col-sm-4" src="<?php echo e(asset('assets/img/brand/sukses.png')); ?>" width="100%">
                                    <h5 class="text-primary display-2">Pendaftaran Desa Berhasil</h5>
                                    <span>Silakan memeriksa email terdaftar untuk mendapatkan data akun Admin Prajuru Desa Adat</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Footer -->
        <?php echo $__env->make('theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Footer -->
    </div>
    <script src="<?php echo e(asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

        <!--   Core JS Files   -->
    <script src="<?php echo e(asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/core/jquery.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('asset/js/core/popper.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('asset/js/core/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('asset/js/plugins/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="<?php echo e(asset('asset/js/plugins/bootstrap-switch.js')); ?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo e(asset('asset/js/plugins/nouislider.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('asset/js/plugins/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/plugins/datetimepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('asset/js/plugins/bootstrap-datepicker.min.js')); ?>"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?php echo e(asset('asset/js/argon-design-system.min.js?v=1.2.2')); ?>" type="text/javascript"></script> <!-- Sharrre libray -->
    <script src="<?php echo e(asset('asset/js/plugins/jquery.sharrre.min.js')); ?>"></script>
    
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
<?php /**PATH D:\Teknologi Informasi\Tugas Akhir\PROJECT\SirajaProject\resources\views/auth/daftar-desa-sukses.blade.php ENDPATH**/ ?>