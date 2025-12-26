@extends('layouts.guest')
@section('metaTitle') {{ __('custom.Verify Email Address') }} @endsection
@section('content')
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">{{ __('custom.Verify Email Address') }}</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('app.index') }}">{{ __('custom.Home') }}</a></span>
                            <span>{{ __('custom.Verify Email Address') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
        <div class="tp-login-shape">
            <img class="tp-login-shape-1" src="{{ asset('assets/img/login/login-shape-1.png') }}" alt="login-shape-1">
            <img class="tp-login-shape-2" src="{{ asset('assets/img/login/login-shape-2.png') }}" alt="login-shape-2">
            <img class="tp-login-shape-3" src="{{ asset('assets/img/login/login-shape-3.png') }}" alt="login-shape-3">
            <img class="tp-login-shape-4" src="{{ asset('assets/img/login/login-shape-4.png') }}" alt="login-shape-4">
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-6 col-lg-8 text-center">
                    <div class="tp-login-wrapper">
                        <div class="tp-login-option">
                            @if(session('status') === 'Verification link sent!')
                                <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                                    <strong>{{ __('custom.The message has been resent.') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if(session('status') === 'Verification link not sent!')
                                <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                                    <strong>{{ __('custom.Your email address has already been verified by you previously.') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <p>{{ __('custom.We have sent you a notification to your email address that you provided during registration') }} - <strong>{{ Auth::user()->email }}</strong>. {{ __('custom.Please check your email and confirm your email address to complete the registration process in our store. Confirmation will give you access to all functions of our store, including placing orders and receiving notifications') }}.</p>
                            <p>{{ __('custom.If you have lost your email verification link, you can request it again by clicking on the following button') }}:</p>
                            <div class="tp-slider-btn-5">
                                <form action="{{ route('verification.send') }}" method="POST">
                                    @csrf
                                    <button id="verificationLinkBtn" type="submit" class="tp-btn-green">{{ __('custom.Send Message') }}
                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="my-3">
                                <p>{{ __('custom.Thank you for your attention to this issue. If you have any questions or difficulties, please do not hesitate to contact our support team.') }}</p>
                                <p>{{ __('custom.Sincerely, ') }}<span class="logo-title">{{ config('app.name', 'ALSTORI') }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
