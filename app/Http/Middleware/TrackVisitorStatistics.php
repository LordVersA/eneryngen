<?php

namespace App\Http\Middleware;

use App\Models\VisitorStatistic;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitorStatistics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->is('admin/*') && !$request->is('livewire/*')) {
            try {
                $userAgent = $request->userAgent() ?? '';

                VisitorStatistic::create([
                    'ip_address' => $request->ip(),
                    'session_id' => $request->session()->getId(),
                    'url' => $request->fullUrl(),
                    'referrer' => $request->header('referer'),
                    'user_agent' => $userAgent,
                    'device_type' => $this->getDeviceType($userAgent),
                    'browser' => $this->getBrowser($userAgent),
                    'browser_version' => $this->getBrowserVersion($userAgent),
                    'platform' => $this->getPlatform($userAgent),
                    'language' => $request->header('accept-language') ? substr($request->header('accept-language'), 0, 2) : null,
                    'is_bot' => $this->isBot($userAgent),
                ]);
            } catch (\Exception $e) {
                \Log::error('Error tracking visitor statistics: ' . $e->getMessage());
            }
        }

        return $next($request);
    }

    private function getDeviceType(string $userAgent): string
    {
        if (preg_match('/mobile|android|iphone|ipad|ipod|blackberry|iemobile|opera mini/i', $userAgent)) {
            if (preg_match('/ipad|tablet|kindle|silk|playbook/i', $userAgent)) {
                return 'tablet';
            }
            return 'mobile';
        }
        return 'desktop';
    }

    private function getBrowser(string $userAgent): ?string
    {
        $browsers = [
            'Edge' => '/edg/i',
            'Chrome' => '/chrome/i',
            'Firefox' => '/firefox/i',
            'Safari' => '/safari/i',
            'Opera' => '/opera|opr/i',
            'Internet Explorer' => '/msie|trident/i',
        ];

        foreach ($browsers as $browser => $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return $browser;
            }
        }

        return 'Other';
    }

    private function getBrowserVersion(string $userAgent): ?string
    {
        if (preg_match('/edg\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        } elseif (preg_match('/chrome\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        } elseif (preg_match('/firefox\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        } elseif (preg_match('/version\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        }

        return null;
    }

    private function getPlatform(string $userAgent): ?string
    {
        $platforms = [
            'Windows' => '/windows nt/i',
            'Mac OS' => '/macintosh|mac os x/i',
            'Linux' => '/linux/i',
            'Android' => '/android/i',
            'iOS' => '/iphone|ipad|ipod/i',
        ];

        foreach ($platforms as $platform => $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return $platform;
            }
        }

        return 'Other';
    }

    private function isBot(string $userAgent): bool
    {
        $bots = [
            'bot', 'crawl', 'spider', 'slurp', 'bingbot', 'googlebot',
            'facebookexternalhit', 'whatsapp', 'telegrambot', 'twitterbot'
        ];

        foreach ($bots as $bot) {
            if (stripos($userAgent, $bot) !== false) {
                return true;
            }
        }

        return false;
    }
}
