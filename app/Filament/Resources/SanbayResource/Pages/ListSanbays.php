<?php

namespace App\Filament\Resources\SanbayResource\Pages;

use App\Filament\Resources\SanbayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSanbays extends ListRecords
{
    protected static string $resource = SanbayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
