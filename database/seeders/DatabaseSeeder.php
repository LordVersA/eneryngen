<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@energyngen.com',
            'password' => bcrypt('admin123'),
        ]);

        // Seed content
        $this->call([
            ProjectSeeder::class,
            ServiceSeeder::class,
            IndustrySeeder::class,
            StatSeeder::class,
            HeroSectionSeeder::class,
            SiteSettingSeeder::class,
            TechnicalSupportTileSeeder::class,
            ServiceCardSeeder::class,
            ExcellenceItemSeeder::class,
            MapLocationSeeder::class,
            AboutSectionSeeder::class,
        ]);
    }
}
