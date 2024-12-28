<?php

namespace App\Filament\Resources\SupplierStaffResource\Pages;

use App\Filament\Resources\SupplierStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplierStaff extends EditRecord
{
    protected static string $resource = SupplierStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
