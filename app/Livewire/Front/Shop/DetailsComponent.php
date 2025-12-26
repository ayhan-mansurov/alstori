<?php

namespace App\Livewire\Front\Shop;

use App\Models\Product\Product;
use App\Models\Review\Review;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $activeTab = 'nav-addInfo-tab';
    public $slug;
    public $product_id;
    public $rating;
    public $user_id;
    public $comment;
    public $review_added = false;
    public $reviewsCount;

    public $p_qty = 1;

    public function mount($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $this->product_id = $product->id;

    }

    protected function calculateAverageRating()
    {
        // Рассчет среднего рейтинга товара
        $product = Product::where('slug', $this->slug)->first();
        $averageRating = $product->reviews()->avg('rating');
        return round($averageRating, 2);
    }

    public function changeCountReviews()
    {
        $product = Product::where('slug', $this->slug)->first();
        $this->reviewsCount = Review::where('product_id', $product->id)->count();
        return round($this->reviewsCount);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',

        ]);
    }

    public function submitReview()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $review = new Review();
        $review->product_id = $this->product_id;
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->user_id = Auth::id();
        $review->review_added = true;
        $review->save();

        // Сброс значений полей после отправки отзыва
        $this->rating = null;
        $this->comment = null;

        session()->flash('success', 'Review created');
        return redirect()->back();
    }

    public function minusQty()
    {
        if ($this->p_qty > 1) {
            $this->p_qty--;
        }
    }

    public function plusQty()
    {
        $this->p_qty++;
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

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $related_products = Product::where('status', 'active')->where('id', '!=', $product->id)->where('sub_category_id', $product->sub_category_id)->get()->take(12);
        $averageRating = $this->calculateAverageRating();
        $reviewsCount = $this->changeCountReviews();
        $review = Review::where('product_id', $product->id)->first();
        $reviews = Review::where('product_id', $product->id)->orderBy('created_at', 'DESC')->get()->take(10); // Получаем все отзывы из базы данных
        $totalReviews = $reviews->count();
        $starRatings = [];

        // Рассчитываем процент для каждой звездной оценки
        for ($i = 5; $i >= 1; $i--) {
            $starReviewsCount = $reviews->where('rating', $i)->count();
            $starRatings[$i] = $starReviewsCount > 0 ? round(($starReviewsCount / $totalReviews) * 100) : 0;
        }

        return view('livewire.front.shop.details-component', compact(
            'product',
            'related_products',
            'averageRating',
            'review',
            'starRatings',
            'reviews',
        ));
    }
}
