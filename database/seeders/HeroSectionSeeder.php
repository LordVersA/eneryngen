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
                'badge_text' => 'INNOVATION IN ENERGY',
                'title' => 'Next Generation Energy Engineering Solutions',
                'subtitle' => 'Delivering advanced engineering, strategy, and energy transition support across Oil & Gas, CCS, and future energy systems.',
                'cta_text' => 'Discover Our Capabilities',
                'cta_url' => '#capabilities',
                'background_image' => null,
                'is_active' => true,
            ],
            [
                'page' => 'projects',
                'badge_text' => 'OUR WORK',
                'title' => 'Selected Projects',
                'subtitle' => 'Showcasing our most impactful energy engineering solutions',
                'background_image' => null,
                'is_active' => true,
            ],
            [
                'page' => 'services',
                'badge_text' => 'WHAT WE DO',
                'title' => 'Our Services',
                'subtitle' => 'Comprehensive energy engineering solutions tailored to your needs',
                'background_image' => null,
                'is_active' => true,
            ],
        ];

        foreach ($heroes as $data) {
            HeroSection::create($data);
        }
    }
}
