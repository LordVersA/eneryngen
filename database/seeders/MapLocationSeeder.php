<?php

namespace Database\Seeders;

use App\Models\MapLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'London, UK',
                'latitude' => 51.5074,
                'longitude' => -0.1278,
                'marker_color' => '#00b3c1',
                'info_window_content' => '<h3>London Headquarters</h3><p>United Kingdom</p>',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Muscat, Oman',
                'latitude' => 23.5880,
                'longitude' => 58.3829,
                'marker_color' => '#00b3c1',
                'info_window_content' => '<h3>Muscat Office</h3><p>Oman</p>',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($locations as $location) {
            MapLocation::create($location);
        }
    }
}
