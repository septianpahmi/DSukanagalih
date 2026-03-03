<?php

namespace App\Filament\Resources\VulnerableResidents;

use App\Filament\Resources\VulnerableResidents\Pages\CreateVulnerableResident;
use App\Filament\Resources\VulnerableResidents\Pages\EditVulnerableResident;
use App\Filament\Resources\VulnerableResidents\Pages\ListVulnerableResidents;
use App\Filament\Resources\VulnerableResidents\Schemas\VulnerableResidentForm;
use App\Filament\Resources\VulnerableResidents\Tables\VulnerableResidentsTable;
use App\Models\VulnerableResident;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VulnerableResidentResource extends Resource
{
    protected static ?string $model = VulnerableResident::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'Penduduk Rentan';
    protected static ?string $navigationLabel = 'Penduduk Rentan';
    protected static ?string $modelLabel = 'Penduduk Rentan';
    protected static ?string $pluralModelLabel = 'Penduduk Rentan';
    protected static string | UnitEnum | null $navigationGroup = 'Main Data';
    protected static ?int $navigationSort = 3;
    public static function getNavigationLabel(): string
    {
        return 'Penduduk Rentan';
    }
    public static function form(Schema $schema): Schema
    {
        return VulnerableResidentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VulnerableResidentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVulnerableResidents::route('/'),
            'create' => CreateVulnerableResident::route('/create'),
            'edit' => EditVulnerableResident::route('/{record}/edit'),
        ];
    }
}
