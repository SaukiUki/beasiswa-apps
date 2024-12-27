<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\OrangTua;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrangTuaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrangTuaResource\RelationManagers;

class OrangTuaResource extends Resource
{
    protected static ?string $model = OrangTua::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $label = 'Data Orang Tua';
    protected static ?string $recordTitleAttribute = 'nama_wali';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_wali')
                    ->required()
                    ->label('Nama Wali'),
                    Forms\Components\Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),
                    Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('Nomor HP'),
                    Forms\Components\TextInput::make('pekerjaan')
                    ->required()
                    ->label('Pekerjaan'),
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
                    Select::make('siswa_id')
                    ->label('Nama Siswa')
                    ->relationship('siswa', 'nama_siswa')
                    ->required(),
                    Forms\Components\TextArea::make('alamat')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_wali')->label('Nama Wali')->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('no_hp')->label('Nomor HP'),
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
                TextColumn::make('siswa.nama_siswa')
                ->label('Nama Siswa')
                ->searchable(),
                Tables\Columns\TextColumn::make('alamat')->label('Alamat')->searchable(),
            ])
            ->filters([
                SelectFilter::make('siswa')
                ->label('Nama Siswa')
                ->relationship('siswa', 'nama_siswa'),
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
            'index' => Pages\ListOrangTuas::route('/'),
            'create' => Pages\CreateOrangTua::route('/create'),
            'edit' => Pages\EditOrangTua::route('/{record}/edit'),
        ];
    }
}
