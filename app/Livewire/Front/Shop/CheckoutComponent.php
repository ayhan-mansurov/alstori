<?php

namespace App\Livewire\Front\Shop;

use App\Models\Product\Product;
use App\Models\Shopping\Order;
use App\Models\Shopping\OrderItem;
use App\Models\Shopping\Shipping;
use App\Models\Shopping\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $is_shipping_different;

    public $firstname;
    public $lastname;
    public $company;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_company;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public $order_code;
    public $paymentmode = 'cod';
    public $thankyou;

    private function generateOrderNumber()
    {
        // Логика для генерации уникального номера заказа,
        // например, случайное число с проверкой на уникальность
        $order_code = mt_rand(1000000, 9999999); // Генерация случайного числа

        // Проверка на уникальность номера заказа в базе данных
        while (Order::where('order_code', $order_code)->exists()) {
            $order_code = mt_rand(1000000, 9999999);
        }

        return $order_code;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'nullable',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'line2' => 'nullable',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if($this->is_shipping_different)
        {
            $this->validateOnly($fields, [
                'firstname' => 'required',
                'lastname' => 'required',
                'company' => 'nullable',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'nullable',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'nullable',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'line2' => 'nullable',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->company = $this->company;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $this->order_code = $this->generateOrderNumber();
        $order->order_code = $this->order_code;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->is_shipping_different ? 1 : 0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;

            $product = Product::find($item->id);
            $cal = $product->quantity - $orderItem->quantity;
            $product->quantity = $cal;
            if($product->quantity == 0)
            {
                $product->stock = 'inactive';
            }
            $product->save();

            $orderItem->save();
        }

        if($this->is_shipping_different)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_company' => 'nullable',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_line2' => 'nullable',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->company = $this->s_company;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }

        if($this->paymentmode === 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::id();
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        $this->verifyForCheckout();
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {

            return redirect()->route('login');
        }
        else if($this->thankyou)
        {

            return redirect()->route('app.shop.thankyou');

        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('app.shop.cart');
        }
    }

    public function render()
    {
        $cartProducts = Cart::instance('cart')->content();
        return view('livewire.front.shop.checkout-component', compact(
            'cartProducts',
        ));
    }
}
