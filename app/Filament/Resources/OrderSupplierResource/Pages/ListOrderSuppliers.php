<?php

namespace App\Filament\Resources\OrderSupplierResource\Pages;

use App\Filament\Resources\OrderSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderSuppliers extends ListRecords
{
    protected static string $resource = OrderSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
