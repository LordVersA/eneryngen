<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSeoSetting extends Model
{
    protected $fillable = [
        'site_title',
        'site_description',
        'site_keywords',
        'author',
        'canonical_url',
        'favicon',
        'og_image',
        'og_title',
        'og_description',
        'og_type',
        'og_locale',
        'twitter_card_type',
        'twitter_site',
        'twitter_creator',
        'google_analytics_id',
        'google_tag_manager_id',
        'facebook_pixel_id',
        'robots_meta',
        'googlebot_meta',
        'organization_name',
        'organization_logo',
        'organization_description',
        'theme_color',
    ];

    /**
     * Get the singleton SEO settings instance.
     * Creates one if it doesn't exist.
     */
    public static function getSettings()
    {
        return static::firstOrCreate([]);
    }
}
