<?php

namespace App\Filament\Widgets;

use App\Models\Resident;
use App\Models\VulnerableResident;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardSummary extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Bayi/Balita', number_format(Resident::whereDate('tgl_lahir', '>=', now()->subYears(5))->count()))
                ->icon('heroicon-o-user')
                ->color('default'),
            Stat::make('Total Ibu Hamil', number_format(VulnerableResident::where('category_id', 4)->count()))
                ->icon('heroicon-o-heart')
                ->color('default'),
            Stat::make('Total Lansia', number_format(Resident::whereDate('tgl_lahir', '<=', now()->subYears(60))->count()))
                ->icon('heroicon-o-user-circle')
                ->color('default'),
            Stat::make('Total Difabel', number_format(VulnerableResident::whereIn('category_id', [7, 8, 9, 10])->count()))
                ->icon('heroicon-o-hand-raised')
                ->color('default'),
        ];
    }
}
