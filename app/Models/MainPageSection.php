<?php

namespace App\Models;
use App\Casters\MainPageSectionTypeCaster;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель блока главной страницы блока
 * @property string  $main_text основной текст блока
 * @property string $link - ссылка (для блоков со ссылкой)
 * @property string $button_text - текст кнопки (для блоков с кнопками)
 * @property array[string] $photos - массив путей к фотографиям
 */
class MainPageSection extends Model
{
    protected $casts = [
        'type' => MainPageSectionTypeCaster::class,
        'content' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_active' => 'boolean',
        'sort' => 'integer',
    ];

    protected $fillable = [
        'title',
        'type',
        'content',
        'is_active',
        'sort',
    ];

    public function getMainTextAttribute(): string
    {
        return $this->content['main_text'] ?? '';
    }
    public function getLinkAttribute(): string
    {
        return $this->content['link'] ?? '';
    }
    public function getButtonTextAttribute(): string
    {
        return $this->content['button_text'] ?? '';
    }
    public function setMainTextAttribute(string $value): void
    {
        $this->content['main_text'] = $value;
    }

    public function setButtonTextAttribute(string $value): void
    {
        $this->content['button_text'] = $value;
    }

    public function setLinkAttribute(string $value): void
    {
        $this->content['link'] = $value;
    }

    public function setPhotosAttribute($value): void
    {
        $this->content['photos'] = $value;
    }
}
