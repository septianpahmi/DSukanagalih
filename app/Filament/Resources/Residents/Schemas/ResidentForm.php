<?php

namespace App\Filament\Resources\Residents\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ResidentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Kependudukan')
                    ->description('Lengkapi detail data warga sesuai dengan Kartu Keluarga.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('no_kk')
                                ->label('NO KK')
                                ->required()
                                ->regex('/^[0-9]+$/')
                                ->length(16)
                                ->extraInputAttributes(['inputmode' => 'numeric'])
                                ->validationMessages([
                                    'regex' => 'Hanya boleh diisi angka.',
                                    'length' => 'Nomor KK harus tepat 16 digit.',
                                ]),
                            TextInput::make('nik')
                                ->label('NIK')
                                ->regex('/^[0-9]+$/')
                                ->length(16)
                                ->extraInputAttributes(['inputmode' => 'numeric'])
                                ->validationMessages([
                                    'regex' => 'Hanya boleh diisi angka.',
                                    'length' => 'Nomor NIK harus tepat 16 digit.',
                                ]),
                        ]),
                        TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('temp_lahir')
                                ->label('Tempat Lahir')
                                ->required(),
                            DatePicker::make('tgl_lahir')
                                ->label('Tanggal Lahir')
                                ->required()
                                ->maxDate(now())
                                ->validationMessages([
                                    'after_or_equal' => 'Tanggal lahir tidak boleh melebihi tanggal hari ini.',
                                ]),
                        ]),
                        Grid::make(3)->schema([
                            Select::make('jk')
                                ->label('Jenis Kelamin')
                                ->required()
                                ->options([
                                    'L' => 'Laki-Laki',
                                    'P' => 'Perempuan'
                                ]),
                            Select::make('agama')
                                ->label('Agama')
                                ->required()
                                ->options([
                                    'Islam' => 'Islam',
                                    'Kristen' => 'Kristen',
                                    'Katolik' => 'Katolik',
                                    'Hindu' => 'Hindu',
                                    'Buddha' => 'Buddha',
                                    'Khongucu' => 'Khongucu',
                                ]),
                            Select::make('pendidikan')
                                ->label('Pendidikan')
                                ->required()
                                ->options([
                                    'Tidak/Belum Sekolah' => 'Tidak/Belum Sekolah',
                                    'Belum Tamat SD/Sederajat' => 'Belum Tamat SD/Sederajat',
                                    'Tamat SD/Sederajat' => 'Tamat SD/Sederajat',
                                    'SLTP/Sederajat' => 'SLTP/Sederajat',
                                    'SLTA/Sederajat' => 'SLTA/Sederajat',
                                    'Diploma I/II' => 'Diploma I/II',
                                    'Akademi/Diploma III/S. Muda' => 'Akademi/Diploma III/S. Muda',
                                    'Diploma IV/Strata I (S1)' => 'Diploma IV/Strata I (S1)',
                                    'Strata II (S2)' => 'Strata II (S2)',
                                    'Strata III (S3)' => 'Strata III (S3)',
                                ]),
                        ]),
                        Grid::make(2)->schema([
                            Select::make('pekerjaan')
                                ->label('Pekerjaan')
                                ->required()
                                ->options([
                                    'Belum/Tidak Bekerja' => 'Belum/Tidak Bekerja',
                                    'Mengurus Rumah Tangga' => 'Mengurus Rumah Tangga',
                                    'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa',
                                    'Pensiunan' => 'Pensiunan',
                                    'Pegawai Negeri Sipil (PNS)' => 'Pegawai Negeri Sipil (PNS)',
                                    'TNI / POLRI' => 'TNI / POLRI',
                                    'Karyawan Swasta' => 'Karyawan Swasta',
                                    'Wiraswasta' => 'Wiraswasta',
                                    'Buruh Harian Lepas' => 'Buruh Harian Lepas',
                                    'Petani/Pekebun / Nelayan' => 'Petani/Pekebun / Nelayan',
                                    'Perangkat Desa / Kepala Desa' => 'Perangkat Desa / Kepala Desa',
                                ]),
                            Select::make('status_perkawinan')
                                ->label('Status Perkawinan')
                                ->required()
                                ->options([
                                    'Belum Kawin' => 'Belum Kawin',
                                    'Kawin' => 'Kawin',
                                    'Cerai Hidup' => 'Cerai Hidup',
                                    'Cerai Mati' => 'Cerai Mati',
                                ]),
                            Select::make('status_hubungan')
                                ->label('Status Hubungan')
                                ->options([
                                    'Kepala Keluarga' => 'Kepala Keluarga',
                                    'Suami' => 'Suami',
                                    'Isteri' => 'Isteri',
                                    'Anak' => 'Anak',
                                    'Menantu' => 'Menantu',
                                    'Cucu' => 'Cucu',
                                    'Orang Tua' => 'Orang Tua',
                                    'Mertua' => 'Mertua',
                                    'Famili Lain' => 'Famili Lain',
                                    'Pembantu' => 'Pembantu',
                                ])
                                ->required()
                                ->searchable(),
                            Select::make('kewarganegaraan')
                                ->label('Kewarganegaraan')
                                ->options([
                                    'WNI' => 'Warga Negara Indonesia (WNI)',
                                    'WNA' => 'Warga Negara Asing (WNA)',
                                ])
                                ->default('WNI')
                                ->required()
                                ->live(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('alamat')
                                ->label('Alamat')
                                ->required()
                                ->columnSpan(1),
                            Grid::make(2)->schema([
                                TextInput::make('rt')
                                    ->label('RT')
                                    ->required()
                                    ->regex('/^[0-9]+$/')
                                    ->length(3)
                                    ->extraInputAttributes(['inputmode' => 'numeric'])
                                    ->validationMessages([
                                        'regex' => 'Hanya boleh diisi angka.',
                                        'length' => 'Max 3 Angka',
                                    ]),
                                TextInput::make('rw')
                                    ->label('RW')
                                    ->required()
                                    ->required()
                                    ->regex('/^[0-9]+$/')
                                    ->length(3)
                                    ->extraInputAttributes(['inputmode' => 'numeric'])
                                    ->validationMessages([
                                        'regex' => 'Hanya boleh diisi angka.',
                                        'length' => 'Max 3 Angka',
                                    ]),
                            ]),
                        ]),
                    ])->columnSpanFull(),
            ]);
    }
}
