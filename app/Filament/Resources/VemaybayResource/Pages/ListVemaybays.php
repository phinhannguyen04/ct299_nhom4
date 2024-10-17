<?php

namespace App\Filament\Resources\VemaybayResource\Pages;

use App\Filament\Resources\VemaybayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVemaybays extends ListRecords
{
    protected static string $resource = VemaybayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
