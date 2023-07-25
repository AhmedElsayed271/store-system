@extends('frontend.layouts.frontLayout')

@section('title', 'Sing Up')

@section('content')
        <!-- ========== inner-page-banner start ============= -->

        <div class="inner-banner">
            <div class="container">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Sign Up</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                    </ol>
                  </nav>
            </div>
        </div>
    
        <!-- ========== inner-page-banner end ============= -->
    
        <div class="signup-section pt-120 pb-120">
            <img alt="image" src="assets/images/bg/section-bg.png" class="section-bg-top" >
            <img alt="image" src="assets/images/bg/section-bg.png" class="section-bg-bottom" >
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                            <div class="form-title">
                                <h3>Sign Up</h3>
                                <p>Do you already have an account? <a href="login.html">Log in here</a></p>
                            </div>
                            <form class="w-100" method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-inner">
                                            <label>Name *</label>
                                            <input name="name" type="text" placeholder="Enter Your Name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-inner">
                                            <label>Enter Your Email *</label>
                                            <input name="email" type="email" placeholder="Enter Your Email">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-inner">
                                            <label>Password *</label>
                                            <input type="password" name="password" placeholder="">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-inner">
                                            <label>Confirm Password *</label>
                                            <input type="password" name="password_confirmation" id="password" placeholder=""/>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                                            <div class="form-group">
                                                <input type="checkbox" id="html">
                                                <label for="html">I agree to the Terms & Policy</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="account-btn">Create Account</button>
                            </form>
                            <div class="alternate-signup-box">
                                <h6>or signup WITH</h6>
                                <div class="btn-group gap-4">
                                    <a href="" class="eg-btn google-btn d-flex align-items-center"><i class='bx bxl-google'></i><span>signup whit google</span></a>
                                    <a href="" class="eg-btn facebook-btn d-flex align-items-center"><i class='bx bxl-facebook' ></i>signup whit facebook</a>
                                </div>
                            </div>
                            <div class="form-poicy-area">
                                <p>By clicking the "signup" button, you create a Cobiro account, and you agree to Cobiro's <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- ===============  Hero area end=============== -->
@endsection