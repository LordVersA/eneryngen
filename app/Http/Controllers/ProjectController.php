<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::active()->ordered()->get();
        $hero = HeroSection::forPage('projects')->first();
        $settings = SiteSetting::pluck('value', 'key');

        return view('projects', compact('projects', 'hero', 'settings'));
    }
}
