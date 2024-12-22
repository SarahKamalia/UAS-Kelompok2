<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KamarResource\Pages;
use App\Models\Kamar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KamarResource extends Resource
{
    protected static ?string $model = Kamar::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kamar')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('deskripsi_kamar')
                    ->required(),

                Forms\Components\TextInput::make('fasilitas')
                    ->required(),

                Forms\Components\TextInput::make('harga_kamar')
                    ->numeric()
                    ->required(),

                Forms\Components\Select::make('status_kamar')
                    ->options([
                        'Tersedia' => 'Tersedia',
                        'Tersewa' => 'Tersewa',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kamar')
                    ->label('Nama Kamar')
                    ->searchable(),

                Tables\Columns\TextColumn::make('alamat_kamar')
                    ->label('Alamat Kamar')
                    ->searchable(),

                Tables\Columns\TextColumn::make('harga_kamar')
                    ->label('Harga Kamar')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status_kamar')
                    ->label('Status')
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
            'index' => Pages\ListKamars::route('/'),
            'create' => Pages\CreateKamar::route('/create'),
            'edit' => Pages\EditKamar::route('/{record}/edit'),
        ];
    }
}