@php
  $siteName = 'Humaneti';
  $currentPath = '/' . ltrim(request()->path(), '/');
  $activeLocale = request()->query('lang') === 'kh' ? 'kh' : 'en';
  $htmlLang = $activeLocale === 'kh' ? 'km' : 'en';
  $seoCatalog = config('seo_catalog');

  $pickLocale = static function (array $map) use ($activeLocale) {
    return $map[$activeLocale] ?? $map['en'] ?? reset($map) ?? '';
  };

  $metaMap = [
    '/' => [
      'title' => [
        'en' => 'HRMS, Payroll & Operations Software for Cambodia',
        'kh' => 'កម្មវិធី HRMS បៀវត្សរ៍ និងប្រតិបត្តិការសម្រាប់កម្ពុជា',
      ],
      'description' => [
        'en' => 'Humaneti is the HRMS, payroll, and operations platform built for Cambodia SMEs and NGOs — bilingual, mobile-first, and audit-ready.',
        'kh' => 'Humaneti ជាវេទិកា HRMS បៀវត្សរ៍ និងប្រតិបត្តិការបង្កើតសម្រាប់ SME និង NGO កម្ពុជា — ពីរភាសា ផ្តើមពីទូរស័ព្ទ និងត្រៀមសវនកម្ម។',
      ],
    ],
    '/product' => [
      'title' => [
        'en' => 'Product Modules: HR, Payroll, Assets, Procurement',
        'kh' => 'ម៉ូឌុលផលិតផល៖ HR បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម',
      ],
      'description' => [
        'en' => 'Humaneti product modules: People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, Projects, and Announcements — one platform for Cambodia operations.',
        'kh' => 'ម៉ូឌុលផលិតផល Humaneti៖ បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការស្នើសុំសងថ្លៃចំណាយ គម្រោង និងសេចក្តីប្រកាស — វេទិកាមួយសម្រាប់ប្រតិបត្តិការកម្ពុជា។',
      ],
    ],
    '/solutions' => [
      'title' => [
        'en' => 'Solutions for Cambodia NGOs, SMEs & Schools',
        'kh' => 'ដំណោះស្រាយសម្រាប់ NGO SME និងសាលារៀននៅកម្ពុជា',
      ],
      'description' => [
        'en' => 'Humaneti solutions tailored for Cambodia: NGO compliance, SME growth, and school HR — with bilingual Khmer/English across every module.',
        'kh' => 'ដំណោះស្រាយ Humaneti សមស្របសម្រាប់កម្ពុជា៖ អនុលោម NGO ការរីកលូតលាស់ SME និង HR សាលារៀន — ជាមួយភាសាខ្មែរ/អង់គ្លេសលើគ្រប់ម៉ូឌុល។',
      ],
    ],
    '/guides' => [
      'title' => [
        'en' => 'Guides: HR, Payroll & Operations in Cambodia',
        'kh' => 'មគ្គុទេសក៍៖ HR បៀវត្សរ៍ និងប្រតិបត្តិការនៅកម្ពុជា',
      ],
      'description' => [
        'en' => 'Practical guides for Cambodia teams running HR, payroll, procurement, and expense workflows — written for SMEs and NGOs.',
        'kh' => 'មគ្គុទេសក៍ជាក់ស្តែងសម្រាប់ក្រុមកម្ពុជាគ្រប់គ្រង HR បៀវត្សរ៍ លទ្ធកម្ម និងលំហូរចំណាយ — សរសេរសម្រាប់ SME និង NGO។',
      ],
    ],
    '/pricing' => [
      'title' => ['en' => 'Pricing', 'kh' => 'តម្លៃ'],
      'description' => [
        'en' => 'Flexible plans aligned to the live Humaneti SaaS catalog: Starter for people operations, Business for payroll, Professional for expense and procurement, and Enterprise for the full module set.',
        'kh' => 'ផែនការតម្លៃបត់បែន ដែលស្របតាមកាតាឡុក SaaS របស់ Humaneti៖ Starter សម្រាប់ប្រតិបត្តិការបុគ្គលិក Business សម្រាប់បៀវត្សរ៍ Professional សម្រាប់ចំណាយ និងលទ្ធកម្ម និង Enterprise សម្រាប់ម៉ូឌុលពេញលេញ។',
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
      'en' => 'Humaneti is a workflow-first HRMS, payroll, and operations platform for Cambodia SMEs and NGOs.',
      'kh' => 'Humaneti ជាវេទិកា HRMS បៀវត្សរ៍ និងប្រតិបត្តិការផ្អែកលើលំហូរការងារ សម្រាប់ SME និង NGO កម្ពុជា។',
    ],
  ];

  // Resolve dynamic routes: /product/:slug, /solutions/:slug, /guides/:slug.
  $dynamicKind = null;
  $dynamicEntry = null;
  if (preg_match('#^/product/([a-z0-9\-]+)$#', $currentPath, $m)) {
    $dynamicEntry = $seoCatalog['modules'][$m[1]] ?? null;
    $dynamicKind = $dynamicEntry ? 'module' : null;
  } elseif (preg_match('#^/solutions/([a-z0-9\-]+)$#', $currentPath, $m)) {
    $dynamicEntry = $seoCatalog['audiences'][$m[1]] ?? null;
    $dynamicKind = $dynamicEntry ? 'audience' : null;
  } elseif (preg_match('#^/guides/([a-z0-9\-]+)$#', $currentPath, $m)) {
    $dynamicEntry = $seoCatalog['guides'][$m[1]] ?? null;
    $dynamicKind = $dynamicEntry ? 'guide' : null;
  }

  if ($dynamicEntry) {
    $meta = [
      'title' => $dynamicEntry['seoTitle'] ?? ($dynamicEntry['name'] ?? $dynamicEntry['title'] ?? $defaultMeta['title']),
      'description' => $dynamicEntry['description'] ?? $defaultMeta['description'],
    ];
  } else {
    $meta = $metaMap[$currentPath] ?? $defaultMeta;
  }

  $title = $pickLocale($meta['title']);
  $description = $pickLocale($meta['description']);
  $pageTitle = $title ? $title . ' | ' . $siteName : $siteName;

  $baseUrl = rtrim((string) (config('app.url') ?: request()->getSchemeAndHttpHost()), '/');
  $pathPart = $currentPath === '/' ? '' : $currentPath;
  $canonicalUrl = $baseUrl . $pathPart;
  $ogImage = $baseUrl . '/favicon/android-chrome-512x512.png';
  $ogType = $dynamicKind === 'guide' ? 'article' : 'website';

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

  // Breadcrumb trail derived from current path; dynamic segments use catalog names.
  $breadcrumbLabels = [
    '' => ['en' => 'Home', 'kh' => 'ទំព័រដើម'],
    'product' => ['en' => 'Product', 'kh' => 'ផលិតផល'],
    'solutions' => ['en' => 'Solutions', 'kh' => 'ដំណោះស្រាយ'],
    'pricing' => ['en' => 'Pricing', 'kh' => 'តម្លៃ'],
    'resources' => ['en' => 'Resources', 'kh' => 'ធនធាន'],
    'about' => ['en' => 'About', 'kh' => 'អំពី'],
    'contact' => ['en' => 'Contact', 'kh' => 'ទំនាក់ទំនង'],
    'guides' => ['en' => 'Guides', 'kh' => 'មគ្គុទេសក៍'],
    'legal' => ['en' => 'Legal', 'kh' => 'ច្បាប់'],
    'privacy' => ['en' => 'Privacy Policy', 'kh' => 'គោលការណ៍ភាពឯកជន'],
    'terms' => ['en' => 'Terms of Service', 'kh' => 'លក្ខខណ្ឌសេវាកម្ម'],
  ];
  $segments = array_values(array_filter(explode('/', ltrim($currentPath, '/')), static fn ($s) => $s !== ''));
  $breadcrumbItems = [[
    '@type' => 'ListItem',
    'position' => 1,
    'name' => $breadcrumbLabels[''][$activeLocale] ?? 'Home',
    'item' => $baseUrl . '/',
  ]];
  $accum = '';
  foreach ($segments as $i => $segment) {
    $accum .= '/' . $segment;
    $label = null;
    // Dynamic segment at position 2 (e.g., /product/payroll, /solutions/ngos, /guides/foo)
    if ($i === 1 && $dynamicEntry) {
      if ($dynamicKind === 'module' || $dynamicKind === 'audience') {
        $label = $pickLocale($dynamicEntry['name'] ?? []);
      } elseif ($dynamicKind === 'guide') {
        $label = $pickLocale($dynamicEntry['title'] ?? []);
      }
    }
    if (!$label) {
      $label = $breadcrumbLabels[$segment][$activeLocale]
        ?? $breadcrumbLabels[$segment]['en']
        ?? ucfirst(str_replace('-', ' ', $segment));
    }
    $breadcrumbItems[] = [
      '@type' => 'ListItem',
      'position' => $i + 2,
      'name' => $label,
      'item' => $baseUrl . $accum,
    ];
  }
  $breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => $breadcrumbItems,
  ];

  // Per-path structured data
  $extraSchemas = [];

  if ($currentPath === '/pricing') {
    // Plans are gated behind "Contact Sales" — we intentionally omit numeric
    // `price` on Offers to avoid misleading rich-result snippets. Google tolerates
    // Offer with priceSpecification + currency for contact-for-price listings.
    $plans = [
      ['name' => 'Starter',      'desc' => ['en' => 'People, attendance, and leave essentials for SMEs and NGOs starting formal workflows.', 'kh' => 'ម៉ូឌុលមូលដ្ឋានបុគ្គលិក វត្តមាន និងការឈប់សម្រាក សម្រាប់ SME និង NGO ដែលចាប់ផ្តើមលំហូរការងារ។']],
      ['name' => 'Business',     'desc' => ['en' => 'Starter plus payroll operations, salary controls, and finance-ready reporting.', 'kh' => 'Starter បូកនឹងបៀវត្សរ៍ ការគ្រប់គ្រងប្រាក់ខែ និងរបាយការណ៍សម្រាប់ហិរញ្ញវត្ថុ។']],
      ['name' => 'Professional', 'desc' => ['en' => 'Business plus expense claims and purchase requests with compliance controls.', 'kh' => 'Business បូកនឹងការស្នើសុំសងថ្លៃចំណាយ និងសំណើទិញ ជាមួយការគ្រប់គ្រងអនុលោម។']],
      ['name' => 'Enterprise',   'desc' => ['en' => 'Full platform with assets, projects, announcements, and SLA-backed support.', 'kh' => 'វេទិកាពេញលេញជាមួយទ្រព្យសម្បត្តិ គម្រោង សេចក្តីប្រកាស និងការគាំទ្រ SLA។']],
    ];
    $offers = [];
    foreach ($plans as $plan) {
      $offers[] = [
        '@type' => 'Offer',
        'name' => $plan['name'],
        'description' => $plan['desc'][$activeLocale] ?? $plan['desc']['en'],
        'availability' => 'https://schema.org/InStock',
        'url' => $canonicalUrl,
        'priceSpecification' => [
          '@type' => 'PriceSpecification',
          'priceCurrency' => 'USD',
        ],
      ];
    }
    $extraSchemas[] = [
      '@context' => 'https://schema.org',
      '@type' => 'SoftwareApplication',
      'name' => 'Humaneti',
      'description' => $description,
      'url' => $baseUrl,
      'applicationCategory' => 'BusinessApplication',
      'applicationSubCategory' => 'HumanResourcesApplication',
      'operatingSystem' => 'Web',
      'brand' => ['@type' => 'Brand', 'name' => 'Humaneti'],
      'offers' => $offers,
    ];
  }

  if ($currentPath === '/contact') {
    $extraSchemas[] = [
      '@context' => 'https://schema.org',
      '@type' => 'ContactPage',
      'name' => $title,
      'url' => $canonicalUrl,
      'inLanguage' => $htmlLang,
      'mainEntity' => [
        '@type' => 'Organization',
        'name' => 'Humaneti',
        'url' => $baseUrl,
        'email' => 'sales@humaneti.com',
        'telephone' => '+855965962864',
      ],
    ];
  }

  if ($currentPath === '/about') {
    $extraSchemas[] = [
      '@context' => 'https://schema.org',
      '@type' => 'AboutPage',
      'name' => $title,
      'url' => $canonicalUrl,
      'inLanguage' => $htmlLang,
    ];
  }

  if ($currentPath === '/resources') {
    $faq = [
      [
        'q' => ['en' => 'What modules does Humaneti include?', 'kh' => 'Humaneti រួមបញ្ចូលម៉ូឌុលអ្វីខ្លះ?'],
        'a' => ['en' => 'People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, Projects, and Announcements.', 'kh' => 'បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការស្នើសុំសងថ្លៃចំណាយ គម្រោង និងសេចក្តីប្រកាស។'],
      ],
      [
        'q' => ['en' => 'Is Humaneti suitable for NGOs?', 'kh' => 'តើ Humaneti សមស្របសម្រាប់អង្គការទេ?'],
        'a' => ['en' => 'Yes. Humaneti supports NGO compliance with expense claims, purchase requests, donor/project tracking, and audit-ready approvals.', 'kh' => 'មែន។ Humaneti គាំទ្រការអនុលោមរបស់អង្គការ តាមរយៈការស្នើសុំសងថ្លៃចំណាយ សំណើទិញ ការតាមដានអ្នកឧបត្ថម្ភ និងការអនុម័តត្រៀមសវនកម្ម។'],
      ],
      [
        'q' => ['en' => 'Which languages does Humaneti support?', 'kh' => 'Humaneti គាំទ្រភាសាអ្វីខ្លះ?'],
        'a' => ['en' => 'English and Khmer across the public website and product interface.', 'kh' => 'អង់គ្លេស និងខ្មែរ នៅគេហទំព័រសាធារណៈ និងផ្ទាំងផលិតផល។'],
      ],
    ];
    $extraSchemas[] = [
      '@context' => 'https://schema.org',
      '@type' => 'FAQPage',
      'mainEntity' => array_map(static fn ($item) => [
        '@type' => 'Question',
        'name' => $item['q'][$activeLocale] ?? $item['q']['en'],
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => $item['a'][$activeLocale] ?? $item['a']['en'],
        ],
      ], $faq),
    ];
  }

  // Article schema for /guides/:slug
  if ($dynamicKind === 'guide') {
    $extraSchemas[] = [
      '@context' => 'https://schema.org',
      '@type' => 'Article',
      'headline' => $title,
      'description' => $description,
      'url' => $canonicalUrl,
      'inLanguage' => $htmlLang,
      'datePublished' => $dynamicEntry['publishedAt'] ?? null,
      'dateModified' => $dynamicEntry['updatedAt'] ?? ($dynamicEntry['publishedAt'] ?? null),
      'author' => ['@type' => 'Organization', 'name' => 'Humaneti'],
      'publisher' => [
        '@type' => 'Organization',
        'name' => 'Humaneti',
        'logo' => ['@type' => 'ImageObject', 'url' => $ogImage],
      ],
      'image' => $ogImage,
      'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $canonicalUrl],
    ];
  }
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
  <link rel="alternate" hreflang="km" href="{{ $canonicalUrl }}?lang=kh">
  <link rel="alternate" hreflang="x-default" href="{{ $canonicalUrl }}">

  <!-- Open Graph -->
  <meta property="og:type" content="{{ $ogType }}">
  <meta property="og:site_name" content="Humaneti">
  <meta property="og:title" content="{{ $pageTitle }}">
  <meta property="og:description" content="{{ $description }}">
  <meta property="og:url" content="{{ $canonicalUrl }}">
  <meta property="og:image" content="{{ $ogImage }}">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="512">
  <meta property="og:image:height" content="512">
  <meta property="og:image:alt" content="{{ $siteName }} logo">
  <meta property="og:locale" content="{{ $activeLocale === 'kh' ? 'km_KH' : 'en_US' }}">
  <meta property="og:locale:alternate" content="{{ $activeLocale === 'kh' ? 'en_US' : 'km_KH' }}">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $pageTitle }}">
  <meta name="twitter:description" content="{{ $description }}">
  <meta name="twitter:image" content="{{ $ogImage }}">
  <meta name="twitter:image:alt" content="{{ $siteName }} logo">

  <!-- Structured Data -->
  <script type="application/ld+json">{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($webpageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  @foreach ($extraSchemas as $schema)
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  @endforeach

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-slate-900">
  <div id="app"></div>
</body>
</html>
