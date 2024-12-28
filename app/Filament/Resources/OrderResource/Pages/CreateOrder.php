<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
    protected function afterCreate(): void
    {
        $order = $this->record;
        foreach ($order->items as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $product->update([
                    'in_stock' => false,
                    'is_sold' => true,
                ]);
            }
        }
    }
}