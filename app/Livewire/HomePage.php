<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home page - UsedCarShop')]
class HomePage extends Component
{
    public function render()
    {
        // $brands = Brand::where('is_active', 1)->get();
        // return view('livewire.home-page', [
        //     'brands' => $brands
        // ]);
        return view('livewire.home-page');
    }
}