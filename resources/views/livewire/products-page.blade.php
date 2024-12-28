<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full lg:w-1/4 rounded-xl border-black shadow-slate-50 border-2 p-2">
                    <!-- Filter Header -->
                    <h2 class="mb-4 text-2xl font-bold text-center">Filters</h2>
                    <!-- Filter: Brand -->
                    <div class="mb-6 shadow-sm">
                        <button
                            class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 flex items-center justify-between"
                            wire:click="$toggle('showBrands')">
                            <div class="w-[21px]">
                                <img alt="" src="https://www.carmudi.vn/images/xe-oto/svg/brand.svg" decoding="async"
                                    data-nimg="1" loading="lazy" style="color:transparent">
                            </div>
                            <span>Brands</span>
                            <span>
                                @if ($showBrands)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </span>
                        </button>
                        @if ($showBrands)
                            <div x-data="{ open: @entangle('showBrands') }" x-show="open"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-y-0"
                                x-transition:enter-end="opacity-100 scale-y-100"
                                x-transition:leave="transition ease-in duration-300 transform"
                                x-transition:leave-start="opacity-100 scale-y-100"
                                x-transition:leave-end="opacity-0 scale-y-0" class="p-4">
                                <ul>
                                    @foreach ($brands as $brand)
                                        <li class="flex items-center mb-2">
                                            <label class="dark:text-white mr-2"
                                                for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                            <input type="checkbox" id="brand-{{ $brand->id }}" wire:model.live="selected_brands"
                                                value="{{ $brand->id }}" class="w-4 h-4">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- Filter: Location -->
                    <div class="mb-6 shadow-sm">
                        <button
                            class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 flex items-center justify-between"
                            wire:click="$toggle('showLocations')">
                            <div class="w-[21px]">
                                <img alt="" src="https://www.carmudi.vn/images/xe-oto/svg/location.svg" decoding="async"
                                    data-nimg="1" loading="lazy" style="color:transparent">
                            </div>
                            <span>Location</span>
                            <span>
                                @if ($showLocations)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </span>
                        </button>
                        @if ($showLocations)
                            <div x-data="{ open: @entangle('showLocations') }" x-show="open"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-y-0"
                                x-transition:enter-end="opacity-100 scale-y-100"
                                x-transition:leave="transition ease-in duration-300 transform"
                                x-transition:leave-start="opacity-100 scale-y-100"
                                x-transition:leave-end="opacity-0 scale-y-0" class="p-4">
                                <ul>
                                    @foreach ($locations as $location)
                                        <li class="flex items-center mb-2">
                                            <label class="dark:text-white mr-2"
                                                for="location-{{ $location->id }}">{{ $location->name }}</label>
                                            <input type="checkbox" id="location-{{ $location->id }}"
                                                wire:model.live="selected_locations" value="{{ $location->id }}"
                                                class="w-4 h-4">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- Filter: Design -->
                    <div class="mb-6 shadow-sm">
                        <button
                            class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 flex items-center justify-between"
                            wire:click="$toggle('showDesigns')">
                            <div class="w-[21px]"><img alt=""
                                    src="https://www.carmudi.vn/images/xe-oto/svg/bodyType.svg" decoding="async"
                                    data-nimg="1" loading="lazy" style="color:transparent"></div>
                            <span>Designs</span>
                            <span>
                                @if ($showDesigns)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </span>
                        </button>
                        @if ($showDesigns)
                            <div x-data="{ open: @entangle('showDesigns') }" x-show="open"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-y-0"
                                x-transition:enter-end="opacity-100 scale-y-100"
                                x-transition:leave="transition ease-in duration-300 transform"
                                x-transition:leave-start="opacity-100 scale-y-100"
                                x-transition:leave-end="opacity-0 scale-y-0"
                                class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                                @foreach ($designs as $design)
                                    <div
                                        class="flex flex-col items-center bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow-md">
                                        <img src="http://usedcarshop.test/storage/{{$design->image}}" alt="{{ $design->slug }}"
                                            class="object-cover mb-3 rounded-full">
                                        <label for="design-{{ $design->id }}"
                                            class="text-gray-800 dark:text-white text-sm font-medium">
                                            {{ $design->name }}
                                        </label>
                                        <input type="checkbox" id="design-{{ $design->id }}" wire:model.live="selected_designs"
                                            value="{{ $design->id }}"
                                            class="mt-2 w-5 h-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- Filter: Price -->
                    <div class="mb-6 shadow-sm">
                        <button
                            class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 flex items-center justify-between"
                            wire:click="$toggle('showPrice')">
                            <div class="w-[21px]">
                                <img alt="" src="https://www.carmudi.vn/images/xe-oto/svg/price.svg" decoding="async"
                                    data-nimg="1" loading="lazy" style="color:transparent">
                            </div>
                            <span>Price</span>
                            <span>
                                @if ($showPrice)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </span>
                        </button>
                        @if ($showPrice)
                            <div x-data="{ open: @entangle('showPrice') }" x-show="open"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-y-0"
                                x-transition:enter-end="opacity-100 scale-y-100"
                                x-transition:leave="transition ease-in duration-300 transform"
                                x-transition:leave-start="opacity-100 scale-y-100"
                                x-transition:leave-end="opacity-0 scale-y-0" class="p-4">
                                <input type="range" min="{{$min_price}}" max="{{$max_price}}" step="1000"
                                    wire:model.live="price_range"
                                    class="w-full h-1 bg-gray-200 rounded cursor-pointer dark:bg-gray-700">
                                <div class="flex justify-between mt-2">
                                    <span>Min: ${{ number_format($min_price, 0) }}</span>
                                    <input type="number" min="{{ $min_price }}" max="{{ $max_price }}"
                                        wire:model.live="price_range"
                                        class="w-14 bg-gray-200 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                    <span>Max: ${{ number_format($max_price, 0) }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- Filter: Years -->
                    <div class="mb-6 shadow-sm">
                        <button
                            class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 flex items-center justify-between"
                            wire:click="$toggle('showYear')">
                            <div class="w-[21px]">
                                <img alt="" src="https://www.carmudi.vn/images/xe-oto/svg/year.svg" decoding="async"
                                    data-nimg="1" loading="lazy" style="color:transparent">
                            </div>
                            <span>Years</span>
                            <span>
                                @if ($showYear)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </span>
                        </button>
                        @if ($showYear)
                            <div x-data="{ open: @entangle('showYear') }" x-show="open"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-y-0"
                                x-transition:enter-end="opacity-100 scale-y-100"
                                x-transition:leave="transition ease-in duration-300 transform"
                                x-transition:leave-start="opacity-100 scale-y-100"
                                x-transition:leave-end="opacity-0 scale-y-0" class="p-4">
                                <input type="range" min="{{ $min_year}}" max="{{ $max_year}}" step="1"
                                    wire:model.live="year_range"
                                    class="w-full h-1 bg-gray-200 rounded cursor-pointer dark:bg-gray-700">
                                <div class="flex justify-between mt-2 items-center">
                                    <span class="text-gray-700 dark:text-gray-300">Min: {{ $min_year }}</span>
                                    <input type="number" min="{{ $min_year }}" max="{{ $max_year }}"
                                        wire:model.live="year_range"
                                        class="w-14 bg-gray-200 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                    <span class="text-gray-700 dark:text-gray-300">Max: {{ $max_year }}</span>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div
                            class="items-center justify-between hidden px-3 py-2 bg-gray-100 md:flex dark:bg-gray-900 ">
                            <div class="flex items-center justify-between">
                                <select wire:model.live="sort"
                                    class="block w-40 text-base bg-gray-100 cursor-pointer dark:text-gray-400 dark:bg-gray-900">
                                    <option value="latest">Sort by latest</option>
                                    <option value="price">Sort by Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center ">
                        @foreach ($products as $product)
                            <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $product->id }}">
                                <div class="border border-gray-300 dark:border-gray-700">
                                    <div class="relative bg-gray-200">
                                        <a href="/products/{{ $product->slug }}" class="">
                                            <img src="http://usedcarshop.test/storage/{{$product->images[0]}}"
                                                alt=" {{ $product->name }}" class="object-cover w-full h-56 mx-auto ">
                                        </a>
                                    </div>
                                    <div class="p-3 ">
                                        <div class="flex items-center justify-between gap-2 mb-2">
                                            <h3 class="text-xl font-medium dark:text-gray-400">
                                                {{ $product->name }}
                                            </h3>
                                        </div>
                                        <p class="text-lg ">
                                            <span
                                                class="text-green-600 dark:text-green-600">{{ Number::currency($product->price, 'USD') }}</span>
                                        </p>
                                    </div>
                                    <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">
                                        <a wire:click.prevent='addToCart({{ $product->id }})' href="#"
                                            class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                </path>
                                            </svg><span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add
                                                to Cart</span> <span wire:loading
                                                wire:target='addToCart({{ $product->id }})'>Adding...</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- pagination start -->
                    @if ($products->hasPages())
                        <nav class="flex items-center justify-between mt-4 space-x-2" role="navigation"
                            aria-label="Pagination Navigation">
                            <!-- Previous Button -->
                            @if ($products->onFirstPage())
                                <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                                    Previous
                                </span>
                            @else
                                <button wire:click="previousPage" wire:loading.attr="disabled"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Previous
                                </button>
                            @endif

                            <div>
                                <!-- Page Numbers -->
                                @foreach ($products->links()->elements[0] as $page => $url)
                                    @if ($page == $products->currentPage())
                                        <span class="px-4 py-2 m-2 text-white bg-blue-600 rounded-md">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <button wire:click="gotoPage({{ $page }})"
                                            class="px-4 py-2 m-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            {{ $page }}
                                        </button>
                                    @endif
                                @endforeach

                            </div>
                            <!-- Next Button -->
                            @if ($products->onLastPage())
                                <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                                    Next
                                </span>
                            @else
                                <button wire:click="nextPage" wire:loading.attr="disabled"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Next
                                </button>
                            @endif
                        </nav>
                    @endif

                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </section>
</div>