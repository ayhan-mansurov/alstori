<?php

namespace App\Livewire\Front\Shop;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\SubCategory\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SearchComponent extends Component
{
    public $sorting;
    public $pageSize;

    public $search;
    public $category_id;

    public $p_qty = 1;

    public function mount()
    {
        $this->sorting = "new";
        $this->pageSize = 12;
        $this->fill(request()->only('search', 'category_id'));
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

            Cart::instance('cart')->add($product->id, $product->title, $this->p_qty, $price, ['product_id' => $product->id])->associate(Product::class);
            session()->flash('success', 'Added');
        }


        $this->dispatch('cart-count-component', 'refreshComponent');
    }

    public function selectUpdate()
    {
        if($this->search && $this->category_id === 'all') // Если имеется текст и категория не выбрано, то ищем продукт во всех категриях
        {
            if($this->sorting === "new")
            {
                Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'DESC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "old")
            {
                Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "low")
            {
                Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "high")
            {
                Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
            }
        }

        if($this->search === null && $this->category_id === 'all') // Если текст пустой и категория не выбрано, то показываем страницу магазина
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

        if($this->search === null && $this->category_id != 'all') // Если текст пустой но категория выбрано, то переходит на страницу категории
        {
            $category = Category::where('id', $this->category_id)->first();
            $scategories = SubCategory::where('status', 'active')->where('category_id', $category->id)->orderBy('updated_at', 'DESC')->paginate(12);

            return view('livewire.front.shop.category-component', compact(
                'scategories',
                'category',
            ));
        }

        if($this->search != null && $this->category_id != 'all') // Если имеется текст и категория выбрано, то показывает найденые товары в категории
        {
            if($this->sorting === "new")
            {
                Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'DESC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "old")
            {
                Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "low")
            {
                Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "high")
            {
                Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
            }
        }

    }

    public function render()
    {

        if($this->search && $this->category_id === 'all') // Если имеется текст и категория не выбрано, то ищем продукт во всех категриях
        {
            if($this->sorting === "new")
            {
                $s_products = Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'DESC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "old")
            {
                $s_products = Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "low")
            {
                $s_products = Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "high")
            {
                $s_products = Product::where('status', 'active')->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
            }

            return view('livewire.front.shop.search-component', compact(
                's_products',
            ));
        }

        if($this->search === null && $this->category_id === 'all') // Если текст пустой и категория не выбрано, то показываем страницу магазина
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

        if($this->search === null && $this->category_id != 'all') // Если текст пустой но категория выбрано, то переходит на страницу категории
        {
            $category = Category::where('id', $this->category_id)->first();
            $scategories = SubCategory::where('status', 'active')->where('category_id', $category->id)->orderBy('updated_at', 'DESC')->paginate(12);

            return view('livewire.front.shop.category-component', compact(
                'scategories',
                'category',
            ));
        }

        if($this->search) // Если имеется текст, то показывает найденые товары в выбранной категории
        {
            if($this->sorting === "new")
            {
                $s_products = Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'DESC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "old")
            {
                $s_products = Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('updated_at', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "low")
            {
                $s_products = Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
            }
            else if ($this->sorting === "high")
            {
                $s_products = Product::where('status', 'active')->where('category_id', $this->category_id)->whereHas('translations', function($query) {
                    $query->where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('SKU', 'like', "%{$this->search}%");
                })->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
            }

            return view('livewire.front.shop.search-component', compact(
                's_products',
            ));
        }

    }
}
