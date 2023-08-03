<?php

namespace App\Filament\Resources\SocieteResource\Pages;

use App\Filament\Resources\SocieteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocietes extends ListRecords
{
    protected static string $resource = SocieteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
