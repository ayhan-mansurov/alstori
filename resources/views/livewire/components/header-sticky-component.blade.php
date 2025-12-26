<div id="header-sticky-2" class="tp-header-sticky-area">
    <div class="container">
    <div class="tp-mega-menu-wrapper p-relative">
        <div class="row align-items-center d-flex justify-content-between">
            <div class="col-xl-2 col-lg-2 col-md-3 col-6">
                <div class="logo">
                    <a href="{{ route('app.index') }}">
                        <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-6 d-none d-lg-block">
                <div class="tp-header-sticky-menu main-menu menu-style-1">
                    <nav id="mobile-menu">
                        <ul class="d-lg-flex justify-content-center">
                            <li><a href="{{ route('app.index') }}">{{ __('custom.Home') }}</a></li>
                            <li><a href="{{ route('app.shop') }}">{{ __('custom.Shop') }}</a></li>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->utype === 'ADM')
                                        <li class="d-block d-lg-none"><a title="{{ __('custom.My Account') }}" href="{{ route('user.myaccount') }}">{{ __('custom.My Account') }}</a></li>
                                        <li class="has-dropdown">
                                            <a href="#">{{ __('custom.Rules') }}</a>
                                            <ul class="tp-submenu">
                                               <li><a href="{{ route('back.terms') }}">{{ __('custom.Terms & Conditions') }}</a></li>
                                               <li><a href="{{ route('back.privacy') }}">{{ __('custom.Privacy Policy') }}</a></li>
                                               <li><a href="{{ route('back.return') }}">{{ __('custom.Return Policy') }}</a></li>
                                            </ul>
                                        </li>
                                        <li><a title="{{ __('custom.Dashboard') }}" href="{{ route('admin.dashboard') }}">{{ __('custom.Dashboard') }}</a></li>
                                        <li><a title="{{ __('custom.Categories') }}" href="{{ route('back.categories') }}">{{ __('custom.Categories') }}</a></li>
                                        <li><a title="{{ __('custom.Products') }}" href="{{ route('back.products') }}">{{ __('custom.Products') }}</a></li>
                                        <li><a title="{{ __('custom.Orders') }}" href="{{ route('back.orders') }}">{{ __('custom.Orders') }}</a></li>
                                        <li class="d-block d-lg-none"><a title="{{ __('custom.Logout') }}" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('custom.Logout') }}</a></li>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    @else
                                        <li class="d-block d-lg-none"><a title="{{ __('custom.My Account') }}" href="{{ route('user.myaccount') }}">{{ __('custom.My Account') }}</a></li>
                                        <li class="d-block d-lg-none"><a title="{{ __('custom.Logout') }}" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('custom.Logout') }}</a></li>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    @endif
                                @else
                                    <li class="d-block d-lg-none"><a href="{{ route('login') }}">{{ __('custom.Login') }}</a></li>
                                    <li class="d-block d-lg-none"><a href="{{ route('register') }}">{{ __('custom.Register') }}</a></li>
                                @endif
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 col-6">
                <div class="tp-header-action d-flex align-items-center justify-content-end ml-50">
                    <div class="tp-header-action-item d-lg-none">
                        <div class="dropdown">
                            <button class="tp-header-action-btn dropdown-toggle" type="button" id="dropdownMenuButtonLang" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-earth-americas"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonLang">
                                @foreach (Config::get('languages') as $lang => $language)
                                    <li><a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="tp-header-action-item d-none d-lg-block">
                        <a href="{{ route('app.shop.wishlist') }}" class="tp-header-action-btn">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            @livewire('components.includes.wishlist-count-component')
                        </a>
                    </div>
                    <div class="tp-header-action-item">
                        <a href="{{ route('app.shop.cart') }}" class="tp-header-action-btn">
                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            @livewire('components.includes.cart-count-component')
                        </a>
                        {{-- <button type="button" class="tp-header-action-btn cartmini-open-btn">
                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            @livewire('components.includes.cart-count-component')
                        </button> --}}
                    </div>
                    <div class="tp-header-action-item d-lg-none">
                        <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                <rect x="10" width="20" height="2" fill="currentColor"/>
                                <rect x="5" y="7" width="25" height="2" fill="currentColor"/>
                                <rect x="10" y="14" width="20" height="2" fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
