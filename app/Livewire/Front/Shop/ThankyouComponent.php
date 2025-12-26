<?php

namespace App\Livewire\Front\Shop;

use App\Models\Shopping\Order;
use App\Models\Shopping\OrderItem;
use Carbon\Carbon;
use Livewire\Component;

class ThankyouComponent extends Component
{
    public function render()
    {
        $currentDate = Carbon::now()->toDateString();
        $order = Order::latest('id')->first();
        return view('livewire.front.shop.thankyou-component', compact(
            'currentDate',
            'order',
        ));
    }
}
