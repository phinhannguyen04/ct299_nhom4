<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChuyenbayResource\Pages;
use App\Filament\Resources\ChuyenbayResource\RelationManagers;
use App\Models\Chuyenbay;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChuyenbayResource extends Resource
{
    protected static ?string $model = Chuyenbay::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('xuatphat'),
                TextInput::make('diemden'),
                DatePicker::make('ngaybay')->native(false)->prefixIcon('heroicon-m-calendar-date-range'),
                DatePicker::make('ngayden')->native(false)->prefixIcon('heroicon-m-calendar-date-range'),
                TimePicker::make('giobay')->native(false)->prefixIcon('heroicon-m-clock'),
                TimePicker::make('gioden')->native(false)->prefixIcon('heroicon-m-clock'),
                TextInput::make('succhua'),
                TextInput::make('tenmaybay'),
                TextInput::make('giaghephothong'),
                TextInput::make('giaghethuongia'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChuyenbays::route('/'),
            'create' => Pages\CreateChuyenbay::route('/create'),
            'edit' => Pages\EditChuyenbay::route('/{record}/edit'),
        ];
    }
}
