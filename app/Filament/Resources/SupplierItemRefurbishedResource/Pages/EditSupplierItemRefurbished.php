<?php

namespace App\Filament\Resources\SupplierItemRefurbishedResource\Pages;

use App\Filament\Resources\SupplierItemRefurbishedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplierItemRefurbished extends EditRecord
{
    protected static string $resource = SupplierItemRefurbishedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
