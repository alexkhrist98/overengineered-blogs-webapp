<?php

namespace App\Filament\Admin\Resources\MainPageSectionResource\Forms;

use App\Filament\Contracts\ReusableFormContract;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
class TextBlockWithSliderForm implements ReusableFormContract
{
    public static function schema(): array
    {
        return [
            FileUpload::make('photos')
                ->image()
                ->label('Добавить фотографии в слайдер')
                ->multiple()
                ->default([]),
            MarkdownEditor::make('main_text')
                ->label('Основной текст')
        ];
    }
}