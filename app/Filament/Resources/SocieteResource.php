<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocieteResource\Pages;
use App\Filament\Resources\SocieteResource\RelationManagers;
use App\Models\Societe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TagsColumn;


use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Columns\CheckboxColumn;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Actions;
use Filament\Support\Enums\Alignment;




class SocieteResource extends Resource
{
    protected static ?string $model = Societe::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Societe')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nombre_employe')
                            ->required()
                            ->numeric(),
                        Checkbox::make('statut')->inline()->required()->extraAttributes(['class' => 'flex center']),
                    ])
                    ->columns(3),
                    Fieldset::make('Activité de la société')
                    ->schema([
                        Forms\Components\CheckboxList::make('roles')
                            ->label(__(''))
                            ->required()
                            ->relationship('activite', 'intitule'),
                    ])
                    ->columns(1),

                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                IconColumn::make('statut')->boolean(),
                Tables\Columns\TextColumn::make('nombre_employe')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('activite.intitule')
                    ->badge()
                    ->label('Activité')
                    ->separator(','),
                TextColumn::make('contact.nom')
                    ->label('Contact(s)')
                    ->separator(',')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocietes::route('/'),
            'create' => Pages\CreateSociete::route('/create'),
            'edit' => Pages\EditSociete::route('/{record}/edit'),
        ];
    }    
}
