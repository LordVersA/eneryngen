<?php

namespace Database\Seeders;

use App\Models\ExcellenceItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcellenceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Oil & Gas Upstream',
                'description' => 'Comprehensive upstream solutions including exploration, drilling, and production optimization for oil and gas fields.',
                'link_text' => 'Learn more',
                'link_url' => '#learn-more',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" /></svg>',
                'icon_primary_style' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Field Development & Operations',
                'description' => 'Strategic planning and operational excellence for field development projects, maximizing efficiency and production.',
                'link_text' => 'Learn more',
                'link_url' => '#learn-more',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>',
                'icon_primary_style' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Resource Estimation',
                'description' => 'Advanced reservoir characterization and resource estimation using cutting-edge geological and engineering methods.',
                'link_text' => 'Learn more',
                'link_url' => '#learn-more',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>',
                'icon_primary_style' => true,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Carbon Capture & Storage (CCS)',
                'description' => 'Innovative carbon capture and storage solutions supporting the energy transition and sustainability goals.',
                'link_text' => 'Learn more',
                'link_url' => '#learn-more',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" /></svg>',
                'icon_primary_style' => true,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Asset Valuation',
                'description' => 'Comprehensive asset evaluation and economic analysis for informed investment decisions in energy projects.',
                'link_text' => 'Learn more',
                'link_url' => '#learn-more',
                'icon_type' => 'svg',
                'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>',
                'icon_primary_style' => true,
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            ExcellenceItem::create($item);
        }
    }
}
