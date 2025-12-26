@extends('layouts.guest')
@section('metaTitle') {{ __('custom.Reset Password') }} @endsection
@section('content')
<main>
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">{{ __('custom.Reset Password') }}</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('app.index') }}">{{ __('custom.Home') }}</a></span>
                            <span>{{ __('custom.Reset Password') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
        <div class="tp-login-shape">
            <img class="tp-login-shape-1" src="{{ asset('assets/img/login/login-shape-1.png') }}" alt="login-shape-1">
            <img class="tp-login-shape-2" src="{{ asset('assets/img/login/login-shape-2.png') }}" alt="login-shape-2">
            <img class="tp-login-shape-3" src="{{ asset('assets/img/login/login-shape-3.png') }}" alt="login-shape-3">
            <img class="tp-login-shape-4" src="{{ asset('assets/img/login/login-shape-4.png') }}" alt="login-shape-4">
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-login-wrapper">
                        <div class="tp-login-option">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('custom.Your Email') }}</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $email ?? old('email') }}" placeholder="example@mail.com" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('custom.Password') }}</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" placeholder="Min. 8 character" required autocmplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="{{ old('password_confirmation') }}" required autocmplete="new-password">
                                </div>

                                <div class="tp-login-bottom">
                                    <button type="submit" class="tp-login-btn w-100">{{ __('custom.Reset Password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
