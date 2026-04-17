<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServePrerendered
{
    // Known crawler UA fragments. Match is substring + case-insensitive.
    private const BOT_PATTERNS = [
        'googlebot',
        'bingbot',
        'yandex',
        'baiduspider',
        'duckduckbot',
        'slurp',
        'applebot',
        'facebookexternalhit',
        'facebot',
        'twitterbot',
        'linkedinbot',
        'whatsapp',
        'telegrambot',
        'discordbot',
        'slackbot',
        'skypeuripreview',
        'redditbot',
        'embedly',
        'pinterest',
        'msnbot',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // Escape valve: disable via env without redeploying code.
        if (env('PRERENDER_ENABLED', true) === false) {
            return $next($request);
        }

        if (! $this->isBot($request->userAgent())) {
            return $next($request);
        }

        $locale = $request->query('lang') === 'kh' ? 'kh' : 'en';
        $currentPath = '/' . ltrim($request->path(), '/');
        $rel = $currentPath === '/' ? '/index' : $currentPath;

        // Prevent path traversal: only allow simple slugs + slashes.
        if (! preg_match('#^(?:/[a-z0-9][a-z0-9\-_]*)+$#i', $rel)) {
            return $next($request);
        }

        $file = storage_path('app/prerender/' . $locale . $rel . '.html');
        if (! is_file($file)) {
            return $next($request);
        }

        return response(file_get_contents($file), 200, [
            'Content-Type' => 'text/html; charset=UTF-8',
            'X-Prerender' => '1',
            'Cache-Control' => 'public, max-age=300',
        ]);
    }

    private function isBot(?string $userAgent): bool
    {
        if (! $userAgent) {
            return false;
        }
        $ua = strtolower($userAgent);
        foreach (self::BOT_PATTERNS as $pattern) {
            if (str_contains($ua, $pattern)) {
                return true;
            }
        }

        return false;
    }
}
