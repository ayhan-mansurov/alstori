<?php

namespace App\Livewire\Back\Products;

use App\Models\Product\Product;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    public $search;

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $productImagePath = storage_path('app/public/products/' . $product->image);
        if (File::exists($productImagePath)) {
            File::delete($productImagePath);
        }

        $product->images = explode(',', $product->images);
        foreach($product->images as $gImage)
        {
            $productGImagePath = storage_path('app/public/products/gallery/' . $gImage);
        if (File::exists($productGImagePath)) {
            File::delete($productGImagePath);
        }
        }

        $product->delete();
        session()->flash('success','Deleted');
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.back.products.product-component', compact(
            'products',
        ));
    }
}
