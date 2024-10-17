<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Chongoi;
use App\Models\Vemaybay;
use Filament\Forms\Form;
use App\Models\Chuyenbay;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\Mime\Part\DataPart;
use App\Filament\Resources\VemaybayResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VemaybayResource\RelationManagers;

class VemaybayResource extends Resource
{
    protected static ?string $model = Vemaybay::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Vé máy bay';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('chuyenbay_id')
                    ->options(Chuyenbay::all()->pluck('id', 'id'))
                    ->reactive()
                    ->required(),
                Select::make('chongoi_id')
                    ->options(Chongoi::all()->pluck('vitri', 'id'))
                    ->required(),
                TextInput::make('user_id')
                    ->default(null),
                    // ->required(),
                DatePicker::make('ngaymua')
                    ->reactive()
                    ->default(Carbon::today())
                    ->afterStateUpdated
                    (
                        function(callable $set, callable $get)
                        {
                            // lấy thông tin chuyến bay
                            $chuyenbay = Chuyenbay::find($get('chuyenbay_id'));
                            // lấy thông tin ngày hôm nay
                            $today = Carbon::today();
                            // kiểm tra giá trị chuyenbay_id nếu không null
                            if (!empty($chuyenbay))
                            {
                                // kiểm tra nếu ngày mua sau ngày bay thì set về giá trị today
                                Notification::make()
                                ->title('Saved successfully')
                                ->body($chuyenbay->ngaybay)
                                ->success()
                                ->send();

                                if ($get('ngaymua') > $chuyenbay->ngaybay)
                                    
                                    $set('ngaymua', null);
                                
                            }
                        }
                    )
                    ->required(),
                Select::make('loaive')
                    ->required()
                    ->default('giavephothong')
                    ->options([
                        'giaghephothong' => 'Economy',
                        'giaghethuonggia' => 'Business',
                    ])
                    ->reactive()
                    ->afterStateUpdated
                    (
                        function (callable $set, callable $get) {
                            
                            $chuyenbay = Chuyenbay::find($get('chuyenbay_id'));
                            
                            if ($chuyenbay) {
                                $set('gia', $get('loaive') === 'giaghephothong' ? $chuyenbay->giaghephothong : $chuyenbay->giaghethuonggia);
                        }
                    }),

                TextInput::make('khoiluong')
                    ->required()->default(7)->readOnly(),
                TextInput::make('gia')
                    ->default(0)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('chuyenbay_id'),
                TextColumn::make('chongoi_id'),
                TextColumn::make('user_id'),
                TextColumn::make('ngaymua'),
                TextColumn::make('loaive'),
                TextColumn::make('khoiluong'),
                TextColumn::make('gia'),
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
