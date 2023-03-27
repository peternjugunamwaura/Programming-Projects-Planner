<?php

namespace App\Filament\Resources\TechnologyResource\Pages;

use App\Filament\Resources\TechnologyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechnology extends EditRecord
{
    protected static string $resource = TechnologyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
