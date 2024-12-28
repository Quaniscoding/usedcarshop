<?php

namespace App\Filament\Resources\OrderInvoiceResource\Pages;

use App\Filament\Resources\OrderInvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderInvoice extends EditRecord
{
    protected static string $resource = OrderInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
