<?php

namespace App\Filament\Resources\KhoiluonghanhlyResource\Pages;

use App\Filament\Resources\KhoiluonghanhlyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKhoiluonghanhlies extends ListRecords
{
    protected static string $resource = KhoiluonghanhlyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
