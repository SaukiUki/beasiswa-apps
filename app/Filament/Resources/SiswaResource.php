<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $label = 'Data Siswa/Mahasiswa';
    protected static ?string $recordTitleAttribute = 'nama_siswa';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_siswa')
                ->label('Nama Siswa')
                ->required(),
                Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->nullable(),
                Forms\Components\TextInput::make('no_hp')
                ->label('Nomor HP')
                ->unique(ignoreRecord: true)
                ->required(),
                Select::make('kota_id')
                    ->label('Nama Kota')
                    ->relationship('kota', 'nama_kota')
                    ->required(),
                    Select::make('kecamatan_id')
                    ->label('Nama Kecamatan')
                    ->relationship('kecamatan', 'nama_kecamatan')
                    ->required(),
                    Select::make('kelurahan_id')
                    ->label('Nama Kelurahan')
                    ->relationship('kelurahan', 'nama_kelurahan')
                    ->required(),
                Forms\Components\Select::make('pendidikan_id')
                    ->label('Pendidikan')
                    ->relationship('pendidikan', 'nama_instansi') // Relasi ke model Pendidikan
                    ->required(),
                Forms\Components\Select::make('pendidikan_id')
                    ->label('Jenjang Pendidikan')
                    ->relationship('pendidikan', 'jenjang_pendidikan') // Relasi ke model Pendidikan
                    ->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),
                    Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak aktif' => 'Tidak Aktif',
                    ]),
                    Forms\Components\TextArea::make('alamat')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_siswa')
                ->label('Nama Siswa')

                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Email'),
            Tables\Columns\TextColumn::make('jenis_kelamin')
                ->label('Jenis Kelamin'),
            Tables\Columns\TextColumn::make('no_hp')
                ->label('No Hp'),
                TextColumn::make('kota.nama_kota')
                ->label('Nama Kota')
                ->toggleable()
                ->searchable(),
                TextColumn::make('kecamatan.nama_kecamatan')
                ->label('Nama Kecamatan')
                ->toggleable()
                ->searchable(),
                TextColumn::make('kelurahan.nama_kelurahan')
                ->label('Nama Kelurahan')
                ->toggleable()
                ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan.nama_instansi')
                ->label('Pendidikan')
                ->sortable()
                ->toggleable()
                ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan.jenjang_pendidikan')
                ->label('Jenjang Pendidikan')
                ->sortable()
                ->toggleable()
                ->searchable(),
            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat'),
            Tables\Columns\TextColumn::make('status')
                ->label('Status'),
            ])
            ->filters([
                SelectFilter::make('kota')
                ->label('Nama Kota')
                ->relationship('kota', 'nama_kota'),
                SelectFilter::make('kecamatan')
                ->label('Nama Kecamatan')
                ->relationship('kecamatan', 'nama_kecamatan'),
                SelectFilter::make('kelurahan')
                ->label('Nama Kelurahan')
                ->relationship('kelurahan', 'nama_kelurahan'),
                SelectFilter::make('pendidikan')
                ->label('Nama Instansi')
                ->relationship('pendidikan', 'nama_instansi'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
