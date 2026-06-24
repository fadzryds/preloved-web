<?php

namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Forms;

class ProductForm
{
    public static function schema(): array
    {
        return [

            Forms\Components\TextInput::make('name')
                ->required(),

            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),

            Forms\Components\Textarea::make('description'),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('products')
                ->visibility('public')
                ->preserveFilenames(),

            Forms\Components\TextInput::make('price')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('discount_price')
                ->numeric(),

            Forms\Components\TextInput::make('size'),

            Forms\Components\TextInput::make('condition'),

            Forms\Components\TextInput::make('stock')
                ->numeric(),

            Forms\Components\Toggle::make('is_featured'),

        ];
    }
}