<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'contact_email',
                'value' => 'contact@energyngen.com',
                'type' => 'email',
                'group' => 'contact',
            ],
            [
                'key' => 'company_location',
                'value' => 'United Kingdom',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'company_description',
                'value' => 'EnergyNgen is a UK-based energy engineering consultancy specializing in next-generation solutions for the evolving energy landscape.',
                'type' => 'textarea',
                'group' => 'general',
            ],
        ];

        foreach ($settings as $data) {
            SiteSetting::create($data);
        }
    }
}
