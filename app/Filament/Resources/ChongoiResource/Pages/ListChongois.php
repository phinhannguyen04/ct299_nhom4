<?php

namespace App\Filament\Resources\ChongoiResource\Pages;

use App\Filament\Resources\ChongoiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChongois extends ListRecords
{
    protected static string $resource = ChongoiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
