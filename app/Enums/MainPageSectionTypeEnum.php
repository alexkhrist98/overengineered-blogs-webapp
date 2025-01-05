<?php

namespace App\Enums;

enum MainPageSectionTypeEnum: string
{
    case TEXT_BLOCK_WITH_SLIDER = 'text-with-slider';
    case LINK_WITH_TEXT_BLOCK = 'link-with-text-block';

    public static function forAdminPanel(): array
    {
        return [
            self::TEXT_BLOCK_WITH_SLIDER->value => 'Текстовый блок с каруселью',
            self::LINK_WITH_TEXT_BLOCK->value => 'Текст со ссылкой',
        ];
    }
}
