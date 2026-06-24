<?php

namespace App\Filament\Admin\Resources\Users\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('role')
                    ->badge(),

                TextColumn::make('created_at')
                    ->dateTime(),

            ])
                ->actions([
                    \Filament\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]);
    }
}