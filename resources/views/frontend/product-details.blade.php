@extends('frontend.layouts.frontLayout')

@section('title', 'Porduct-details')

@section('content')
    <!-- ========== inner-page-banner start ============= -->

    <div class="inner-banner">
        <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Auction Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Auction Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- ========== inner-page-banner end ============= -->

    <!-- ========== auction-details start ============= -->

    <div class="auction-details-section pt-120">
        <img alt="image" src="{{ asset('assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
        <img alt="image" src="{{ asset('assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
        <div class="container">
            <div class="row g-4 mb-50">
                <div
                    class="col-xl-6 col-lg-7 d-flex flex-row align-items-start justify-content-lg-start justify-content-center flex-md-nowrap flex-wrap gap-4">
                    <ul class="nav small-image-list d-flex flex-md-column flex-row justify-content-center gap-4  wow fadeInDown"
                        data-wow-duration="1.5s" data-wow-delay=".4s">
                        <li class="nav-item">
                            <div id="details-img0" data-bs-toggle="pill" data-bs-target="#gallery-img0"
                                aria-controls="gallery-img0">
                                <img alt="image" src="{{ $product->imageUrl() }}" class="img-fluid">
                            </div>
                        </li>
                        @foreach ($product->photos as $key => $photo)
                            @php $i = 1 @endphp
                            <li class="nav-item">
                                <div id="details-img{{ $key +1 }}" data-bs-toggle="pill" data-bs-target="#gallery-img{{ $key +1 }}"
                                    aria-controls="gallery-img{{ $key + 1 }}">
                                    <img alt="image" src="{{ asset('assets/dashboard/uploads') . '/'. $photo->photo }}" class="img-fluid">
                                </div>
                            </li> 
                            @php $i++ @endphp
                        @endforeach
  
                    </ul>
                    <div class="tab-content mb-4 d-flex justify-content-lg-start justify-content-center  wow fadeInUp"
                        data-wow-duration="1.5s" data-wow-delay=".4s">
                        <div class="tab-pane big-image fade show active" id="gallery-img0">
                            <div class="auction-gallery-timer d-flex align-items-center justify-content-center flex-wrap">
                                <h3 id="countdown-timer-1">&nbsp;</h3>
                            </div>
                            <img alt="image" src="{{ $product->imageUrl() }}" class="img-fluid">
                        </div>
                        @foreach($product->photos as $key => $photo)
                            <div class="tab-pane big-image fade" id="gallery-img{{ $key + 1 }}">
                                <div class="auction-gallery-timer d-flex align-items-center justify-content-center">
                                    <h3 id="countdown-timer-{{ $key + 1 }}">&nbsp;</h3>
                                </div>
                                <img alt="image" src="{{ asset('assets/dashboard/uploads') . '/'. $photo->photo }}" class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="product-details-right  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <h3>{{ $product->name }}</h3>
                        <p class="para">{{ $product->description }}</p>
                        <h4>Bidding Price: <span>${{ $product->price }}</span></h4>
                        <form action="{{ Route('cart.store') }}" method="post">@csrf
                            <button type="submit" style="border: none;"> <a class="eg-btn btn--primary btn--sm">Add To Card</a></button>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                        </form>
                        <div class="bid-form">
                            <div class="form-title">
                                <h5>Bid Now</h5>
                                <p>Bid Amount : Minimum Bid $20.00</p>
                            </div>
                            <form>
                                <div class="form-inner gap-2">
                                    <input type="text" placeholder="$00.00">
                                    <button class="eg-btn btn--primary btn--sm" type="submit">Place Bid</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center g-4">
                <div class="col-lg-8">
                    <ul class="nav nav-pills d-flex flex-row justify-content-start gap-sm-4 gap-3 mb-45 wow fadeInDown"
                        data-wow-duration="1.5s" data-wow-delay=".2s" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active details-tab-btn" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link details-tab-btn" id="pills-bid-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-bid" type="button" role="tab" aria-controls="pills-bid"
                                aria-selected="false">Biding History</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link details-tab-btn" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">Other Auction</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s"
                            id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="describe-content">
                                <h4>How can have anything you ant in life if you ?</h4>
                                <p class="para">If you’ve been following the crypto space, you’ve likely heard of
                                    Non-Fungible Tokens (Biddings), more popularly referred to as ‘Crypto Collectibles.’ The
                                    world of Biddings is growing rapidly. It seems there is no slowing down of these assets
                                    as they continue to go up in price. This growth comes with the opportunity for people to
                                    start new businesses to create and capture value. The market is open for players in
                                    every kind of field. Are you a collector.</p>
                                <p class="para">But getting your own auction site up and running has always required
                                    learning complex coding langua ges, or hiring an expensive design firm for thousands of
                                    dollars and months of work.</p>
                                <ul class="describe-list">
                                    <li><a href="#">Amet consectetur adipisicing elit. Maxime reprehenderit quaerat,
                                            velit rem atque vel impedit! Expensive Design.</a></li>
                                    <li><a href="#">Consectetur adipisicing elit. Maxime reprehenderit quaerat</a>
                                    </li>
                                    <li><a href="#">Fuga magni veritatis ad temporibus atque adipisci nisi
                                            rerum...</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-bid" role="tabpanel" aria-labelledby="pills-bid-tab">
                            <div class="bid-list-area">
                                <ul class="bid-list">
                                    <li>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-7">
                                                <div class="bidder-area">
                                                    <div class="bidder-img">
                                                        <img alt="image" src="assets/images/bg/bidder1.png">
                                                    </div>
                                                    <div class="bidder-content">
                                                        <a href="#">
                                                            <h6>Robart FOX</h6>
                                                        </a>
                                                        <p>24.50 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 text-end">
                                                <div class="bid-time">
                                                    <p>4 Hours Ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-7">
                                                <div class="bidder-area">
                                                    <div class="bidder-img">
                                                        <img alt="image" src="assets/images/bg/bidder2.png">
                                                    </div>
                                                    <div class="bidder-content">
                                                        <a href="#">
                                                            <h6>Jane Cooper</h6>
                                                        </a>
                                                        <p>224.5 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 text-end">
                                                <div class="bid-time">
                                                    <p>5 Hours Ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-7">
                                                <div class="bidder-area">
                                                    <div class="bidder-img">
                                                        <img alt="image" src="assets/images/bg/bidder3.png">
                                                    </div>
                                                    <div class="bidder-content">
                                                        <a href="#">
                                                            <h6>Guy Hawkins</h6>
                                                        </a>
                                                        <p>34.5 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 text-end">
                                                <div class="bid-time">
                                                    <p>6 Hours 45 minutes Ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-7">
                                                <div class="bidder-area">
                                                    <div class="bidder-img">
                                                        <img alt="image" src="assets/images/bg/bidder1.png">
                                                    </div>
                                                    <div class="bidder-content">
                                                        <a href="#">
                                                            <h6>Robart FOX</h6>
                                                        </a>
                                                        <p>24.50 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 text-end">
                                                <div class="bid-time">
                                                    <p>4 Hours Ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-7">
                                                <div class="bidder-area">
                                                    <div class="bidder-img">
                                                        <img alt="image" src="assets/images/bg/bidder2.png">
                                                    </div>
                                                    <div class="bidder-content">
                                                        <a href="#">
                                                            <h6>Robart FOX</h6>
                                                        </a>
                                                        <p>24.50 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 text-end">
                                                <div class="bid-time">
                                                    <p>4 Hours Ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="row d-flex justify-content-center g-4">
                                <div class="col-lg-6 col-md-4 col-sm-10">
                                    <div class="eg-card auction-card1">
                                        <div class="auction-img">
                                            <img alt="image" src="assets/images/bg/live-auc1.png">
                                            <div class="auction-timer">
                                                <div class="countdown" id="timer1">
                                                    <h4><span id="hours1">05</span>H : <span id="minutes1">52</span>M
                                                        : <span id="seconds1">32</span>S</h4>
                                                </div>
                                            </div>
                                            <div class="author-area">
                                                <div class="author-emo">
                                                    <img alt="image" src="assets/images/icons/smile-emo.svg">
                                                </div>
                                                <div class="author-name">
                                                    <span>by @robatfox</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="auction-content">
                                            <h4><a href="auction-details.html">Brand New royal Enfield 250 CC For Sale</a>
                                            </h4>
                                            <p>Bidding Price : <span>$85.9</span> </p>
                                            <div class="auction-card-bttm">
                                                <a href="auction-details.html" class="eg-btn btn--primary btn--sm">Place a
                                                    Bid</a>
                                                <div class="share-area">
                                                    <ul class="social-icons d-flex">
                                                        <li><a href="https://www.facebook.com/"><i
                                                                    class="bx bxl-facebook"></i></a></li>
                                                        <li><a href="https://www.twitter.com/"><i
                                                                    class="bx bxl-twitter"></i></a></li>
                                                        <li><a href="https://www.pinterest.com/"><i
                                                                    class="bx bxl-pinterest"></i></a></li>
                                                        <li><a href="https://www.instagram.com/"><i
                                                                    class="bx bxl-instagram"></i></a></li>
                                                    </ul>
                                                    <div>
                                                        <a href="#" class="share-btn"><i
                                                                class='bx bxs-share-alt'></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-4 col-sm-10">
                                    <div class="eg-card auction-card1 wow fadeInDown">
                                        <div class="auction-img">
                                            <img alt="image" src="assets/images/bg/live-auc2.png">
                                            <div class="auction-timer">
                                                <div class="countdown" id="timer2">
                                                    <h4><span id="hours2">05</span>H : <span id="minutes2">52</span>M
                                                        : <span id="seconds2">32</span>S</h4>
                                                </div>
                                            </div>
                                            <div class="author-area">
                                                <div class="author-emo">
                                                    <img alt="image" src="assets/images/icons/smile-emo.svg">
                                                </div>
                                                <div class="author-name">
                                                    <span>by @robatfox</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="auction-content">
                                            <h4><a href="auction-details.html">Wedding Special Exclusive Cupple Ring
                                                    (S2022)</a></h4>
                                            <p>Bidding Price : <span>$85.9</span> </p>
                                            <div class="auction-card-bttm">
                                                <a href="auction-details.html" class="eg-btn btn--primary btn--sm">Place a
                                                    Bid</a>
                                                <div class="share-area">
                                                    <ul class="social-icons d-flex">
                                                        <li><a href="https://www.facebook.com/"><i
                                                                    class="bx bxl-facebook"></i></a></li>
                                                        <li><a href="https://www.twitter.com/"><i
                                                                    class="bx bxl-twitter"></i></a></li>
                                                        <li><a href="https://www.pinterest.com/"><i
                                                                    class="bx bxl-pinterest"></i></a></li>
                                                        <li><a href="https://www.instagram.com/"><i
                                                                    class="bx bxl-instagram"></i></a></li>
                                                    </ul>
                                                    <div>
                                                        <a href="#" class="share-btn"><i
                                                                class='bx bxs-share-alt'></i></a>
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
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-banner wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                            <div class="banner-content">
                                <span>CARS</span>
                                <h3>Toyota AIGID A Clasis Cars Sale</h3>
                                <a href="auction-details.html" class="eg-btn btn--primary card--btn">Details</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ========== auction-details end ============= -->

@endsection
