<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'label' => 'Years Experience',
                'value' => '15+',
                'order' => 0,
            ],
            [
                'label' => 'Projects Delivered',
                'value' => '200+',
                'order' => 1,
            ],
            [
                'label' => 'Expert Team',
                'value' => '50+',
                'order' => 2,
            ],
        ];

        foreach ($stats as $data) {
            Stat::create([
                'label' => $data['label'],
                'value' => $data['value'],
                'status' => 'active',
                'order' => $data['order'],
            ]);
        }
    }
}
