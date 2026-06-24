<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use Filament\Forms;

class CategoryForm
{
    public static function schema(): array
    {
        return [

            Forms\Components\TextInput::make('name')
                ->required(),

            Forms\Components\TextInput::make('slug')
                ->required(),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('categories')
                ->visibility('public')
                ->preserveFilenames(),

        ];
    }
}