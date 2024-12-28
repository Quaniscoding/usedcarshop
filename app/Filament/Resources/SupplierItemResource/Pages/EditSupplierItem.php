<?php

namespace App\Filament\Resources\SupplierItemResource\Pages;

use App\Filament\Resources\SupplierItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplierItem extends EditRecord
{
    protected static string $resource = SupplierItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
