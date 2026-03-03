<?php

namespace App\Filament\Resources\VulnerableCategories;

use App\Filament\Resources\VulnerableCategories\Pages\CreateVulnerableCategory;
use App\Filament\Resources\VulnerableCategories\Pages\EditVulnerableCategory;
use App\Filament\Resources\VulnerableCategories\Pages\ListVulnerableCategories;
use App\Filament\Resources\VulnerableCategories\Schemas\VulnerableCategoryForm;
use App\Filament\Resources\VulnerableCategories\Tables\VulnerableCategoriesTable;
use App\Models\VulnerableCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VulnerableCategoryResource extends Resource
{
    protected static ?string $model = VulnerableCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Kategori';
    protected static ?string $navigationLabel = 'Kategori';
    protected static ?string $modelLabel = 'Kategori';
    protected static ?string $pluralModelLabel = 'Kategori';
    protected static string | UnitEnum | null $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 2;
    public static function form(Schema $schema): Schema
    {
        return VulnerableCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VulnerableCategoriesTable::configure($table);
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
            'index' => ListVulnerableCategories::route('/'),
            'create' => CreateVulnerableCategory::route('/create'),
            'edit' => EditVulnerableCategory::route('/{record}/edit'),
        ];
    }
}
