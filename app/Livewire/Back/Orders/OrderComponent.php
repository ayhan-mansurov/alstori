<?php

namespace App\Livewire\Back\Orders;

use App\Models\Shopping\Order;
use Carbon\Carbon;
use Livewire\Component;

class OrderComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == 'delivered')
        {
            $order->delivered_date = Carbon::now();
        }
        else if($status == 'ordered')
        {
            $order->created_at = $order->created_at;
        }
        else if($status == 'canceled')
        {
            $order->canceled_date = Carbon::now();
        }
        else if($status == 'return')
        {
            $order->return_date = Carbon::now();
        }
        $order->save();
        session()->flash('success', 'Status updated');
    }

    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(100);
        return view('livewire.back.orders.order-component', compact(
            'orders',
        ));
    }
}
