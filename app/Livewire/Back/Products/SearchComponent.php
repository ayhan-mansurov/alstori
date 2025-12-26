<?php

namespace App\Livewire\Back\Products;

use App\Models\Product\Product;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search;

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function render()
    {
        if($this->search)
        {
            $s_products = Product::where('status', 'active')->whereHas('translations', function($query) {
                $query->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('short_description', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%")
                ->orWhere('SKU', 'like', "%{$this->search}%");
            })->orderBy('created_at', 'DESC')->paginate(10);

            $this->reset();

            return view('livewire.back.products.search-component', compact(
                's_products',
            ));


        }
    }
}
