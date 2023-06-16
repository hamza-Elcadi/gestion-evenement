@php
    $link = 'back-end/login';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset($link . '/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset($link . '/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <style>
        .preview-image {
            max-width: 150px;
            height: 100px;
            margin: 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body class="">
    <div class="wrapper " style="background-color: #f4f3ef;">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <!-- <p>CT</p> -->
                </a>
                <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                    UserName
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li @yield('classDashboardActive')>
                        <a href="{{ route('dashboard') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li @yield('classModulatorActive')>
                        <a href="{{ route('modulator') }}">
                            <i class="fa-solid fa-users"></i>
                            <p>MODULATOR</p>
                        </a>
                    </li>
                    <li @yield('classOrganizerActive')>
                        <a href="{{route('organizer')}}">
                            <i class="fa-solid fa-sitemap"></i>
                            <p>Organizers</p>
                        </a>
                    </li>
                    <li @yield('classPartnerActive')>
                        <a href="{{route('partner')}}">
                            <i class="fa-solid fa-handshake"></i>
                            <p>Partners</p>
                        </a>
                    </li>
                    <li @yield('classEventActive')>
                        <a href="{{ route('event') }}">
                            <i class="fa-solid fa-calendar-days"></i>
                            <p>Events</p>
                        </a>
                    </li>
                    <li @yield('class-Active')>
                        <a href="./user.html">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
            <div class="main-panel h-100 d-flex flex-column justify-content-between">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                            @auth
                            <a class="navbar-brand" href="javascript:;">{{ Auth::user()->name_user; }}</a>
                            @endauth
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item btn-rotate dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com"
                                        id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-user"></i>
                                        <p>
                                            <span class="d-lg-none d-md-block">Settings</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link btn-rotate" href="javascript:;">
                                        <i class="fa-solid fa-user"></i>
                                        <p>
                                            <span class="d-lg-none d-md-block">Account</span>
                                        </p>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </nav>
                @yield('content')
            <footer class="footer footer-black  footer-white" style="background-color: inherit;">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
                            <span class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
            </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset($link . '/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset($link . '/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset($link . '/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset($link . '/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset($link . '/assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset($link . '/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset($link . '/assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset($link . '/assets/demo/demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
    <script>
        autosize(document.querySelector('#myTextarea'));
    </script>
    <script>
        // Get the file input element
        const fileInput = document.getElementsByClassName('logoOrImage')[0];

        // Listen for file selection
        fileInput.addEventListener('change', handleFileSelect, false);

        // Handle file selection
        function handleFileSelect(event) {
            // Get the selected files
            const files = event.target.files;

            // Clear the preview container
            document.getElementById('previewContainer').innerHTML = '';

            // Loop through the selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Create a FileReader object
                const reader = new FileReader();

                // Read the file as a Data URL
                reader.readAsDataURL(file);

                // Define the callback function for when file reading is complete
                reader.onloadend = function() {
                    // Create an image element
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.classList.add('preview-image');

                    // Append the image to the preview container
                    document.getElementById('previewContainer').appendChild(img);
                };
            }
        }
    </script>
    {{-- //succes message --}}
    <script>
        // Get the success message element
        const successMessage = document.getElementById('successMessage');

        // Check if the success message element exists
        if (successMessage) {
            // Set a timeout to gradually hide the success message after 5 seconds
            setTimeout(function() {
                successMessage.style.transition = 'opacity 1s';
                successMessage.style.opacity = '0';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                },450);
            }, 1000);
        }
    </script>
{{-- //add rib and list rib --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.ribLink').click(function(e) {
            e.preventDefault();
            var link = $(this);
            var container = link.parent('.toggleContainer');
            var select = container.siblings('.toggleContainer').find('.toggleSelect');
            var input = container.siblings('.toggleContainer').find('.toggleInput');

            select.addClass('d-none');
            input.addClass('d-none');

            container.find('.toggleSelect').removeClass('d-none');
            container.find('.toggleInput').removeClass('d-none');

            select.val('');
            input.val('');
        });

        $('.categoryLink').click(function(e) {
            e.preventDefault();
            var link = $(this);
            var container = link.parent('.toggleContainer');
            var select = container.siblings('.toggleContainer').find('.toggleSelect');
            var input = container.siblings('.toggleContainer').find('.toggleInput');

            select.addClass('d-none');
            input.addClass('d-none');

            container.find('.toggleSelect').removeClass('d-none');
            container.find('.toggleInput').removeClass('d-none');

            select.val('');
            input.val('');
        });
    });
</script>
</body>

</html>
