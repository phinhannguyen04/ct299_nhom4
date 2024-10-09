<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Chongoi;
use App\Models\Vemaybay;
use Filament\Forms\Form;
use App\Models\Chuyenbay;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VemaybayResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VemaybayResource\RelationManagers;
use Carbon\Carbon;

class VemaybayResource extends Resource
{
    protected static ?string $model = Vemaybay::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('chuyenbay_id')
                    ->required()
                    ->options(
                        Chuyenbay::all()->pluck('id')
                    )
                    ->native(false)
                    ->label('Mã chuyến bay'),
                Forms\Components\Select::make('chongoi_id')
                    ->required()
                    ->options(
                        Chongoi::all()->pluck('vitri', 'id')
                    )
                    ->label('Mã chỗ ngồi'),
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->options(
                        User::all()->pluck('name', 'id')
                    )
                    ->native(false)
                    ->searchable()
                    ->label('Thông tin khách hàng'),
                Forms\Components\DatePicker::make('ngaymua')
                    ->required()
                    ->default(Carbon::today())
                    ->prefixIcon('heroicon-m-calendar-date-range')
                    ->native(false)
                    // ngày mua vé không được trễ hơn ngày chuyến bay xuất phát
                    ->afterStateUpdated(
                        function ($state, callable $set, callable $get): void
                        {
                            // lấy chuyến bay id
                            $chuyenbay_id = $get('chuyenbay_id');

                            // truy vấn ngày bay trong database thoogn qua chuyenbay_id
                            $ngaybay = Chuyenbay::find($chuyenbay_id)?->ngaybay;

                            // so sánh ngày mua với ngày bay
                            if (!empty($ngaybay) && Carbon::parse($state)->gt(Carbon::parse($ngaybay))) $set('ngaymua', null);
                        }
                    )
                    ->reactive()
                    ->label('Ngày mua'),
                Forms\Components\Select::make('loaive')
                    ->required()
                    ->options([
                        'giaghephothong' => 'Economy',
                        'giaghethuonggia' => 'Business'
                    ])
                    // gán mặc định trạng thái ban đầu là ve economy
                    ->default('giaghephothong')
                    ->native(false)
                    ->label('Loại vé'),
                Forms\Components\TextInput::make('khoiluong')
                    ->required()
                    ->numeric()
                    ->default(7)
                    ->readOnly()
                    ->label('Khối lượng'),
                Forms\Components\TextInput::make('gia')
                    ->required()
                    ->numeric()
                    ->label('Giá vé'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chuyenbay_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('chongoi_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ngaymua')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('loaive')
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVemaybays::route('/'),
            'create' => Pages\CreateVemaybay::route('/create'),
            'edit' => Pages\EditVemaybay::route('/{record}/edit'),
        ];
    }
}
