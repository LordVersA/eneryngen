<?php

namespace App\View\Composers;

use App\Models\SiteSeoSetting;
use Illuminate\View\View;

class SeoComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $seo = SiteSeoSetting::first();

        $view->with('seo', $seo);
    }
}