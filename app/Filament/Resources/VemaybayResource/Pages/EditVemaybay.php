<?php

namespace App\Filament\Resources\VemaybayResource\Pages;

use App\Filament\Resources\VemaybayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVemaybay extends EditRecord
{
    protected static string $resource = VemaybayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
