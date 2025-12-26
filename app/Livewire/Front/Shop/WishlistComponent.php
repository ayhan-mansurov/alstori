<?php

namespace App\Livewire\Front\Shop;

use App\Models\Product\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistComponent extends Component
{
    public function plusQty($rowId)
    {
        $product = Cart::instance('wishlist')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('wishlist')->update($rowId, $qty);
        $this->dispatch('wishlist-count-component', 'refreshComponent');
    }

    public function minusQty($rowId)
    {
        $product = Cart::instance('wishlist')->get($rowId);
        if ($product->qty > 1)
        {
            $qty = $product->qty - 1;
            Cart::instance('wishlist')->update($rowId, $qty);
            $this->dispatch('wishlist-count-component', 'refreshComponent');
        }
    }

    public function destroy($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        session()->flash('success','Delete');
        $this->dispatch('wishlist-count-component', 'refreshComponent');
    }

    public function moveProductFromWishlistToCart($id)
    {
        $wishlistItems = Cart::instance('wishlist')->content();
        $item = $wishlistItems->where('id', $id)->first();
        Cart::instance('wishlist')->remove($item->rowId);
        Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price, ['product_id' => $item->id])->associate(Product::class);
        $this->dispatch('wishlist-count-component','refreshComponent');
        $this->dispatch('cart-count-component','refreshComponent');
        session()->flash('success', 'Added cart');
    }

    public function render()
    {
        $wishlistProducts = Cart::instance('wishlist')->content();
        return view('livewire.front.shop.wishlist-component', compact(
            'wishlistProducts',
        ));
    }
}
