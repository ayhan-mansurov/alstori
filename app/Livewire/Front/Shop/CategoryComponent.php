<?php

namespace App\Livewire\Front\Shop;

use App\Models\Category\Category;
use App\Models\SubCategory\SubCategory;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $slug;

    public function render()
    {
        $category = Category::where('slug', $this->slug)->first();
        $scategories = SubCategory::where('status', 'active')->where('category_id', $category->id)->orderBy('updated_at', 'DESC')->paginate(12);
        return view('livewire.front.shop.category-component', compact(
            'scategories',
            'category',
        ));
    }
}
