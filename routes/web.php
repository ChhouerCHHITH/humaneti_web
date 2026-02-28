<?php

use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', function () {
    $baseUrl = rtrim((string) (config('app.url') ?: request()->getSchemeAndHttpHost()), '/');
    $routes = [
        ['path' => '/', 'changefreq' => 'weekly', 'priority' => '1.0'],
        ['path' => '/product', 'changefreq' => 'weekly', 'priority' => '0.9'],
        ['path' => '/solutions', 'changefreq' => 'weekly', 'priority' => '0.9'],
        ['path' => '/pricing', 'changefreq' => 'daily', 'priority' => '0.9'],
        ['path' => '/resources', 'changefreq' => 'weekly', 'priority' => '0.8'],
        ['path' => '/about', 'changefreq' => 'monthly', 'priority' => '0.6'],
        ['path' => '/contact', 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['path' => '/legal/privacy', 'changefreq' => 'monthly', 'priority' => '0.5'],
        ['path' => '/legal/terms', 'changefreq' => 'monthly', 'priority' => '0.5'],
    ];

    $today = now()->toDateString();
    $escape = static fn (string $value): string => htmlspecialchars($value, ENT_XML1 | ENT_QUOTES, 'UTF-8');

    $xml = [];
    $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

    foreach ($routes as $item) {
        $path = $item['path'] === '/' ? '' : $item['path'];
        $loc = $baseUrl . $path;
        $locEn = $loc . '?lang=en';
        $locKh = $loc . '?lang=kh';

        $xml[] = '  <url>';
        $xml[] = '    <loc>' . $escape($loc) . '</loc>';
        $xml[] = '    <xhtml:link rel="alternate" hreflang="en" href="' . $escape($locEn) . '"/>';
        $xml[] = '    <xhtml:link rel="alternate" hreflang="kh" href="' . $escape($locKh) . '"/>';
        $xml[] = '    <xhtml:link rel="alternate" hreflang="x-default" href="' . $escape($loc) . '"/>';
        $xml[] = '    <lastmod>' . $today . '</lastmod>';
        $xml[] = '    <changefreq>' . $item['changefreq'] . '</changefreq>';
        $xml[] = '    <priority>' . $item['priority'] . '</priority>';
        $xml[] = '  </url>';
    }

    $xml[] = '</urlset>';

    return response(implode("\n", $xml), 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
});

Route::view('/{any?}', 'app')->where('any', '.*');
