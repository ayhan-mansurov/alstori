<div>
    <main>
        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">{{ __('custom.Checkout') }}</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('app.index') }}">{{ __('custom.Home') }}</a></span>
                        <span>{{ __('custom.Checkout') }}</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- checkout area start -->
        <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
            <div class="container">
                @if ($cartProducts->count() > 0)
                <form wire:submit.prevent="placeOrder">
                    <div class="row">
                        {{-- <div class="col-xl-7 col-lg-7">
                            <div class="tp-checkout-verify">
                            <div class="tp-checkout-verify-item">
                                <p class="tp-checkout-verify-reveal">Returning customer? <button type="button" class="tp-checkout-login-form-reveal-btn">Click here to login</button></p>

                                <div id="tpReturnCustomerLoginForm" class="tp-return-customer">
                                    <form action="#">

                                        <div class="tp-return-customer-input">
                                        <label>Email</label>
                                        <input type="text" placeholder="Your Email">
                                        </div>
                                        <div class="tp-return-customer-input">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password">
                                        </div>

                                        <div class="tp-return-customer-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                                        <div class="tp-return-customer-remeber">
                                            <input id="remeber" type="checkbox">
                                            <label for="remeber">Remember me</label>
                                        </div>
                                        <div class="tp-return-customer-forgot">
                                            <a href="forgot.html">Forgot Password?</a>
                                        </div>
                                        </div>
                                        <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Login</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tp-checkout-verify-item">
                                <p class="tp-checkout-verify-reveal">Have a coupon? <button type="button" class="tp-checkout-coupon-form-reveal-btn">Click here to enter your code</button></p>

                                <div id="tpCheckoutCouponForm" class="tp-return-customer">
                                    <form action="#">
                                        <div class="tp-return-customer-input">
                                        <label>Coupon Code :</label>
                                        <input type="text" placeholder="Coupon">
                                        </div>
                                        <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Apply</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-7">
                            <div class="tp-checkout-bill-area" >
                                <h3 class="tp-checkout-bill-title">{{ __('custom.Billing Details') }}</h3>

                                <div class="tp-checkout-bill-form">
                                    <div class="tp-checkout-bill-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.First Name') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="firstname" placeholder="First Name">
                                                    @error('firstname')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Last Name') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="lastname" placeholder="Last Name">
                                                    @error('lastname')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Company') }} ({{ __('custom.optional') }})</label>
                                                    <input type="text" wire:model.live="company" placeholder="Example LTD.">
                                                    @error('company')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Country / Region </label>
                                                    <input type="text" placeholder="United States (US)">
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Country') }} <span>*</span></label>
                                                    <select wire:model.live="country" class="form-select">
                                                        <option>{{ __('custom.Select country') }}</option>
                                                        <option value="Georgia" selected>{{ __('custom.Georgia') }}</option>
                                                    </select>
                                                    @error('country')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                <label>{{ __('custom.Region/Province') }} <span>*</span></label>
                                                <input type="text" wire:model.live="province">
                                                @error('province')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Town / City') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="city">
                                                    @error('city')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                <label>{{ __('custom.Postcode ZIP') }} <span>*</span></label>
                                                <input type="text" wire:model.live="zipcode">
                                                @error('zipcode')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Address') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="line1" placeholder="{{ __('custom.House or building number and street name') }}">
                                                    @error('line1')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>

                                                <div class="tp-checkout-input">
                                                    <input type="text" wire:model.live="line2" placeholder="{{ __('custom.Apartment, floor, etc. (optional)') }}">
                                                    @error('line2')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Mobile') }} <span>*</span></label>
                                                    <input type="number" wire:model.live="mobile">
                                                    @error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Email') }} <span>*</span></label>
                                                    <input type="email" wire:model.live="email">
                                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-option-wrapper">
                                                    {{-- <div class="tp-checkout-option">
                                                        <input id="create_free_account" type="checkbox">
                                                        <label for="create_free_account">Create an account?</label>
                                                    </div> --}}
                                                    <div class="tp-checkout-option">
                                                        <input id="ship_to_diff_address" type="checkbox" value="1" wire:model.live="is_shipping_different">
                                                        <label for="ship_to_diff_address">{{ __('custom.Ship to a different address?') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Order notes (optional)</label>
                                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                @if ($is_shipping_different)
                                <h3 class="tp-checkout-bill-title mt-3">{{ __('custom.Shipping Details') }}</h3>

                                <div class="tp-checkout-bill-form">
                                    <div class="tp-checkout-bill-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.First Name') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="s_firstname" placeholder="First Name">
                                                    @error('s_firstname')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Last Name') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="s_lastname" placeholder="Last Name">
                                                    @error('s_lastname')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Company') }} ({{ __('custom.optional') }})</label>
                                                    <input type="text" wire:model.live="s_company" placeholder="Example LTD.">
                                                    @error('s_company')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Country / Region </label>
                                                    <input type="text" placeholder="United States (US)">
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Country') }} <span>*</span></label>
                                                    <select wire:model.live="s_country" class="form-select">
                                                        <option>{{ __('custom.Select country') }}</option>
                                                        <option value="Georgia" selected>{{ __('custom.Georgia') }}</option>
                                                    </select>
                                                    @error('s_country')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                <label>{{ __('custom.Region/Province') }} <span>*</span></label>
                                                <input type="text" wire:model.live="s_province">
                                                @error('s_province')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Town / City') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="s_city">
                                                    @error('s_city')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                <label>{{ __('custom.Postcode ZIP') }} <span>*</span></label>
                                                <input type="text" wire:model.live="s_zipcode">
                                                @error('s_zipcode')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Address') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="s_line1" placeholder="{{ __('custom.House or building number and street name') }}">
                                                    @error('s_line1')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>

                                                <div class="tp-checkout-input">
                                                    <input type="text" wire:model.live="s_line2" placeholder="{{ __('custom.Apartment, floor, etc. (optional)') }}">
                                                    @error('s_line2')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Mobile') }} <span>*</span></label>
                                                    <input type="text" wire:model.live="s_mobile">
                                                    @error('s_mobile')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>{{ __('custom.Email') }} <span>*</span></label>
                                                    <input type="email" wire:model.live="s_email">
                                                    @error('s_email')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Order notes (optional)</label>
                                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <!-- checkout place order -->
                            <div class="tp-checkout-place white-bg">
                                <h3 class="tp-checkout-place-title">{{ __('custom.Your Order') }}</h3>

                                <div class="tp-order-info-list">
                                    <ul>
                                        <!-- header -->
                                        <li class="tp-order-info-list-header">
                                            <h4><strong>{{ __('custom.Product') }}</strong></h4>
                                            <h4><strong>{{ __('custom.Total') }}</strong></h4>
                                        </li>

                                        <!-- item list -->
                                        @foreach ($cartProducts as $item)
                                        <li class="tp-order-info-list-desc">
                                            <p>{{ $item->model->title }}. <span> x {{ $item->qty }}</span></p>
                                            <span>{{ $item->price }} ₾</span>
                                        </li>
                                        @endforeach

                                        <!-- subtotal -->
                                        {{-- <li class="tp-order-info-list-subtotal">
                                            <span>Subtotal</span>
                                            <span>{{ Cart::subtotal() }} ₾</span>
                                        </li> --}}

                                        <li class="tp-order-info-list-total">
                                            <span>{{ __('custom.Subtotal') }}</span>
                                            <span>{{ Cart::subtotal() }} ₾</span>
                                        </li>

                                        <!-- shipping -->
                                        {{-- <li class="tp-order-info-list-shipping">
                                            <span>Shipping</span>
                                            <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                            <span>
                                                <input id="flat_rate" type="radio" name="shipping">
                                                <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                                            </span>
                                            <span>
                                                <input id="local_pickup" type="radio" name="shipping">
                                                <label for="local_pickup">Local pickup: <span>$25.00</span></label>
                                            </span>
                                            <span>
                                                <input id="free_shipping" type="radio" name="shipping">
                                                <label for="free_shipping">Free shipping</label>
                                            </span>
                                            </div>
                                        </li> --}}

                                        <li class="tp-order-info-list-total">
                                            <span>{{ __('custom.Tax') }}</span>
                                            <span>{{ Cart::tax() }} ₾</span>
                                        </li>

                                        @if (Session::has('checkout'))
                                        <!-- total -->
                                        <li class="tp-order-info-list-total">
                                            <span><strong>{{ __('custom.Total') }}</strong></span>
                                            <span><strong>{{ Session::get('checkout')['total'] }} ₾</strong></span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <h3 class="tp-checkout-place-title mt-3">{{ __('custom.Payment method') }}</h3>
                                <div class="tp-checkout-payment">
                                    {{-- <div class="tp-checkout-payment-item">
                                        <input type="radio" id="back_transfer" name="payment">
                                        <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank Transfer</label>
                                        <div class="tp-checkout-payment-desc direct-bank-transfer">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="tp-checkout-payment-item">
                                        <input type="radio" id="cheque_payment" name="payment">
                                        <label for="cheque_payment">Cheque Payment</label>
                                        <div class="tp-checkout-payment-desc cheque-payment">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="tp-checkout-payment-item">
                                        <input type="radio" id="cheque_payment" name="payment">
                                        <label for="cheque_payment">Payment by card <img src="assets/img/icon/payment-option.png" alt=""></label>
                                        <div class="tp-checkout-payment-desc cheque-payment">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div> --}}
                                    <div class="tp-checkout-payment-item">
                                        <input type="radio" wire:model.live="paymentmode" id="cod" name="paymentmode" value="cod" checked>
                                        @error('paymentmode')<small class="text-danger">{{ $message }}</small>@enderror
                                        <label for="cod">{{ __('custom.Cash on Delivery') }}</label>
                                        {{-- <div class="tp-checkout-payment-desc cash-on-delivery">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="tp-checkout-payment-item paypal-payment">
                                        <input type="radio" id="paypal" name="payment">
                                        <label for="paypal">PayPal <a href="#">What is PayPal?</a></label>
                                        <label for="paypal">PayPal <a href="#">What is PayPal?</a></label>
                                    </div> --}}
                                </div>
                                @if (Auth::user()->terms != 1)
                                <div class="tp-checkout-agree">
                                    <div class="tp-checkout-option">
                                        <input id="read_all" type="checkbox">
                                        <label for="read_all">{{ __('custom.I have read and agree to the website') }}.</label>
                                    </div>
                                </div>
                                @endif
                                <div class="tp-checkout-btn-wrapper">
                                    <button type="submit" class="tp-checkout-btn w-100">{{ __('custom.Place Order') }}</button>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                @else
                    <div class="row">
                        <div class="col-12">
                            <div class="tp-checkout-bill-area">
                                <h6>{{ __('custom.Your cart is empty!') }}</h6>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- checkout area end -->
    </main>
</div>
