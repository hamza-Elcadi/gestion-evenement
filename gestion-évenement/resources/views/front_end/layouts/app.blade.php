@php
    $link = 'front-end/assets/';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health Care Medical Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Novena HTML Template v1.0">
    <meta name="theme-name" content="novena" />
    <link href="{{ asset('front-end/assets1/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets1/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets1/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets1/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets1/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets1/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/assets1/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <link rel="stylesheet" href="{{ asset($link . 'css/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset($link . 'css/plugins/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset($link . 'css/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset($link . 'css/plugins/slick-carousel/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset($link . 'css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-EXAMPLE_HASH" crossorigin="anonymous" />

</head>

<body id="top" class="d-flex flex-column justify-content-between">
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navigation" id="navbar">
                <div class="container ">
                    <h1>Event manager</h1>
                </div>
            </nav>
        </header>

        @yield('content')
    </div>
    <footer class="w-100 align-self-end footer section gray-bg">
        <div class="container d-flex flex-column">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-3">
                    <div class="widget widget-contact mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Get in Touch</h4>
                        <div class="divider mb-4"></div>

                        <div class="footer-contact-block mb-4">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-email mr-3"></i>
                                <span class="h6 mb-0">Support Available for 24/7</span>
                            </div>
                            <h4 class="mt-2"><a href="mailto:support@email.com">Support@email.com</a></h4>
                        </div>

                        <div class="footer-contact-block">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-support mr-3"></i>
                                <span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
                            </div>
                            <h4 class="mt-2"><a href="tel:+23-345-67890">+23-456-6588</a></h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <script src="{{ asset($link . 'js/app.js') }}"></script>
    <script src="{{ asset($link . 'js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset($link . 'js/plugins/google-map/gmap.jsapp.js') }}"></script>
    <script src="{{ asset($link . 'js/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset($link . 'js/plugins/shuffle/shuffle.min.js') }}"></script>
    <script src="{{ asset($link . 'js/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>





    <script src="{{ asset('front-end/assets1/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('front-end/assets1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-end/assets1/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('front-end/assets1/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('front-end/assets1/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('front-end/assets1/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('front-end/assets1/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('front-end/assets1/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-EXAMPLE_HASH" crossorigin="anonymous"></script>

    {{-- //slide img --}}
    <script>
        $(document).ready(function() {
            // Initialize the carousel
            $('#carouselExample').carousel();

            // Set the carousel to slide automatically every 5 seconds
            setInterval(function() {
                $('#carouselExample').carousel('next');
            }, 5000);
        });
    </script>
</body>

</html>
