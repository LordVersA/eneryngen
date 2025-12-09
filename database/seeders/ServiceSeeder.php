<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Energy Systems Engineering',
                'description' => 'Advanced technical solutions for integrated energy infrastructure and grid optimization.',
                'badge_number' => 1,
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polyline></svg>',
            ],
            [
                'title' => 'Oil & Gas Consultancy',
                'description' => 'Strategic engineering and operational excellence across upstream, midstream, and downstream.',
                'badge_number' => 2,
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>',
            ],
            [
                'title' => 'Carbon Capture & Storage (CCS)',
                'description' => 'Pioneering decarbonization technologies and carbon management systems.',
                'badge_number' => 3,
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 2.2"></path></svg>',
            ],
            [
                'title' => 'Next-Gen Energy Strategy',
                'description' => 'Future-focused planning for energy transition and sustainable growth.',
                'badge_number' => 4,
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>',
            ],
        ];

        foreach ($services as $index => $data) {
            Service::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
                'icon_svg' => $data['icon_svg'],
                'badge_number' => $data['badge_number'],
                'status' => 'active',
                'order' => $index,
            ]);
        }
    }
}
