<?php

namespace App\Filament\Resources\OrderSupplierInvoiceResource\Pages;

use App\Filament\Resources\OrderSupplierInvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderSupplierInvoice extends EditRecord
{
    protected static string $resource = OrderSupplierInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
