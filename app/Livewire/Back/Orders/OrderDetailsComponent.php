<?php

namespace App\Livewire\Back\Orders;

use App\Models\Shopping\Order;
use Livewire\Component;

class OrderDetailsComponent extends Component
{
    public $id;

    public function mount($id)
    {
        $this->$id = $id;
    }

    public function render()
    {
        $order = Order::find($this->id);
        return view('livewire.back.orders.order-details-component', compact(
            'order',
        ));
    }
}
