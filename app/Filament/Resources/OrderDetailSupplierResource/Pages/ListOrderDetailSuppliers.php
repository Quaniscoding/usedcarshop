<?php

namespace App\Filament\Resources\OrderDetailSupplierResource\Pages;

use App\Filament\Resources\OrderDetailSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderDetailSuppliers extends ListRecords
{
    protected static string $resource = OrderDetailSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
