// Module pages: one dedicated URL per module keyword cluster.
// Each entry is rendered by ModuleView.vue and surfaced in sitemap, prerender,
// and Blade breadcrumb/JSON-LD logic.

export const modules = [
  {
    slug: 'payroll',
    name: { en: 'Payroll', kh: 'បៀវត្សរ៍' },
    seoTitle: {
      en: 'Payroll Software for Cambodia SMEs & NGOs',
      kh: 'កម្មវិធីបៀវត្សរ៍សម្រាប់ SME និងអង្គការនៅកម្ពុជា',
    },
    h1: {
      en: 'Payroll built for Cambodia compliance',
      kh: 'បៀវត្សរ៍ បង្កើតសម្រាប់ការអនុលោមកម្ពុជា',
    },
    description: {
      en: 'Humaneti Payroll handles salary runs, tax, payslips, and loans with approval workflows tailored for Cambodian SMEs and NGOs.',
      kh: 'Humaneti Payroll គ្រប់គ្រងការបើកបៀវត្សរ៍ ពន្ធ បៀវត្សរ៍ និងប្រាក់កម្ចី ជាមួយលំហូរអនុម័ត សម្រាប់ SME និងអង្គការនៅកម្ពុជា។',
    },
    lede: {
      en: 'Run salaries, payslips, and tax with full audit trail — without spreadsheets or manual calculations.',
      kh: 'បើកបៀវត្សរ៍ បៀវត្សរ៍ និងពន្ធជាមួយប្រវត្តិសវនកម្មពេញលេញ មិនចាំបាច់ប្រើ Excel ឬគណនាដោយដៃ។',
    },
    features: [
      { en: 'Salary templates, grades, and employee salary records', kh: 'គំរូប្រាក់ខែ ថ្នាក់ និងកំណត់ត្រាប្រាក់ខែបុគ្គលិក' },
      { en: 'Tax configuration and deduction rules', kh: 'ការកំណត់ពន្ធ និងច្បាប់កាត់ប្រាក់' },
      { en: 'Monthly payroll runs with approval workflows', kh: 'ការបើកបៀវត្សរ៍ប្រចាំខែ ជាមួយលំហូរអនុម័ត' },
      { en: 'Payslip distribution and loan management', kh: 'ការចែកបៀវត្សរ៍ និងគ្រប់គ្រងប្រាក់កម្ចី' },
      { en: 'Export-ready reports for finance and tax filing', kh: 'របាយការណ៍រួចនាំចេញ សម្រាប់ហិរញ្ញវត្ថុ និងដាក់ពន្ធ' },
    ],
    useCases: [
      { en: 'NGOs tracking salary grades across donor-funded projects', kh: 'អង្គការតាមដានថ្នាក់ប្រាក់ខែឆ្លងកាត់គម្រោងរបស់អ្នកឧបត្ថម្ភ' },
      { en: 'SMEs moving from Excel to a controlled payroll process', kh: 'SME ផ្លាស់ពី Excel ទៅដំណើរការបៀវត្សរ៍មានការគ្រប់គ្រង' },
    ],
    faq: [
      {
        q: { en: 'Does Humaneti support Cambodian payroll tax calculations?', kh: 'តើ Humaneti គាំទ្រការគណនាពន្ធបៀវត្សរ៍កម្ពុជាទេ?' },
        a: { en: 'Yes. Tax rules, brackets, and deductions are configurable per plan and can be maintained as Cambodian tax regulations change.', kh: 'គាំទ្រ។ ច្បាប់ពន្ធ ថ្នាក់ និងការកាត់ប្រាក់ អាចកំណត់បានតាមគម្រោង និងធ្វើបច្ចុប្បន្នភាពនៅពេលច្បាប់ពន្ធកម្ពុជាផ្លាស់ប្តូរ។' },
      },
      {
        q: { en: 'Which plan includes Payroll?', kh: 'តើគម្រោងណាដែលរួមបញ្ចូល Payroll?' },
        a: { en: 'Payroll is included in Business, Professional, and Enterprise plans.', kh: 'Payroll ត្រូវបានរួមបញ្ចូលក្នុងគម្រោង Business Professional និង Enterprise។' },
      },
    ],
  },
  {
    slug: 'attendance',
    name: { en: 'Attendance', kh: 'វត្តមាន' },
    seoTitle: {
      en: 'Attendance Tracking Software for Cambodia Teams',
      kh: 'កម្មវិធីតាមដានវត្តមានសម្រាប់ក្រុមការងារកម្ពុជា',
    },
    h1: {
      en: 'Attendance tracking that fits how Cambodian teams work',
      kh: 'តាមដានវត្តមានសមស្របនឹងរបៀបដែលក្រុមកម្ពុជាធ្វើការ',
    },
    description: {
      en: 'Track clock-in, shifts, breaks, and timesheets across offices and field locations with mobile-friendly attendance.',
      kh: 'តាមដានម៉ោងចូល វេន ការសម្រាក និងសន្លឹកពេលវេលាឆ្លងកាត់ការិយាល័យ និងការងារក្រៅ ជាមួយការគាំទ្រទូរស័ព្ទ។',
    },
    lede: {
      en: 'Capture real attendance data from staff on-site, at branches, or working remotely — then flow it directly into payroll.',
      kh: 'ទទួលទិន្នន័យវត្តមានពិតពីបុគ្គលិកនៅការិយាល័យ សាខា ឬធ្វើការពីចម្ងាយ ហើយបញ្ជូនបន្តទៅ Payroll។',
    },
    features: [
      { en: 'Clock-in / clock-out with timestamp and location', kh: 'ម៉ោងចូល/ចេញ ជាមួយពេលវេលា និងទីតាំង' },
      { en: 'Shift scheduling and roster management', kh: 'កាលវិភាគវេន និងគ្រប់គ្រងបញ្ជីការងារ' },
      { en: 'Overtime, breaks, and late-arrival tracking', kh: 'តាមដានម៉ោងបន្ថែម ការសម្រាក និងការមកយឺត' },
      { en: 'Mobile-friendly for field and branch teams', kh: 'ស័ក្តិសមនឹងទូរស័ព្ទសម្រាប់ក្រុមការងារក្រៅ និងសាខា' },
      { en: 'Direct integration into payroll runs', kh: 'រួមបញ្ចូលដោយផ្ទាល់ជាមួយការបើកបៀវត្សរ៍' },
    ],
    useCases: [
      { en: 'NGOs managing field staff across multiple provinces', kh: 'អង្គការគ្រប់គ្រងបុគ្គលិកការងារក្រៅឆ្លងកាត់ខេត្តច្រើន' },
      { en: 'Retail and hospitality SMEs with shift-based teams', kh: 'SME ផ្នែកលក់រាយ និងបដិសណ្ឋារកិច្ចដែលមានក្រុមវេន' },
    ],
    faq: [
      {
        q: { en: 'Do you support biometric or GPS check-in?', kh: 'តើអ្នកគាំទ្រការចុះឈ្មោះតាមបាយូម៉ែត្រ ឬ GPS ទេ?' },
        a: { en: 'GPS-stamped mobile check-in is supported. Biometric hardware integration is available for Enterprise deployments.', kh: 'គាំទ្រការចុះឈ្មោះទូរស័ព្ទដែលមាន GPS។ ការតភ្ជាប់ឧបករណ៍បាយូម៉ែត្រគឺសម្រាប់ការដាក់ឱ្យប្រើ Enterprise។' },
      },
    ],
  },
  {
    slug: 'leave',
    name: { en: 'Leave', kh: 'ការឈប់សម្រាក' },
    seoTitle: {
      en: 'Leave Management Software for Cambodia Organizations',
      kh: 'កម្មវិធីគ្រប់គ្រងការឈប់សម្រាកសម្រាប់អង្គការនៅកម្ពុជា',
    },
    h1: {
      en: 'Leave tracking without email chains',
      kh: 'ការតាមដានការឈប់សម្រាកដោយមិនចាំបាច់ផ្ញើអ៊ីមែលជាច្រើន',
    },
    description: {
      en: 'Request, approve, and balance leave across annual, sick, maternity, and public holidays — all in one workflow.',
      kh: 'ស្នើសុំ អនុម័ត និងគណនាតុល្យភាពការឈប់សម្រាកឆ្នាំ ឈឺ សម្រាលកូន និងថ្ងៃបុណ្យ — ក្នុងលំហូរការងារតែមួយ។',
    },
    lede: {
      en: 'Leave policies by type, balances by employee, approvals by role — with a clean record everyone can trust.',
      kh: 'គោលការណ៍ឈប់សម្រាកតាមប្រភេទ តុល្យភាពតាមបុគ្គលិក ការអនុម័តតាមតួនាទី ជាមួយកំណត់ត្រាស្អាតដែលគ្រប់គ្នាជឿទុកចិត្ត។',
    },
    features: [
      { en: 'Annual, sick, maternity, unpaid, and custom leave types', kh: 'ឈប់សម្រាកឆ្នាំ ឈឺ សម្រាលកូន មិនបង់ប្រាក់ និងប្រភេទតាមតម្រូវការ' },
      { en: 'Role-based approval with escalation rules', kh: 'អនុម័តតាមតួនាទី ជាមួយច្បាប់បន្ត' },
      { en: 'Cambodia public holiday calendar', kh: 'ប្រតិទិនថ្ងៃបុណ្យសាធារណៈកម្ពុជា' },
      { en: 'Balance accrual and carryover controls', kh: 'បង្គរតុល្យភាព និងការគ្រប់គ្រងការបន្ត' },
    ],
    useCases: [],
    faq: [],
  },
  {
    slug: 'people',
    name: { en: 'People', kh: 'បុគ្គលិក' },
    seoTitle: {
      en: 'HRMS for Cambodia SMEs & NGOs — Employee Records Done Right',
      kh: 'HRMS សម្រាប់ SME និងអង្គការនៅកម្ពុជា — គ្រប់គ្រងកំណត់ត្រាបុគ្គលិកឱ្យត្រឹមត្រូវ',
    },
    h1: {
      en: 'Employee records, contracts, and org structure in one place',
      kh: 'កំណត់ត្រាបុគ្គលិក កិច្ចសន្យា និងរចនាសម្ព័ន្ធអង្គការ ក្នុងកន្លែងតែមួយ',
    },
    description: {
      en: 'A central HRMS for Cambodian SMEs and NGOs: employee profiles, contracts, org charts, and role-based access across all modules.',
      kh: 'HRMS កណ្តាលសម្រាប់ SME និងអង្គការនៅកម្ពុជា៖ ព័ត៌មានបុគ្គលិក កិច្ចសន្យា តារាងអង្គការ និងសិទ្ធិតាមតួនាទី។',
    },
    lede: {
      en: 'Move from Excel files and paper contracts to a real employee database that every other module builds on.',
      kh: 'ផ្លាស់ពីឯកសារ Excel និងកិច្ចសន្យាក្រដាស ទៅមូលដ្ឋានទិន្នន័យបុគ្គលិកពិត ដែលគ្រប់ម៉ូឌុលផ្សេងៗពឹងផ្អែកលើ។',
    },
    features: [
      { en: 'Employee profiles, contracts, and documents', kh: 'ព័ត៌មានបុគ្គលិក កិច្ចសន្យា និងឯកសារ' },
      { en: 'Department, branch, and position hierarchy', kh: 'រចនាសម្ព័ន្ធនាយកដ្ឋាន សាខា និងតួនាទី' },
      { en: 'Role-based permissions across all modules', kh: 'សិទ្ធិតាមតួនាទីឆ្លងកាត់គ្រប់ម៉ូឌុល' },
      { en: 'Secure storage with audit logs', kh: 'ការរក្សាទុកមានសុវត្ថិភាព ជាមួយកំណត់ហេតុសវនកម្ម' },
    ],
    useCases: [],
    faq: [],
  },
  {
    slug: 'assets',
    name: { en: 'Assets', kh: 'ទ្រព្យសម្បត្តិ' },
    seoTitle: {
      en: 'Asset Management Software for Cambodia NGOs & SMEs',
      kh: 'កម្មវិធីគ្រប់គ្រងទ្រព្យសម្បត្តិសម្រាប់អង្គការ និង SME នៅកម្ពុជា',
    },
    h1: {
      en: 'Track every laptop, vehicle, and donation asset — with full history',
      kh: 'តាមដានគ្រប់កុំព្យូទ័រ រថយន្ត និងទ្រព្យដែលទទួលបាន ជាមួយប្រវត្តិពេញលេញ',
    },
    description: {
      en: 'Register, assign, and audit assets across offices and field sites. Donor-friendly records for NGOs and clear ownership for SMEs.',
      kh: 'ចុះឈ្មោះ ប្រគល់ និងធ្វើសវនកម្មទ្រព្យឆ្លងកាត់ការិយាល័យ និងការងារក្រៅ។ កំណត់ត្រាសមស្របសម្រាប់អ្នកឧបត្ថម្ភអង្គការ និងភាពម្ចាស់ច្បាស់សម្រាប់ SME។',
    },
    lede: {
      en: 'Know who has what, where it is, and how it has moved — with photo receipts and handover history.',
      kh: 'ដឹងថាអ្នកណាមានអ្វី នៅទីណា និងបានផ្លាស់ប្តូរយ៉ាងដូចម្តេច — ជាមួយវិក្កយបត្ររូបភាព និងប្រវត្តិការផ្ទេរ។',
    },
    features: [
      { en: 'Asset registry with categories and tagging', kh: 'បញ្ជីទ្រព្យសម្បត្តិជាមួយប្រភេទ និងស្លាក' },
      { en: 'Assignment, handover, and return workflows', kh: 'ការប្រគល់ ការផ្ទេរ និងលំហូរការសង' },
      { en: 'Maintenance schedules and depreciation', kh: 'កាលវិភាគថែទាំ និងការធ្លាក់ថ្លៃ' },
      { en: 'Donor-linked tracking for grant assets', kh: 'តាមដានតភ្ជាប់ជាមួយអ្នកឧបត្ថម្ភសម្រាប់ទ្រព្យប្រទាន' },
    ],
    useCases: [],
    faq: [],
  },
  {
    slug: 'purchase-requests',
    name: { en: 'Purchase Requests', kh: 'សំណើទិញ' },
    seoTitle: {
      en: 'Purchase Request & Procurement Software for Cambodia NGOs',
      kh: 'កម្មវិធីសំណើទិញ និងលទ្ធកម្មសម្រាប់អង្គការនៅកម្ពុជា',
    },
    h1: {
      en: 'PR to PO to Goods Received — one auditable workflow',
      kh: 'ពី PR ទៅ PO ទៅការទទួលទំនិញ — លំហូរការងារមួយដែលអាចសវនកម្មបាន',
    },
    description: {
      en: 'Run the full procurement cycle: request, quotations, approvals, purchase orders, and goods-received — with budget checks at every step.',
      kh: 'ដំណើរការវដ្តលទ្ធកម្មពេញលេញ៖ សំណើ ថ្លៃ អនុម័ត បញ្ជាទិញ និងការទទួលទំនិញ ជាមួយការត្រួតពិនិត្យថវិកាគ្រប់ជំហាន។',
    },
    lede: {
      en: 'Replace email-chain procurement with a controlled workflow that matches NGO donor compliance and SME budget discipline.',
      kh: 'ជំនួសលទ្ធកម្មតាមអ៊ីមែលដោយលំហូរការងារមានការគ្រប់គ្រង ស្របតាមអនុលោមអង្គការ និងវិន័យថវិកា SME។',
    },
    features: [
      { en: 'Purchase requests, quotations, and approval chains', kh: 'សំណើទិញ ថ្លៃទំនិញ និងខ្សែអនុម័ត' },
      { en: 'Purchase orders and goods-received tracking', kh: 'បញ្ជាទិញ និងតាមដានការទទួលទំនិញ' },
      { en: 'Budget limits and vendor management', kh: 'ដែនកំណត់ថវិកា និងគ្រប់គ្រងអ្នកផ្គត់ផ្គង់' },
      { en: 'Full audit trail for donor and internal audits', kh: 'ប្រវត្តិសវនកម្មពេញលេញសម្រាប់សវនកម្មអ្នកឧបត្ថម្ភ និងផ្ទៃក្នុង' },
    ],
    useCases: [
      { en: 'NGOs demonstrating donor compliance on procurement spend', kh: 'អង្គការបង្ហាញអនុលោមអ្នកឧបត្ថម្ភលើការចំណាយលទ្ធកម្ម' },
    ],
    faq: [],
  },
  {
    slug: 'expense-claims',
    name: { en: 'Expense Claims', kh: 'ការស្នើសុំសងថ្លៃចំណាយ' },
    seoTitle: {
      en: 'Expense Claim Software for Cambodia NGOs & Non-Profits',
      kh: 'កម្មវិធីការស្នើសុំសងថ្លៃចំណាយសម្រាប់អង្គការមិនរកកម្រៃ',
    },
    h1: {
      en: 'Expense claims, cash advances, and reimbursements — without paper',
      kh: 'ការស្នើសុំសងថ្លៃចំណាយ ប្រាក់បុរេប្រទាន និងការសងទឹកប្រាក់ មិនប្រើក្រដាស',
    },
    description: {
      en: 'Submit receipts by phone, route through approvals, reconcile cash advances, and reimburse — with full audit records for donors and finance.',
      kh: 'ដាក់ស្នើវិក្កយបត្រតាមទូរស័ព្ទ ឆ្លងកាត់ការអនុម័ត ផ្ទៀងផ្ទាត់ប្រាក់បុរេប្រទាន និងសងប្រាក់ — ជាមួយកំណត់ត្រាសវនកម្មសម្រាប់អ្នកឧបត្ថម្ភ និងហិរញ្ញវត្ថុ។',
    },
    lede: {
      en: 'Turn the reimbursement pile into a controlled process that finance teams actually enjoy closing.',
      kh: 'ផ្លាស់ពីគំនរសំណើសងប្រាក់ ទៅដំណើរការមានការគ្រប់គ្រង ដែលក្រុមហិរញ្ញវត្ថុសប្បាយចិត្តបិទ។',
    },
    features: [
      { en: 'Mobile-friendly receipt submission', kh: 'ដាក់ស្នើវិក្កយបត្រតាមទូរស័ព្ទ' },
      { en: 'Cash advance, clearance, and reimbursement', kh: 'ប្រាក់បុរេប្រទាន ការផ្ទៀងផ្ទាត់ និងការសងប្រាក់' },
      { en: 'Budget-linked controls and approval chains', kh: 'ការគ្រប់គ្រងតភ្ជាប់ថវិកា និងខ្សែអនុម័ត' },
      { en: 'Donor-ready report exports', kh: 'នាំចេញរបាយការណ៍ត្រៀមសម្រាប់អ្នកឧបត្ថម្ភ' },
    ],
    useCases: [],
    faq: [],
  },
  {
    slug: 'projects',
    name: { en: 'Projects', kh: 'គម្រោង' },
    seoTitle: {
      en: 'Project & Donor Tracking Software for Cambodia NGOs',
      kh: 'កម្មវិធីតាមដានគម្រោង និងអ្នកឧបត្ថម្ភសម្រាប់អង្គការនៅកម្ពុជា',
    },
    h1: {
      en: 'Projects, donors, and budgets that stay in sync',
      kh: 'គម្រោង អ្នកឧបត្ថម្ភ និងថវិកាដែលនៅសមស្របគ្នា',
    },
    description: {
      en: 'Track NGO projects, grants, and donor allocations with spend linked to the same purchase and expense data the rest of your organization already uses.',
      kh: 'តាមដានគម្រោងអង្គការ ជំនួយ និងការបែងចែករបស់អ្នកឧបត្ថម្ភ ជាមួយការចំណាយតភ្ជាប់ទៅទិន្នន័យទិញ និងចំណាយដែលអង្គការកំពុងប្រើ។',
    },
    lede: {
      en: 'No more reconciling grant budgets from three different spreadsheets on report day.',
      kh: 'លែងចាំបាច់ផ្ទៀងផ្ទាត់ថវិកាជំនួយពី Excel ច្រើនទៀតនៅថ្ងៃរាយការណ៍។',
    },
    features: [
      { en: 'Project setup with donor allocations', kh: 'រៀបចំគម្រោងជាមួយការបែងចែករបស់អ្នកឧបត្ថម្ភ' },
      { en: 'Budget vs actual tracking', kh: 'ថវិកាធៀបនឹងការចំណាយពិត' },
      { en: 'Linked to purchase requests and expense claims', kh: 'តភ្ជាប់ទៅសំណើទិញ និងការស្នើសុំសងថ្លៃចំណាយ' },
      { en: 'Donor-ready project reporting', kh: 'រាយការណ៍គម្រោងត្រៀមសម្រាប់អ្នកឧបត្ថម្ភ' },
    ],
    useCases: [],
    faq: [],
  },
  {
    slug: 'announcements',
    name: { en: 'Announcements', kh: 'សេចក្តីប្រកាស' },
    seoTitle: {
      en: 'Internal Announcements for Cambodia Teams',
      kh: 'សេចក្តីប្រកាសផ្ទៃក្នុងសម្រាប់ក្រុមការងារនៅកម្ពុជា',
    },
    h1: {
      en: 'Targeted announcements everyone actually sees',
      kh: 'សេចក្តីប្រកាសផ្តោតទៅអ្នកទទួលពិតៗ',
    },
    description: {
      en: 'Post announcements by branch, department, or role — with read tracking so important updates do not get lost in chat.',
      kh: 'ប្រកាសតាមសាខា នាយកដ្ឋាន ឬតួនាទី ជាមួយតាមដានការអាន ដើម្បីកុំឱ្យព័ត៌មានសំខាន់បាត់ក្នុងការជជែក។',
    },
    lede: {
      en: 'Policy changes, holidays, and HR notices delivered to the right people — tracked, archived, and searchable.',
      kh: 'ការផ្លាស់ប្តូរគោលនយោបាយ ថ្ងៃបុណ្យ និងសេចក្តីជូនដំណឹងធនធានមនុស្ស ផ្ញើទៅអ្នកត្រឹមត្រូវ — តាមដាន រក្សាទុក និងស្វែងរកបាន។',
    },
    features: [
      { en: 'Target by branch, department, or role', kh: 'ផ្តោតទៅសាខា នាយកដ្ឋាន ឬតួនាទី' },
      { en: 'Read receipts and acknowledgement tracking', kh: 'តាមដានការអាន និងការទទួលស្គាល់' },
      { en: 'Khmer/English content with rich formatting', kh: 'មាតិកាខ្មែរ/អង់គ្លេសជាមួយការរៀបចំ' },
    ],
    useCases: [],
    faq: [],
  },
]

export const getModule = (slug) => modules.find((m) => m.slug === slug) || null
