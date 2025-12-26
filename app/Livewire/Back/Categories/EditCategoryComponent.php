<?php

namespace App\Livewire\Back\Categories;

use App\Models\Category\Category;
use App\Models\SubCategory\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class EditCategoryComponent extends Component
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
    public $status;

    public $image;
    public $newImage;

    public $category_slug;
    public $category_id;
    public $user_id;

    public $scategory_slug;
    public $scategory_id;

    public function mount($slug, $scategory_slug=null)
    {
        if($scategory_slug)
        {
            $this->scategory_slug = $scategory_slug;
            $scategory = SubCategory::where('slug', $scategory_slug)->first();
            $this->scategory_id = $scategory->id;
            $this->category_id = $scategory->category_id;
            $this->user_id = $scategory->user_id;
            $this->slug = $scategory->slug;
            $this->status = $scategory->status;
            $this->image = $scategory->image;

            $this->title_ge = $scategory->translateOrNew('ge')->title;
            $this->title_az = $scategory->translateOrNew('az')->title;
            $this->title_en = $scategory->translateOrNew('en')->title;

            $this->short_description_ge = $scategory->translateOrNew('ge')->short_description;
            $this->short_description_az = $scategory->translateOrNew('az')->short_description;
            $this->short_description_en = $scategory->translateOrNew('en')->short_description;

        }
        else
        {
            $this->category_slug = $slug;
            $category = Category::where('slug', $slug)->first();
            $this->category_id = $category->id;
            $this->user_id = Auth::id();

            $this->status = $category->status;
            $this->image = $category->image;

            $this->title_ge = $category->translateOrNew('ge')->title;
            $this->title_az = $category->translateOrNew('az')->title;
            $this->title_en = $category->translateOrNew('en')->title;

            $this->short_description_ge = $category->translateOrNew('ge')->short_description;
            $this->short_description_az = $category->translateOrNew('az')->short_description;
            $this->short_description_en = $category->translateOrNew('en')->short_description;
        }

    }

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

            'slug' => 'required|string',
            'newImage' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'title_ge' => 'required|string',
            'title_az' => 'required|string',
            'title_en' => 'required|string',

            'short_description_ge' => 'nullable|string',
            'short_description_az' => 'nullable|string',
            'short_description_en' => 'nullable|string',

            'slug' => 'required|string',
            'newImage' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if($this->scategory_id)
        {
            $scategory = SubCategory::find($this->scategory_id);
            $scategory->user_id = Auth::id();
            $scategory->slug = $this->slug;
            $scategory->status = $this->status;
            $scategory->image = $this->image;
            $scategory->category_id = $this->category_id;
            $scategory->translateOrNew('ge')->title = $this->title_ge;
            $scategory->translateOrNew('az')->title = $this->title_az;
            $scategory->translateOrNew('en')->title = $this->title_en;
            $scategory->translateOrNew('ge')->short_description = $this->short_description_ge;
            $scategory->translateOrNew('az')->short_description = $this->short_description_az;
            $scategory->translateOrNew('en')->short_description = $this->short_description_en;

            if ($this->newImage)
            {
                // Удаление старого изображения
                $oldImagePath = storage_path('app/public/sub-categories/' . $scategory->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                // Загрузка нового изображения
                $imageName = time() . '-updated.' . $this->newImage->getClientOriginalExtension();
                $newImage = ImageManager::gd()->read($this->newImage->getRealPath());
                $newImage->cover(438, 600);
                $newImage->save(storage_path('app/public/sub-categories/' . $imageName), 100);
                $scategory->image = $imageName;
            }

            $scategory->save();
        }
        else
        {
            $category = Category::find($this->category_id);
            $category->user_id = Auth::id();
            $category->slug = $this->slug;
            $category->status = $this->status;
            $category->image = $this->image;
            $category->translateOrNew('ge')->title = $this->title_ge;
            $category->translateOrNew('az')->title = $this->title_az;
            $category->translateOrNew('en')->title = $this->title_en;
            $category->translateOrNew('ge')->short_description = $this->short_description_ge;
            $category->translateOrNew('az')->short_description = $this->short_description_az;
            $category->translateOrNew('en')->short_description = $this->short_description_en;

            if ($this->newImage)
            {
                // Удаление старого изображения
                $oldImagePath = storage_path('app/public/categories/' . $category->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                // Загрузка нового изображения
                $imageName = time() . '-updated.' . $this->newImage->getClientOriginalExtension();
                $newImage = ImageManager::gd()->read($this->newImage->getRealPath());
                $newImage->cover(438, 600);
                $newImage->save(storage_path('app/public/categories/' . $imageName), 100);
                $category->image = $imageName;
            }

            $category->save();
        }

        // Удаление временной директории
        File::deleteDirectory(storage_path('app/public/livewire-tmp'));

        if($this->category_id)
        {
            session()->flash('success', 'Updated SubCategory');
        }
        else
        {
            session()->flash('success', 'Updated Category');
        }
        return redirect()->route('back.categories');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.back.categories.edit-category-component', compact(
            'categories',
        ));
    }
}
