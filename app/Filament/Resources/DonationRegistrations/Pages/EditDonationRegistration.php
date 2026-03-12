<?php

namespace App\Filament\Resources\DonationRegistrations\Pages;

use App\Filament\Resources\DonationRegistrations\DonationRegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDonationRegistration extends EditRecord
{
    protected static string $resource = DonationRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
