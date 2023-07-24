@extends('frontend.layouts.frontLayout')

@section('content')
        <!-- ========== inner-page-banner start ============= -->

        <div class="inner-banner">
            <div class="container">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Live Auction</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Live Auction</li>
                    </ol>
                  </nav>
            </div>
        </div>
    
        <!-- ========== inner-page-banner end ============= -->
    
        <div class="live-auction-section pt-120 pb-120">
            <img alt="image" src="{{ asset('assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg-top" >
            <img alt="image" src="{{ asset('assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom" >
            <div class="container">
                <div class="row gy-4 mb-60 d-flex justify-content-center">
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-10 ">
                        <div data-wow-duration="1.5s" data-wow-delay="0.2s" class="eg-card auction-card1 wow fadeInDown">
                            <div class="auction-img">
                                <img alt="image" src="{{ $product->photo }}" >
                                <div class="auction-timer">
                                    <div class="countdown" id="timer1">
                                        <h4><span id="hours1">05</span>H : <span id="minutes1">52</span>M : <span
                                                id="seconds1">32</span>S</h4>
                                    </div>
                                </div>
                                <div class="author-area">
                                    <div class="author-emo">
                                        <img alt="image" src="{{ asset('assets/frontend/images/icons/smile-emo.svg') }}" >
                                    </div>
                                    <div class="author-name">
                                        <span>by @robatfox</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-content">
                                <h4><a href="auction-details.html">{{ $product->name }}</a></h4>
                                <p>Bidding Price : <span>{{ $product->price }}</span></p>
                                <div class="auction-card-bttm">
                                    <a href="auction-details.html" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                                    <div class="share-area">
                                        <ul class="social-icons d-flex">
                                            <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                            <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                            <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                            <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                                        </ul>
                                        <div>
                                            <a href="#" class="share-btn"><i class='bx bxs-share-alt'></i></a>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class= "row">
                    <div class="pagination d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    
        
    
        <!-- ===============  Hero area end=============== -->
@endsection