<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChongoiResource\Pages;
use App\Models\Chongoi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class ChongoiResource extends Resource
{
    protected static ?string $model = Chongoi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Chỗ ngồi';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('vitri')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vitri')
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

    public static function getLabel(): string
    {
        return 'Chỗ ngồi'; // Tên hiển thị cho một mục
    }

    public static function getPluralLabel(): ?string
    {
        return 'Chỗ ngồi';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChongois::route('/'),
            'create' => Pages\CreateChongoi::route('/create'),
            'edit' => Pages\EditChongoi::route('/{record}/edit'),
        ];
    }
}
