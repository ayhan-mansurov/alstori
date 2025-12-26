<div>
    @if (Cart::instance('wishlist')->count() > 0)
        <span class="tp-header-action-badge">{{ Cart::instance('wishlist')->count() }}</span>
    @endif
</div>
