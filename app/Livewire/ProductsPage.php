<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Design;
use App\Models\Location;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products - UsedShopCar')]
class ProductsPage extends Component
{
    use LivewireAlert;
    use WithPagination;

    // Các thuộc tính URL
    #[Url]
    public $selected_designs = [];
    #[Url]
    public $selected_brands = [];
    #[Url]
    public $selected_locations = [];
    #[Url]
    public $year_range = 2024;
    #[Url]
    public $featured = false;
    #[Url]
    public $on_sale = false;
    #[Url]
    public $price_range = 70000;
    #[Url]
    public $sort = 'latest';
    public $designs = [];
    public $brands = [];
    public $locations = [];
    public $origin = [];
    public $fuel = [];
    public $gearbox = [];
    public $color = [];
    public $number_of_seats = [];
    public $showDesigns = false;
    public $showBrands = false;
    public $showLocations = false;
    public $showPrice = false;
    public $showYear = false;
    public $expandedDesign = null;
    public $min_price = 0;
    public $max_price = 100000;
    public $min_year = 2000;
    public $max_year = 2024;
    public function mount()
    {
        $this->designs = Design::where('is_active', 1)->get(['id', 'name', 'slug']);
        $this->brands = Brand::where('is_active', 1)->get(['id', 'name', 'slug', 'image']);
        $this->locations = Location::get(['id', 'name', 'slug']);
    }

    public function addToCart($product_id)
    {
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', ['total_count' => $total_count])->to(Navbar::class);
        $this->alert('success', 'Product added to the cart successfully!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true
        ]);
    }

    public function toggleDesign($designId)
    {
        $this->expandedDesign = $this->expandedDesign === $designId ? null : $designId;
    }

    public function render()
    {
        $productsQuery = Product::query()->where('is_active', 1);

        if (!empty($this->selected_designs)) {
            $productsQuery->whereIn('design_id', $this->selected_designs);
        }

        if (!empty($this->selected_brands)) {
            $productsQuery->whereIn('brand_id', $this->selected_brands);
        }
        if (!empty($this->selected_locations)) {
            $productsQuery->whereIn('location_id', $this->selected_locations);
        }
        if ($this->price_range) {
            $productsQuery->whereBetween('price', [0, $this->price_range]);
        }
        if ($this->year_range) {
            $productsQuery->whereBetween('year', [0, $this->year_range]);
        }
        if ($this->min_price !== null && $this->max_price !== null) {
            $productsQuery->whereBetween('price', [$this->min_price, $this->max_price]);
        }

        // Sắp xếp
        if ($this->sort == 'latest') {
            $productsQuery->latest();
        } elseif ($this->sort == 'price') {
            $productsQuery->orderBy('price');
        }

        return view('livewire.products-page', [
            'products' => $productsQuery->paginate(6),
            'brands' => $this->brands,
            'designs' => $this->designs,
            'locations' => $this->locations,
            'origins' => $this->origin,
            // 'fuels' => $this->fuel,
            // 'gearboxs' => $this->gearbox,
            // 'color' => $this->color,
            // 'number_of_seats' => $this->number_of_seats,
        ]);
    }


}