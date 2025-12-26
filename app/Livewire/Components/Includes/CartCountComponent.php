<?php

namespace App\Livewire\Components\Includes;

use Livewire\Attributes\On;
use Livewire\Component;

class CartCountComponent extends Component
{
    #[On('cart-count-component')]

    public function render()
    {
        return view('livewire.components.includes.cart-count-component');
    }
}
