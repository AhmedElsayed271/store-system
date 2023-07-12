@extends('dashboard.layouts.master')
@section('title', 'Update Profile')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Profile</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Categories Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <x-alert type="success" />
                    <!-- general form elements -->
                    <div class="card card-primary col-sm-12">
                        <div class="card-header">
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        <!-- /.card-header -->
                   
                        <!-- form start -->
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">First Name</label>
                                        <input type="name" name="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror" id="name"
                                            value="{{ old('first_name',$profile->first_name) }}" placeholder="Enter name">
                                        @error('first_name')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                        {{-- <x-form.input type="text" :value="$category->name" name="name" class="form-control @error('name') is-invalid @enderror" id ="name" /> --}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Last Name</label>
                                        <input name="last_name" id=""
                                            class="form-control @error('last_name') is-invalid @enderror"  value="{{ old('last_name',$profile->last_name) }}" />
                                        @error('last_name')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">BirthDay</label>
                                        <input type="date" name="birthday" id="" 
                                        value="{{ old('birthday',$profile->birthday) }}" class="form-control @error('birthday') is-invalid @enderror" />
                                        @error('birthday')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Street Address</label>
                                        <input value="{{ old('street_address',$profile->street_address) }}" type="address" name="street_address" id=""
                                            class="form-control @error('street_address') is-invalid @enderror" />
                                        @error('street_address')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">city</label>
                                        <input value="{{ old('city',$profile->city) }}" type="text" name="city" id=""
                                            class="form-control @error('city') is-invalid @enderror" />
                                        @error('city')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">state</label>
                                        <input value="{{ old('state',$profile->state) }}" type="text" name="state" id=""
                                            class="form-control @error('state') is-invalid @enderror" />
                                        @error('state')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Postal code</label>
                                        <input value="{{ old('postal_code',$profile->postal_code) }}" type="text" name="postal_code" id=""
                                            class="form-control @error('postal_code') is-invalid @enderror" />
                                        @error('postal_code')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">countries</label>
                                        <select name="country" id=""
                                            class="form-control @error('country') is-invalid @enderror">
                                            @foreach ($countries as $key => $country)
                                                <option @selected(old('country',$profile->country) == $key) value="{{ $key }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">locales</label>
                                    <select name="locale" id=""
                                        class="form-control @error('parent_id') is-invalid @enderror">
                                        @foreach ($locales as $key => $locale)
                                            <option @selected(old('country',$profile->locale) == $key) value="{{ $key }}">{{ $locale }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input value="male"  @checked((old('gender',$profile->gender) == "male")) class="form-check-input" type="radio" name="gender">
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input value="female" @checked((old('gender',$profile->gender) == "female")) class="form-check-input" type="radio" name="gender">
                                        <label class="form-check-label">female</label>
                                    </div>
                                    @error('gender')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
