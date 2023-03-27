<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechnologyResource\Pages;
use App\Filament\Resources\TechnologyResource\RelationManagers;
use App\Models\Technology;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechnologyResource extends Resource
{
    protected static ?string $model = Technology::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //Form components to add a new Technology
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength('255'),
                Forms\Components\select::make('proficiency')->options([
                    'Beginner'=>'beginner',
                    'Intermediate'=>'intermediate',
                    'Proficient'=>'proficient'
                ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Columns for the data table
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('proficiency')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
             RelationManagers\ProjectsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTechnologies::route('/'),
            'create' => Pages\CreateTechnology::route('/create'),
            'edit' => Pages\EditTechnology::route('/{record}/edit'),
        ];
    }
}
