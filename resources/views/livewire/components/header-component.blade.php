<div>
    <header>
        <div class="tp-header-area">
            <!-- header top start  -->
            <div class="tp-header-top-2 p-relative z-index-11 tp-header-top-border d-none d-lg-flex justify-content-center ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 d-none d-md-block">
                            <div class="tp-header-info d-flex  align-items-center justify-content-center justify-content-md-start">
                                <div class="tp-header-info-item d-flex align-items-center">
                                    <a href="tel:+995 555 33 76 59">
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.359 2.73916C1.59079 2.35465 2.86862 0.958795 3.7792 1.00093C4.05162 1.02426 4.29244 1.1883 4.4881 1.37943H4.48885C4.93737 1.81888 6.22423 3.47735 6.29648 3.8265C6.47483 4.68282 5.45362 5.17645 5.76593 6.03954C6.56213 7.98771 7.93402 9.35948 9.88313 10.1549C10.7455 10.4679 11.2392 9.44752 12.0956 9.62511C12.4448 9.6981 14.1042 10.9841 14.5429 11.4333V11.4333C14.7333 11.6282 14.8989 11.8698 14.9214 12.1422C14.9553 13.1016 13.4728 14.3966 13.1838 14.5621C12.502 15.0505 11.6125 15.0415 10.5281 14.5373C7.50206 13.2784 2.66618 8.53401 1.38384 5.39391C0.893174 4.31561 0.860062 3.42016 1.359 2.73916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.84082 1.18318C12.5534 1.48434 14.6952 3.62393 15 6.3358" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.84082 3.77927C11.1378 4.03207 12.1511 5.04544 12.4039 6.34239" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span> +995 555 33 76 59
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tp-header-top-center tp-header-top-black d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                                    <div class="tp-header-top-menu-item tp-header-lang">
                                        <span class="tp-header-lang-toggle" id="tp-header-lang-toggle">
                                            @if (Cookie::get('applocale') === 'ge')
                                                ქართული
                                            @elseif (Cookie::get('applocale') === 'az')
                                                Azərbaycan
                                            @elseif (Cookie::get('applocale') === 'en')
                                                English
                                            @else
                                                ქართული
                                            @endif
                                        </span>
                                        <ul>
                                            @foreach (Config::get('languages') as $lang => $language)
                                            <li>
                                                <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{-- <div class="tp-header-top-menu-item tp-header-currency">
                                        <span class="tp-header-currency-toggle" id="tp-header-currency-toggle">USD</span>
                                        <ul>
                                            <li>
                                            <a href="#">EUR</a>
                                            </li>
                                            <li>
                                            <a href="#">CHF</a>
                                            </li>
                                            <li>
                                            <a href="#">GBP</a>
                                            </li>
                                            <li>
                                            <a href="#">KWD</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    {{-- <div class="tp-header-top-menu-item tp-header-setting">
                                        <span class="tp-header-setting-toggle" id="tp-header-setting-toggle">Setting</span>
                                        <ul>
                                            <li>
                                            <a href="profile.html">My Profile</a>
                                            </li>
                                            <li>
                                            <a href="wishlist.html">Wishlist</a>
                                            </li>
                                            <li>
                                            <a href="cart.html">Cart</a>
                                            </li>
                                            <li>
                                            <a href="login.html">Logout</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    @if (Route::has('login'))
                                        @auth
                                            @if (Auth::user()->utype === 'ADM')
                                                <div class="tp-header-top-menu-item tp-header-setting">
                                                    <span class="tp-header-setting-toggle" id="tp-header-setting-toggle">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                                                    <ul>
                                                        <li>
                                                            <a title="{{ __('custom.My Account') }}" href="{{ route('user.myaccount') }}">{{ __('custom.My Account') }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('custom.Logout') }}</a>
                                                        </li>
                                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                        </form>
                                                    </ul>
                                                </div>
                                            @else
                                                <div class="tp-header-top-menu-item tp-header-setting">
                                                    <span class="tp-header-setting-toggle" id="tp-header-setting-toggle">{{ __('custom.My Account') }} ({{ Auth::user()->name }} {{ Auth::user()->surname }})</span>
                                                    <ul>
                                                        <li>
                                                            <a title="{{ __('custom.My Account') }}" href="{{ route('user.myaccount') }}">{{ __('custom.My Account') }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('custom.Logout') }}</a>
                                                        </li>
                                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                        </form>
                                                    </ul>
                                                </div>
                                            @endif
                                        @else
                                            <div class="tp-header-top-menu-item tp-header-setting">
                                                <a href="{{ route('login') }}">
                                                    {{ __('custom.Login') }}
                                                </a>
                                            </div>
                                            <div class="tp-header-top-menu-item tp-header-setting">
                                                <a href="{{ route('register') }}">
                                                    {{ __('custom.Register') }}
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- header main start -->
            <div class="tp-header-main tp-header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-xl-2 col-md-4 col-lg-3">
                            <div class="logo">
                                <a href="{{ route('app.index') }}">
                                    <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-xl-8 col-lg-7 d-none d-lg-block">
                            <div class="tp-header-search">
                                <form action="{{ route('app.shop.search') }}">
                                    <div class="tp-header-search-wrapper d-flex align-items-center">
                                        <div class="tp-header-search-box">
                                            <input id="searchDesc" name="search" value="{{ $search }}" type="text" placeholder="Search for Products...">
                                        </div>
                                        <div class="tp-header-search-category">
                                            <select id="category_select" name="category_id" wire:change="changeCategoryId" class="form-select border-0">
                                                <option value="all">{{ __('custom.All Categories') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="tp-header-search-btn">
                                            <button type="submit">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M19 19L14.65 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-6 col-xl-2 col-md-8 col-lg-2">
                            <div class="tp-header-main-right d-flex align-items-center justify-content-end">
                                <div class="tp-header-action d-flex align-items-center ml-50">
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
                                    {{-- <div class="tp-header-action-item d-none d-lg-block">
                                        <a href="compare.html"  class="tp-header-action-btn">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.8396 17.3319V3.71411" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M19.1556 13L15.0778 17.0967L11 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M4.91115 1.00056V14.6183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M0.833496 5.09667L4.91127 1L8.98905 5.09667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div> --}}
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

            <!-- header bottom start -->
            <div class="tp-header-bottom tp-header-bottom-border d-none d-lg-block justify-content-center">
                <div class="container">
                    <div class="tp-mega-menu-wrapper p-relative">
                        <div class="row align-items-center">
                            <div class="col-xxl-3 col-xl-3 col-lg-4">
                                <div class="tp-header-category tp-category-menu tp-header-category-toggle">
                                   <button class="tp-category-menu-btn tp-category-menu-toggle">
                                      <span>
                                         <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H15C15.5523 0 16 0.447715 16 1C16 1.55228 15.5523 2 15 2H1C0.447715 2 0 1.55228 0 1ZM0 7C0 6.44772 0.447715 6 1 6H17C17.5523 6 18 6.44772 18 7C18 7.55228 17.5523 8 17 8H1C0.447715 8 0 7.55228 0 7ZM1 12C0.447715 12 0 12.4477 0 13C0 13.5523 0.447715 14 1 14H11C11.5523 14 12 13.5523 12 13C12 12.4477 11.5523 12 11 12H1Z" fill="currentColor"/>
                                         </svg>
                                      </span>
                                      {{ __('custom.All Categories') }}
                                   </button>
                                   <nav class="tp-category-menu-content">
                                    <ul>
                                        @foreach ($menu_categories as $m_category)
                                        <li>
                                           <a title="{{ $m_category->title }}" href="{{ route('app.shop.category', ['slug' => $m_category->slug]) }}">
                                              {{-- <span>
                                                 <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.90532 14.8316V12.5719C5.9053 11.9971 6.37388 11.5301 6.95443 11.5262H9.08101C9.66434 11.5262 10.1372 11.9944 10.1372 12.5719V12.5719V14.8386C10.1371 15.3266 10.5305 15.7254 11.0233 15.7368H12.441C13.8543 15.7368 15 14.6026 15 13.2035V13.2035V6.77525C14.9925 6.22482 14.7314 5.70794 14.2911 5.37171L9.44253 1.50496C8.59311 0.83168 7.38562 0.83168 6.5362 1.50496L1.70886 5.37873C1.26693 5.7136 1.00544 6.23133 1 6.78227V13.2035C1 14.6026 2.1457 15.7368 3.55899 15.7368H4.97671C5.48173 15.7368 5.89114 15.3315 5.89114 14.8316V14.8316" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                 </svg>
                                              </span> --}}
                                              {{ $m_category->title }}</a>
                                        </li>
                                        @endforeach
                                     </ul>
                                   </nav>
                                </div>
                            </div>
                            <div class="col-xxl-9 col-xl-9 col-lg-8">
                                <div class="main-menu menu-style-1">
                                    <nav class="tp-main-menu-content">
                                        <ul class="d-lg-flex justify-content-end">
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
                                                        <li>
                                                            <a title="{{ __('custom.Orders') }}" href="{{ route('back.orders') }}">
                                                                {{ __('custom.Orders') }}
                                                                @if ($ordered_orders->count() >= 1)
                                                                    <span class="position-absolute top-0 start-90 badge rounded-pill bg-danger">
                                                                        {{ $ordered_orders->count() }}
                                                                        <span class="visually-hidden">unread messages</span>
                                                                    </span>
                                                                @elseif ($ordered_orders->count() >= 99)
                                                                    <span class="position-absolute top-0 start-90 badge rounded-pill bg-danger">
                                                                        99+
                                                                        <span class="visually-hidden">unread messages</span>
                                                                    </span>
                                                                @endif
                                                            </a>
                                                        </li>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
