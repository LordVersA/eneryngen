<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'type' => ContactInformation::TYPE_EMAIL,
                'value' => 'bm@energyngen.com',
                'label' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'type' => ContactInformation::TYPE_LOCATION,
                'value' => 'London, United Kingdom',
                'label' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'type' => ContactInformation::TYPE_LOCATION,
                'value' => 'Muscat, Oman',
                'label' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'type' => ContactInformation::TYPE_LINKEDIN,
                'value' => '#',
                'label' => 'LinkedIn',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($contacts as $contact) {
            ContactInformation::create($contact);
        }
    }
}
