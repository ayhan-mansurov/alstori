<div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-xl-none">
    <div class="container">
        <div class="row row-cols-5">
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="{{ route('app.shop') }}" class="tp-mobile-item-btn">
                        <i class="flaticon-store"></i>
                        <span>{{ __('custom.Store') }}</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center" x-data="{ open: false }">
                    <button @click="open = ! open" class="tp-mobile-item-btn tp-search-open-btn">
                        <i class="flaticon-search-1"></i>
                        <span>{{ __('custom.Search') }}</span>
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="{{ route('app.shop.wishlist') }}" class="tp-mobile-item-btn">
                        <i class="flaticon-love"></i>
                        <span>{{ __('custom.Wishlist') }}</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->utype === 'ADM')
                                <a href="{{ route('admin.dashboard') }}" class="tp-mobile-item-btn">
                                    <i class="flaticon-user"></i>
                                    <span>{{ __('custom.Dashboard') }}</span>
                                </a>
                            @else
                                <a href="{{ route('user.myaccount') }}" class="tp-mobile-item-btn">
                                    <i class="flaticon-user"></i>
                                    <span>{{ __('custom.My Account') }}</span>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="tp-mobile-item-btn">
                                <i class="flaticon-user"></i>
                                <span>{{ __('custom.Account') }}</span>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                        <i class="flaticon-menu-1"></i>
                        <span>{{ __('custom.Menu') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

