<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder{

        return  parent::getTableQuery()->withoutGlobalScopes()
            ->addSelect(['societe_name' => \App\Models\Societe::select('name')
            ->whereColumn('id', 'contact.id_societe')]);
    }
}
