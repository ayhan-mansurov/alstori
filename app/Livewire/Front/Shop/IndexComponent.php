<?php

namespace App\Livewire\Front\Shop;

use App\Models\Product\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexComponent extends Component
{
    public $sorting;
    public $pageSize;

    public $p_qty = 1;

    public function mount()
    {
        $this->sorting = "new";
        $this->pageSize = 12;
    }

    public function addToWishlist($id)
    {
        $wishlistItems = Cart::instance('wishlist')->content();
        $existingItem = $wishlistItems->where('id', $id)->first();

        if($existingItem)
        {
            Cart::instance('wishlist')->remove($existingItem->rowId);
            $this->dispatch('wishlist-count-component','refreshComponent');
            session()->flash('success', 'Already Wishlist');
            return;
        }
        else
        {
            $product = Product::find($id);

            if($product->sale_price)
            {
                $price = $product->sale_price;
            }
            else
            {
                $price = $product->regular_price;
            }

            Cart::instance('wishlist')->add($product->id, $product->title, $this->p_qty, $price, ['product_id' => $product->id])->associate(Product::class);
            session()->flash('success', 'Added Wishlist');
        }


        $this->dispatch('wishlist-count-component', 'refreshComponent');
    }

    public function store($id)
    {
        $cartItems = Cart::instance('cart')->content();
        $existingItem = $cartItems->where('id', $id)->first();

        if($existingItem)
        {
            Cart::update($existingItem->rowId, $existingItem->qty + 1);
            session()->flash('success', 'Already');
        }
        else
        {
            $product = Product::find($id);

            if($product->sale_price)
            {
                $price = $product->sale_price;
            }
            else
            {
                $price = $product->regular_price;
            }

            if($product->quantity < $this->p_qty || $product->quantity === 0)
            {
                session()->flash('error', 'Quantity');
                return redirect()->back();
            }
            else
            {
                Cart::instance('cart')->add($product->id, $product->title, $this->p_qty, $price, ['product_id' => $product->id])->associate(Product::class);
                session()->flash('success', 'Added');
                return redirect()->route('app.shop.cart');
            }
        }


        $this->dispatch('cart-count-component', 'refreshComponent');
    }

    public function selectUpdate()
    {
        if($this->sorting === "new")
        {
            Product::where('status', 'active')->orderBy('updated_at', 'DESC')->paginate($this->pageSize);
        }
        else if ($this->sorting === "old")
        {
            Product::where('status', 'active')->orderBy('updated_at', 'ASC')->paginate($this->pageSize);
        }
        else if ($this->sorting === "low")
        {
            Product::where('status', 'active')->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        }
        else if ($this->sorting === "high")
        {
            Product::where('status', 'active')->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        }
    }

    public function render()
    {
        if($this->sorting === "new")
        {
            $products = Product::where('status', 'active')->orderBy('updated_at', 'DESC')->paginate($this->pageSize);
        }
        else if ($this->sorting === "old")
        {
            $products = Product::where('status', 'active')->orderBy('updated_at', 'ASC')->paginate($this->pageSize);
        }
        else if ($this->sorting === "low")
        {
            $products = Product::where('status', 'active')->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        }
        else if ($this->sorting === "high")
        {
            $products = Product::where('status', 'active')->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        }

        return view('livewire.front.shop.index-component', compact(
            'products',
        ));
    }
}
