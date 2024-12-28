<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OriginResource\Pages;
use App\Filament\Resources\OriginResource\RelationManagers;
use App\Models\Origin;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class OriginResource extends Resource
{
    protected static ?string $model = Origin::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';

    public static function form(Form $form): Form
    {
        $countries = Cache::remember('countries_list', now()->addDays(7), function () {
            $response = Http::timeout(60)->get('https://restcountries.com/v3.1/all?fields=name');
            return $response->successful() ? $response->json() : [];
        });

        $options = collect($countries)->mapWithKeys(fn($country) => [
            $country['name']['common'] => $country['name']['common']
        ])->toArray();
        return $form
            ->schema([
                Section::make([
                    Grid::make()
                        ->schema([
                            Select::make('name')
                                ->required()
                                ->options($options)
                                ->searchable()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                            TextInput::make('slug')
                                ->maxLength(255)
                                ->disabled()
                                ->required()
                                ->dehydrated()
                                ->unique(Origin::class, 'slug', ignoreRecord: true),
                        ]),
                ])
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListOrigins::route('/'),
            'create' => Pages\CreateOrigin::route('/create'),
            'edit' => Pages\EditOrigin::route('/{record}/edit'),
        ];
    }
}