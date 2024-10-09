<?php

namespace App\Filament\Resources\SanbayResource\Pages;

use App\Filament\Resources\SanbayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSanbay extends EditRecord
{
    protected static string $resource = SanbayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
