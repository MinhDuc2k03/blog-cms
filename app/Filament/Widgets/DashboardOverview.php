<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class DashboardOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total users', User::query()->count()),
            Stat::make('Total posts', Post::query()->count()),
            Stat::make('Total categories', Category::query()->count()),
            Stat::make('Total tags', Tag::query()->count()),
        ];
    }
}
