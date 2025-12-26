<?php

namespace App\Livewire\Back\Products;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\SubCategory\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class AddProductComponent extends Component
{
    use WithFileUploads;

    public $activeTab = 'EN';
    public $slug;
    public $SKU;
    public $regular_price;
    public $sale_price;
    public $quantity;
    public $stock;
    public $status = 'inactive';
    public $featured;
    public $slide;
    public $weekend;
    public $image;
    public $images;
    public $sub_category_id;
    public $user_id;
    public $title_ge;
    public $title_az;
    public $title_en;
    public $short_description_ge;
    public $short_description_az;
    public $short_description_en;
    public $description_en;
    public $description_az;
    public $description_ge;

    public $category_id;

    public function mount()
    {
        $this->stock = 'active';
        $this->featured = false;
        $this->slide = false;
        $this->weekend = false;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title_en);
    }

    public function changeSubcategory()
    {
        $this->sub_category_id = 0;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'slug' => 'required|string|unique:products,slug',
            'SKU' => 'required|string|unique:products,SKU',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lt:regular_price',
            'quantity' => 'required|integer',
            'stock' => 'nullable|string|in:active,inactive',
            'status' => 'nullable|string|in:active,inactive',
            'featured' => 'nullable|boolean',
            'slide' => 'nullable|boolean',
            'weekend' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'sub_category_id' => 'required',
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',
            'short_description_ge' => 'required|string',
            'short_description_az' => 'required|string',
            'short_description_en' => 'required|string',
            'description_en' => 'required|string',
            'description_az' => 'required|string',
            'description_ge' => 'required|string',
        ]);
    }

    public function changeSalePrice()
    {
        if($this->sale_price == null)
        {
            $this->slide = false;
            $this->weekend = false;
        }
    }

    public function storeProduct()
    {
        $this->validate([
            'slug' => 'required|string|unique:products,slug',
            'SKU' => 'required|string|unique:products,SKU',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lt:regular_price',
            'quantity' => 'required|integer',
            'stock' => 'nullable|string|in:active,inactive',
            'status' => 'nullable|string|in:active,inactive',
            'featured' => 'nullable|boolean',
            'slide' => 'nullable|boolean',
            'weekend' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'sub_category_id' => 'required',
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',
            'short_description_ge' => 'required|string',
            'short_description_az' => 'required|string',
            'short_description_en' => 'required|string',
            'description_en' => 'required|string',
            'description_az' => 'required|string',
            'description_ge' => 'required|string',
        ], [
            // сообщения ошибок
            'sale_price.lt' => 'The discount price must be less than the regular price.',

            // Пример локализации своих сообщений ошибок.
            // 'regular_price.required' => __('validation.required'),
            // 'regular_price.numeric' => __('validation.numeric'),
            // 'sale_price.numeric' => __('validation.numeric'),
            // 'sale_price.lt' => __('validation.sale_price_less_than_regular_price'),
        ]);

        $product = new Product();
        if($this->quantity >= 3)
        {
            $product->slug = $this->slug;
            $product->SKU = $this->SKU;
            $product->regular_price = $this->regular_price;
            if($this->sale_price)
            {
                $product->sale_price = $this->sale_price;
            }
            else
            {
                $product->sale_price = null;
            }
            $product->quantity = $this->quantity;
            $product->stock = $this->stock;
            $product->status = $this->status;
            $product->featured = $this->featured;
            if($this->sale_price)
            {
                $product->slide = $this->slide;
            }
            else
            {
                $product->slide = 0;
            }

            if($this->sale_price)
            {
                $otherProduct = Product::where('weekend', true)->first();
                if($otherProduct && $this->weekend)
                {
                    $otherProduct->weekend = 0;
                    $otherProduct->save();
                }
                if ($this->weekend)
                {
                    $product->weekend = $this->weekend;
                }
            }
            else
            {
                $product->weekend = 0;
            }
            $product->sub_category_id = $this->sub_category_id;
            $product->category_id = $product->subCategory->category->id;
            $product->user_id = Auth::id();
            $product->translateOrNew('ge')->title = $this->title_ge;
            $product->translateOrNew('az')->title = $this->title_az;
            $product->translateOrNew('en')->title = $this->title_en;
            $product->translateOrNew('ge')->short_description = $this->short_description_ge;
            $product->translateOrNew('az')->short_description = $this->short_description_az;
            $product->translateOrNew('en')->short_description = $this->short_description_en;
            $product->translateOrNew('ge')->description = $this->description_en;
            $product->translateOrNew('az')->description = $this->description_az;
            $product->translateOrNew('en')->description = $this->description_ge;

            if ($this->image) {
                // Загрузка нового изображения
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $image = ImageManager::gd()->read($this->image->getRealPath());
                $image->cover(500, 500);
                $image->save(storage_path('app/public/products/' . $imageName), 100);
                $product->image = $imageName;
            }

            if ($this->images) {
                $imagesname = '';
                $firstImage = true; // Флаг для отслеживания первого изображения
                foreach($this->images as $key => $image) {
                    $imageName = time() . $key . '.' . $image->getClientOriginalExtension();
                    $image = ImageManager::gd()->read($image->getRealPath());
                    $image->cover(500, 500);
                    $image->save(storage_path('app/public/products/gallery/' . $imageName), 100);
                    if ($firstImage) {
                        $imagesname = $imageName; // Для первого изображения не добавляем запятую перед ним
                        $firstImage = false; // Помечаем, что первое изображение обработано
                    } else {
                        $imagesname .= ',' . $imageName; // Для остальных изображений добавляем запятую перед ними
                    }
                }
                $product->images = $imagesname;
            }
            $product->save();

            // Удаление временной директории
            File::deleteDirectory(storage_path('app/public/livewire-tmp'));

            session()->flash('success', 'Added');
            return redirect()->route('back.products');
        }
        else
        {
            session()->flash('quantity-error', 'Quantity');
            return redirect()->back();
        }

    }

    public function render()
    {
        $categories = Category::all();
        $scategories = SubCategory::where('category_id',$this->category_id)->get();
        return view('livewire.back.products.add-product-component', compact(
            'scategories',
            'categories',
        ));
    }
}
