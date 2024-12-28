<?php

namespace App\Filament\Resources\SupplierItemResource\Pages;

use App\Filament\Resources\SupplierItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupplierItems extends ListRecords
{
    protected static string $resource = SupplierItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
