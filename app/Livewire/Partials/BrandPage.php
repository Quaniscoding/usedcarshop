<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Brand;
class BrandPage extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active', 1)->get();
        return view('livewire.partials.brand-page', [
            'brands' => $brands
        ]);
    }
}