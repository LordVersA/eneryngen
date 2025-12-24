<?php

namespace Database\Seeders;

use App\Models\TechnicalSupportTile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicalSupportTileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnicalSupportTile::create([
            'title' => "On Demand\nTechnical\nSupport",
            'description' => 'Our approach is to offer clients with a diverse, proven and highly skilled technical capability we have built over more than 35 years in the E&P, Energy Advisory, CCS and Gas Storage domains. Our expertise can be accessed on an hourly, day rate, or monthly basis.',
            'button_text' => 'Contact us',
            'button_url' => '#contact',
            'background_color' => 'linear-gradient(135deg, rgba(249, 250, 251, 0.6) 0%, rgba(243, 244, 246, 0.8) 100%)',
            'border_accent_color' => '#00b3c1',
            'icon_type' => 'none',
            'is_active' => true,
        ]);
    }
}
