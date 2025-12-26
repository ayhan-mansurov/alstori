<?php

namespace App\Livewire\Back\Categories;

use App\Models\Category\Category;
use App\Models\SubCategory\SubCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class CategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $sub_categories = SubCategory::where('category_id', $category->id)->get();

        $categoryImagePath = storage_path('app/public/categories/' . $category->image);
        if (File::exists($categoryImagePath)) {
            File::delete($categoryImagePath);
        }

        foreach($sub_categories as $item)
        {
            $subCategoryImagePath = storage_path('app/public/sub-categories/' . $item->image);
            if (File::exists($subCategoryImagePath)) {
                File::delete($subCategoryImagePath);
            }
        }

        $category->delete();
        session()->flash('success', 'Deleted Category');
    }

    public function deleteSubCategory($id)
    {
        $scategory = SubCategory::find($id);
        $subCategoryImagePath = storage_path('app/public/sub-categories/' . $scategory->image);
        if (File::exists($subCategoryImagePath)) {
            File::delete($subCategoryImagePath);
        }

        // foreach($products as $item)
        // {
        //     $productsImagePath = storage_path('app/public/products/' . $item->image);
        //     if (File::exists($productsImagePath)) {
        //         File::delete($productsImagePath);
        //     }
        // }

        $scategory->delete();

        session()->flash('success', 'Deleted SubCategory');

        return redirect()->route('back.categories');
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.back.categories.category-component', [
            'categories' => $categories,
        ]);
    }
}
