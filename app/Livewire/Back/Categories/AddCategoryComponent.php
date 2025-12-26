<?php

namespace App\Livewire\Back\Categories;

use App\Models\Category\Category;
use App\Models\SubCategory\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCategoryComponent extends Component
{
    use WithFileUploads;

    public $activeTab = 'EN';
    public $title_ge;
    public $title_az;
    public $title_en;
    public $short_description_ge;
    public $short_description_az;
    public $short_description_en;
    public $slug;
    public $user_id;
    public $status = 'inactive';
    public $image;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title_en);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',
            'short_description_ge' => 'nullable|string',
            'short_description_az' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'slug' => 'required|string|unique:categories,slug',
            'status' => 'nullable|string|in:active,inactive',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',

        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',
            'short_description_ge' => 'nullable|string',
            'short_description_az' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'slug' => 'required|string|unique:categories,slug',
            'status' => 'nullable|string|in:active,inactive',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',

        ]);

        if($this->category_id)
        {
            $scategory = new SubCategory();
            $scategory->slug = $this->slug;
            $scategory->status = $this->status;
            $scategory->user_id = Auth::id();
            $scategory->translateOrNew('ge')->title = $this->title_ge;
            $scategory->translateOrNew('az')->title = $this->title_az;
            $scategory->translateOrNew('en')->title = $this->title_en;
            $scategory->translateOrNew('ge')->short_description = $this->short_description_ge;
            $scategory->translateOrNew('az')->short_description = $this->short_description_az;
            $scategory->translateOrNew('en')->short_description = $this->short_description_en;
            $scategory->category_id = $this->category_id;

            if ($this->image) {
                // Загрузка нового изображения
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $image = ImageManager::gd()->read($this->image->getRealPath());
                $image->cover(438, 600);
                $image->save(storage_path('app/public/sub-categories/' . $imageName), 100);
                $scategory->image = $imageName;
            }

            $scategory->save();
        }
        else
        {
            $category = new Category();
            $category->slug = $this->slug;
            $category->status = $this->status;
            $category->user_id = Auth::id();
            $category->translateOrNew('ge')->title = $this->title_ge;
            $category->translateOrNew('az')->title = $this->title_az;
            $category->translateOrNew('en')->title = $this->title_en;
            $category->translateOrNew('ge')->short_description = $this->short_description_ge;
            $category->translateOrNew('az')->short_description = $this->short_description_az;
            $category->translateOrNew('en')->short_description = $this->short_description_en;

            if ($this->image) {
                // Загрузка нового изображения
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $image = ImageManager::gd()->read($this->image->getRealPath());
                $image->cover(438, 600);
                $image->save(storage_path('app/public/categories/' . $imageName), 100);
                $category->image = $imageName;
            }

            $category->save();
        }

        // Удаление временной директории
        File::deleteDirectory(storage_path('app/public/livewire-tmp'));


        if($this->category_id)
        {
            session()->flash('success', 'Added SubCategory');
        }
        else
        {
            session()->flash('success', 'Added Category');
        }
        return redirect()->route('back.categories');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.back.categories.add-category-component', compact(
            'categories',
        ));
    }
}
