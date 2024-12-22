<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataAnggotaResource\Pages;
use App\Models\DataAnggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DataAnggotaResource extends Resource
{
    protected static ?string $model = DataAnggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('avatar')
                ->image()
                ->required(),
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20),

                Forms\Components\TextInput::make('kelas')
                    ->label('Kelas')
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('program_studi')
                    ->label('Program Studi')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('instansi')
                    ->label('Instansi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn :: make('avatar'),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kelas')
                    ->label('Kelas')
                    ->sortable(),

                Tables\Columns\TextColumn::make('program_studi')
                    ->label('Program Studi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jurusan')
                    ->label('Jurusan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('instansi')
                    ->label('Instansi')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDataAnggotas::route('/'),
            'create' => Pages\CreateDataAnggota::route('/create'),
            'edit' => Pages\EditDataAnggota::route('/{record}/edit'),
        ];
    }
}