<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('technology_id')
                ->relationship('technology','name')
                ->searchable()
                ->preload(),
                Forms\Components\DatePicker::make('start_date')
                ->label('start_date')
                ->required(),
                Forms\Components\DatePicker::make('end_date')
                ->label('end_date')
                ->required(),
                Forms\Components\TextInput::make('effort')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('billing')->options([
                        'Billable'=>'billable',
                        'Non Billable'=>'Non_Billable'
                ])->required(),
                Forms\Components\Select::make('status')->options([
                    'Not Ready to start'=>'not_started',
                    'Ready To start'=>'ready_to_start',
                    'In Progress'=>'in_progress',
                    'Blocked'=>'blocked',
                    'Complete'=>'complete'
            ])->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('technology.name'),
            Tables\Columns\TextColumn::make('start_date')->sortable(),
            Tables\Columns\TextColumn::make('end_date')->sortable(),
            Tables\Columns\TextColumn::make('effort')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('billing')->sortable(),
            Tables\Columns\TextColumn::make('status'),
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
            RelationManagers\TasksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
