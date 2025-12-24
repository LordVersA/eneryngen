<?php

namespace Database\Seeders;

use App\Models\ServiceCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            [
                'title' => 'Projects, Studies &<br>Advisory',
                'description' => "OPC's work is completed by seasoned professionals with OPC advisory expertise in a specific discipline.",
                'button_text' => 'Explore here',
                'button_url' => '#explore',
                'background_color' => '#14b8a6',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'SMART Secondments',
                'description' => 'Access to more than 8,000 technically vetted GML consultants globally, embedded in client projects.',
                'button_text' => 'Explore here',
                'button_url' => '#explore',
                'background_color' => '#06b6d4',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Training',
                'description' => 'Full portfolio of technical training courses - tailored to specific clients and disciplines or commercially available.',
                'button_text' => 'Explore here',
                'button_url' => '#explore',
                'background_color' => '#3b82f6',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Technology',
                'description' => 'OPC in collaboration with industry leaders has developed a powerful suite of software and E&P specific technology.',
                'button_text' => 'Explore here',
                'button_url' => '#explore',
                'background_color' => '#a855f7',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($cards as $card) {
            ServiceCard::create($card);
        }
    }
}
