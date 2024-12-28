<?php

namespace App\Filament\Resources\CustomerStaffResource\Pages;

use App\Filament\Resources\CustomerStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerStaff extends EditRecord
{
    protected static string $resource = CustomerStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
