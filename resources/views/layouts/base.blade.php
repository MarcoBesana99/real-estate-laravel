<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aler</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Wrapper Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <span class="icon_close"></span>
        </div>
        <div class="logo">
            <a href="./index.html">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="om-widget">
            <ul>
                <li><i class="icon_mail_alt"></i> Aler.support@gmail.com</li>
                <li><i class="fa fa-mobile-phone"></i> 125-711-811 <span>125-668-886</span></li>
            </ul>
            @if (Auth::user() && Auth::user()->role_id == 1 && Route::current()->getName() != 'agent.properties.create')
                <a href="{{ route('agent.properties.create') }}" class="hw-btn">Submit property</a>
            @endif
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-muted">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-muted">Register</a>
                    @endif
                @endif
                @endif
            </div>
            <div class="om-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
        </div>
        <!-- Offcanvas Menu Wrapper End -->

        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="hs-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="ht-widget">
                                <ul>
                                    <li><i class="icon_mail_alt"></i> Aler.support@gmail.com</li>
                                    <li><i class="fa fa-mobile-phone"></i> 125-711-811 <span>125-668-886</span></li>
                                </ul>
                                @if (Auth::user() && Auth::user()->role_id == 1 && Route::current()->getName() != 'agent.properties.create' )
                                    <a href="{{ route('agent.properties.create') }}" class="hw-btn">Submit property</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        <div class="text-right mb-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-muted">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-muted">Register</a>
                                @endif
                        @endif
                    </div>
                    @endif
                    <div class="canvas-open">
                        <span class="icon_menu"></span>
                    </div>
                </div>
                </div>
                <div class="hs-nav">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <nav class="nav-menu">
                                    <ul>
                                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="#">Properties</a>
                                            <ul class="dropdown">
                                                <li><a href="./property.html">Property Grid</a></li>
                                                <li><a href="./profile.html">Property List</a></li>
                                                <li><a href="./property-details.html">Property Detail</a></li>
                                                <li><a href="./property-comparison.html">Property Comperison</a></li>
                                                <li><a href="./property-submit.html">Property Submit</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="./agents.html">Agents</a></li>
                                        <li><a href="./about.html">About</a></li>
                                        <li><a href="./blog.html">Blog</a></li>
                                        <li><a href="./contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-lg-3">
                                <div class="hn-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header End -->

            @yield('content')

            <!-- Footer Section Begin -->
            <footer class="footer-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="fs-about">
                                <div class="fs-logo">
                                    <a href="#">
                                        <img src="img/f-logo.png" alt="">
                                    </a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua ut aliquip ex ea</p>
                                <div class="fs-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="fs-widget">
                                <h5>Help</h5>
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Contact Support</a></li>
                                    <li><a href="#">Knowledgebase</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="fs-widget">
                                <h5>Links</h5>
                                <ul>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Create Property</a></li>
                                    <li><a href="#">My Properties</a></li>
                                    <li><a href="#">Register</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="fs-widget">
                                <h5>Newsletter</h5>
                                <p>Deserunt mollit anim id est laborum.</p>
                                <form action="#" class="subscribe-form">
                                    <input type="text" placeholder="Email">
                                    <button type="submit" class="site-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </footer>
            <!-- Footer Section End -->

            <!-- Js Scripts -->

            <script src="{{ asset('js/app.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js" integrity="sha512-nKZDK+ztK6Ug+2B6DZx+QtgeyAmo9YThZob8O3xgjqhw2IVQdAITFasl/jqbyDwclMkLXFOZRiytnUrXk/PM6A==" crossorigin="anonymous"></script>
            @yield('scripts')
            @livewireScripts
        </body>

        </html>
