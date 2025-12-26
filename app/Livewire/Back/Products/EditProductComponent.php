<?php

namespace App\Livewire\Back\Products;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\SubCategory\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class EditProductComponent extends Component
{
    use WithFileUploads;

    public $activeTab = 'EN';
    public $slug;
    public $SKU;
    public $regular_price;
    public $sale_price;
    public $quantity;
    public $stock;
    public $status;
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
    public $id;
    public $newImage;
    public $newImages;

    public $category_id;

    public function mount($slug)
    {
        $this->slug = $slug;
        $product = Product::where('slug', $this->slug)->first();
        $this->SKU = $product->SKU;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->quantity = $product->quantity;
        $this->stock = $product->stock;
        $this->status = $product->status;
        $this->featured = $product->featured;
        $this->slide = $product->slide;
        $this->weekend = $product->weekend;
        $this->image = $product->image;
        $this->images = explode(',', $product->images);
        $this->sub_category_id = $product->sub_category_id;
        $this->user_id = $product->user_id;
        $this->title_ge = $product->translateOrNew('ge')->title;
        $this->title_az = $product->translateOrNew('az')->title;
        $this->title_en = $product->translateOrNew('en')->title;
        $this->short_description_ge = $product->translateOrNew('ge')->short_description;
        $this->short_description_az = $product->translateOrNew('az')->short_description;
        $this->short_description_en = $product->translateOrNew('en')->short_description;
        $this->description_ge = $product->translateOrNew('ge')->description;
        $this->description_az = $product->translateOrNew('az')->description;
        $this->description_en = $product->translateOrNew('en')->description;
        $this->id = $product->id;
        $this->category_id = $product->subCategory->category->id;
    }

    public function changeSubcategory()
    {
        $this->sub_category_id = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title_en);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'slug' => 'required|string',
            'SKU' => 'required|string',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lt:regular_price',
            'quantity' => 'required|integer',
            'stock' => 'nullable|string|in:active,inactive',
            'status' => 'nullable|string|in:active,inactive',
            'featured' => 'nullable|boolean',
            'slide' => 'nullable|boolean',
            'weekend' => 'nullable|boolean',
            'newImage' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'newImages.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
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

    public function updateProduct()
    {
        $this->validate([
            'slug' => 'required|string',
            'SKU' => 'required|string',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lt:regular_price',
            'quantity' => 'required|integer',
            'stock' => 'nullable|string|in:active,inactive',
            'status' => 'nullable|string|in:active,inactive',
            'featured' => 'nullable|boolean',
            'slide' => 'nullable|boolean',
            'weekend' => 'nullable|boolean',
            'newImage' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'newImages.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
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


        $product = Product::find($this->id);
        if($this->quantity >= 1)
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
                $product->weekend = $this->weekend;
            }
            if($this->sale_price)
            {
                $otherProduct = Product::where('weekend', true)->first();
                if($otherProduct && $otherProduct->id !== $this->id)
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

            $product->image = $this->image;
            $product->sub_category_id = $this->sub_category_id;
            $product->category_id = $this->category_id;
            $product->user_id = Auth::id();
            $product->translateOrNew('ge')->title = $this->title_ge;
            $product->translateOrNew('az')->title = $this->title_az;
            $product->translateOrNew('en')->title = $this->title_en;
            $product->translateOrNew('ge')->short_description = $this->short_description_ge;
            $product->translateOrNew('az')->short_description = $this->short_description_az;
            $product->translateOrNew('en')->short_description = $this->short_description_en;
            $product->translateOrNew('ge')->description = $this->description_ge;
            $product->translateOrNew('az')->description = $this->description_az;
            $product->translateOrNew('en')->description = $this->description_en;

            // Главное изображение ---------------------------------------------------
            if ($this->newImage)
            {
                // Удаление старого изображения
                $oldImagePath = storage_path('app/public/products/' . $product->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                // Загрузка нового изображения
                $imageName = time() . '-updated.' . $this->newImage->getClientOriginalExtension();
                $newImage = ImageManager::gd()->read($this->newImage->getRealPath());
                $newImage->cover(500, 500);
                $newImage->save(storage_path('app/public/products/' . $imageName), 100);
                $product->image = $imageName;
            }

            // Изображения галереи ---------------------------------------------------
            if($this->newImages)
            {
                $imagesname = '';
                $firstImage = true; // Флаг для отслеживания первого изображения
                foreach($this->newImages as $key => $image)
                {
                    foreach($this->images as $oldImage)
                    {
                        // Удаление старого изображения
                        $oldImagePath = storage_path('app/public/products/gallery/' . $oldImage);

                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                    // Загрузка нового изображения
                    $imageName = time() . $key . '-updated_gallery.' . $image->getClientOriginalExtension();
                    $newImage = ImageManager::gd()->read($image->getRealPath());
                    $newImage->cover(500, 500);
                    $newImage->save(storage_path('app/public/products/gallery/' . $imageName), 100);
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

            session()->flash('success', 'Updated');
            return redirect()->route('back.products');
        }
        else
        {
            session()->flash('error', 'Quantity');
            return redirect()->back();
        }
    }

    public function render()
    {
        $categories = Category::all();
        $scategories = SubCategory::where('category_id',$this->category_id)->get();
        return view('livewire.back.products.edit-product-component', compact(
            'scategories',
            'categories',
        ));
    }
}
