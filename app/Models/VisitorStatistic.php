<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VisitorStatistic extends Model
{
    protected $fillable = [
        'ip_address',
        'session_id',
        'url',
        'referrer',
        'user_agent',
        'device_type',
        'browser',
        'browser_version',
        'platform',
        'country',
        'city',
        'language',
        'is_bot',
        'page_load_time',
    ];

    protected $casts = [
        'is_bot' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function getVisitsInLastDays(int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->count();
    }

    public static function getUniqueVisitorsInLastDays(int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->distinct('ip_address')
            ->count('ip_address');
    }

    public static function getTopReferrers(int $limit = 10, int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->whereNotNull('referrer')
            ->where('referrer', '!=', '')
            ->select('referrer', DB::raw('count(*) as count'))
            ->groupBy('referrer')
            ->orderByDesc('count')
            ->limit($limit)
            ->get();
    }

    public static function getTopPages(int $limit = 10, int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->select('url', DB::raw('count(*) as count'))
            ->groupBy('url')
            ->orderByDesc('count')
            ->limit($limit)
            ->get();
    }

    public static function getTopCountries(int $limit = 10, int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->whereNotNull('country')
            ->select('country', DB::raw('count(*) as count'))
            ->groupBy('country')
            ->orderByDesc('count')
            ->limit($limit)
            ->get();
    }

    public static function getDeviceStats(int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->whereNotNull('device_type')
            ->select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->orderByDesc('count')
            ->get();
    }

    public static function getBrowserStats(int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->whereNotNull('browser')
            ->select('browser', DB::raw('count(*) as count'))
            ->groupBy('browser')
            ->orderByDesc('count')
            ->get();
    }

    public static function getDailyVisits(int $days = 30)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->where('is_bot', false)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }
}
