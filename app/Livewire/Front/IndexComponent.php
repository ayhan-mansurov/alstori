<?php

namespace App\Livewire\Front;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\Review\Review;
use App\Models\Shopping\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class IndexComponent extends Component
{
    public $p_qty = 1;
    public $activeTab = 'nav-allCollection-tab';

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

            Cart::instance('cart')->add($product->id, $product->title, $this->p_qty, $price, ['product_id' => $product->id])->associate(Product::class);
            session()->flash('success', 'Added');
        }


        $this->dispatch('cart-count-component', 'refreshComponent');
    }

    public function render()
    {
        $categories = Category::where('status', 'active')->orderBy('updated_at', 'DESC')->get();
        $products = Product::where('status', 'active')->where('slide', 1)->orderBy('updated_at', 'DESC')->take(6)->get();
        $week_product = Product::where('status', 'active')->where('weekend', 1)->take(1)->first();
        $topRatedProducts = Review::orderBy('rating', 'DESC')->take(3)->get();

        $featured_all_products = Product::where('status', 'active')->where('featured', 1)->take(8)->get();

        $featured_last_category = Category::where('status', 'active')->orderBy('updated_at', 'DESC')->first();
        if($featured_last_category != null)
        {
            $featured_last_category_products = Product::where('status', 'active')->where('featured', 1)->where('category_id', $featured_last_category->id)->orderBy('updated_at', 'DESC')->take(8)->get();
        }
        else
        {
            $featured_last_category_products = null;
        }

        $featured_penultimate_category = Category::where('status', 'active')->orderBy('updated_at', 'DESC')->skip(1)->first();
        if($featured_penultimate_category != null)
        {
            $featured_penultimate_category_products = Product::where('status', 'active')->where('featured', 1)->where('category_id', $featured_penultimate_category->id)->orderBy('updated_at', 'DESC')->take(8)->get();
        }
        else
        {
            $featured_penultimate_category_products = null;
        }

        $orderItems = OrderItem::orderBy('quantity', 'DESC')->take(3)->get();

        return view('livewire.front.index-component', compact(
            'categories',
            'products',
            'week_product',
            'topRatedProducts',
            'featured_all_products',
            'featured_last_category',
            'featured_last_category_products',
            'featured_penultimate_category',
            'featured_penultimate_category_products',
            'orderItems',
        ));
    }
}
