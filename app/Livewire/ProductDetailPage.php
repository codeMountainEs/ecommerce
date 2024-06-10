<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;


#[Title('Product Detail - Ecommerce')]
class ProductDetailPage extends Component
{
    public $slug;
    public function mount($slug) {
        $this->slug = $slug;

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
