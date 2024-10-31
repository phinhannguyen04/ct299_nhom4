<?php

namespace App\Filament\Resources\ChitietthanhtienResource\Pages;

use App\Filament\Resources\ChitietthanhtienResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChitietthanhtiens extends ListRecords
{
    protected static string $resource = ChitietthanhtienResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
