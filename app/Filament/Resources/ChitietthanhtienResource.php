<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vemaybay;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Chitietthanhtien;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ChitietthanhtienResource\Pages;
use App\Filament\Resources\ChitietthanhtienResource\RelationManagers;

class ChitietthanhtienResource extends Resource
{
    protected static ?string $model = Chitietthanhtien::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('khoiluonghanhly_id')
                    ->required()
                    ->numeric(),
                Select::make('vemaybay.mavemaybay')
                    ->required()
                    ->options(Vemaybay::all()->pluck('mavemaybay', 'id')),
                Forms\Components\TextInput::make('thanhtien')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('mota')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('khoiluonghanhly_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vemaybay.mavemaybay')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('thanhtien')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mota')
                    ->searchable(),
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
            'index' => Pages\ListChitietthanhtiens::route('/'),
            'create' => Pages\CreateChitietthanhtien::route('/create'),
            'edit' => Pages\EditChitietthanhtien::route('/{record}/edit'),
        ];
    }
}
