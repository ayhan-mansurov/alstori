<?php

namespace App\Livewire\Front\Shop;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    public function plusQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->dispatch('cart-count-component', 'refreshComponent');
    }

    public function minusQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if ($product->qty > 1)
        {
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId, $qty);
            $this->dispatch('cart-count-component', 'refreshComponent');
        }
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success','Delete');
        $this->dispatch('cart-count-component', 'refreshComponent');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success','Delete All');
        $this->dispatch('cart-count-component', 'refreshComponent');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('app.shop.checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }

        session()->put('checkout', [
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => Cart::instance('cart')->tax(),
            'total' => Cart::instance('cart')->total(),
        ]);
    }

    public function render()
    {
        $this->setAmountForCheckout();
        $cartProducts = Cart::instance('cart')->content();
        return view('livewire.front.shop.cart-component', compact(
            'cartProducts',
        ));
    }
}
