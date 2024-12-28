<section class="py-20">
    <div class="text-center mb-12">
        <h1 class="text-5xl font-bold">Browse Popular <span class="text-blue-500">Car Brands</span></h1>
        <p class="text-gray-500">Discover the most iconic car brands worldwide.</p>
    </div>
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @foreach ($brands as $brand)
                    <li class="glide__slide" wire:key="{{ $brand->id }}">
                        <a href="/products?selected_brands[0]={{ $brand->id }}">
                            <img src="http://usedcarshop.test/storage/{{$brand->image}}" alt="{{ $brand->name }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>