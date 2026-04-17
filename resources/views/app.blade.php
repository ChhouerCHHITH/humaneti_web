@php
  $siteName = 'Humaneti';
  $currentPath = '/' . ltrim(request()->path(), '/');
  $activeLocale = request()->query('lang') === 'kh' ? 'kh' : 'en';
  $htmlLang = $activeLocale === 'kh' ? 'km' : 'en';

  $metaMap = [
    '/' => [
      'title' => [
        'en' => 'People, Attendance, Leave, Payroll & Operations',
        'kh' => 'បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ និងប្រតិបត្តិការ',
      ],
      'description' => [
        'en' => 'Humaneti is a workflow-first platform for People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, Projects, and Announcements.',
        'kh' => 'Humaneti ជាវេទិកាផ្អែកលើលំហូរការងារ សម្រាប់បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ គម្រោង និងសេចក្តីប្រកាស។',
      ],
    ],
    '/product' => [
      'title' => ['en' => 'Product', 'kh' => 'ផលិតផល'],
      'description' => [
        'en' => 'Explore Humaneti modules: People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, Projects, and Announcements.',
        'kh' => 'ស្វែងយល់អំពីម៉ូឌុល Humaneti៖ បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ គម្រោង និងសេចក្តីប្រកាស។',
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
      'en' => 'Humaneti is a workflow-first platform for people operations, attendance, leave, payroll, assets, procurement, expense claims, projects, and announcements.',
      'kh' => 'Humaneti ជាវេទិកាផ្អែកលើលំហូរការងារ សម្រាប់ប្រតិបត្តិការបុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ការទាមទារចំណាយ គម្រោង និងសេចក្តីប្រកាស។',
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

  // Breadcrumb trail derived from current path
  $breadcrumbLabels = [
    '' => ['en' => 'Home', 'kh' => 'ទំព័រដើម'],
    'product' => ['en' => 'Product', 'kh' => 'ផលិតផល'],
    'solutions' => ['en' => 'Solutions', 'kh' => 'ដំណោះស្រាយ'],
    'pricing' => ['en' => 'Pricing', 'kh' => 'តម្លៃ'],
    'resources' => ['en' => 'Resources', 'kh' => 'ធនធាន'],
    'about' => ['en' => 'About', 'kh' => 'អំពី'],
    'contact' => ['en' => 'Contact', 'kh' => 'ទំនាក់ទំនង'],
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
    $label = $breadcrumbLabels[$segment][$activeLocale]
      ?? $breadcrumbLabels[$segment]['en']
      ?? ucfirst($segment);
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
      ['name' => 'Professional', 'desc' => ['en' => 'Business plus expense claims and purchase requests with compliance controls.', 'kh' => 'Business បូកនឹងការទាមទារចំណាយ និងសំណើទិញ ជាមួយការគ្រប់គ្រងអនុលោម។']],
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
        'a' => ['en' => 'People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, Projects, and Announcements.', 'kh' => 'បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ គម្រោង និងសេចក្តីប្រកាស។'],
      ],
      [
        'q' => ['en' => 'Is Humaneti suitable for NGOs?', 'kh' => 'តើ Humaneti សមស្របសម្រាប់ NGO ទេ?'],
        'a' => ['en' => 'Yes. Humaneti supports NGO compliance with expense claims, purchase requests, donor/project tracking, and audit-ready approvals.', 'kh' => 'មែន។ Humaneti គាំទ្រការអនុលោមរបស់ NGO តាមរយៈការទាមទារចំណាយ សំណើទិញ ការតាមដានអ្នកឧបត្ថម្ភ និងការអនុម័តត្រៀមសវនកម្ម។'],
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
  <meta property="og:type" content="website">
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
