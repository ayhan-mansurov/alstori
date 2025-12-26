<div>
    @if (Cart::instance('cart')->count() > 0)
        <span class="tp-header-action-badge">{{ Cart::instance('cart')->count() }}</span>
    @endif
</div>
