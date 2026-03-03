<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\DonationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDonations extends ListRecords
{
    protected static string $resource = DonationResource::class;
    protected static ?string $title = 'Data Donasi';
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
