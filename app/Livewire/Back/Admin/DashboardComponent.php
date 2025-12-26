<?php

namespace App\Livewire\Back\Admin;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\SubCategory\SubCategory;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $products = Product::get();
        return view('livewire.back.admin.dashboard-component', compact(
            'categories',
            'subcategories',
            'products',
        ));
    }
}
