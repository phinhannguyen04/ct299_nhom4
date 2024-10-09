<?php

namespace App\Filament\Resources\ChongoiResource\Pages;

use App\Filament\Resources\ChongoiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChongoi extends EditRecord
{
    protected static string $resource = ChongoiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
