<?php

namespace App\Filament\Admin\Resources\MainPageSectionResource\Forms;

use App\Filament\Contracts\ReusableFormContract;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;

class LinkWithTextBlockForm implements ReusableFormContract
{
    public static function schema(): array
    {
        return [
            TextInput::make('link')
                ->label('Ссылка')
                ->required()
                ->url(),
            TextInput::make('button_text')
                ->label('Текст кнопки')
                ->required(),
            MarkdownEditor::make('main_text')
                ->label('Основной текст')
        ];
    }
}