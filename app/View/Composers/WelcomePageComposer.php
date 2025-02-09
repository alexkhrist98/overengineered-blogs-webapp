<?php

namespace App\View\Composers;

use App\Models\MainPageSection;
use Illuminate\View\View;

class WelcomePageComposer
{
    public function compose(View $view): void
    {
        $collection = MainPageSection::where('is_active', true)
            ->orderBy('sorc')
            ->get();

        $view->with('sections', $collection->toArray());
    }
}