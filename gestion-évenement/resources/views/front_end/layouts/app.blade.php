@php
    $link = 'front-end/assets';
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
        <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />
        <link rel="stylesheet" href="{{ asset($link.'css/plugins/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset($link.'css/plugins/icofont/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset($link.'css/plugins/slick-carousel/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset($link.'css/plugins/slick-carousel/slick/slick-theme.css')}}">
        <link rel="stylesheet" href="{{ asset($link.'css/style.css') }}">
    </head>
    <body id="top">
        <header>
            <nav class="navbar navbar-expand-lg navigation" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logo.png" alt="" class="img-fluid">
                    </a>

                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                        aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icofont-navigation-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarmain">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Department <i class="icofont-thin-down"></i></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                    <li><a class="dropdown-item" href="department.html">Departments</a></li>
                                    <li><a class="dropdown-item" href="department-single.html">Department Single</a></li>

                                    <li class="dropdown dropdown-submenu dropright">
                                        <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown0301">
                                            <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                                            <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="doctor.html" id="dropdown03" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Doctors <i class="icofont-thin-down"></i></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                    <li><a class="dropdown-item" href="doctor.html">Doctors</a></li>
                                    <li><a class="dropdown-item" href="doctor-single.html">Doctor Single</a></li>
                                    <li><a class="dropdown-item" href="appoinment.html">Appoinment</a></li>

                                    <li class="dropdown dropdown-submenu dropleft">
                                        <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown0501">
                                            <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                                            <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown05">
                                    <li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')
        <footer class="footer section gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mr-auto col-sm-6">
                        <div class="widget mb-5 mb-lg-0">
                            <div class="logo mb-4">
                                <img src="images/logo.png" alt="" class="img-fluid">
                            </div>
                            <p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur veritatis eveniet distinctio possimus.</p>

                            <ul class="list-inline footer-socials mt-4">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget mb-5 mb-lg-0">
                            <h4 class="text-capitalize mb-3">Department</h4>
                            <div class="divider mb-4"></div>

                            <ul class="list-unstyled footer-menu lh-35">
                                <li><a href="#!">Surgery </a></li>
                                <li><a href="#!">Wome's Health</a></li>
                                <li><a href="#!">Radiology</a></li>
                                <li><a href="#!">Cardioc</a></li>
                                <li><a href="#!">Medicine</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget mb-5 mb-lg-0">
                            <h4 class="text-capitalize mb-3">Support</h4>
                            <div class="divider mb-4"></div>

                            <ul class="list-unstyled footer-menu lh-35">
                                <li><a href="#!">Terms & Conditions</a></li>
                                <li><a href="#!">Privacy Policy</a></li>
                                <li><a href="#!">Company Support </a></li>
                                <li><a href="#!">FAQuestions</a></li>
                                <li><a href="#!">Company Licence</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
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

                <div class="footer-btm py-4 mt-5">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="copyright">
                                Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="subscribe-form text-lg-right mt-5 mt-lg-0">
                                <form action="#" class="subscribe">
                                    <input type="text" class="form-control" placeholder="Your Email address" required>
                                    <button type="submit" class="btn btn-main-2 btn-round-full">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <a class="backtop scroll-top-to" href="#top">
                                <i class="icofont-long-arrow-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="{{ asset($link.'js/app.js') }}"></script>
        <script src="{{ asset($link.'js/plugins/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset($link.'js/plugins/google-map/gmap.jsapp.js') }}"></script>
        <script src="{{ asset($link.'js/plugins/jquery/jquery.js') }}"></script>
        <script src="{{ asset($link.'js/plugins/shuffle/shuffle.min.js') }}"></script>
        <script src="{{ asset($link.'js/plugins/slick-carousel/slick/slick.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    </body>
</html>
