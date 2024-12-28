<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Product Information')->schema(
                        [
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                    if ($operation !== 'create') {
                                        return;
                                    }
                                    $set('slug', Str::slug($state));
                                }),
                            TextInput::make('slug')
                                ->required()
                                ->maxLength(255)
                                ->disabled()
                                ->dehydrated()
                                ->unique(Product::class, 'slug', ignoreRecord: true),
                            ColorPicker::make('color')
                                ->required()
                                ->label('Car Colors')
                                ->placeholder('#FFFFFF'),
                            TextInput::make('year')
                                ->numeric()
                                ->minValue(2000)
                                ->maxValue(2024)
                                ->required()
                                ->label('Manufactured year'),
                            Select::make('origin_id')
                                ->required()
                                ->label('Made in')
                                ->searchable()
                                ->preload()
                                ->relationship('origin', 'name'),
                            Select::make('location_id')
                                ->required()
                                ->label('Selling location')
                                ->searchable()
                                ->preload()
                                ->relationship('location', 'name'),
                            TextInput::make('number_km')
                                ->numeric()
                                ->required()
                                ->label('Number of kilometers traveled'),
                            Select::make('fuel')
                                ->required()
                                ->options([
                                    'gasoline' => 'Gasoline',
                                    'oil' => 'Oil',
                                    'electricity' => 'Electricity',
                                    'hybrid' => 'Hybrid',
                                    'hybrid plug-in' => 'Hybrid plug-in',
                                    'other' => 'Other'
                                ]),
                            Select::make('gearbox')
                                ->required()
                                ->options([
                                    'number of floors' => 'Number of floors',
                                    'automatic number' => 'Automatic number',
                                    'other' => 'Other'
                                ]),
                            Select::make('number_seats')
                                ->required()
                                ->options([
                                    4 => 4,
                                    5 => 5,
                                    6 => 6,
                                    7 => 7,
                                    8 => 8,
                                    9 => 9,
                                ]),
                            MarkdownEditor::make('description')
                                ->required()
                                ->columnSpanFull()
                                ->fileAttachmentsDirectory('products')
                        ]
                    )->columns(2),
                    Section::make('Images')->schema([
                        FileUpload::make('images')
                            ->multiple()
                            ->directory('products')
                            ->maxFiles(5)
                            ->reorderable()
                    ])
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Price')->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('USD'),
                    ]),
                    Section::make('Associations')->schema([
                        Select::make('brand_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('brand', 'name'),
                        Select::make('design_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('design', 'name'),
                    ]),
                    Section::make('Status')->schema([
                        Toggle::make('in_stock')
                            ->required()
                            ->default(true),
                        Toggle::make('is_sold')
                            ->required(),
                        Toggle::make('is_active')
                            ->required()
                            ->default(true),
                        Toggle::make('is_featured')
                            ->required(),
                        Toggle::make('on_sale')
                            ->required(),

                    ])
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('category.name')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('in_stock')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_sold')
                    ->boolean(),
                Tables\Columns\IconColumn::make('on_sale')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('brand')
                    ->relationship('brand', 'name'),
                SelectFilter::make('origin')
                    ->relationship('origin', 'name'),
                SelectFilter::make('design')
                    ->relationship('design', 'name'),
                SelectFilter::make('location')
                    ->relationship('location', 'name'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}