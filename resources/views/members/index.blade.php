@extends('layouts.app')
@section('title', 'Add Members')
@section('content')
    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="row mt-2 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <form action="{{ route('member.addMember.store') }}" method="post" role="form" class="php-email-form">
                            @csrf
                            <!-- member name and phone, dob  -->
                            @if(Session::has('user_id'))
                            <div class="form-row">
                                <div class="col-md-12">
                                    <p>{{ Session::get('user_id') }}</p>
                                </div>
                            </div>
                            @endif
                            <div class="form-row">
                                <div class="col-md-4 form-group @error('name') has-error @enderror ">
                                    <label>Enter Name</label>
                                    <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group @error('phone_no') has-error @enderror ">
                                    <label>Phone Number</label>
                                    <input type="text" value="{{ old('phone_no') }}" class="form-control @error('phone_no') is-invalid @enderror " name="phone_no" id="" value="{{ old('phone_no') }}"/>
                                    @error('phone_no')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group @error('dob') has-error @enderror ">
                                    <label>DOB</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror " name="dob" id="datepicker" value="{{ old('dob') }}"/>
                                    @error('dob')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- sponser name and id -->
                            <div class="form-row">
                                <div class="col-md-4 form-group @error('email') has-error @enderror ">
                                    <label>Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group @error('sponser_id') has-error @enderror ">
                                    <label>Sponser Id</label>
                                    <input type="text" class="form-control @error('sponser_id') is-invalid @enderror " name="sponser_id" value="{{ old('sponser_id') }}" id=""/>
                                    @error('sponser_id')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group @error('sub_sponser_id') has-error @enderror ">
                                    <label>Sub-Sponser Id</label>
                                    <input type="text" class="form-control @error('sub_sponser_id') is-invalid @enderror " name="sub_sponser_id" id="" value="{{ old('sub_sponser_id') }}"/>
                                    @error('sub_sponser_id')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <div class="form-group @error('left_or_right') has-error @enderror">
                                        <label>Right / Left</label>
                                        <select class="form-control @error('left_or_right') has-error @enderror " name="left_or_right" style="height: 44px;">
                                            <option value="right">Right</option>
                                            <option value="left">Left</option>
                                        </select>
                                        @error('left_or_right')
                                            <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 form-group  @error('pin_no') has-error @enderror">
                                    <label>Pin Number</label>
                                    <input type="text" class="form-control @error('pin_no') has-error @enderror " name="pin_no" id="" value="{{ old('pin_no') }}"/>
                                    @error('pin_no')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-success" type="submit" >Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

@endsection
