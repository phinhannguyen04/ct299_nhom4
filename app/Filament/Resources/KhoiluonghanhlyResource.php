<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KhoiluonghanhlyResource\Pages;
use App\Filament\Resources\KhoiluonghanhlyResource\RelationManagers;
use App\Models\Khoiluonghanhly;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KhoiluonghanhlyResource extends Resource
{
    protected static ?string $model = Khoiluonghanhly::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Khối lượng hành lý';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('khoiluong')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('gia')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('khoiluong')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gia')
                    ->numeric()
                    ->sortable(),
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

    public static function getLabel(): string
    {
        return 'Khối lượng hành lý'; // Tên hiển thị cho một mục
    }

    public static function getPluralLabel(): string
    {
        return 'Khối lượng hành lý'; // Tên hiển thị trên danh sách
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
            'index' => Pages\ListKhoiluonghanhlies::route('/'),
            'create' => Pages\CreateKhoiluonghanhly::route('/create'),
            'edit' => Pages\EditKhoiluonghanhly::route('/{record}/edit'),
        ];
    }
}
