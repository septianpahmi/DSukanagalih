<?php

namespace App\Filament\Resources\DonationRegistrations\Tables;

use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class DonationRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Pemberi Donasi')
                    ->searchable(),
                TextColumn::make('contact')
                    ->label('Kontak')
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
                        'Rejected'  => 'heroicon-o-x-circle',
                        'Cancelled' => 'heroicon-o-x-mark',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'Pending'   => 'warning',
                        'Delivered' => 'info',
                        'Verified'  => 'success',
                        'Rejected'  => 'danger',
                        'Cancelled' => 'warning',
                    }),
                TextColumn::make('proof')
                    ->label('Bukti Donasi')
                    ->getStateUsing(function ($record) {

                        if (!$record->proof_photo) {
                            return 'Belum ada bukti';
                        }
                        $url = Storage::url($record->proof_photo);
                        $name = basename($record->proof_photo);

                        return "<a href='{$url}' target='_blank' class='text-blue-500 underline'>"
                            . \Illuminate\Support\Str::limit($name, 10) .
                            "</a>";
                    })
                    ->html()
                    ->tooltip(fn($record) => $record->proof_photo ? basename($record->proof_photo) : 'Belum ada bukti'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->searchable()
                    ->options(fn() => \App\Models\DonationRegistration::pluck('status', 'status')->toArray())
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('verify')
                        ->label('Verify')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn($record) => $record->status === 'Delivered')

                        ->requiresConfirmation()
                        ->form([
                            FileUpload::make('proof_photo')
                                ->label('Bukti Donasi')
                                ->image()
                                ->maxSize(5120)
                                ->visibility('public')
                                ->disk('public')
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                ->validationMessages([
                                    'max' => 'Ukuran gambar maksimal 5MB.',
                                ])
                                ->required()
                                ->directory('proof-images'),
                        ])
                        ->action(function ($record, array $data) {
                            $record->update([
                                'status' => 'Verified',
                                'proof_photo' => $data['proof_photo'],
                            ]);
                        }),
                    Action::make('reject')
                        ->label('Reject')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(fn($record) => $record->status === 'Delivered')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->update([
                                'status' => 'Rejected',
                            ]);
                        }),

                    Action::make('cancelled')
                        ->label('Mark as Cancelled')
                        ->icon('heroicon-o-exclamation-circle')
                        ->color('warning')
                        ->visible(fn($record) => $record->status === 'Delivered')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->update([
                                'status' => 'Cancelled',
                            ]);
                        }),
                    // Action::make('generateInvoice')
                    //     ->label('Generate Surat')
                    //     ->icon('heroicon-o-document-text')
                    //     ->color('primary')
                    //     ->visible(fn($record) => $record->status === 'Verified')
                    //     ->action(function ($record) {

                    //         $pdf = Pdf::loadView('filament.components.donation-invoice', [
                    //             'donation' => $record,
                    //             'date' => now(),
                    //             'invoice_number' => 'INV-DON-' . str_pad($record->id, 5, '0', STR_PAD_LEFT),
                    //         ]);

                    //         return response()->streamDownload(
                    //             fn() => print($pdf->output()),
                    //             'Invoice-Donation-' . $record->id . '.pdf'
                    //         );
                    //     }),
                    // Action::make('viewResult')
                    //     ->label('View')
                    //     ->icon('heroicon-o-eye')
                    //     ->color('default')
                    //     ->modalHeading('Bukti Donasi')
                    //     ->visible(fn($record) => $record->status === 'Delivered')
                    //     ->modalContent(function ($record) {
                    //         $lastResult = $record;

                    //         if (! $lastResult) {
                    //             return 'Tidak ada hasil yang tersedia.';
                    //         }
                    //         return view('filament.components.view-donation-proof', [
                    //             'result' => $lastResult,
                    //         ]);
                    //     })
                    //     ->slideOver()
                    //     ->modalSubmitAction(false),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
