<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Sanbay;
use App\Models\Chongoi;
use App\Models\Vemaybay;
use Filament\Forms\Form;
use App\Models\Chuyenbay;
use Filament\Tables\Table;
use League\Uri\Idna\Option;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\ChuyenbayResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ChuyenbayResource\RelationManagers;
use Filament\Forms\Components\Section;

class ChuyenbayResource extends Resource
{
    protected static ?string $model = Chuyenbay::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Chuyến bay';

    protected static ?string $navigationGroup = 'Settings';
 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('HÀNH TRÌNH')
                    ->schema([
                    Select::make('xuatphat')
                        ->required()
                        // ->relationship(name: 'xuatphat', titleAttribute: 'ten')
                        ->options(Sanbay::all()->pluck('ten', 'id'))
                        ->searchable()
                        ->label('Xuất phát từ')
                        ->debounce(200)
                        // Thêm logic để kiểm tra
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $xuatphat = $get('xuatphat'); // Sử dụng $get để lấy giá trị sân bay xuất phát
                            if ($state === $xuatphat) {
                                $set('diemden', null); // Đặt lại giá trị sân bay điểm đến
                            }
                        })
                        ->reactive(),
                    
                    Select::make('diemden')
                        ->required()
                        ->debounce(100)
                        // ->relationship(name: 'diemden', titleAttribute: 'ten')
                        ->options(Sanbay::all()->pluck('ten', 'id'))
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $xuatphat = $get('xuatphat'); // Lấy giá trị sân bay xuất phát
                            if ($state === $xuatphat) {
                                $set('diemden', null); // Đặt lại giá trị sân bay điểm đến
                            }
                        })  
                        ->searchable()
                        ->label('Bay đến')
                        ->preload(),
           
                ])->columns(2),
            
                Section::make('LỊCH TRÌNH')
                    ->schema([
                        DatePicker::make('ngaybay')
                            ->required()
                            ->native(false)
                            ->label('Ngày bay')
                            ->reactive()
                            // Đặt ngày bay không được nhỏ hơn ngày của hệ thống
                            ->afterStateUpdated(
                                function ($state, callable $set, callable $get)
                                {
                                    // nếu ngày không được nhập không cần kiểm tra
                                    if (empty($state)) return;
                                    // lay bien ngay bay
                                    $ngaybay = $get('ngaybay');
                                    // biến $today là ngày tạo chuyến bay
                                    $today = Carbon::today()->format('Y-m-d');
                                    // so sánh biến $ngaybay nhập vào nhếu nhỏ hơn $today thì set biến $ngaybay là null
                                    if ($ngaybay < $today) $set('ngaybay', null);   
                                }
                            )
                            ->prefixIcon('heroicon-m-calendar-date-range'),
                        
                            DatePicker::make('ngayden')
                                ->reactive()
                                ->afterStateUpdated(
                                    function ($state, callable $set, callable $get)
                                    {
                                        // nếu ngày không được nhập không cần kiểm tra
                                        if (empty($state)) return;
                                        // lay bien ngay bay
                                        $ngaybay = $get('ngaybay');
                                        // lay bien ngay den
                                        $ngayden = $get('ngayden');
                                        // so sánh biến $ngaybay nhập vào nhếu nhỏ hơn $today thì set biến $ngaybay là null
                                        if ($ngayden < $ngaybay) $set('ngayden', null);   
                                    }
                                )
                                ->required()
                                ->native(false)
                                ->label('Ngày đến')
                                ->prefixIcon('heroicon-m-calendar-date-range'),
                                TimePicker::make('giobay')
                                ->required()
                                ->native(false)
                                ->label('Giờ bay')
                                ->prefixIcon('heroicon-m-clock'),
                        
                            TimePicker::make('gioden')
                                ->required()
                                ->native(false)
                                ->label('Giờ đến')
                                ->prefixIcon('heroicon-m-clock')
                                ->reactive()
                                ->afterStateUpdated(
                                    function ($state, callable $set, callable $get)
                                    {
                                        if(empty($state)) return;
                                        if($get('ngaybay') === $get('ngayden'))
                                        {
                                            if($get('gioden') < $get('giobay')) $set('gioden', null);
                                            if($get('gioden') === $get('giobay')) $set('gioden', null);
                                        };
                                        
                                    }
                                ),
            
                    ])->columns(4),
                
                Section::make('CHUYẾN BAY')
                    ->schema([
                        /*
                            SỨC CHỨA
                        */ 
                        TextInput::make('succhua')
                            ->label('Sức chứa')
                            ->prefixIcon('heroicon-m-user-group')
                            ->required()
                            // theo dõi tình trạng thay đổi của box
                            ->reactive()
                            ->afterStateUpdated(
                                function ($state, callable $set, callable $get)
                                {
                                    // kiểm tra giá trị hiện tại nếu chưa được khời tạo thì không làm gì hết
                                    if (empty($state)) return;
                                    // lấy gía trị của biến sức chứa
                                    $succhua = $get('succhua');
                                    // kiểm tra nếu sức chứa mang giá trị âm thì gán giá trị null
                                    if ($succhua < 0) $set('succhua', null);
                                }
                            ),
                        /*
                            SỐ LƯỢNG VÉ
                        */
                        TextInput::make('soluongve')
                            ->required()
                            ->label('Số lượng vé')
                            ->numeric(),
                        /*
                            TÀY BAY
                        */ 
                        Select::make('tenmaybay')
                            ->required()
                            ->options([
                                'Boing' => 'Boing 777',
                                'Airbus' => 'Airbus A330'
                            ])
                            ->label('Loại tàu bay'),
                    ])->columns(3),
                    
                
                Section::make('GIÁ')
                    ->schema([
                        TextInput::make('giaghephothong')
                            ->required()
                            ->reactive()
                            ->label('Economy')
                            ->prefixIcon('heroicon-m-banknotes')
                            ->afterStateUpdated(
                                function ($state, callable $set, callable $get)
                                {
                                    // nếu text input trống thì bỏ qua
                                    if (empty($state)) return;
                                    // nếu lấy giá trị của 'giaghephothong' < 0 thi set gia tri null cho no
                                    if ($get('giaghephothong') < 0) $set('giaghephothong', null);
                                }
                            )
                            ->afterStateUpdated(
                                function ($state, callable $get, callable $set)
                                {
                                    // nếu ô input không có dữ liệu -> bỏ qua
                                    if (empty($state)) return;

                                    if (!is_numeric($get('giaghephothong'))) $set('giaghephothong', null);
                                }
                            ),
                            
                            TextInput::make('giaghethuonggia')
                            ->required()
                            ->reactive()
                            ->label('Business')
                            ->prefixIcon('heroicon-m-banknotes')
                            ->afterStateUpdated(
                                function ($state, callable $set, callable $get)
                                {
                                    // nếu text input trống thì bỏ qua
                                    if (empty($state)) return;
                                    // nếu lấy giá trị của 'giaghephothong' < 0 thi set gia tri null cho no
                                    if ($get('giaghethuonggia') < 0) $set('giaghethuonggia', null);
                                }
                            )
                            ->afterStateUpdated(
                                function ($state, callable $get, callable $set)
                                {
                                    // nếu ô input không có dữ liệu -> bỏ qua
                                    if (empty($state)) return;
        
                                    if (!is_numeric($get('giaghethuonggia'))) $set('giaghethuonggia', null);
                                }
                            ),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('machuyenbay')->label('Mã chuyến bay'),
                TextColumn::make('sanbayXuatphat.ten')
                    ->label('Từ'),
                TextColumn::make('sanbayDiemden.ten')
                    ->label('Đến'),
                TextColumn::make('ngaybay')
                    ->label('Ngày bay'),
                TextColumn::make('ngayden')
                    ->label('Ngày đến'),
                TextColumn::make('giobay')
                    ->label('Giờ bay'),
                TextColumn::make('gioden')
                    ->label('Giờ đến')
                    ->toggleable(),
                TextColumn::make('succhua')
                    ->label('Sức chứa')
                    ->toggleable(),
                TextColumn::make('tenmaybay')
                    ->label('Tên máy bay')
                    ->toggleable(),
                TextColumn::make('giaghephothong')
                    ->label('Economy')
                    ->toggleable(),
                TextColumn::make('giaghethuonggia')
                    ->label('Business')
                    ->toggleable(),
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

    public static function getLabel(): ?string 
    {
        return 'Chuyến bay';
    }

    public static function getPluralLable (): ?string
    {
        return 'Chuyến bay';
    }

    // hàm kiểm tra giá ghế nếu mang giá trị âm thì reset về 0
    public static function ktraAndReset ($state, string $loaighe, callable $set, callable $get): void
    {
        // kiểm tra nếu loại ghế không có giá trị thì không làm gì cả
        if (empty($state)) return;
        // lấy ra giá của loại ghê
        $gia = $get($loaighe);
        // kiểm tra nếu giá của loại ghế nhỏ hơn 0 thì gán $set($loaighe) = null
        if ($gia < 0 || $gia === null) $set($loaighe, null);
    }
}
