<?php

namespace App\Filament\Resources\DataAnggotaResource\Pages;

use App\Filament\Resources\DataAnggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataAnggotas extends ListRecords
{
    protected static string $resource = DataAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
