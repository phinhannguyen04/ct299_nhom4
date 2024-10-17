<?php

namespace App\Filament\Resources\KhoiluonghanhlyResource\Pages;

use App\Filament\Resources\KhoiluonghanhlyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKhoiluonghanhly extends EditRecord
{
    protected static string $resource = KhoiluonghanhlyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
