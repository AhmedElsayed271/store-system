<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="assets/images/bg/sm-logo.png" type="image/gif" sizes="20x20">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!-- css file link -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.css') }}">

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    <!-- box-icon -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/boxicons.min.css') }}">

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-icons.css') }}">

    <!-- jquery ui -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.css') }}">

    <!-- swiper-slide -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">

    <!-- slick-slide -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">

    <!-- select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">

    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">

    <!-- odometer css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/odometer.css') }}">

    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    @yield("css")
</head>

<body>
    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- scroll-btn -->
    <!-- <div class="scroll-btn">
        <i class='bx bxs-up-arrow-circle'></i>
    </div> -->

     <!-- =============== search-area start =============== -->

     <div class="mobile-search">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-11">
                    <label>What are you lookking for?</label>
                    <input type="text" placeholder="Search Products, Category, Brand">
                </div>
                <div class="col-1 d-flex justify-content-end align-items-center">
                    <div class="search-cross-btn">
                        <!-- <i class="bi bi-search me-4"></i> -->
                        <i class="bi bi-x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- =============== search-area end  =============== -->

<!-- ========== topbar ============= -->
    <div class="topbar">
        <div class="topbar-left d-flex flex-row align-items-center">
            <h6>Follow Us</h6>
            <ul class="topbar-social-list gap-2">
                <li><a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a></li>
                <li><a href="https://www.twitter.com/"><i class='bx bxl-twitter'></i></a></li>
                <li><a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a></li>
                <li><a href="https://www.pinterest.com/"><i class='bx bxl-pinterest-alt'></i></a></li>
            </ul>
        </div>
        <div class="email-area">
            <h6>Email: <a href="mailto:contact@example.com">contact@example.com</a></h6>
        </div>
        <div class="topbar-right">
            <ul class="topbar-right-list">
                <li><img src="{{ asset('assets/frontend/images/icons/flag-eng.png') }}" alt="image"><span>Language</span>
                    <ul class="topbar-sublist">
                        <li><img src="{{ asset('assets/frontend/images/icons/flag-germeny.svg') }}" alt="image"><span>Germeny</span></li>
                        <li> <img src="{{ asset('assets/frontend/images/icons/flag-french.svg') }}" alt="image"><span>French</span></li>
                        <li><img src="{{ asset('assets/frontend/images/icons/flag-bangla.svg') }}" alt="image"><span>Bengali</span></li>
                    </ul>
                </li>
                 <li>Currency
                   <ul class="topbar-sublist">
                        <li><a href="login.html"><i class="bi bi-currency-dollar"></i>Usd</a></li>
                        <li><a href="register.html"><i class="bi bi-currency-euro"></i>Euro</a></li>
                        <li><a href="register.html"><i class="bi bi-currency-pound"></i>Pound</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- ========== header============= -->

    <header class="header-area style-1">
        <div class="header-logo">
            <a href="{{route('home')}}"><img alt="image" src="{{ asset('assets/frontend/images/bg/header-logo.png') }}" ></a>
        </div>
        <div class="main-menu">
            <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                <div class="mobile-logo-wrap ">
                    <a href="index.html"><img alt="image" src="{{ asset('assets/frontend/images/bg/header-logo.png') }}" ></a>

                </div>
                <div class="menu-close-btn">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
            <ul class="menu-list">
                <li>
                    <a href="{{ route('about.us') }}">About Us</a>
                </li>
                <li>
                    <a href="{{ route('work.page') }}">How It Works</a>
                </li>
                <li>
                    <a href="{{ route('allProduct') }}">Browse Product</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#" class="drop-down">Pages</a><i class='bx bx-plus dropdown-icon'></i>
                    <ul class="submenu">
                        <li><a href="{{ route('faq.page') }}">Faq</a></li>
                        @if(Auth::check() && Auth::user()->type == "admin")
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                        @endguest
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">News</a><i class='bx bx-plus dropdown-icon'></i>
                    <ul class="submenu">
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('blog.details') }}">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('contact.us') }}">Contact</a></li>
            </ul>
            <!-- mobile-search-area -->
            <div class="d-lg-none d-block">
                <form class="mobile-menu-form mb-5">
                    <div class="input-with-btn d-flex flex-column">
                        <input type="text" placeholder="Search here...">
                        <button type="submit" class="eg-btn btn--primary btn--sm">Search</button>
                    </div>
                </form>
                <div class="hotline two">
                    <div class="hotline-info">
                        <span>Click To Call</span>
                        <h6><a href="tel:347-274-8816">+347-274-8816</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-right d-flex align-items-center">
            <div class="hotline d-xxl-flex d-none">
                <div class="hotline-icon">
                    <img alt="image" src="assets/images/icons/header-phone.svg" >
                </div>
                <div class="hotline-info">
                    <span>Click To Call</span>
                    <h6><a href="tel:347-274-8816">+347-274-8816</a></h6>
                </div>
            </div>
            <div class="search-btn">
                <i class="bi bi-search"></i>
            </div>
            @auth
                <div class="eg-btn btn--primary header-btn">
                    <a href="{{ route('myAccount') }}">My Account</a>
                </div>
            @endauth
            <div class="mobile-menu-btn d-lg-none d-block">
                <i class='bx bx-menu'></i>
            </div>
        </div>
    </header>

    <!-- ========== header end============= -->

    @yield('content')

    <!-- =============== counter-section start =============== -->
  
  <div class="about-us-counter pb-120">
      <div class="container">
          <div class="row g-4 d-flex justify-content-center">
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                  <div class="counter-single text-center d-flex flex-row hover-border1 wow animate fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                      <div class="counter-icon"> <img alt="image" src="{{ asset('assets/frontend/images/icons/employee.svg') }}"> </div>
                      <div class="coundown d-flex flex-column">
                          <h3 class="odometer" data-odometer-final="5400">&nbsp;</h3>
                          <p>Happy Customer</p>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow animate fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.4s">
                    <div class="counter-icon"> <img alt="image" src="{{ asset('assets/frontend/images/icons/review.svg') }}"> </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer" data-odometer-final="1250">&nbsp;</h3>
                        <p>Good Reviews</p>
                    </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow animate fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.6s">
                    <div class="counter-icon"> <img alt="image" src="{{ asset('assets/frontend/images/icons/smily.svg') }}"> </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer" data-odometer-final="4250">&nbsp;</h3>
                        <p>Winner Customer</p>
                    </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow animate fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.8s">
                    <div class="counter-icon"> <img alt="image" src="{{ asset('assets/frontend/images/icons/comment.svg') }}"> </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer" data-odometer-final="500">&nbsp;</h3>
                        <p>New Comments</p>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div> 

    <!-- =============== counter-section end =============== -->

    <!-- =============== Footer-action-section start =============== -->

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <a href="{{ route('home') }}"><img alt="image" src="{{ asset('assets/frontend/images/bg/footer-logo.png') }}" ></a>
                            <p>Lorem ipsum dolor sit amet consecte tur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore.</p>
                            <form>
                                <div class="input-with-btn d-flex jusify-content-start align-items-strech">
                                    <input type="text" placeholder="Enter your email">
                                    <button type="submit"><img alt="image" src="{{ asset('assets/frontend/images/icons/send-icon.svg') }}" ></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex justify-content-lg-center">
                        <div class="footer-item">
                            <h5>Navigation</h5>
                            <ul class="footer-list">
                                <li><a href="{{ route('allProduct') }}">All Product</a></li>
                                <li><a href="{{ route('work.page') }}">How It Works</a></li>
                                <li><a href="{{ route('myAccount') }}">My Account</a></li>
                                <li><a href="{{ route('about.us') }}">About Company</a></li>
                                <li><a href="{{ route('blog') }}">Our News Feed</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex justify-content-lg-center">
                        <div class="footer-item">
                            <h5>Help & FAQs</h5>
                            <ul class="footer-list">
                                <li><a href="#">Help Center</a></li>
                                <li><a href="{{ route('faq.page') }}">Customer FAQs</a></li>
                                <li><a href="{{ route('login') }}">Terms and Conditions</a></li>
                                <li><a href="{{ route('about.us') }}">Security Information</a></li>
                                <li><a href="{{ route('blog') }}">Merchant Add Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h5>Latest Feed</h5>
                            <ul class="recent-feed-list">
                                <li class="single-feed">
                                    <div class="feed-img">
                                        <a href="{{ route('blog.details') }}"><img alt="image" src="{{ asset('assets/frontend/images/blog/recent-feed1.png') }}"
                                                ></a>
                                    </div>
                                    <div class="feed-content">
                                        <span>January 31, 2022</span>
                                        <h6><a href="blog-details.html">Grant Distributions Conti nu to Incr Ease.</a>
                                        </h6>
                                    </div>
                                </li>
                                <li class="single-feed">
                                    <div class="feed-img">
                                        <a href="{{ route('blog.details') }}"><img alt="image" src="{{ asset('assets/frontend/images/blog/recent-feed2.png') }}"
                                                ></a>
                                    </div>
                                    <div class="feed-content">
                                        <span>February 21, 2022</span>
                                        <h6><a href="{{ route('blog.details') }}">Seminar for Children to Learn About.</a></h6>
                                    </div>
                                </li>
                                <li class="single-feed">
                                    <div class="feed-img">
                                        <a href="{{ route('blog.details') }}"><img alt="image" src="{{ asset('assets/frontend/images/blog/recent-feed3.png') }}"
                                                ></a>
                                    </div>
                                    <div class="feed-content">
                                        <span>March 22, 2022</span>
                                        <h6><a href="{{ route('blog.details') }}">Education and teacher for all African
                                                Children.</a></h6>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex align-items-center g-4">
                    <div class="col-lg-6 d-flex justify-content-lg-start justify-content-center">
                        <p>Copyright 2022 <a href="{{ route('home') }}">Bid Out</a> | Design By <a
                                href="https://www.egenslab.com/"
                                class="egns-lab">Egens Lab</a></p>
                    </div>
                    <div
                        class="col-lg-6 d-flex justify-content-lg-end justify-content-center align-items-center flex-sm-nowrap flex-wrap">
                        <p class="d-sm-flex d-none">We Accepts:</p>
                        <ul class="footer-logo-list">
                            <li><a href="#"><img alt="image" src="{{ asset('assets/frontend/images/bg/footer-pay1.png') }}" ></a></li>
                            <li><a href="#"><img alt="image" src="{{ asset('assets/frontend/images/bg/footer-pay2.png') }}" ></a></li>
                            <li><a href="#"><img alt="image" src="{{ asset('assets/frontend/images/bg/footer-pay3.png') }}" ></a></li>
                            <li><a href="#"><img alt="image" src="{{ asset('assets/frontend/images/bg/footer-pay4.png') }}" ></a></li>
                            <li><a href="#"><img alt="image" src="{{ asset('assets/frontend/images/bg/footer-pay5.png') }}" ></a></li>
                            <li><a href="#"><img alt="image" src="{{ asset('assets/frontend/images/bg/footer-pay1.png') }}" ></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- =============== Footer-action-section end =============== -->

    <!-- js file link -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/slick.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @yield("js")

</body>
</html>