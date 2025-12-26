<?php

namespace App\Livewire\Components;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Livewire\Component;

class SearchAreaComponent extends Component
{
    public $search;
    public $category_id;

    public function mount()
    {
        $this->fill(request()->only('search', 'category_id'));
    }

    public function changeCategoryId()
    {
        $this->category_id;
    }

    public function render()
    {
        $categories = Category::where('status', 'active')->orderBy('updated_at', 'DESC')->get();
        return view('livewire.components.search-area-component', compact(
            'categories',
        ));
    }
}
