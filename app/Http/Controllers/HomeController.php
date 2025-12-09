<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Industry;
use App\Models\SiteSetting;
use App\Models\Stat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroSection::forPage('home')->first();
        $industries = Industry::active()->ordered()->get();
        $stats = Stat::active()->ordered()->get();
        $settings = SiteSetting::pluck('value', 'key');

        return view('index', compact('hero', 'industries', 'stats', 'settings'));
    }
}
