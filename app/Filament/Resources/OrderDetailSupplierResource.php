<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderDetailSupplierResource\Pages;
use App\Filament\Resources\OrderDetailSupplierResource\RelationManagers;
use App\Models\OrderDetailSupplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderDetailSupplierResource extends Resource
{
    protected static ?string $model = OrderDetailSupplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderDetailSuppliers::route('/'),
            'create' => Pages\CreateOrderDetailSupplier::route('/create'),
            'edit' => Pages\EditOrderDetailSupplier::route('/{record}/edit'),
        ];
    }
}
