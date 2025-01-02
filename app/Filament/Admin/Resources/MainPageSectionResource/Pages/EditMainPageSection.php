<?php

namespace App\Filament\Admin\Resources\MainPageSectionResource\Pages;

use App\Filament\Admin\Resources\MainPageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMainPageSection extends EditRecord
{
    protected static string $resource = MainPageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
