<div class="delicious-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="deliciousNav">

                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li class="active"><a href="{{url('/')}}">Inicio</a></li>
                            <!--<li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="blog-post.html">Blog Post</a></li>
                                    <li><a href="receipe-post.html">Receipe Post</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="elements.html">Elements</a></li>
                                    <li><a href="#">Dropdown</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="blog-post.html">Blog Post</a></li>
                                            <li><a href="receipe-post.html">Receipe Post</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                            <li><a href="#">Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="index.html">Home</a></li>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="blog-post.html">Blog Post</a></li>
                                                    <li><a href="receipe-post.html">Receipe Post</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->
                            <li><a href="#">Categorias</a>
                                <div class="megamenu">
                                   <!-- <ul class="single-mega cn-col-4">
                                        <li class="title">Catagory</li>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog-post.html">Blog Post</a></li>
                                        <li><a href="receipe-post.html">Receipe Post</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Catagory</li>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog-post.html">Blog Post</a></li>
                                        <li><a href="receipe-post.html">Receipe Post</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Catagory</li>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog-post.html">Blog Post</a></li>
                                        <li><a href="receipe-post.html">Receipe Post</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <div class="receipe-slider owl-carousel">
                                            <a href="#"><img src="img/bg-img/bg1.jpg" alt=""></a>
                                            <a href="#"><img src="img/bg-img/bg6.jpg" alt=""></a>
                                        </div>
                                    </div>-->
                                </div>
                            </li>
                            <li><a href="receipe-post.html">Recetas</a></li>
                        @if (Auth::check())
                                <li><a href="{{url('recipe/create')}}">Crea tu receta</a></li>

                            @endif
                            <!--<li><a href="receipe-post.html">4 Vegans</a></li>
                            <li><a href="contact.html">Contact</a></li>-->
                            @guest
                                <li>
                                    <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li><a href="#"> {{ Auth::user()->name }}</a>
                                    <ul class="dropdown">
                                        <li><a class="" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @endguest
                        </ul>

                        <!-- Newsletter Form -->
                        <div class="search-btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>

                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
