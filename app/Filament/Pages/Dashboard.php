<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\ToggleButtons;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class Dashboard extends BaseDashboard
{
    // protected string $view = 'filament.pages.dashboard';
    use HasFiltersForm;
    // protected static bool $isLazy = false;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('mode')
                            ->label('Tampilkan Data')
                            ->options([
                                'residents' => 'Semua Penduduk',
                                'vulnerable' => 'Kelompok Rentan',
                            ])
                            ->native(false)
                            ->default('residents')
                            ->live(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
