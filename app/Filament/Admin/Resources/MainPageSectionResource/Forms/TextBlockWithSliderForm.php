<?php

namespace App\Filament\Admin\Resources\MainPageSectionResource\Forms;

use App\Filament\Contracts\ReusableFormContract;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
class TextBlockWithSliderForm implements ReusableFormContract
{
    public static function schema(): array
    {
        return [
            FileUpload::make('content.photos')
                ->image()
                ->label('Добавить фотографии в слайдер')
                ->multiple()
                ->default([]),
            RichEditor::make('content.main_text')
                ->label('Основной текст')
                ->required()
                ->placeholder("Основной текст блока")
        ];
    }
}