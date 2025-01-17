<?php

namespace App\Filament\Admin\Resources\MainPageSectionResource\Forms;

use App\Filament\Contracts\ReusableFormContract;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class LinkWithTextBlockForm implements ReusableFormContract
{
    public static function schema(): array
    {
        return [
            TextInput::make('content.link')
                ->label('Ссылка')
                ->required()
                ->url(),
            TextInput::make('content.button_text')
                ->label('Текст кнопки')
                ->required(),
            RichEditor::make('content.main_text')
                ->label('Основной текст')
        ];
    }
}