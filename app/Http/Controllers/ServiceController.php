<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        $hero = HeroSection::forPage('services')->first();
        $settings = SiteSetting::pluck('value', 'key');

        return view('services', compact('services', 'hero', 'settings'));
    }
}
