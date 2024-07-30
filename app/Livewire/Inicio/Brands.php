<?php

namespace App\Livewire\Inicio;

use App\Models\Brand;
use Livewire\Component;

class Brands extends Component
{



    public function render()
    {
        $brands = Brand::where('is_active', '1')->get();

        return view('livewire.inicio.brands');
    }
}
