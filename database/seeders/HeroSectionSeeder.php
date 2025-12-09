<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroes = [
            [
                'page' => 'home',
                'title' => 'Next Generation Energy Engineering Solutions',
                'subtitle' => 'Delivering advanced engineering, strategy, and energy transition support across Oil & Gas, CCS, and future energy systems.',
                'cta_text' => 'Discover Our Capabilities',
                'cta_url' => '#capabilities',
                'is_active' => true,
            ],
            [
                'page' => 'projects',
                'title' => 'Selected Projects',
                'subtitle' => 'Showcasing our most impactful energy engineering solutions',
                'is_active' => true,
            ],
            [
                'page' => 'services',
                'title' => 'Our Services',
                'subtitle' => 'Comprehensive energy engineering solutions tailored to your needs',
                'is_active' => true,
            ],
        ];

        foreach ($heroes as $data) {
            HeroSection::create($data);
        }
    }
}
