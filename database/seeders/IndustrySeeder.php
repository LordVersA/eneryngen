<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            [
                'name' => 'Oil & Gas',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8c0-1-1-2-2-2s-2 1-2 2v7"></path><path d="M9 8c0-1-1-2-2-2s-2 1-2 2v7"></path><path d="M5 15v4a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-4"></path><line x1="12" y1="8" x2="12" y2="20"></line></svg>',
            ],
            [
                'name' => 'Renewables',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9.59 0.465l2.534 7.72h8.408l-6.954 5.243 2.536 7.747L9.59 15.928 2.645 21.17l2.536-7.747L-1.733 8.185h8.408L9.59 0.465z"></path></svg>',
            ],
            [
                'name' => 'Industrial Energy',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
            ],
            [
                'name' => 'Offshore Systems',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 13a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3v2m-4-8h2a2 2 0 0 1 2 2v2"></path><circle cx="12" cy="13" r="2"></circle><path d="M22 17v4a2 2 0 0 1-2 2h-4"></path><path d="M2 17v4a2 2 0 0 0 2 2h4"></path><line x1="6" y1="9" x2="6" y2="13"></line></svg>',
            ],
            [
                'name' => 'Carbon Management',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path><path d="M12 6v6l4 2"></path></svg>',
            ],
            [
                'name' => 'Infrastructure',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
            ],
        ];

        foreach ($industries as $index => $data) {
            Industry::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'icon_svg' => $data['icon_svg'],
                'status' => 'active',
                'order' => $index,
            ]);
        }
    }
}
