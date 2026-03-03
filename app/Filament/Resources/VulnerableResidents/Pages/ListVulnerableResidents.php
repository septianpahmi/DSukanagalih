<?php

namespace App\Filament\Resources\VulnerableResidents\Pages;

use App\Filament\Resources\VulnerableResidents\VulnerableResidentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVulnerableResidents extends ListRecords
{
    protected static string $resource = VulnerableResidentResource::class;
    protected static ?string $title = 'Data Penduduk Rentan';
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
