<?php

namespace App\Filament\Widgets;

use App\Models\Resident;
use App\Models\VulnerableCategory;
use App\Models\VulnerableResident;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardSummary extends StatsOverviewWidget
{
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        $mode = $this->filters['mode'] ?? 'residents';
        if ($mode === 'residents') {

            return [
                Stat::make('Total Penduduk', number_format(Resident::count()))
                    ->icon('heroicon-o-user-group')
                    ->color('primary')
                    ->columnSpan('full'),

                Stat::make('Total Bayi', number_format(Resident::whereBetween('tgl_lahir', [
                    now()->subYears(2),
                    now()
                ])->count())),

                Stat::make('Total Balita', number_format(Resident::whereBetween('tgl_lahir', [
                    now()->subYears(5),
                    now()->subYears(2)
                ])->count())),

                Stat::make('Total Anak-Anak', number_format(Resident::whereBetween('tgl_lahir', [
                    now()->subYears(12),
                    now()->subYears(6)
                ])->count()))
                    ->columnSpan(2),

                Stat::make('Lansia Pria', number_format(Resident::where('jk', 'L')
                    ->whereDate('tgl_lahir', '<=', now()->subYears(60))
                    ->count())),

                Stat::make('Lansia Wanita', number_format(Resident::where('jk', 'P')
                    ->whereDate('tgl_lahir', '<=', now()->subYears(60))
                    ->count())),

                Stat::make('Non Rentan Pria', number_format(Resident::where('jk', 'L')
                    ->whereBetween('tgl_lahir', [
                        now()->subYears(59),
                        now()->subYears(12)
                    ])
                    ->count())),

                Stat::make('Non Rentan Wanita', number_format(Resident::where('jk', 'P')
                    ->whereBetween('tgl_lahir', [
                        now()->subYears(59),
                        now()->subYears(12)
                    ])
                    ->count())),
            ];
        }
        return [
            Stat::make('Total Penduduk Rentan', number_format(VulnerableResident::count()))
                ->icon('heroicon-o-exclamation-triangle')
                ->columnSpan('2'),
            Stat::make(
                'Ibu Hamil/Menyusui',
                number_format(VulnerableResident::where('category_id', 4)->count())
            )->columnSpan('2'),

            Stat::make(
                'Difabel Fisik',
                number_format(VulnerableResident::whereIn('category_id', [7, 8])->count())
            ),

            Stat::make(
                'Difabel Mental',
                number_format(VulnerableResident::whereIn('category_id', [9, 10])->count())
            ),

            Stat::make(
                'Lansia Pria (Risiko Tinggi)',
                number_format(VulnerableResident::where('category_id', 5)->count())
            ),

            Stat::make(
                'Lansia Wanita (Risiko Tinggi)',
                number_format(VulnerableResident::where('category_id', 6)->count())
            ),
        ];
    }

    public function getColumns(): int | array
    {
        return 4;
    }
}
