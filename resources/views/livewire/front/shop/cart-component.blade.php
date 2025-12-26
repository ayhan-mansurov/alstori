@section('metaTitle') {{ __('custom.Shopping Cart') }} @endsection
@section('metaDescription') Description @endsection
<div>
    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-95 pb-50">
           <div class="container">
              <div class="row">
                 <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                       <h3 class="breadcrumb__title">{{ __('custom.Shopping Cart') }}</h3>
                       <div class="breadcrumb__list">
                          <span><a href="{{ route('app.index') }}">{{ __('custom.Home') }}</a></span>
                          <span>{{ __('custom.Shopping Cart') }}</span>
                       </div>
                        @if (session('success') === 'Added')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! The product has been added to the cart') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Delete')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! The product has been removed from the cart') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Delete All')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! The cart is empty. Please add a new product') }}.</strong></p>
                        @endif
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- cart area start -->
        <section class="tp-cart-area pb-120">
           <div class="container">
              <div class="row">
                @if($cartProducts->count() > 0)
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-cart-list mb-25 mr-30">
                        <table class="table">
                            <thead>
                                <tr>
                                <th colspan="2" class="tp-cart-header-product">{{ __('custom.Title') }}</th>
                                <th class="tp-cart-header-price">{{ __('custom.Price') }}</th>
                                <th class="tp-cart-header-quantity">{{ __('custom.Quantity') }}</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartProducts as $item)
                                <tr>
                                    <!-- img -->
                                    <td class="tp-cart-img"><a title="{{ $item->model->title }}" href="{{ route('app.shop.details', ['slug' => $item->model->slug]) }}"> <img src="{{ asset('storage/products') }}/{{ $item->model->image }}" alt="{{ $item->model->image }}"></a></td>
                                    <!-- title -->
                                    <td class="tp-cart-title"><a title="{{ $item->model->title }}" href="{{ route('app.shop.details', ['slug' => $item->model->slug]) }}">{{ $item->model->title }}</a></td>
                                    <!-- price -->
                                    <td class="tp-cart-price"><span>{{ $item->price }} ₾</span></td>
                                    <!-- quantity -->
                                    <td class="tp-cart-quantity">
                                    <div class="tp-product-quantity mt-10 mb-10">
                                        <span class="tp-cart-minus user-select" wire:click.prevent="minusQty('{{ $item->rowId }}')">
                                            <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <input class="tp-cart-input user-select" type="text" value="{{ $item->qty }}" disabled>
                                        <span class="tp-cart-plus user-select" wire:click.prevent="plusQty('{{ $item->rowId }}')">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </div>
                                    </td>
                                    <!-- action -->
                                    <td class="tp-cart-action">
                                    <button class="tp-cart-action-btn" wire:click.prevent="destroy('{{ $item->rowId }}')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="tp-cart-bottom">
                        <div class="row align-items-end">
                            <div class="col-xl-6 col-md-8">
                                {{-- <div class="tp-cart-coupon">
                                    <form action="#">
                                    <div class="tp-cart-coupon-input-box">
                                        <label>Coupon Code:</label>
                                        <div class="tp-cart-coupon-input d-flex align-items-center">
                                            <input type="text" placeholder="Enter Coupon Code">
                                            <button type="submit">Apply</button>
                                        </div>
                                    </div>
                                    </form>
                                </div> --}}
                            </div>
                            <div class="col-xl-6 col-md-4">
                                <div class="tp-cart-update text-md-end">
                                    <button wire:click.prevent="destroyAll()" type="button" class="tp-cart-update-btn"><i class="fa-regular fa-trash-can"></i> {{ __('custom.Shopping Cart') }}</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="tp-cart-checkout-wrapper">
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title">{{ __('custom.Subtotal') }}</span>
                            <span class="tp-cart-checkout-top-price">{{ Cart::subtotal() }} ₾</span>
                        </div>
                        {{-- <div class="tp-cart-checkout-shipping">
                            <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

                            <div class="tp-cart-checkout-shipping-option-wrapper">
                                <div class="tp-cart-checkout-shipping-option">
                                    <input id="flat_rate" type="radio" name="shipping">
                                    <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                                </div>
                                <div class="tp-cart-checkout-shipping-option">
                                    <input id="local_pickup" type="radio" name="shipping">
                                    <label for="local_pickup">Local pickup: <span> $25.00</span></label>
                                </div>
                                <div class="tp-cart-checkout-shipping-option">
                                    <input id="free_shipping" type="radio" name="shipping">
                                    <label for="free_shipping">Free shipping</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                            <span>{{ __('custom.Total') }}</span>
                            <span>{{ Cart::total() }} ₾</span>
                        </div>
                        <div class="tp-cart-checkout-proceed">
                            <a href="#" wire:click.prevent="checkout" class="tp-cart-checkout-btn w-100">{{ __('custom.Proceed to Checkout') }}</a>
                        </div>
                        </div>
                    </div>
                @else
                    <h6>{{ __('custom.The cart is empty. Please add a product') }}.</h6>
                @endif
              </div>
           </div>
        </section>
        <!-- cart area end -->

    </main>
</div>
