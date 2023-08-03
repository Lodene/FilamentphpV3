<?php

namespace App\Filament\Resources\SocieteResource\Pages;

use App\Filament\Resources\SocieteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSociete extends EditRecord
{
    protected static string $resource = SocieteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
