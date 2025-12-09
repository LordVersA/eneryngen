<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'North Sea CCS Infrastructure',
                'category' => 'Carbon Capture & Storage',
                'description' => 'Engineering design and feasibility for a large-scale offshore carbon storage facility.',
                'project_number' => '01',
                'image_url' => 'https://images.unsplash.com/photo-1732304719545-9f895cbaec7b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjYXJib24lMjBjYXB0dXJlJTIwdGVjaG5vbG9neXxlbnwxfHx8fDE3NjUxMzg5MzJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
            [
                'title' => 'Integrated Energy Hub Development',
                'category' => 'Energy Systems',
                'description' => 'Strategic planning and engineering for multi-source energy integration and distribution.',
                'project_number' => '02',
                'image_url' => 'https://images.unsplash.com/photo-1723177548474-b58ada59986b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxyZW5ld2FibGUlMjBlbmVyZ3klMjBncmlkfGVufDF8fHx8MTc2NTEzOTA0NHww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
            [
                'title' => 'Offshore Platform Optimization',
                'category' => 'Oil & Gas',
                'description' => 'Operational efficiency enhancement and asset integrity management for mature fields.',
                'project_number' => '03',
                'image_url' => 'https://images.unsplash.com/photo-1655763161700-8f284f0ceca9?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvaWwlMjBnYXMlMjBwbGFudHxlbnwxfHx8fDE3NjUxMzkwNDN8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
        ];

        foreach ($projects as $index => $data) {
            $filename = $this->downloadImage($data['image_url'], 'projects');

            Project::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'category' => $data['category'],
                'description' => $data['description'],
                'image' => $filename,
                'project_number' => $data['project_number'],
                'status' => 'active',
                'order' => $index,
            ]);
        }
    }

    private function downloadImage($url, $folder)
    {
        try {
            $response = Http::get($url);
            if ($response->successful()) {
                $filename = Str::uuid() . '.jpg';
                $path = storage_path("app/public/images/{$folder}/{$filename}");
                file_put_contents($path, $response->body());
                return "images/{$folder}/{$filename}";
            }
        } catch (\Exception $e) {
            \Log::error("Failed to download image: {$url}", ['error' => $e->getMessage()]);
        }
        return null;
    }
}
