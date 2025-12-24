<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        AboutSection::create([
            'title' => 'About Us',
            'description' => 'Established in 1988, OPC is a leading global energy consultancy specializing in providing clients with top-tier expertise and innovative solutions across the upstream E&P sector. OPC has built upon its reputation with a diverse and fully integrated team of experienced technical staff covering the subsurface, wells, process & facilities and commercial disciplines, providing specialist consultants for clients to tap into. Our extensive client list comprises with a Flexible and highly skilled resource base to accelerate upstream projects and maximize return on investment. Headquartered in London, OPC has a strong global presence with eight international offices, including regional hubs in Dubai, Kuala and Singapore.',
            'button_text' => 'Learn more',
            'button_url' => '#learn-more',
            'image' => null,
            'is_active' => true,
        ]);
    }
}
