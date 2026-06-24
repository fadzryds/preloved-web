<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms;

class UserForm
{
    public static function schema(): array
    {
        return [

            Forms\Components\TextInput::make('name')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('password')
                ->password(),

            Forms\Components\Select::make('role')
                ->options([
                    'admin' => 'Admin',
                    'customer' => 'Customer',
                ])
                ->required(),

        ];
    }
}