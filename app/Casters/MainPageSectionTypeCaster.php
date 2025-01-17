<?php

namespace App\Casters;

use App\Models\MainPageSection;
use App\Enums\MainPageSectionTypeEnum;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MainPageSectionTypeCaster implements CastsAttributes
{
    public function set($model, string $key, $value, array $attributes): ?string
    {
        if ($value instanceof \UnitEnum) {
            return $value->value;
        }
        return $value;
    }

    public function get($model, $key, $value, $attributes): ?MainPageSectionTypeEnum
    {
        return MainPageSectionTypeEnum::from($value);
    }
}