<?php

namespace App\Filament\Resources\DonationRegistrations\Tables;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\RawJs;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DonationRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Pemberi Donasi')
                    ->searchable(),
                TextColumn::make('donation.title')
                    ->label('Donasi')
                    ->searchable()
                    ->limit(20)
                    ->tooltip(fn($record) => $record->donation?->title),
                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->formatStateUsing(
                        fn($state, $record) =>
                        number_format($state, 0, ',', '.') . ' ' . $record->donation?->unit
                    ),
                IconColumn::make('status')
                    ->label('Status')
                    ->icon(fn(string $state): string => match ($state) {
                        'Pending'   => 'heroicon-o-clock',
                        'Delivered' => 'heroicon-o-truck',
                        'Verified'  => 'heroicon-o-check-circle',
                        default     => 'heroicon-o-question-mark-circle',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'Pending'   => 'warning',
                        'Delivered' => 'info',
                        'Verified'  => 'success',
                        default     => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->searchable()
                    ->options(fn() => \App\Models\DonationRegistration::pluck('status', 'status')->toArray())
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('viewResult')
                        ->label('View')
                        ->icon('heroicon-o-eye')
                        ->color('default')
                        ->modalHeading('Bukti Donasi')
                        ->visible(fn($record) => $record->status === 'Delivered')
                        ->modalContent(function ($record) {
                            $lastResult = $record;

                            if (! $lastResult) {
                                return 'Tidak ada hasil yang tersedia.';
                            }
                            return view('filament.components.view-donation-proof', [
                                'result' => $lastResult,
                            ]);
                        })
                        ->slideOver()
                        ->modalSubmitAction(false),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
