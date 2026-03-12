<?php

namespace App\Filament\Widgets;

use App\Models\Resident;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{

    protected function getStats(): array

    {
        return [
            Stat::make('Total Penduduk', number_format(Resident::count()))
                ->description('Jumlah penduduk yang terdaftar')
                ->icon('heroicon-o-user-group')
                ->chart([10, 20, 35, 30, 25, 40])
                ->color('primary'),

        ];
    }

    protected function getColumns(): int
    {
        return 1;
    }
}
