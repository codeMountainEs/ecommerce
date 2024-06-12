<?php

namespace App\Livewire;

use App\Helpers\CartManagemet;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


#[Title('Product Detail - Ecommerce')]
class ProductDetailPage extends Component
{
    use LivewireAlert;
    public $slug;
    public $quantity = 1;


    public function mount($slug) {
        $this->slug = $slug;

    }

    public function increaseQty(){
            $this->quantity ++ ;

    }
    public function decreaseQty(){
        if($this->quantity > 1){
            $this->quantity -- ;
        }
    }

    // add product to cart method with qty
    public function addToCart($product_id){
        $total_count = CartManagemet::addItemToCartWithQty($product_id, $this->quantity);

        $this->alert('success', 'Product added to cart successfully!', [
            'position' =>  'bottom-end',
            'timer' =>  3000,
            'toast' =>  true,
        ]);
        $this->dispatch('update-cart-count', total_count : $total_count)->to(Navbar::class);

       // dd('add to cart successfully');

    }

    public function render()
    {
        //dd($this->slug);
        return view('livewire.product-detail-page',
            [
                'product' => Product::where('slug', $this->slug)->firstOrFail(),
            ]);
    }
}
