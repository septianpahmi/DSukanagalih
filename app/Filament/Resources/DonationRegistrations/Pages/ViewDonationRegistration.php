<?php

namespace App\Filament\Resources\DonationRegistrations\Pages;

use App\Filament\Resources\DonationRegistrations\DonationRegistrationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDonationRegistration extends ViewRecord
{
    protected static string $resource = DonationRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // EditAction::make(),
        ];
    }
}
