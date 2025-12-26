<?php

namespace App\Livewire\Components;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\SubCategory\SubCategory;
use Livewire\Component;

class FilterOffcanvasAreaComponent extends Component
{
    public function render()
    {
        $categories = Category::where('status', 'active')->get();

        return view('livewire.components.filter-offcanvas-area-component', compact(
            'categories',
        ));
    }
}
