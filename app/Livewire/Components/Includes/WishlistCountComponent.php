<?php

namespace App\Livewire\Components\Includes;

use Livewire\Attributes\On;
use Livewire\Component;

class WishlistCountComponent extends Component
{
    #[On('wishlist-count-component')]

    public function render()
    {
        return view('livewire.components.includes.wishlist-count-component');
    }
}
