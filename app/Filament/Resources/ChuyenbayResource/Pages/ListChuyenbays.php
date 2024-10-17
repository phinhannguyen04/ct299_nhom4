<?php

namespace App\Filament\Resources\ChuyenbayResource\Pages;

use App\Filament\Resources\ChuyenbayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChuyenbays extends ListRecords
{
    protected static string $resource = ChuyenbayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
