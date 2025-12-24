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
                'badge_text' => 'UPSTREAM ENERGY SOLUTIONS',
                'title' => "Upstream\nEnergy Experts",
                'subtitle' => 'Over 35 years of energy experience',
                'highlight_heading' => 'Oil & Gas | CCS | UGS',
                'highlight_text' => 'We provide clients with the Capability and Capacity to enable them to deliver upstream energy and storage projects globally.',
                'cta_text' => 'About us',
                'cta_url' => '#about',
                'background_image' => 'https://images.unsplash.com/photo-1629792921074-1ec53065b222?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBlbmVyZ3klMjBhcmNoaXRlY3R1cmV8ZW58MXx8fHwxNzY1MTM5NjE4fDA&ixlib=rb-4.0&q=80&w=1080',
                'is_active' => true,
            ],
            [
                'page' => 'projects',
                'badge_text' => 'OUR WORK',
                'title' => 'Selected Projects',
                'subtitle' => 'Showcasing our most impactful energy engineering solutions',
                'cta_text' => null,
                'cta_url' => null,
                'background_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920',
                'is_active' => true,
            ],
            [
                'page' => 'services',
                'badge_text' => 'WHAT WE DO',
                'title' => 'Our Services',
                'subtitle' => 'Comprehensive energy engineering solutions tailored to your needs',
                'cta_text' => null,
                'cta_url' => null,
                'background_image' => 'https://images.unsplash.com/photo-1581094794329-c8112c4e5190?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920',
                'is_active' => true,
            ],
        ];

        foreach ($heroes as $data) {
            HeroSection::updateOrCreate(
                ['page' => $data['page']],
                $data
            );
        }
    }
}
