<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('Products - Ecommerce')]
class ProductsPage extends Component
{
    use WithPagination ,LivewireAlert;



    // add product to cart method
    public function addToCart($product_id){
       $total_count = CartManagement::addItemToCart($product_id);
       $this->dispatch('update-cart-count', total_count : $total_count)->to(Navbar::class);

       $this->alert('success', 'Product added to cart successfully!', [
          'position' =>  'bottom-end',
          'timer' =>  3000,
          'toast' =>  true,
       ]);

    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);

       //dd($productQuery);
        return view('livewire.products-page',[
            'products'=>$productQuery->paginate(2),
            'brands'=> Brand::where('is_active',1)->get(['id','name','slug']),
            'categories'=> Category::where('is_active',1)->get(['id','name','slug']),

        ]);
    }
}
