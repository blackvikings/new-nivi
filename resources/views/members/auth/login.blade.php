@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="row mt-2 justify-content-center" data-aos="fade-up">
                    <div class="col-md-4">
                        <form action="{{ route('member.login') }}" method="post" class="php-email-form">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <input type="text" name="user_id" class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }} " id="" placeholder="User Id" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    @if($errors->has('user_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('user_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <input type="Password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            <div class="text-center"><button type="submit">Login</button></div>
                            <div class="text-center pt-2"><a href="#">Forgot Password ?</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
