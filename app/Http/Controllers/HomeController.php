<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Industry;
use App\Models\SiteSetting;
use App\Models\Stat;
use App\Models\TechnicalSupportTile;
use App\Models\ServiceCard;
use App\Models\ExcellenceItem;
use App\Models\MapLocation;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroSection::forPage('home')->first();
        $industries = Industry::active()->ordered()->get();
        $stats = Stat::active()->ordered()->get();
        $settings = SiteSetting::pluck('value', 'key');

        // Add new dynamic data
        $technicalSupportTile = TechnicalSupportTile::active()->first();
        $serviceCards = ServiceCard::active()->ordered()->get();
        $excellenceItems = ExcellenceItem::active()->ordered()->get();
        $mapLocations = MapLocation::active()->ordered()->get();
        $aboutSection = AboutSection::where('is_active', true)->first();

        return view('index', compact(
            'hero',
            'industries',
            'stats',
            'settings',
            'technicalSupportTile',
            'serviceCards',
            'excellenceItems',
            'mapLocations',
            'aboutSection'
        ));
    }
}
