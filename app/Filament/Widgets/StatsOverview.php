<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Project;


class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make("Total Projects",Project::query()->count()),
            Card::make("Total Billable",Project::query()->where('billing','Billable')->count()),
            Card::make("Non Billable",Project::query()->where('billing','Non Billable')->count()),

        ];
    }
}
