<?php

// SSR meta catalog for dynamic routes: /product/:slug, /solutions/:slug, /guides/:slug.
// Mirrors resources/js/data/{modules,audiences,guides}.js — keep in sync when data changes.
// Only fields needed for Blade head (title, description, names, dates) are duplicated here.

return [
    'modules' => [
        'payroll' => [
            'name' => ['en' => 'Payroll', 'kh' => 'បៀវត្សរ៍'],
            'seoTitle' => [
                'en' => 'Payroll Software for Cambodia SMEs & NGOs',
                'kh' => 'កម្មវិធីបៀវត្សរ៍សម្រាប់ SME និងអង្គការនៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Humaneti Payroll handles salary runs, tax, payslips, and loans with approval workflows tailored for Cambodian SMEs and NGOs.',
                'kh' => 'Humaneti Payroll គ្រប់គ្រងការបើកបៀវត្សរ៍ ពន្ធ បៀវត្សរ៍ និងប្រាក់កម្ចី ជាមួយលំហូរអនុម័ត សម្រាប់ SME និងអង្គការនៅកម្ពុជា។',
            ],
        ],
        'attendance' => [
            'name' => ['en' => 'Attendance', 'kh' => 'វត្តមាន'],
            'seoTitle' => [
                'en' => 'Attendance Tracking Software for Cambodia Teams',
                'kh' => 'កម្មវិធីតាមដានវត្តមានសម្រាប់ក្រុមការងារកម្ពុជា',
            ],
            'description' => [
                'en' => 'Track clock-in, shifts, breaks, and timesheets across offices and field locations with mobile-friendly attendance.',
                'kh' => 'តាមដានម៉ោងចូល វេន ការសម្រាក និងសន្លឹកពេលវេលាឆ្លងកាត់ការិយាល័យ និងការងារក្រៅ ជាមួយការគាំទ្រទូរស័ព្ទ។',
            ],
        ],
        'leave' => [
            'name' => ['en' => 'Leave', 'kh' => 'ការឈប់សម្រាក'],
            'seoTitle' => [
                'en' => 'Leave Management Software for Cambodia Organizations',
                'kh' => 'កម្មវិធីគ្រប់គ្រងការឈប់សម្រាកសម្រាប់អង្គការនៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Request, approve, and balance leave across annual, sick, maternity, and public holidays — all in one workflow.',
                'kh' => 'ស្នើសុំ អនុម័ត និងគណនាតុល្យភាពការឈប់សម្រាកឆ្នាំ ឈឺ សម្រាលកូន និងថ្ងៃបុណ្យ — ក្នុងលំហូរការងារតែមួយ។',
            ],
        ],
        'people' => [
            'name' => ['en' => 'People', 'kh' => 'បុគ្គលិក'],
            'seoTitle' => [
                'en' => 'HRMS for Cambodia SMEs & NGOs — Employee Records Done Right',
                'kh' => 'HRMS សម្រាប់ SME និងអង្គការនៅកម្ពុជា — គ្រប់គ្រងកំណត់ត្រាបុគ្គលិកឱ្យត្រឹមត្រូវ',
            ],
            'description' => [
                'en' => 'A central HRMS for Cambodian SMEs and NGOs: employee profiles, contracts, org charts, and role-based access across all modules.',
                'kh' => 'HRMS កណ្តាលសម្រាប់ SME និងអង្គការនៅកម្ពុជា៖ ព័ត៌មានបុគ្គលិក កិច្ចសន្យា តារាងអង្គការ និងសិទ្ធិតាមតួនាទី។',
            ],
        ],
        'assets' => [
            'name' => ['en' => 'Assets', 'kh' => 'ទ្រព្យសម្បត្តិ'],
            'seoTitle' => [
                'en' => 'Asset Management Software for Cambodia NGOs & SMEs',
                'kh' => 'កម្មវិធីគ្រប់គ្រងទ្រព្យសម្បត្តិសម្រាប់អង្គការ និង SME នៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Register, assign, and audit assets across offices and field sites. Donor-friendly records for NGOs and clear ownership for SMEs.',
                'kh' => 'ចុះឈ្មោះ ប្រគល់ និងធ្វើសវនកម្មទ្រព្យឆ្លងកាត់ការិយាល័យ និងការងារក្រៅ។ កំណត់ត្រាសមស្របសម្រាប់អ្នកឧបត្ថម្ភអង្គការ និងភាពម្ចាស់ច្បាស់សម្រាប់ SME។',
            ],
        ],
        'purchase-requests' => [
            'name' => ['en' => 'Purchase Requests', 'kh' => 'សំណើទិញ'],
            'seoTitle' => [
                'en' => 'Purchase Request & Procurement Software for Cambodia NGOs',
                'kh' => 'កម្មវិធីសំណើទិញ និងលទ្ធកម្មសម្រាប់អង្គការនៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Run the full procurement cycle: request, quotations, approvals, purchase orders, and goods-received — with budget checks at every step.',
                'kh' => 'ដំណើរការវដ្តលទ្ធកម្មពេញលេញ៖ សំណើ ថ្លៃ អនុម័ត បញ្ជាទិញ និងការទទួលទំនិញ ជាមួយការត្រួតពិនិត្យថវិកាគ្រប់ជំហាន។',
            ],
        ],
        'expense-claims' => [
            'name' => ['en' => 'Expense Claims', 'kh' => 'ការស្នើសុំសងថ្លៃចំណាយ'],
            'seoTitle' => [
                'en' => 'Expense Claim Software for Cambodia NGOs & Non-Profits',
                'kh' => 'កម្មវិធីការស្នើសុំសងថ្លៃចំណាយសម្រាប់អង្គការ និងអង្គការមិនរកកម្រៃ',
            ],
            'description' => [
                'en' => 'Submit receipts by phone, route through approvals, reconcile cash advances, and reimburse — with full audit records for donors and finance.',
                'kh' => 'ដាក់ស្នើវិក្កយបត្រតាមទូរស័ព្ទ ឆ្លងកាត់ការអនុម័ត ផ្ទៀងផ្ទាត់ប្រាក់បុរេប្រទាន និងសងប្រាក់ — ជាមួយកំណត់ត្រាសវនកម្មសម្រាប់អ្នកឧបត្ថម្ភ និងហិរញ្ញវត្ថុ។',
            ],
        ],
        'projects' => [
            'name' => ['en' => 'Projects', 'kh' => 'គម្រោង'],
            'seoTitle' => [
                'en' => 'Project & Donor Tracking Software for Cambodia NGOs',
                'kh' => 'កម្មវិធីតាមដានគម្រោង និងអ្នកឧបត្ថម្ភសម្រាប់អង្គការនៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Track NGO projects, grants, and donor allocations with spend linked to the same purchase and expense data the rest of your organization already uses.',
                'kh' => 'តាមដានគម្រោងរបស់អង្គការ ជំនួយ និងការបែងចែករបស់អ្នកឧបត្ថម្ភ ជាមួយការចំណាយតភ្ជាប់ទៅទិន្នន័យទិញ និងចំណាយដែលអង្គការកំពុងប្រើ។',
            ],
        ],
        'announcements' => [
            'name' => ['en' => 'Announcements', 'kh' => 'សេចក្តីប្រកាស'],
            'seoTitle' => [
                'en' => 'Internal Announcements for Cambodia Teams',
                'kh' => 'សេចក្តីប្រកាសផ្ទៃក្នុងសម្រាប់ក្រុមការងារនៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Post announcements by branch, department, or role — with read tracking so important updates do not get lost in chat.',
                'kh' => 'ប្រកាសតាមសាខា នាយកដ្ឋាន ឬតួនាទី ជាមួយតាមដានការអាន ដើម្បីកុំឱ្យព័ត៌មានសំខាន់បាត់ក្នុងការជជែក។',
            ],
        ],
    ],

    'audiences' => [
        'ngos' => [
            'name' => ['en' => 'NGOs', 'kh' => 'អង្គការ'],
            'seoTitle' => [
                'en' => 'HR, Payroll & Procurement Software for NGOs in Cambodia',
                'kh' => 'កម្មវិធីធនធានមនុស្ស បៀវត្សរ៍ និងលទ្ធកម្មសម្រាប់អង្គការនៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Humaneti helps Cambodian NGOs run HR, payroll, purchase requests, expense claims, and donor-linked projects with full audit records ready for funders.',
                'kh' => 'Humaneti ជួយអង្គការនៅកម្ពុជាគ្រប់គ្រងធនធានមនុស្ស បៀវត្សរ៍ សំណើទិញ ការស្នើសុំសងថ្លៃចំណាយ និងគម្រោងតភ្ជាប់អ្នកឧបត្ថម្ភ ជាមួយកំណត់ត្រាសវនកម្មពេញលេញសម្រាប់ម្ចាស់ជំនួយ។',
            ],
        ],
        'sme' => [
            'name' => ['en' => 'SMEs', 'kh' => 'SME'],
            'seoTitle' => [
                'en' => 'HR & Payroll Software for SMEs in Cambodia',
                'kh' => 'កម្មវិធីធនធានមនុស្ស និងបៀវត្សរ៍សម្រាប់ SME នៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'A step up from spreadsheets: employee records, attendance, leave, and payroll with approvals — without the weight of an enterprise HR system.',
                'kh' => 'មួយកម្រិតលើ Excel៖ កំណត់ត្រាបុគ្គលិក វត្តមាន ការឈប់សម្រាក និងបៀវត្សរ៍ជាមួយការអនុម័ត — ដោយមិនប្រឈមនឹងភាពស្មុគស្មាញនៃប្រព័ន្ធធនធានមនុស្សសហគ្រាស។',
            ],
        ],
        'schools' => [
            'name' => ['en' => 'Schools', 'kh' => 'សាលារៀន'],
            'seoTitle' => [
                'en' => 'HR, Attendance & Payroll Software for Cambodia Schools',
                'kh' => 'កម្មវិធីធនធានមនុស្ស វត្តមាន និងបៀវត្សរ៍សម្រាប់សាលារៀននៅកម្ពុជា',
            ],
            'description' => [
                'en' => 'Teacher and staff records, attendance by campus, leave for academic calendars, and payroll — all tuned for how schools operate in Cambodia.',
                'kh' => 'កំណត់ត្រាគ្រូ និងបុគ្គលិក វត្តមានតាមបរិវេណ ការឈប់សម្រាកសម្រាប់ប្រតិទិនសិក្សា និងបៀវត្សរ៍ — សមស្របនឹងរបៀបដែលសាលានៅកម្ពុជាដំណើរការ។',
            ],
        ],
    ],

    'guides' => [
        'how-to-run-payroll-in-cambodia' => [
            'title' => [
                'en' => 'How to run payroll in Cambodia',
                'kh' => 'របៀបបើកបៀវត្សរ៍នៅកម្ពុជា',
            ],
            'seoTitle' => [
                'en' => 'How to Run Payroll in Cambodia: A Practical Guide for SMEs & NGOs',
                'kh' => 'របៀបបើកបៀវត្សរ៍នៅកម្ពុជា៖ មគ្គុទេសក៍ជាក់ស្តែងសម្រាប់ SME និងអង្គការ',
            ],
            'description' => [
                'en' => 'A practical walkthrough of running monthly payroll in Cambodia: tax, contributions, payslips, approvals, and common mistakes to avoid.',
                'kh' => 'មគ្គុទេសក៍ជាក់ស្តែងអំពីការបើកបៀវត្សរ៍ប្រចាំខែនៅកម្ពុជា៖ ពន្ធ ការបង់ប្រាក់ បៀវត្សរ៍ ការអនុម័ត និងកំហុសដែលគួរចៀសវាង។',
            ],
            'publishedAt' => '2026-04-01',
            'updatedAt' => '2026-04-18',
        ],
        'ngo-expense-claim-best-practices' => [
            'title' => [
                'en' => 'NGO expense claim best practices',
                'kh' => 'អនុវត្តល្អបំផុតការស្នើសុំសងថ្លៃចំណាយអង្គការ',
            ],
            'seoTitle' => [
                'en' => 'NGO Expense Claim Best Practices for Donor Compliance',
                'kh' => 'អនុវត្តល្អបំផុតការស្នើសុំសងថ្លៃចំណាយអង្គការ សម្រាប់អនុលោមអ្នកឧបត្ថម្ភ',
            ],
            'description' => [
                'en' => 'How Cambodian NGOs can structure expense claims, cash advances, and reimbursements to keep donor audits simple.',
                'kh' => 'របៀបដែលអង្គការនៅកម្ពុជាអាចរៀបចំការស្នើសុំសងថ្លៃចំណាយ ប្រាក់បុរេប្រទាន និងការសងប្រាក់ ដើម្បីធ្វើឱ្យសវនកម្មអ្នកឧបត្ថម្ភងាយស្រួល។',
            ],
            'publishedAt' => '2026-04-05',
            'updatedAt' => '2026-04-18',
        ],
        'attendance-tracking-for-cambodia-sme' => [
            'title' => [
                'en' => 'Attendance tracking for Cambodian SMEs',
                'kh' => 'ការតាមដានវត្តមានសម្រាប់ SME កម្ពុជា',
            ],
            'seoTitle' => [
                'en' => 'Attendance Tracking for Cambodian SMEs: What Actually Works',
                'kh' => 'ការតាមដានវត្តមានសម្រាប់ SME កម្ពុជា៖ អ្វីដែលដំណើរការពិត',
            ],
            'description' => [
                'en' => 'Paper sign-in sheets, fingerprint devices, mobile check-in — what Cambodian SMEs should actually use as they grow past 20 people.',
                'kh' => 'សន្លឹកចុះឈ្មោះក្រដាស ម៉ាស៊ីនម្រាមដៃ ការចុះឈ្មោះតាមទូរស័ព្ទ — អ្វីដែល SME កម្ពុជាគួរប្រើពេលពួកគេរីកធំជាងបុគ្គលិក 20 នាក់។',
            ],
            'publishedAt' => '2026-04-08',
            'updatedAt' => '2026-04-18',
        ],
        'purchase-request-workflow-guide' => [
            'title' => [
                'en' => 'Purchase request workflows that actually get approved',
                'kh' => 'លំហូរសំណើទិញដែលត្រូវបានអនុម័តពិត',
            ],
            'seoTitle' => [
                'en' => 'Purchase Request Workflow Guide for NGOs & SMEs',
                'kh' => 'មគ្គុទេសក៍លំហូរសំណើទិញសម្រាប់អង្គការ និង SME',
            ],
            'description' => [
                'en' => 'How to design purchase request (PR), quotation, and purchase order (PO) approvals that are fast enough for operations and tight enough for auditors.',
                'kh' => 'របៀបរៀបចំការអនុម័តសំណើទិញ (PR) ថ្លៃទំនិញ និងបញ្ជាទិញ (PO) ដែលលឿនគ្រប់គ្រាន់សម្រាប់ប្រតិបត្តិការ និងតឹងតែងគ្រប់គ្រាន់សម្រាប់អ្នកសវនកម្ម។',
            ],
            'publishedAt' => '2026-04-12',
            'updatedAt' => '2026-04-18',
        ],
        'how-to-choose-hrms-cambodia' => [
            'title' => [
                'en' => 'How to choose an HRMS in Cambodia',
                'kh' => 'របៀបជ្រើសរើស HRMS នៅកម្ពុជា',
            ],
            'seoTitle' => [
                'en' => 'How to Choose an HRMS in Cambodia: Buyer Checklist',
                'kh' => 'របៀបជ្រើសរើស HRMS នៅកម្ពុជា៖ បញ្ជីត្រួតពិនិត្យអ្នកទិញ',
            ],
            'description' => [
                'en' => 'A practical checklist for Cambodian SMEs and NGOs evaluating HR software: bilingual support, local tax, field attendance, and donor compliance.',
                'kh' => 'បញ្ជីត្រួតពិនិត្យជាក់ស្តែងសម្រាប់ SME និងអង្គការនៅកម្ពុជាវាយតម្លៃកម្មវិធីធនធានមនុស្ស៖ ភាសាពីរ ពន្ធក្នុងស្រុក វត្តមានការងារក្រៅ និងអនុលោមអ្នកឧបត្ថម្ភ។',
            ],
            'publishedAt' => '2026-04-15',
            'updatedAt' => '2026-04-18',
        ],
    ],
];
