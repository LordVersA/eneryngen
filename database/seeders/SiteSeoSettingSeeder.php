<?php

namespace Database\Seeders;

use App\Models\SiteSeoSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSeoSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_title' => 'Energy Engen - Upstream Energy Solutions',
                'site_description' => 'Leading provider of upstream energy engineering solutions with over 35 years of experience in Oil & Gas, CCS, and UGS projects globally.',
                'site_keywords' => 'energy engineering, upstream energy, oil and gas, CCS, carbon capture storage, UGS, underground gas storage, energy solutions',
                'author' => 'Energy Engen',
                'canonical_url' => config('app.url'),

                // Open Graph
                'og_title' => 'Energy Engen - Upstream Energy Solutions',
                'og_description' => 'Leading provider of upstream energy engineering solutions with over 35 years of experience in Oil & Gas, CCS, and UGS projects globally.',
                'og_type' => 'website',
                'og_locale' => 'en_US',

                // Twitter Card
                'twitter_card_type' => 'summary_large_image',
                'twitter_site' => '@energyengen',

                // Analytics & Tracking
                'google_analytics_id' => null,
                'google_tag_manager_id' => null,
                'facebook_pixel_id' => null,

                // Robots
                'robots_meta' => 'index, follow',
                'googlebot_meta' => 'index, follow',

                // Schema.org
                'organization_name' => 'Energy Engen',
                'organization_description' => 'Upstream energy engineering and consulting services for Oil & Gas, CCS, and UGS projects.',

                // Theme
                'theme_color' => '#000000',
            ]
        );
    }
}
