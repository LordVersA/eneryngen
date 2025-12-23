<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'contact_email',
                'value' => 'BM@energyngen.com',
                'type' => 'email',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+447884761938',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'company_address',
                'value' => 'London, UK',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'company_branch',
                'value' => 'Muscat, Oman',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'company_linkedin',
                'value' => 'https://www.linkedin.com/company/energyngen/',
                'type' => 'url',
                'group' => 'contact',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
