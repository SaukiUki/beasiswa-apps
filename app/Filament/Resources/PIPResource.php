<?php

namespace App\Filament\Resources;

use App\Models\PIP;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\DateColumn;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PIPResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PIPResource\Widgets\PIPStats;
use App\Filament\Resources\PIPResource\RelationManagers;
use App\Filament\Widgets\PIPSiswaPerKabupatenChart;
use App\Filament\Widgets\PIPSiswaPerKecamatanChart;


class PIPResource extends Resource
{
    protected static ?string $model = PIP::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Data PIP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')->label('NIK'),
                Forms\Components\TextInput::make('pengusul')->label('Pengusul'),
                Forms\Components\TextInput::make('pdid')->label('PDID'),
                Forms\Components\TextInput::make('nama_siswa')->label('Nama Siswa')->required(),
                Forms\Components\TextInput::make('nama_sekolah')->label('Nama Sekolah'),
                Forms\Components\TextInput::make('provinsi')->label('Provinsi'),
                Forms\Components\TextInput::make('kabupaten')->label('Kabupaten/Kota'),
                Forms\Components\TextInput::make('kecamatan')->label('Kecamatan'),
                Forms\Components\TextInput::make('nik2')->label('NIK 2'),
                Forms\Components\TextInput::make('nisn')->label('NISN'),
                Forms\Components\TextInput::make('npsn')->label('NPSN'),
                Forms\Components\TextInput::make('kelas'),
                Forms\Components\TextInput::make('rombel'),
                Forms\Components\TextInput::make('semester'),
                Forms\Components\TextInput::make('jenjang')->label('Jenjang Pendidikan'),
                Forms\Components\TextInput::make('bentuk'),
                Forms\Components\Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('tempat_lahir'),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\TextInput::make('nama_ayah'),
                Forms\Components\TextInput::make('nama_ibu'),
                Forms\Components\TextInput::make('nominal')->numeric(),
                Forms\Components\TextInput::make('tipe_sk'),
                Forms\Components\TextInput::make('nomor_sk'),
                Forms\Components\TextInput::make('nomor_sk_nominasi'),
                Forms\Components\DatePicker::make('tanggal_sk'),
                Forms\Components\DatePicker::make('tanggal_sk_nominasi'),
                Forms\Components\TextInput::make('tahap'),
                Forms\Components\TextInput::make('tahap_nominasi'),
                Forms\Components\TextInput::make('virtual_account'),
                Forms\Components\TextInput::make('virtual_account_nominasi'),
                Forms\Components\TextInput::make('no_rekening')->label('Nomor Rekening'),
                Forms\Components\TextInput::make('bank')->label('Bank'),
                Forms\Components\DatePicker::make('tanggal_aktifasi'),
                Forms\Components\DatePicker::make('tanggal_mulai_pencairan'),
                Forms\Components\DatePicker::make('tanggal_cair'),
                Forms\Components\TextInput::make('no_kip')->label('No. KIP'),
                Forms\Components\TextInput::make('no_kks')->label('No. KKS'),
                Forms\Components\TextInput::make('no_kps')->label('No. KPS'),
                Forms\Components\TextInput::make('no_pkh')->label('No. PKH'),
                Forms\Components\TextInput::make('layak_pip')->label('Layak PIP'),
                Forms\Components\TextInput::make('nama_pengusul'),
                Forms\Components\TextInput::make('nama_pengusul_utama'),
                Forms\Components\TextInput::make('fase'),
                Forms\Components\TextArea::make('keterangan_tahap')->label('Keterangan Tahap')->columnSpanFull(),
                Forms\Components\TextArea::make('keterangan_pencairan')->label('Keterangan Pencairan')->columnSpanFull(),
                Forms\Components\TextArea::make('keterangan_tambahan')->label('Keterangan Tambahan')->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak aktif' => 'Tidak Aktif',
                    ]),
                Forms\Components\TextInput::make('status2'),
                Forms\Components\TextInput::make('no_hp')->label('Nomor HP')->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('rekomendasi'),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_siswa')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_sekolah')
                    ->label('Nama Sekolah')
                    ->toggleable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('provinsi')
                    ->label('Provinsi')
                    ->toggleable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('kabupaten')
                    ->label('Kabupaten/Kota')
                    ->toggleable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('kecamatan')
                    ->label('Kecamatan')
                    ->toggleable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('kelas')
                    ->label('Kelas')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('semester')
                    ->label('Semester')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('jenjang')
                    ->label('Jenjang Pendidikan')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin'),

                Tables\Columns\TextColumn::make('no_hp')
                    ->label('No HP')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('no_rekening')
                    ->label('No. Rekening')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('bank')
                    ->label('Bank')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('fase')
                    ->label('Fase')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('status2')
                    ->label('Status 2')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tahap')
                    ->label('Tahap')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal')
                    ->sortable()
                    ->money('IDR', true)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tanggal_cair')
                    ->label('Tanggal Cair')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('virtual_account')
                    ->label('Virtual Account')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('rekomendasi')
                    ->label('Rekomendasi')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('jenis_kelamin')->label('Jenis Kelamin')->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan',
                ]),

                SelectFilter::make('status')->label('Status')->options([
                    'sk' => 'SK',
                    'prask' => 'Pra SK',
                ]),

                SelectFilter::make('fase')->label('Fase')->options(
                    fn() =>
                    \App\Models\PIP::query()
                        ->select('fase')
                        ->distinct()
                        ->whereNotNull('fase')
                        ->orderBy('fase')
                        ->pluck('fase', 'fase')
                        ->toArray()
                ),

                SelectFilter::make('kabupaten')->label('Kabupaten/Kota')->options(
                    fn() =>
                    \App\Models\PIP::query()
                        ->select('kabupaten')
                        ->distinct()
                        ->whereNotNull('kabupaten')
                        ->orderBy('kabupaten')
                        ->pluck('kabupaten', 'kabupaten')
                        ->toArray()
                ),

                SelectFilter::make('jenjang')->label('Jenjang Pendidikan')->options(
                    fn() =>
                    \App\Models\PIP::query()
                        ->select('jenjang')
                        ->distinct()
                        ->whereNotNull('jenjang')
                        ->orderBy('jenjang')
                        ->pluck('jenjang', 'jenjang')
                        ->toArray()
                ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getWidgets(): array
    {
        return [
            \App\Filament\Resources\PIPResource\Widgets\PIPStats::class,


        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPIPS::route('/'),
            'create' => Pages\CreatePIP::route('/create'),
            'edit' => Pages\EditPIP::route('/{record}/edit'),
        ];
    }
}
