@extends('layouts.guest')
@section('metaTitle') {{ __('custom.Confirm Password') }} @endsection
@section('content')
<main>
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">{{ __('custom.Confirm Password') }}</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('app.index') }}">{{ __('custom.Home') }}</a></span>
                            <span>{{ __('custom.Confirm Password') }}</span>
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
                            <div class="tp-login-top text-center mb-30">
                                <p>{{ __('custom.Please confirm your password before continuing.') }}</p>
                            </div>
                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('custom.Password') }}</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" placeholder="Min. 8 character" required autocmplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                @if (Route::has('password.request'))
                                    <div class="tp-login-forgot mb-3">
                                        <a href="{{ route('password.request') }}">{{ __('custom.Forgot password?') }}</a>
                                    </div>
                                @endif

                                <div class="tp-login-bottom">
                                    <button type="submit" class="tp-login-btn w-100">{{ __('custom.Confirm Password') }}</button>
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
