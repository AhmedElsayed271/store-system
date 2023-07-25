@extends('frontend.layouts.frontLayout')

@section('title', 'Cart')

@section('content')
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <x-alert type="success" />
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted">{{ $count }} items</h6>
                                        </div>
                                        @foreach ($cart as $item)
                                            <hr class="my-4">
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="{{ $item->product->imageurl() }}"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">{{ $item->product->name }}</h6>
                                                    <h6 class="text-black mb-0">{{ $item->product->name }}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <form action="{{ route('cart.update',$item->product_id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input id="form1" style="min-width: 57px; margin-bottom: 10px;" min="1" name="quanity" value="{{ $item->quanity }}"
                                                        type="number" class="form-control form-control-sm" />
                                                        <input type="submit" class="bt btn-success" value="Update">
                                                    </form>

                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">₪ {{ $item->product->price }}</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <form action="{{ route('cart.destroy', $item->product_id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" href="#!" class="text-muted"><i class="fas fa-times"></i></button>
                                                    </form>
                               
                                                </div>
                                            </div>
   
                                        @endforeach
   

                                        <hr class="my-4">

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="#!" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5 px-3">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>{{ $total }}$</h5>
                                        </div>

                                        <button type="button" class="btn btn-dark btn-block btn-lg mx-3"
                                            data-mdb-ripple-color="dark">checkout</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
<link rel="stylesheet" href="cart.css">
@endsection
