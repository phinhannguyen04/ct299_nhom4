<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Sanbay;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\SanbayResource\Pages;

class SanbayResource extends Resource
{
    protected static ?string $model = Sanbay::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Sân bay';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ten')->required(),
                TextInput::make('thanhpho')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ten')
                    ->label('Tên sân bay')
                    ->searchable(),
                TextColumn::make('thanhpho')
                    ->label('Tỉnh/Thành Phố')
                    ->sortable(['thanhpho'])
                    ->searchable(),
            ])->searchPlaceholder('Nhập tên sân bay...')
            ->searchDebounce('750ms')
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

    public static function getLable (): ?string
    {
        return 'Sân bay';
    }

    public static function getPlurable (): ?string
    {
        return 'Sân bay';
    }

    public static function getPluralLabel(): string
    {
        return 'Sân bay';
    }

    public static function getNavigationLabel(): string
    {
        return 'Sân bay';
    }

    public static function getModelLabel(): string
    {
        return 'sân bay';
    }

    public static function getPluralModelLabel(): string
    {
        return 'sân bay';
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
            'index' => Pages\ListSanbays::route('/'),
            'create' => Pages\CreateSanbay::route('/create'),
            'edit' => Pages\EditSanbay::route('/{record}/edit'),
        ];
    }
}
