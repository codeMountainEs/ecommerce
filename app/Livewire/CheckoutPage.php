<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

use App\Helpers\CartManagement;


#[Title('Checkout')]

class CheckoutPage extends Component
{
    public $first_name, $last_name, $email, $phone, $street_address, $city, $state, $zip_code, $payment_method;

    public function placeOrder(){

        $this->validate([
           'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'payment_method' => 'required',
        ]);

    }
    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);

        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
        ]);
    }
}
