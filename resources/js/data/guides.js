// Guides/articles for long-tail keyword capture.
// Each guide is rendered by GuideView.vue from structured blocks (so pages
// remain prerender-safe and don't depend on a runtime markdown parser).

export const guides = [
  {
    slug: 'how-to-run-payroll-in-cambodia',
    category: 'payroll',
    publishedAt: '2026-04-01',
    updatedAt: '2026-04-18',
    readMinutes: 8,
    seoTitle: {
      en: 'How to Run Payroll in Cambodia: A Practical Guide for SMEs & NGOs',
      kh: 'របៀបបើកបៀវត្សរ៍នៅកម្ពុជា៖ មគ្គុទេសក៍ជាក់ស្តែងសម្រាប់ SME និងអង្គការ',
    },
    title: {
      en: 'How to run payroll in Cambodia',
      kh: 'របៀបបើកបៀវត្សរ៍នៅកម្ពុជា',
    },
    description: {
      en: 'A practical walkthrough of running monthly payroll in Cambodia: tax, contributions, payslips, approvals, and common mistakes to avoid.',
      kh: 'មគ្គុទេសក៍ជាក់ស្តែងអំពីការបើកបៀវត្សរ៍ប្រចាំខែនៅកម្ពុជា៖ ពន្ធ ការបង់ប្រាក់ បៀវត្សរ៍ ការអនុម័ត និងកំហុសដែលគួរចៀសវាង។',
    },
    sections: [
      {
        heading: { en: 'Why payroll in Cambodia is different', kh: 'ហេតុអ្វីបៀវត្សរ៍នៅកម្ពុជាខុសគ្នា' },
        body: {
          en: 'Cambodian payroll combines base salary, allowances, deductions, seniority indemnity, and tax on salary (ToS). NGOs additionally track donor-funded salary components. Getting this right the first month saves months of cleanup later.',
          kh: 'បៀវត្សរ៍នៅកម្ពុជារួមមានប្រាក់ខែមូលដ្ឋាន ប្រាក់បន្ថែម ការកាត់ប្រាក់ ប្រាក់អតីតភាពការងារ និងពន្ធលើប្រាក់ខែ (ToS)។ អង្គការបន្ថែមតាមដានសមាសភាគប្រាក់ខែពីអ្នកឧបត្ថម្ភ។ ការធ្វើបានត្រឹមត្រូវចាប់ពីខែដំបូងសន្សំខែច្រើនដើម្បីជួសជុលក្រោយ។',
        },
      },
      {
        heading: { en: 'Monthly payroll checklist', kh: 'បញ្ជីត្រួតពិនិត្យបៀវត្សរ៍ប្រចាំខែ' },
        bullets: [
          { en: 'Lock attendance and approved timesheets for the period', kh: 'បិទវត្តមាន និងសន្លឹកពេលវេលាដែលបានអនុម័តសម្រាប់រយៈពេល' },
          { en: 'Apply leave without pay and overtime adjustments', kh: 'អនុវត្តការឈប់សម្រាកគ្មានប្រាក់ និងការកែសម្រួលម៉ោងបន្ថែម' },
          { en: 'Run the payroll draft and review salary variance vs last period', kh: 'បើកបៀវត្សរ៍សាកល្បង និងត្រួតពិនិត្យភាពខុសគ្នាធៀបរយៈពេលមុន' },
          { en: 'Submit for approval with full audit trail', kh: 'ដាក់ស្នើសុំអនុម័តជាមួយប្រវត្តិសវនកម្មពេញលេញ' },
          { en: 'Distribute payslips and export reports for finance', kh: 'ចែកបៀវត្សរ៍ និងនាំចេញរបាយការណ៍សម្រាប់ហិរញ្ញវត្ថុ' },
        ],
      },
      {
        heading: { en: 'Common mistakes', kh: 'កំហុសទូទៅ' },
        bullets: [
          { en: 'Using Excel with no approval record for salary changes', kh: 'ប្រើ Excel ដោយមិនមានកំណត់ត្រាអនុម័តសម្រាប់ការផ្លាស់ប្តូរប្រាក់ខែ' },
          { en: 'Forgetting seniority indemnity accruals', kh: 'ភ្លេចបង្គរប្រាក់អតីតភាពការងារ' },
          { en: 'Not reconciling cash advances before month close', kh: 'មិនផ្ទៀងផ្ទាត់ប្រាក់បុរេប្រទានមុនបិទខែ' },
        ],
      },
    ],
    relatedModules: ['payroll', 'attendance', 'leave'],
  },
  {
    slug: 'ngo-expense-claim-best-practices',
    category: 'ngo',
    publishedAt: '2026-04-05',
    updatedAt: '2026-04-18',
    readMinutes: 6,
    seoTitle: {
      en: 'NGO Expense Claim Best Practices for Donor Compliance',
      kh: 'អនុវត្តល្អបំផុតការស្នើសុំសងថ្លៃចំណាយអង្គការសម្រាប់អនុលោមអ្នកឧបត្ថម្ភ',
    },
    title: {
      en: 'NGO expense claim best practices',
      kh: 'អនុវត្តល្អបំផុតការស្នើសុំសងថ្លៃចំណាយអង្គការ',
    },
    description: {
      en: 'How Cambodian NGOs can structure expense claims, cash advances, and reimbursements to keep donor audits simple.',
      kh: 'របៀបដែលអង្គការនៅកម្ពុជាអាចរៀបចំការស្នើសុំសងថ្លៃចំណាយ ប្រាក់បុរេប្រទាន និងការសងប្រាក់ ដើម្បីធ្វើឱ្យសវនកម្មអ្នកឧបត្ថម្ភងាយស្រួល។',
    },
    sections: [
      {
        heading: { en: 'Structure claims by project, not employee', kh: 'រៀបចំការទាមទារតាមគម្រោង មិនមែនបុគ្គលិក' },
        body: {
          en: 'Donor audits follow project budgets. Every claim should be taggable to a project code and a budget line from day one — retrofitting this during an audit is expensive.',
          kh: 'សវនកម្មអ្នកឧបត្ថម្ភផ្អែកលើថវិកាគម្រោង។ រាល់ការទាមទារគួរស្លាកបានជាមួយលេខកូដគម្រោង និងខ្សែថវិកាតាំងពីដំបូង — ការកែបន្ទាប់ពីសវនកម្មត្រូវចំណាយច្រើន។',
        },
      },
      {
        heading: { en: 'Approval rules that scale', kh: 'ច្បាប់អនុម័តដែលពង្រីកបាន' },
        bullets: [
          { en: 'Amount thresholds that route automatically to the right role', kh: 'កម្រិតចំនួនទឹកប្រាក់ដែលបញ្ជូនដោយស្វ័យប្រវត្តិទៅតួនាទីត្រឹមត្រូវ' },
          { en: 'Separate cash advance clearance from reimbursement', kh: 'បំបែកការផ្ទៀងផ្ទាត់ប្រាក់បុរេប្រទានពីការសងប្រាក់' },
          { en: 'Require photo receipts for claims above a defined value', kh: 'តម្រូវឱ្យមានវិក្កយបត្ររូបភាពសម្រាប់ការទាមទារលើសតម្លៃកំណត់' },
        ],
      },
    ],
    relatedModules: ['expense-claims', 'projects', 'purchase-requests'],
  },
  {
    slug: 'attendance-tracking-for-cambodia-sme',
    category: 'attendance',
    publishedAt: '2026-04-08',
    updatedAt: '2026-04-18',
    readMinutes: 5,
    seoTitle: {
      en: 'Attendance Tracking for Cambodian SMEs: What Actually Works',
      kh: 'ការតាមដានវត្តមានសម្រាប់ SME កម្ពុជា៖ អ្វីដែលដំណើរការពិត',
    },
    title: {
      en: 'Attendance tracking for Cambodian SMEs',
      kh: 'ការតាមដានវត្តមានសម្រាប់ SME កម្ពុជា',
    },
    description: {
      en: 'Paper sign-in sheets, fingerprint devices, mobile check-in — what Cambodian SMEs should actually use as they grow past 20 people.',
      kh: 'សន្លឹកចុះឈ្មោះក្រដាស ម៉ាស៊ីនម្រាមដៃ ការចុះឈ្មោះតាមទូរស័ព្ទ — អ្វីដែល SME កម្ពុជាគួរប្រើពេលពួកគេរីកធំជាងបុគ្គលិក 20 នាក់។',
    },
    sections: [
      {
        heading: { en: 'Paper works — until it does not', kh: 'ក្រដាសដំណើរការ — រហូតដល់ពេលដែលមិនដំណើរការ' },
        body: {
          en: 'Paper sign-in is fine at 5 people. At 30 people across two locations, it becomes a reconciliation job that eats half a day every month. That is when a digital solution pays for itself.',
          kh: 'ការចុះឈ្មោះលើក្រដាសល្អសម្រាប់ 5 នាក់។ នៅ 30 នាក់លើទីតាំង 2 វាក្លាយជាកិច្ចការផ្ទៀងផ្ទាត់ដែលចំណាយពេលកន្លះថ្ងៃរាល់ខែ។ នៅពេលនោះដំណោះស្រាយឌីជីថលទូទាត់ខ្លួន។',
        },
      },
      {
        heading: { en: 'What to look for', kh: 'អ្វីដែលត្រូវស្វែងរក' },
        bullets: [
          { en: 'Mobile check-in with GPS or selfie — low hardware cost', kh: 'ការចុះឈ្មោះតាមទូរស័ព្ទជាមួយ GPS ឬរូបថត — ថ្លៃឧបករណ៍ទាប' },
          { en: 'Auto-calculated overtime and late arrivals', kh: 'គណនាម៉ោងបន្ថែម និងការមកយឺតដោយស្វ័យប្រវត្តិ' },
          { en: 'Direct integration into payroll — no re-entry', kh: 'តភ្ជាប់ដោយផ្ទាល់ជាមួយបៀវត្សរ៍ — មិនចាំបាច់បញ្ចូលឡើងវិញ' },
        ],
      },
    ],
    relatedModules: ['attendance', 'payroll'],
  },
  {
    slug: 'purchase-request-workflow-guide',
    category: 'procurement',
    publishedAt: '2026-04-12',
    updatedAt: '2026-04-18',
    readMinutes: 7,
    seoTitle: {
      en: 'Purchase Request Workflow Guide for NGOs & SMEs',
      kh: 'មគ្គុទេសក៍លំហូរសំណើទិញសម្រាប់អង្គការ និង SME',
    },
    title: {
      en: 'Purchase request workflows that actually get approved',
      kh: 'លំហូរសំណើទិញដែលត្រូវបានអនុម័តពិត',
    },
    description: {
      en: 'How to design purchase request (PR), quotation, and purchase order (PO) approvals that are fast enough for operations and tight enough for auditors.',
      kh: 'របៀបរៀបចំការអនុម័តសំណើទិញ (PR) ថ្លៃទំនិញ និងបញ្ជាទិញ (PO) ដែលលឿនគ្រប់គ្រាន់សម្រាប់ប្រតិបត្តិការ និងតឹងតែងគ្រប់គ្រាន់សម្រាប់អ្នកសវនកម្ម។',
    },
    sections: [
      {
        heading: { en: 'PR → Quotation → PO → GR', kh: 'PR → ថ្លៃ → PO → GR' },
        body: {
          en: 'Every spend over a threshold should travel this path. Under the threshold, a simplified one-step PR keeps friction low while preserving the audit trail.',
          kh: 'រាល់ការចំណាយលើសកម្រិតកំណត់គួរឆ្លងកាត់ផ្លូវនេះ។ ក្រោមកម្រិត PR មួយជំហានសាមញ្ញរក្សាភាពលឿន ខណៈរក្សាប្រវត្តិសវនកម្ម។',
        },
      },
      {
        heading: { en: 'Approval thresholds to consider', kh: 'កម្រិតអនុម័តគួរពិចារណា' },
        bullets: [
          { en: 'Under $100 — direct manager', kh: 'ក្រោម $100 — អ្នកគ្រប់គ្រងផ្ទាល់' },
          { en: '$100–$1,000 — manager + finance', kh: '$100–$1,000 — អ្នកគ្រប់គ្រង + ហិរញ្ញវត្ថុ' },
          { en: 'Over $1,000 — plus executive director', kh: 'លើស $1,000 — បូកនាយកប្រតិបត្តិ' },
        ],
      },
    ],
    relatedModules: ['purchase-requests', 'expense-claims'],
  },
  {
    slug: 'how-to-choose-hrms-cambodia',
    category: 'hr',
    publishedAt: '2026-04-15',
    updatedAt: '2026-04-18',
    readMinutes: 6,
    seoTitle: {
      en: 'How to Choose an HRMS in Cambodia: Buyer Checklist',
      kh: 'របៀបជ្រើសរើស HRMS នៅកម្ពុជា៖ បញ្ជីត្រួតពិនិត្យអ្នកទិញ',
    },
    title: {
      en: 'How to choose an HRMS in Cambodia',
      kh: 'របៀបជ្រើសរើស HRMS នៅកម្ពុជា',
    },
    description: {
      en: 'A practical checklist for Cambodian SMEs and NGOs evaluating HR software: bilingual support, local tax, field attendance, and donor compliance.',
      kh: 'បញ្ជីត្រួតពិនិត្យជាក់ស្តែងសម្រាប់ SME និងអង្គការនៅកម្ពុជាវាយតម្លៃកម្មវិធីធនធានមនុស្ស៖ ភាសាពីរ ពន្ធក្នុងស្រុក វត្តមានការងារក្រៅ និងអនុលោមអ្នកឧបត្ថម្ភ។',
    },
    sections: [
      {
        heading: { en: 'Non-negotiables for Cambodia', kh: 'លក្ខណៈមិនអាចចរចាបានសម្រាប់កម្ពុជា' },
        bullets: [
          { en: 'Khmer + English user interface for all staff', kh: 'ផ្ទាំងអ្នកប្រើជាភាសាខ្មែរ + អង់គ្លេសសម្រាប់បុគ្គលិកទាំងអស់' },
          { en: 'Local tax and seniority indemnity support', kh: 'គាំទ្រពន្ធក្នុងស្រុក និងប្រាក់អតីតភាពការងារ' },
          { en: 'Mobile attendance for field and provincial teams', kh: 'វត្តមានតាមទូរស័ព្ទសម្រាប់ក្រុមការងារក្រៅ និងខេត្ត' },
          { en: 'Audit-ready approval records', kh: 'កំណត់ត្រាអនុម័តត្រៀមសវនកម្ម' },
        ],
      },
      {
        heading: { en: 'Questions to ask any vendor', kh: 'សំណួរដែលត្រូវសួរអ្នកលក់' },
        bullets: [
          { en: 'What happens when Cambodian tax rules change?', kh: 'តើមានអ្វីកើតឡើងពេលច្បាប់ពន្ធកម្ពុជាផ្លាស់ប្តូរ?' },
          { en: 'Is support available in Khmer during business hours?', kh: 'តើការគាំទ្រមានជាភាសាខ្មែរក្នុងម៉ោងការងារទេ?' },
          { en: 'How do we start with one module and add more?', kh: 'តើយើងចាប់ផ្តើមជាមួយម៉ូឌុលមួយ ហើយបន្ថែមយ៉ាងដូចម្តេច?' },
        ],
      },
    ],
    relatedModules: ['people', 'payroll', 'attendance'],
  },
]

export const getGuide = (slug) => guides.find((g) => g.slug === slug) || null
