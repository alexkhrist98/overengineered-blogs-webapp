<?php

namespace App\Filament\Admin\Resources\MainPageSectionResource\Pages;

use App\Filament\Admin\Resources\MainPageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMainPageSections extends ListRecords
{
    protected static string $resource = MainPageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
