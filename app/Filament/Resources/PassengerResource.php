<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PassengerResource\Pages;
use App\Models\Passenger;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class PassengerResource extends Resource
{
    protected static ?string $model = Passenger::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cccd')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sdt')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('diachi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Tên'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('cccd')
                    ->searchable()
                    ->label('Căn cước công dân'),
                Tables\Columns\TextColumn::make('sdt')
                    ->searchable()
                    ->label('Số điện thoại'),
                Tables\Columns\TextColumn::make('diachi')
                    ->searchable()
                    ->label('Địa chỉ')
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

    public static function getLabel(): ?string 
    {
        return 'Hành khách';
    }

    public static function getPluralLable (): ?string
    {
        return 'Hành khách';
    }

    public static function getTitle(): string
    {
        return 'Hành khách';
    }

    public static function getModelLabel(): string
    {
        return 'Hành khách';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Hành khách';
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
            'index' => Pages\ListPassengers::route('/'),
            'create' => Pages\CreatePassenger::route('/create'),
            'edit' => Pages\EditPassenger::route('/{record}/edit'),
        ];
    }
}
