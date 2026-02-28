@php
  $siteName = 'Humaneti';
  $currentPath = '/' . ltrim(request()->path(), '/');
  $activeLocale = request()->query('lang') === 'kh' ? 'kh' : 'en';
  $htmlLang = $activeLocale === 'kh' ? 'km' : 'en';

  $metaMap = [
    '/' => [
      'title' => [
        'en' => 'People, Payroll, Assets, Procurement, Claims & Projects',
        'kh' => 'បុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ចំណាយ និងគម្រោង',
      ],
      'description' => [
        'en' => 'Humaneti is a workflow-first platform for People, Payroll, Assets, Purchase Requests, Expense Claims, and Projects.',
        'kh' => 'Humaneti ជាវេទិកាផ្អែកលើលំហូរការងារ សម្រាប់បុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ និងគម្រោង។',
      ],
    ],
    '/product' => [
      'title' => ['en' => 'Product', 'kh' => 'ផលិតផល'],
      'description' => [
        'en' => 'Explore Humaneti modules: People, Payroll, Assets, Purchase Requests, Expense Claims, and Projects.',
        'kh' => 'ស្វែងយល់អំពីម៉ូឌុល Humaneti៖ បុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ និងគម្រោង។',
      ],
    ],
    '/solutions' => [
      'title' => ['en' => 'Solutions', 'kh' => 'ដំណោះស្រាយ'],
      'description' => [
        'en' => 'Solutions for SMEs and NGOs with clear approvals, accountability, and traceable decisions.',
        'kh' => 'ដំណោះស្រាយសម្រាប់ SME និង NGO ជាមួយការអនុម័តច្បាស់ ការទទួលខុសត្រូវ និងការសម្រេចចិត្តអាចតាមដានបាន។',
      ],
    ],
    '/pricing' => [
      'title' => ['en' => 'Pricing', 'kh' => 'តម្លៃ'],
      'description' => [
        'en' => 'Flexible plans to start small and scale based on modules and governance needs.',
        'kh' => 'ផែនការតម្លៃបត់បែន សម្រាប់ចាប់ផ្តើមតូច និងពង្រីកតាមម៉ូឌុល និងតម្រូវការអភិបាលកិច្ច។',
      ],
    ],
    '/resources' => [
      'title' => ['en' => 'Resources', 'kh' => 'ធនធាន'],
      'description' => [
        'en' => 'Guides, FAQs, and product resources for Humaneti modules.',
        'kh' => 'មគ្គុទេសក៍ សំណួរញឹកញាប់ និងធនធានផលិតផលសម្រាប់ម៉ូឌុល Humaneti។',
      ],
    ],
    '/about' => [
      'title' => ['en' => 'About', 'kh' => 'អំពី'],
      'description' => [
        'en' => 'About Humaneti and our workflow-first approach for modern operations.',
        'kh' => 'អំពី Humaneti និងវិធីសាស្ត្រផ្អែកលើលំហូរការងារ សម្រាប់ប្រតិបត្តិការទំនើប។',
      ],
    ],
    '/contact' => [
      'title' => ['en' => 'Contact', 'kh' => 'ទំនាក់ទំនង'],
      'description' => [
        'en' => 'Request a demo and contact the Humaneti team.',
        'kh' => 'ស្នើសុំដេមូ និងទាក់ទងក្រុម Humaneti។',
      ],
    ],
    '/legal/privacy' => [
      'title' => ['en' => 'Privacy Policy', 'kh' => 'គោលការណ៍ភាពឯកជន'],
      'description' => [
        'en' => 'How Humaneti collects, uses, and protects your data.',
        'kh' => 'របៀបដែល Humaneti ប្រមូល ប្រើប្រាស់ និងការពារទិន្នន័យរបស់អ្នក។',
      ],
    ],
    '/legal/terms' => [
      'title' => ['en' => 'Terms of Service', 'kh' => 'លក្ខខណ្ឌសេវាកម្ម'],
      'description' => [
        'en' => 'Terms for using the Humaneti public website and related communications.',
        'kh' => 'លក្ខខណ្ឌសម្រាប់ការប្រើប្រាស់គេហទំព័រសាធារណៈ Humaneti និងការទំនាក់ទំនងដែលពាក់ព័ន្ធ។',
      ],
    ],
  ];

  $defaultMeta = [
    'title' => ['en' => $siteName, 'kh' => 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី'],
    'description' => [
      'en' => 'Humaneti is a workflow-first platform for HRM, payroll, asset tracking, purchase requests, and projects.',
      'kh' => 'Humaneti ជាវេទិកាផ្អែកលើលំហូរការងារ សម្រាប់ HRM បៀវត្សរ៍ ការតាមដានទ្រព្យសម្បត្តិ សំណើទិញ និងគម្រោង។',
    ],
  ];

  $meta = $metaMap[$currentPath] ?? $defaultMeta;
  $title = $meta['title'][$activeLocale] ?? $meta['title']['en'] ?? $siteName;
  $description = $meta['description'][$activeLocale] ?? $meta['description']['en'] ?? '';
  $pageTitle = $title ? $title . ' | ' . $siteName : $siteName;

  $baseUrl = rtrim((string) (config('app.url') ?: request()->getSchemeAndHttpHost()), '/');
  $pathPart = $currentPath === '/' ? '' : $currentPath;
  $canonicalUrl = $baseUrl . $pathPart;
  $ogImage = $baseUrl . '/favicon/android-chrome-512x512.png';

  $organizationSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Humaneti',
    'url' => $baseUrl,
    'logo' => $baseUrl . '/favicon/android-chrome-512x512.png',
    'contactPoint' => [
      [
        '@type' => 'ContactPoint',
        'contactType' => 'sales',
        'email' => 'sales@humaneti.com',
        'telephone' => '+855965962864',
        'availableLanguage' => ['en', 'km'],
      ],
    ],
  ];

  $websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => 'Humaneti',
    'url' => $baseUrl,
    'inLanguage' => ['en', 'km'],
  ];

  $webpageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => $title,
    'description' => $description,
    'url' => $canonicalUrl,
    'inLanguage' => $htmlLang,
  ];
@endphp
<!doctype html>
<html lang="{{ $htmlLang }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $pageTitle }}</title>

  <!-- Favicons -->
  <link rel="icon" href="/favicon/favicon.ico">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">

  <!-- PWA -->
  <link rel="manifest" href="/favicon/site.webmanifest">
  <meta name="theme-color" content="#0EA5E9">
  <meta name="description" content="{{ $description }}">
  <meta name="robots" content="index,follow">

  <!-- Canonical + hreflang -->
  <link rel="canonical" href="{{ $canonicalUrl }}">
  <link rel="alternate" hreflang="en" href="{{ $canonicalUrl }}?lang=en">
  <link rel="alternate" hreflang="kh" href="{{ $canonicalUrl }}?lang=kh">
  <link rel="alternate" hreflang="x-default" href="{{ $canonicalUrl }}">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Humaneti">
  <meta property="og:title" content="{{ $pageTitle }}">
  <meta property="og:description" content="{{ $description }}">
  <meta property="og:url" content="{{ $canonicalUrl }}">
  <meta property="og:image" content="{{ $ogImage }}">
  <meta property="og:locale" content="{{ $activeLocale === 'kh' ? 'km_KH' : 'en_US' }}">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $pageTitle }}">
  <meta name="twitter:description" content="{{ $description }}">
  <meta name="twitter:image" content="{{ $ogImage }}">

  <!-- Structured Data -->
  <script type="application/ld+json">{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($webpageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-slate-900">
  <div id="app"></div>
</body>
</html>
