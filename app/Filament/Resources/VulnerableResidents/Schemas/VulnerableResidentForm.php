<?php

namespace App\Filament\Resources\VulnerableResidents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VulnerableResidentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Penduduk Rentan')
                    ->description('Lengkapi detail data warga sesuai dengan Kartu Keluarga.')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('resident_id')
                                ->label('Penduduk')
                                ->options(function () {
                                    return \App\Models\Resident::pluck('nama', 'id');
                                })
                                ->searchable()
                                ->native(false)
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    if (!$state) {
                                        $set('no_kk', null);
                                        $set('name', null);
                                        $set('address', null);
                                        return;
                                    }

                                    $resident = \App\Models\Resident::find($state);

                                    if ($resident) {
                                        $set('no_kk', $resident->no_kk);
                                        $set('name', $resident->nama);
                                        $set('address', $resident->alamat . ' RT.' . $resident->rt . ' RW.' . $resident->rw);
                                    }
                                }),
                            Select::make('category_id')
                                ->label('Kategori')
                                ->options(function () {
                                    return \App\Models\VulnerableCategory::pluck('name', 'id');
                                })
                                ->searchable()
                                ->native(false)
                                ->required(),
                            TextInput::make('no_kk')
                                ->label('Nomor KK')
                                ->placeholder('Masukan Nomor KK')
                                ->required()
                                ->regex('/^[0-9]+$/')
                                ->length(16)
                                ->readOnly()
                                ->extraInputAttributes(['inputmode' => 'numeric'])
                                ->validationMessages([
                                    'regex' => 'Hanya boleh diisi angka.',
                                    'length' => 'Nomor KK harus tepat 16 digit.',
                                ]),
                            TextInput::make('name')
                                ->label('Nama Lengkap')
                                ->placeholder('Emerson Mendoza')
                                ->readOnly()
                                ->required(),
                            Textarea::make('address')
                                ->label('Alamat')
                                ->readOnly()
                                ->placeholder('KP. CIBADAK RT.01 RW.01')
                                ->required()
                                ->columnSpanFull(),
                            Textarea::make('status')
                                ->label('Status Evakuasi')
                                ->placeholder('Dirumah')
                                ->required()
                                ->columnSpanFull(),
                            TextInput::make('coordinates')
                                ->label('Koordinat')
                                ->required()
                                ->placeholder('-6.812673124634825, 107.13181580047049')
                                ->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),

            ]);
    }
}
