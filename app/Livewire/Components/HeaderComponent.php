<?php

namespace App\Livewire\Components;

use App\Models\Category\Category;
use App\Models\Shopping\Order;
use Livewire\Component;

class HeaderComponent extends Component
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
        $menu_categories = Category::where('status', 'active')->orderBy('updated_at', 'DESC')->get();
        $ordered_orders = Order::where('status', 'ordered')->get();
        return view('livewire.components.header-component', compact(
            'categories',
            'menu_categories',
            'ordered_orders',
        ));
    }
}
