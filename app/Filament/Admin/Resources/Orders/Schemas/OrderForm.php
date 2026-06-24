<?php

namespace App\Filament\Admin\Resources\Orders\Schemas;

use Filament\Forms;

class OrderForm
{
    public static function schema(): array
    {
        return [

            Forms\Components\TextInput::make('order_number')
                ->disabled(),

            Forms\Components\TextInput::make('full_name')
                ->disabled(),

            Forms\Components\TextInput::make('phone')
                ->disabled(),

            Forms\Components\Textarea::make('address')
                ->disabled(),

            Forms\Components\TextInput::make('city')
                ->disabled(),

            Forms\Components\TextInput::make('postal_code')
                ->disabled(),

            Forms\Components\TextInput::make('payment_method')
                ->disabled(),

            Forms\Components\TextInput::make('total')
                ->prefix('Rp')
                ->disabled(),

            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'paid' => 'Paid',
                    'shipped' => 'Shipped',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ])
                ->required(),

        ];
    }
}