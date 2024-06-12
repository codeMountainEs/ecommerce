<?php

namespace App\Livewire;

use App\Helpers\CartManagemet;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cart - Ecommerce')]
class CartPage extends Component
{
    public $cart_items = [];
    public $grand_total;

    public function mount(){
        $this->cart_items = CartManagemet::getCartItemsFromCookie();
        $this->grand_total = CartManagemet::calculateGrandTotal($this->cart_items);
    }

    public function removeItem($product_id){
        $this->cart_item = CartManagemet::removeCartItem($product_id);
        $this->grand_total = CartManagemet::calculateGrandTotal($this->cart_items);
        $this->dispatch('update-cart-count', total_count: count($this->cart_item));
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
