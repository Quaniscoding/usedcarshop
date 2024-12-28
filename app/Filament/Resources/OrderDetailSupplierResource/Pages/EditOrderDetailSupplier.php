<?php

namespace App\Filament\Resources\OrderDetailSupplierResource\Pages;

use App\Filament\Resources\OrderDetailSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderDetailSupplier extends EditRecord
{
    protected static string $resource = OrderDetailSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
