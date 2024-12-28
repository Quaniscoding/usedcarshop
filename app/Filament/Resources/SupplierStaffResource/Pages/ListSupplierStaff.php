<?php

namespace App\Filament\Resources\SupplierStaffResource\Pages;

use App\Filament\Resources\SupplierStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupplierStaff extends ListRecords
{
    protected static string $resource = SupplierStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
