<?php

namespace App\Filament\Resources\OrderInvoiceResource\Pages;

use App\Filament\Resources\OrderInvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderInvoices extends ListRecords
{
    protected static string $resource = OrderInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
