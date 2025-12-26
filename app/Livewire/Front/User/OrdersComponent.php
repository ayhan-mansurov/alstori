<?php

namespace App\Livewire\Front\User;

use App\Models\Shopping\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrdersComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at','DESC')->paginate(2);
        return view('livewire.front.user.orders-component', compact(
            'orders',
        ));
    }
}
