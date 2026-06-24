<?php

namespace App\Filament\Admin\Resources\Orders;

use App\Models\Order;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

use App\Filament\Admin\Resources\Orders\Schemas\OrderForm;
use App\Filament\Admin\Resources\Orders\Tables\OrdersTable;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon =
        'heroicon-o-shopping-bag';

    protected static string|UnitEnum|null $navigationGroup =
        'Order Management';

    protected static ?string $navigationLabel =
        'Orders';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components(
                OrderForm::schema()
            );
    }

    public static function table(Table $table): Table
    {
        return OrdersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}