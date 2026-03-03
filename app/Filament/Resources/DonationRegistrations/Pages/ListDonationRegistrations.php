<?php

namespace App\Filament\Resources\DonationRegistrations\Pages;

use App\Filament\Resources\DonationRegistrations\DonationRegistrationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDonationRegistrations extends ListRecords
{
    protected static string $resource = DonationRegistrationResource::class;
    protected static ?string $title = 'Daftar Donasi';
    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
