<script setup>
import { ref, watch, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { icons } from '@/components/icons'
import { usePublicI18n } from '@/composables/usePublicI18n'

const route = useRoute()
const router = useRouter()
const activeModule = ref(0)
const { locale, t } = usePublicI18n()

const khText = {
  Product: 'ផលិតផល',
  'Human Resource Management': 'ការគ្រប់គ្រងធនធានមនុស្ស',
  'Payroll Processing': 'ដំណើរការបៀវត្សរ៍',
  'Asset Management': 'ការគ្រប់គ្រងទ្រព្យសម្បត្តិ',
  'Purchase Request System': 'ប្រព័ន្ធសំណើទិញ',
  HRM: 'HRM',
  Payroll: 'បៀវត្សរ៍',
  Asset: 'ទ្រព្យសម្បត្តិ',
  'Purchase Request': 'សំណើទិញ',
  Enterprise: 'សហគ្រាស',
  'All Plans': 'គ្រប់គម្រោង',
  'Structured workforce operations': 'ប្រតិបត្តិការបុគ្គលិកមានរចនាសម្ព័ន្ធ',
  'Run people operations with employee records, departments, designations, reporting lines, contracts, and onboarding/offboarding controls.':
    'គ្រប់គ្រងប្រតិបត្តិការបុគ្គលិកជាមួយកំណត់ត្រាបុគ្គលិក នាយកដ្ឋាន តួនាទី ខ្សែរបាយការណ៍ កិច្ចសន្យា និងការគ្រប់គ្រងការចូល/ចេញ។',
  'Employee Profiles': 'ប្រវត្តិបុគ្គលិក',
  'Centralized employee database with complete information, documents, and history.':
    'មូលដ្ឋានទិន្នន័យបុគ្គលិកកណ្តាល ជាមួយព័ត៌មាន ឯកសារ និងប្រវត្តិពេញលេញ។',
  'Organizational Structure': 'រចនាសម្ព័ន្ធអង្គការ',
  'Department hierarchies, reporting lines, and role definitions in one place.':
    'លំដាប់នាយកដ្ឋាន ខ្សែរបាយការណ៍ និងនិយមន័យតួនាទី ក្នុងកន្លែងតែមួយ។',
  'Attendance Tracking': 'ការតាមដានវត្តមាន',
  'Clock in/out, leave requests, overtime calculation, and attendance reports.':
    'ចូល/ចេញម៉ោងធ្វើការ សំណើសុំច្បាប់ ការគណនា OT និងរបាយការណ៍វត្តមាន។',
  'Leave Management': 'ការគ្រប់គ្រងការឈប់សម្រាក',
  'Leave requests, approval routing, balances, and policy-based leave type controls.':
    'សំណើសុំច្បាប់ លំហូរអនុម័ត សមតុល្យ និងការគ្រប់គ្រងប្រភេទច្បាប់តាមគោលនយោបាយ។',
  'Recruitment & On/Offboarding': 'ជ្រើសរើសបុគ្គលិក និង On/Offboarding',
  'Manage jobs, candidates, interviews, and checklist-driven onboarding/offboarding.':
    'គ្រប់គ្រងការងារ បេក្ខជន សម្ភាសន៍ និងការចូល/ចេញតាម checklist។',
  'Document Storage': 'ការផ្ទុកឯកសារ',
  'Secure storage for contracts, certifications, and employee documents.':
    'ការផ្ទុកដោយសុវត្ថិភាពសម្រាប់កិច្ចសន្យា វិញ្ញាបនបត្រ និងឯកសារបុគ្គលិក។',
  'Standardize HR records and approvals': 'ធ្វើស្តង់ដារកំណត់ត្រា និងការអនុម័ត HR',
  'Reduce manual handoffs and follow-ups': 'កាត់បន្ថយការផ្ទេរការងារ និងតាមដានដោយដៃ',
  'Improve reporting line clarity': 'បង្កើនភាពច្បាស់នៃខ្សែរបាយការណ៍',
  'Strengthen compliance traceability': 'ពង្រឹងភាពអាចតាមដានសម្រាប់អនុលោម',
  'Controlled payroll execution': 'ដំណើរការបៀវត្សរ៍មានការគ្រប់គ្រង',
  'Process payroll with salary structures, adjustments, bonus/incentives, deductions, runs, and full approval tracking.':
    'ដំណើរការបៀវត្សរ៍ជាមួយរចនាសម្ព័ន្ធប្រាក់ខែ ការកែសម្រួល ប្រាក់រង្វាន់/លើកទឹកចិត្ត ការកាត់ប្រាក់ វដ្ដបៀវត្សរ៍ និងការតាមដានអនុម័តពេញលេញ។',
  'Salary Structures': 'រចនាសម្ព័ន្ធប្រាក់ខែ',
  'Flexible salary components including allowances, deductions, and bonuses.':
    'សមាសភាគប្រាក់ខែបត់បែន រួមមានប្រាក់បន្ថែម ការកាត់ប្រាក់ និងប្រាក់រង្វាន់។',
  'Approval Workflows': 'លំហូរការអនុម័ត',
  'Multi-step approval process ensuring proper authorization before payment.':
    'ដំណើរការអនុម័តច្រើនជំហាន ដើម្បីធានាសិទ្ធិត្រឹមត្រូវមុនបើកប្រាក់។',
  'Payslip Generation': 'បង្កើតសន្លឹកបៀវត្សរ៍',
  'Automated payslip creation with secure delivery to employees.':
    'បង្កើតសន្លឹកបៀវត្សរ៍ដោយស្វ័យប្រវត្តិ និងផ្ញើជូនបុគ្គលិកដោយសុវត្ថិភាព។',
  'Tax Management': 'ការគ្រប់គ្រងពន្ធ',
  'Configurable tax settings and exchange-rate aware calculations for payroll processing.':
    'ការកំណត់ពន្ធបត់បែន និងការគណនាពឹងផ្អែកអត្រាប្តូរប្រាក់ សម្រាប់ដំណើរការបៀវត្សរ៍។',
  'Loan Management': 'ការគ្រប់គ្រងកម្ចី',
  'Track employee loans and automatically deduct installments from salary.':
    'តាមដានកម្ចីបុគ្គលិក និងកាត់រំលស់ពីប្រាក់ខែដោយស្វ័យប្រវត្តិ។',
  'Audit Trail': 'ប្រវត្តិត្រួតពិនិត្យ',
  'Complete history of all payroll changes and approvals for compliance.':
    'ប្រវត្តិពេញលេញនៃការកែប្រែ និងការអនុម័តបៀវត្សរ៍ទាំងអស់ សម្រាប់អនុលោម។',
  'Standardize payroll change controls': 'ធ្វើស្តង់ដារការគ្រប់គ្រងការកែប្រែបៀវត្សរ៍',
  'Improve pay component consistency': 'បង្កើនភាពស្របគ្នានៃសមាសភាគប្រាក់ខែ',
  'Support finance review checkpoints': 'គាំទ្រចំណុចពិនិត្យឡើងវិញរបស់ហិរញ្ញវត្ថុ',
  'Maintain complete payroll traceability': 'រក្សាភាពអាចតាមដានបៀវត្សរ៍ពេញលេញ',
  'Controlled asset lifecycle': 'វដ្ដជីវិតទ្រព្យសម្បត្តិមានការគ្រប់គ្រង',
  'Maintain visibility from registration to assignment, transfer, and retirement with complete custody history.':
    'រក្សាភាពមើលឃើញចាប់ពីការចុះបញ្ជី ដល់ការចាត់តាំង ផ្ទេរ និងបិទប្រើ ជាមួយប្រវត្តិកាន់កាប់ពេញលេញ។',
  'Asset Registry': 'បញ្ជីទ្រព្យសម្បត្តិ',
  'Complete inventory of all company assets with detailed specifications.':
    'បញ្ជីសារពើភណ្ឌទ្រព្យសម្បត្តិក្រុមហ៊ុនទាំងអស់ ជាមួយព័ត៌មានលម្អិត។',
  'Assignment Tracking': 'ការតាមដានការចាត់តាំង',
  'Track which employee or department has custody of each asset.':
    'តាមដានថាបុគ្គលិក ឬនាយកដ្ឋានណាកំពុងកាន់កាប់ទ្រព្យសម្បត្តិនីមួយៗ។',
  'Custody History': 'ប្រវត្តិកាន់កាប់',
  'Complete audit trail of all asset transfers and assignments.':
    'ប្រវត្តិត្រួតពិនិត្យពេញលេញនៃការផ្ទេរ និងចាត់តាំងទ្រព្យសម្បត្តិទាំងអស់។',
  'Status Management': 'ការគ្រប់គ្រងស្ថានភាព',
  'Track asset condition, maintenance, and lifecycle status.':
    'តាមដានសភាពទ្រព្យសម្បត្តិ ការថែទាំ និងស្ថានភាពវដ្ដជីវិត។',
  'Return Workflows': 'លំហូរប្រគល់ត្រឡប់',
  'Structured process for asset returns with condition verification.':
    'ដំណើរការមានរចនាសម្ព័ន្ធសម្រាប់ប្រគល់ទ្រព្យសម្បត្តិត្រឡប់ ជាមួយការផ្ទៀងផ្ទាត់សភាព។',
  Reporting: 'របាយការណ៍',
  'Asset status, assignment, and movement reporting with action history.':
    'របាយការណ៍ស្ថានភាព ការចាត់តាំង និងចលនាទ្រព្យសម្បត្តិ ជាមួយប្រវត្តិសកម្មភាព។',
  'Improve asset accountability': 'បង្កើនការទទួលខុសត្រូវលើទ្រព្យសម្បត្តិ',
  'Reduce assignment disputes': 'កាត់បន្ថយជម្លោះពាក់ព័ន្ធការចាត់តាំង',
  'Support maintenance decisions': 'គាំទ្រការសម្រេចចិត្តលើការថែទាំ',
  'Strengthen audit preparedness': 'ពង្រឹងភាពត្រៀមសម្រាប់សវនកម្ម',
  'End-to-end procurement controls': 'ការគ្រប់គ្រងលទ្ធកម្មគ្រប់ដំណាក់កាល',
  'Control purchasing through request workflows, budget checks, vendor/quote handling, purchase orders, and goods received.':
    'គ្រប់គ្រងការទិញតាមលំហូរសំណើ ការត្រួតពិនិត្យថវិកា ការគ្រប់គ្រងអ្នកផ្គត់ផ្គង់/សម្រង់ ពាក្យបញ្ជាទិញ និងការទទួលទំនិញ។',
  'Request Submission': 'ការដាក់ស្នើសំណើ',
  'Simple form-based purchase request creation with item details.':
    'បង្កើតសំណើទិញតាមបែបបទសាមញ្ញ ជាមួយព័ត៌មានលម្អិតទំនិញ។',
  'Approval Chains': 'ខ្សែសង្វាក់អនុម័ត',
  'Configurable multi-level approval based on amount and category.':
    'កំណត់ការអនុម័តច្រើនកម្រិតតាមចំនួនទឹកប្រាក់ និងប្រភេទបាន។',
  'Budget Tracking': 'ការតាមដានថវិកា',
  'Real-time budget monitoring and approval rules based on limits.':
    'ត្រួតពិនិត្យថវិកាពេលពិត និងច្បាប់អនុម័តតាមដែនកំណត់។',
  'Vendor Management': 'ការគ្រប់គ្រងអ្នកផ្គត់ផ្គង់',
  'Maintain vendor database with quotes and performance history.':
    'រក្សាមូលដ្ឋានទិន្នន័យអ្នកផ្គត់ផ្គង់ ជាមួយសម្រង់ និងប្រវត្តិប្រតិបត្តិការ។',
  'Document Attachment': 'ភ្ជាប់ឯកសារ',
  'Attach quotes, invoices, and supporting documents to requests.':
    'ភ្ជាប់សម្រង់ វិក្កយបត្រ និងឯកសារគាំទ្រទៅសំណើ។',
  'Status Tracking': 'ការតាមដានស្ថានភាព',
  'Real-time visibility of request status and decision history.':
    'មើលឃើញស្ថានភាពសំណើ និងប្រវត្តិសម្រេចចិត្តបានភ្លាមៗ។',
  'Reduce off-process purchases': 'កាត់បន្ថយការទិញក្រៅដំណើរការ',
  'Improve budget discipline': 'បង្កើនវិន័យថវិកា',
  'Keep vendor evidence linked': 'រក្សាភស្តុតាងអ្នកផ្គត់ផ្គង់ឱ្យភ្ជាប់ជាប់',
  'Maintain procurement audit trail': 'រក្សាប្រវត្តិសវនកម្មលទ្ធកម្ម',
  'Unified Workflows': 'លំហូរការងាររួម',
  'Same UX patterns across all modules for consistency and ease of use':
    'លំនាំ UX ដូចគ្នាទូទាំងម៉ូឌុល សម្រាប់ភាពស្របគ្នា និងងាយប្រើ។',
  'Role-Based Access': 'សិទ្ធិតាមតួនាទី',
  'Granular permissions ensuring users see only what they need':
    'សិទ្ធិលម្អិតធានាថាអ្នកប្រើឃើញតែអ្វីដែលចាំបាច់។',
  'Real-Time Reports': 'របាយការណ៍ពេលពិត',
  'Instant insights into operations with customizable dashboards':
    'ទទួលបានការយល់ដឹងភ្លាមៗអំពីប្រតិបត្តិការ ជាមួយ dashboard បត់បែនបាន។',
  'Mobile Access': 'ការចូលប្រើតាមទូរស័ព្ទ',
  'Full functionality on any device, anywhere, anytime':
    'ប្រើមុខងារបានពេញលេញលើឧបករណ៍គ្រប់ប្រភេទ គ្រប់ទីកន្លែង គ្រប់ពេល។',
  'Operational Notifications': 'ការជូនដំណឹងប្រតិបត្តិការ',
  'In-app and email alerts for workflow actions and status updates':
    'ការជូនដំណឹងក្នុងកម្មវិធី និងអ៊ីមែល សម្រាប់សកម្មភាពលំហូរការងារ និងបច្ចុប្បន្នភាពស្ថានភាព។',
  'Scoped Data Access': 'ការចូលប្រើទិន្នន័យតាមវិសាលភាព',
  'Company-scope and role-based controls across operational modules':
    'ការគ្រប់គ្រងតាមវិសាលភាពក្រុមហ៊ុន និងតួនាទី ទូទាំងម៉ូឌុលប្រតិបត្តិការ។',
  'Integration Endpoints': 'ចំណុចភ្ជាប់បច្ចេកទេស',
  'REST API support for controlled system integrations':
    'គាំទ្រ REST API សម្រាប់ការរួមបញ្ចូលប្រព័ន្ធដោយមានការគ្រប់គ្រង។',
  'Excel Import/Export': 'នាំចូល/នាំចេញ Excel',
  'Bulk data operations via spreadsheets':
    'ប្រតិបត្តិការទិន្នន័យច្រើនតាមសៀវភៅតារាង។',
  'Email Integration': 'ការរួមបញ្ចូលអ៊ីមែល',
  'Automated email notifications and alerts': 'ការជូនដំណឹង និងការព្រមានតាមអ៊ីមែលដោយស្វ័យប្រវត្តិ',
  'Implementation Support': 'ការគាំទ្រអនុវត្ត',
  'Setup and rollout support aligned to your workflows': 'ការគាំទ្ររៀបចំ និងដាក់ឱ្យប្រើប្រាស់ស្របតាមលំហូរការងាររបស់អ្នក',
}

const normalizeTxKey = (value) => String(value || '').replace(/[’]/g, "'").replace(/[–—]/g, '-')
const tx = (value) => {
  if (locale.value !== 'kh') return value
  const direct = khText[value]
  if (direct) return direct
  const normalized = normalizeTxKey(value)
  return khText[normalized] || value
}

const modules = [
  {
    id: 'hrm',
    name: 'HRM',
    fullName: 'Human Resource Management',
    icon: icons.people,
    color: 'indigo',
    tagline: 'Structured workforce operations',
    description: 'Run people operations with employee records, departments, designations, reporting lines, contracts, and onboarding/offboarding controls.',
    features: [
      {
        title: 'Employee Profiles',
        description: 'Centralized employee database with complete information, documents, and history.'
      },
      {
        title: 'Organizational Structure',
        description: 'Department hierarchies, reporting lines, and role definitions in one place.'
      },
      {
        title: 'Attendance Tracking',
        description: 'Clock in/out, leave requests, overtime calculation, and attendance reports.'
      },
      {
        title: 'Leave Management',
        description: 'Leave requests, approval routing, balances, and policy-based leave type controls.'
      },
      {
        title: 'Recruitment & On/Offboarding',
        description: 'Manage jobs, candidates, interviews, and checklist-driven onboarding/offboarding.'
      },
      {
        title: 'Document Storage',
        description: 'Secure storage for contracts, certifications, and employee documents.'
      }
    ],
    benefits: [
      'Standardize HR records and approvals',
      'Reduce manual handoffs and follow-ups',
      'Improve reporting line clarity',
      'Strengthen compliance traceability'
    ]
  },
  {
    id: 'payroll',
    name: 'Payroll',
    fullName: 'Payroll Processing',
    icon: icons.money,
    color: 'emerald',
    tagline: 'Controlled payroll execution',
    description: 'Process payroll with salary structures, adjustments, bonus/incentives, deductions, runs, and full approval tracking.',
    features: [
      {
        title: 'Salary Structures',
        description: 'Flexible salary components including allowances, deductions, and bonuses.'
      },
      {
        title: 'Approval Workflows',
        description: 'Multi-step approval process ensuring proper authorization before payment.'
      },
      {
        title: 'Payslip Generation',
        description: 'Automated payslip creation with secure delivery to employees.'
      },
      {
        title: 'Tax Management',
        description: 'Configurable tax settings and exchange-rate aware calculations for payroll processing.'
      },
      {
        title: 'Loan Management',
        description: 'Track employee loans and automatically deduct installments from salary.'
      },
      {
        title: 'Audit Trail',
        description: 'Complete history of all payroll changes and approvals for compliance.'
      }
    ],
    benefits: [
      'Standardize payroll change controls',
      'Improve pay component consistency',
      'Support finance review checkpoints',
      'Maintain complete payroll traceability'
    ]
  },
  {
    id: 'assets',
    name: 'Asset',
    fullName: 'Asset Management',
    icon: icons.box,
    color: 'violet',
    tagline: 'Controlled asset lifecycle',
    description: 'Maintain visibility from registration to assignment, transfer, and retirement with complete custody history.',
    features: [
      {
        title: 'Asset Registry',
        description: 'Complete inventory of all company assets with detailed specifications.'
      },
      {
        title: 'Assignment Tracking',
        description: 'Track which employee or department has custody of each asset.'
      },
      {
        title: 'Custody History',
        description: 'Complete audit trail of all asset transfers and assignments.'
      },
      {
        title: 'Status Management',
        description: 'Track asset condition, maintenance, and lifecycle status.'
      },
      {
        title: 'Return Workflows',
        description: 'Structured process for asset returns with condition verification.'
      },
      {
        title: 'Reporting',
        description: 'Asset status, assignment, and movement reporting with action history.'
      }
    ],
    benefits: [
      'Improve asset accountability',
      'Reduce assignment disputes',
      'Support maintenance decisions',
      'Strengthen audit preparedness'
    ]
  },
  {
    id: 'pr',
    name: 'Purchase Request',
    fullName: 'Purchase Request System',
    icon: icons.cart,
    color: 'amber',
    tagline: 'End-to-end procurement controls',
    description: 'Control purchasing through request workflows, budget checks, vendor/quote handling, purchase orders, and goods received.',
    features: [
      {
        title: 'Request Submission',
        description: 'Simple form-based purchase request creation with item details.'
      },
      {
        title: 'Approval Chains',
        description: 'Configurable multi-level approval based on amount and category.'
      },
      {
        title: 'Budget Tracking',
        description: 'Real-time budget monitoring and approval rules based on limits.'
      },
      {
        title: 'Vendor Management',
        description: 'Maintain vendor database with quotes and performance history.'
      },
      {
        title: 'Document Attachment',
        description: 'Attach quotes, invoices, and supporting documents to requests.'
      },
      {
        title: 'Status Tracking',
        description: 'Real-time visibility of request status and decision history.'
      }
    ],
    benefits: [
      'Reduce off-process purchases',
      'Improve budget discipline',
      'Keep vendor evidence linked',
      'Maintain procurement audit trail'
    ]
  }
]

const platformFeatures = [
  {
    icon: '🔄',
    title: 'Unified Workflows',
    description: 'Same UX patterns across all modules for consistency and ease of use'
  },
  {
    icon: '🔐',
    title: 'Role-Based Access',
    description: 'Granular permissions ensuring users see only what they need'
  },
  {
    icon: '📊',
    title: 'Real-Time Reports',
    description: 'Instant insights into operations with customizable dashboards'
  },
  {
    icon: '📱',
    title: 'Mobile Access',
    description: 'Full functionality on any device, anywhere, anytime'
  },
  {
    icon: '🔔',
    title: 'Operational Notifications',
    description: 'In-app and email alerts for workflow actions and status updates'
  },
  {
    icon: '🔍',
    title: 'Scoped Data Access',
    description: 'Company-scope and role-based controls across operational modules'
  }
]

const integrationPoints = [
  {
    name: 'Integration Endpoints',
    description: 'REST API support for controlled system integrations',
    available: 'Enterprise'
  },
  {
    name: 'Excel Import/Export',
    description: 'Bulk data operations via spreadsheets',
    available: 'All Plans'
  },
  {
    name: 'Email Integration',
    description: 'Automated email notifications and alerts',
    available: 'All Plans'
  },
  {
    name: 'Implementation Support',
    description: 'Setup and rollout support aligned to your workflows',
    available: 'Enterprise'
  }
]

const setActiveModule = (index, updateHash = true) => {
  activeModule.value = index

  if (!updateHash) return

  const targetHash = `#${modules[index].id}`
  if (route.hash === targetHash) return

  router.replace({
    path: route.path,
    query: route.query,
    hash: targetHash,
  })
}

const syncModuleFromHash = (hash) => {
  if (!hash) return
  const normalized = hash.replace(/^#/, '').toLowerCase()
  const foundIndex = modules.findIndex((item) => item.id === normalized)
  if (foundIndex >= 0) {
    setActiveModule(foundIndex, false)
  }
}

onMounted(() => {
  syncModuleFromHash(route.hash)
})

watch(() => route.hash, (hash) => {
  syncModuleFromHash(hash)
})
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t({ en: 'PRODUCT OVERVIEW', kh: 'ទិដ្ឋភាពទូទៅផលិតផល' }) }}</UiBadge>
      
      <div class="grid gap-12 lg:grid-cols-2 lg:gap-16 items-center">
        <div>
          <h1 class="text-4xl font-bold leading-tight tracking-tight text-slate-900 sm:text-5xl">
            {{ t({ en: 'Build your operations backbone', kh: 'បង្កើតគ្រឹះប្រតិបត្តិការរបស់អ្នក' }) }}
            <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent"> {{ t({ en: 'without rebuilding later', kh: 'ដោយមិនចាំបាច់សាងសង់ឡើងវិញក្រោយមក' }) }}</span>
          </h1>
          
          <p class="mt-6 text-lg leading-relaxed text-slate-600">
            {{ t({ en: 'Humaneti is modular by design. Start with core operations (HRM, Payroll, Assets, Purchase Requests), then extend into Expense Claim, Projects, Announcements, and global operational settings as you scale.', kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ត្រូវបានរចនាជាម៉ូឌុល។ ចាប់ផ្តើមពីប្រតិបត្តិការស្នូល (HRM បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ) ហើយពង្រីកទៅ Expense Claim Projects Announcements និងការកំណត់សកលពេលអង្គការរីកចម្រើន។' }) }}
          </p>

          <div class="mt-8 flex flex-wrap gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              {{ t({ en: 'Schedule Demo', kh: 'កំណត់ពេលដេមូ' }) }}
            </UiButton>
            <UiButton as="router-link" to="/pricing" variant="secondary" size="lg">
              {{ t({ en: 'View Pricing', kh: 'មើលតម្លៃ' }) }}
            </UiButton>
          </div>
        </div>

        <!-- Platform Preview -->
        <div class="relative">
          <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-indigo-500/20 via-violet-500/20 to-emerald-500/20 blur-2xl"></div>
          <div class="relative rounded-3xl border border-slate-200/80 bg-white/80 p-6 shadow-2xl backdrop-blur-sm">
            <div class="mb-4 flex items-center justify-between">
              <div class="space-y-1">
              <div class="text-sm font-semibold text-slate-900">{{ t({ en: 'Humaneti Platform', kh: 'វេទិកា ក្រុមហ៊ុន ហ៊ូម៉ាណេទី' }) }}</div>
              <div class="text-xs text-slate-500">{{ t({ en: 'Unified workflow interface', kh: 'ចំណុចប្រទាក់លំហូរការងារតែមួយ' }) }}</div>
              </div>
              <div class="flex gap-1.5">
                <div class="h-3 w-3 rounded-full bg-red-500"></div>
                <div class="h-3 w-3 rounded-full bg-yellow-500"></div>
                <div class="h-3 w-3 rounded-full bg-green-500"></div>
              </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
              <div class="grid gap-3 md:grid-cols-3">
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                  <div class="mb-2 flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-blue-500"></div>
                  <div class="text-xs font-medium text-slate-500">{{ t({ en: 'Inbox', kh: 'ប្រអប់ទទួល' }) }}</div>
                  </div>
                  <div class="text-sm font-semibold text-slate-900">{{ t({ en: 'Pending Approvals', kh: 'ការអនុម័តកំពុងរង់ចាំ' }) }}</div>
                  <div class="mt-2 space-y-2">
                    <div class="h-2 rounded-full bg-slate-200"></div>
                    <div class="h-2 w-2/3 rounded-full bg-slate-200"></div>
                  </div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                  <div class="mb-2 flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-emerald-500"></div>
                    <div class="text-xs font-medium text-slate-500">{{ t({ en: 'Status', kh: 'ស្ថានភាព' }) }}</div>
                  </div>
                  <div class="text-sm font-semibold text-slate-900">{{ t({ en: 'My Requests', kh: 'សំណើរបស់ខ្ញុំ' }) }}</div>
                  <div class="mt-2 space-y-2">
                    <div class="h-2 rounded-full bg-slate-200"></div>
                    <div class="h-2 w-1/2 rounded-full bg-slate-200"></div>
                  </div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                  <div class="mb-2 flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-violet-500"></div>
                    <div class="text-xs font-medium text-slate-500">{{ t({ en: 'History', kh: 'ប្រវត្តិ' }) }}</div>
                  </div>
                  <div class="text-sm font-semibold text-slate-900">{{ t({ en: 'Audit Trail', kh: 'ប្រវត្តិត្រួតពិនិត្យ' }) }}</div>
                  <div class="mt-2 space-y-2">
                    <div class="h-2 rounded-full bg-slate-200"></div>
                    <div class="h-2 w-3/4 rounded-full bg-slate-200"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-4 flex items-center justify-between rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2">
              <div class="flex items-center gap-2 text-xs font-semibold text-emerald-700">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Consistent UX across all modules', kh: 'បទពិសោធន៍អ្នកប្រើស្របគ្នាទូទាំងម៉ូឌុល' }) }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Module Tabs -->
    <section>
      <UiSection
        :kicker="t({ en: 'CORE MODULES', kh: 'ម៉ូឌុលស្នូល' })"
        :title="t({ en: 'Four powerful modules, one unified platform', kh: '4 ម៉ូឌុលសំខាន់ៗលើវេទិកាតែមួយ' })"
        :subtitle="t({ en: 'Core operations modules share one workflow approach, one permission model, and one audit-ready activity trail.', kh: 'ម៉ូឌុលប្រតិបត្តិការស្នូលប្រើលំនាំលំហូរការងារដូចគ្នា គំរូសិទ្ធិដូចគ្នា និងប្រវត្តិសកម្មភាពត្រៀមសវនកម្ម។' })"
      />

      <!-- Tab Navigation -->
      <div
        class="mt-12 flex flex-wrap gap-2 border-b border-slate-200"
        role="tablist"
        :aria-label="t({ en: 'Product modules', kh: 'ម៉ូឌុលផលិតផល' })"
      >
        <button
          v-for="(module, idx) in modules"
          :key="module.id"
          @click="setActiveModule(idx)"
          :id="module.id"
          :aria-selected="activeModule === idx ? 'true' : 'false'"
          :aria-controls="`product-panel-${module.id}`"
          role="tab"
          :class="[
            'flex items-center gap-2 border-b-2 px-4 py-3 text-sm font-medium transition-all',
            activeModule === idx
              ? 'border-indigo-600 text-indigo-600'
              : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300'
          ]"
        >
          <span v-html="`<svg viewBox='0 0 24 24' class='h-5 w-5'>${module.icon}</svg>`"></span>
          {{ tx(module.fullName) }}
        </button>
      </div>

      <!-- Tab Content -->
      <div class="mt-8">
        <div 
          v-for="(module, idx) in modules"
          :key="idx"
          v-show="activeModule === idx"
          :id="`product-panel-${module.id}`"
          :aria-labelledby="module.id"
          role="tabpanel"
          class="grid gap-8 lg:grid-cols-2 lg:gap-12"
        >
          <div>
            <div class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
              <span v-html="`<svg viewBox='0 0 24 24' class='h-4 w-4'>${module.icon}</svg>`"></span>
              {{ tx(module.name) }} {{ t({ en: 'Module', kh: 'ម៉ូឌុល' }) }}
            </div>
            
            <h3 class="mt-4 text-3xl font-bold text-slate-900">{{ tx(module.tagline) }}</h3>
            <p class="mt-4 text-lg leading-relaxed text-slate-600">{{ tx(module.description) }}</p>

            <div class="mt-8">
              <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-500">{{ t({ en: 'Key Benefits', kh: 'អត្ថប្រយោជន៍សំខាន់' }) }}</h4>
              <ul class="mt-4 space-y-3">
                <li 
                  v-for="benefit in module.benefits" 
                  :key="benefit"
                  class="flex items-start gap-3"
                >
                  <svg class="h-5 w-5 flex-shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-slate-700">{{ tx(benefit) }}</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="space-y-4">
            <div 
              v-for="feature in module.features" 
              :key="feature.title"
              class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:shadow-md"
            >
              <h4 class="font-semibold text-slate-900">{{ tx(feature.title) }}</h4>
              <p class="mt-1 text-sm text-slate-600">{{ tx(feature.description) }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Platform Features -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <UiSection
        :kicker="t({ en: 'PLATFORM FEATURES', kh: 'សមត្ថភាពវេទិកា' })"
        :title="t({ en: 'Built-in capabilities that power each module', kh: 'សមត្ថភាពភ្ជាប់មកជាស្រេចសម្រាប់គ្រប់ម៉ូឌុល' })"
        :subtitle="t({ en: 'Consistent controls across HR, payroll, assets, procurement, expense claims, and projects.', kh: 'ការគ្រប់គ្រងស្របគ្នាទូទាំង HR បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ចំណាយ និងគម្រោង។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div 
          v-for="feature in platformFeatures" 
          :key="feature.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm"
        >
          <div class="mb-3 text-3xl">{{ feature.icon }}</div>
          <h3 class="text-lg font-semibold text-slate-900">{{ tx(feature.title) }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ tx(feature.description) }}</p>
        </div>
      </div>
    </section>

    <!-- Integration & Extensibility -->
    <section>
      <UiSection
        :kicker="t({ en: 'INTEGRATIONS', kh: 'ការរួមបញ្ចូល' })"
        :title="t({ en: 'Integration and rollout options', kh: 'ជម្រើសរួមបញ្ចូល និងអនុវត្ត' })"
        :subtitle="t({ en: 'Choose operational integration and implementation support based on your deployment scope.', kh: 'ជ្រើសការរួមបញ្ចូលប្រតិបត្តិការ និងការគាំទ្រអនុវត្តតាមវិសាលភាពដាក់ឱ្យប្រើប្រាស់។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2">
        <div 
          v-for="integration in integrationPoints" 
          :key="integration.name"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm"
        >
          <div class="flex items-start justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-semibold text-slate-900">{{ tx(integration.name) }}</h3>
              <p class="mt-2 text-sm text-slate-600">{{ tx(integration.description) }}</p>
            </div>
            <div class="ml-4">
              <span 
                :class="[
                  'inline-flex rounded-full px-3 py-1 text-xs font-semibold',
                  integration.available === 'All Plans'
                    ? 'bg-emerald-100 text-emerald-700'
                    : 'bg-indigo-100 text-indigo-700'
                ]"
              >
                {{ tx(integration.available) }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Upgrade Path -->
    <section>
      <div class="rounded-3xl border border-indigo-200 bg-gradient-to-br from-indigo-50 to-white p-8 lg:p-12">
        <div class="grid gap-8 lg:grid-cols-2 lg:gap-12 items-center">
          <div>
            <div class="inline-flex items-center gap-2 rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
              <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'Future-Ready Platform', kh: 'វេទិកាត្រៀមសម្រាប់អនាគត' }) }}
            </div>
            <h2 class="mt-4 text-3xl font-bold text-slate-900">{{ t({ en: 'Grow beyond the basics', kh: 'ពង្រីកលើសពីមូលដ្ឋាន' }) }}</h2>
            <p class="mt-4 text-lg text-slate-700">
              {{ t({ en: 'Humaneti supports phased rollout. Start with immediate needs, then enable additional modules and controls without migrating platforms.', kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី គាំទ្រការអនុវត្តជាដំណាក់កាល។ ចាប់ផ្តើមពីតម្រូវការបន្ទាន់ បន្ទាប់មកបើកម៉ូឌុល និងការគ្រប់គ្រងបន្ថែម ដោយមិនចាំបាច់ផ្លាស់ប្តូរវេទិកា។' }) }}
            </p>
            
            <ul class="mt-6 space-y-3">
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">{{ t({ en: 'Add Expense Claim (Cash Advance, Clearance, Reimbursement)', kh: 'បន្ថែម Expense Claim (បុរេប្រទានសាច់ប្រាក់ បិទបញ្ចប់បុរេប្រទាន សំណងចំណាយ)' }) }}</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">{{ t({ en: 'Enable Projects modules (Donor/Grant, Budget, Workplan, Team)', kh: 'បើកម៉ូឌុលគម្រោង (ម្ចាស់ជំនួយ/មូលនិធិ ថវិកា ផែនការការងារ ក្រុម)' }) }}</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">{{ t({ en: 'Expand payroll configuration and bank export workflows', kh: 'ពង្រីកការកំណត់បៀវត្សរ៍ និងលំហូរនាំចេញឯកសារធនាគារ' }) }}</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">{{ t({ en: 'Centralize approvals across PR, payroll, and expense workflows', kh: 'បង្រួមការអនុម័តកណ្ដាលសម្រាប់ PR បៀវត្សរ៍ និងចំណាយ' }) }}</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">{{ t({ en: 'Apply company-scope governance with role-based permissions', kh: 'អនុវត្តអភិបាលកិច្ចតាមវិសាលភាពក្រុមហ៊ុន ជាមួយសិទ្ធិតាមតួនាទី' }) }}</span>
              </li>
            </ul>
          </div>

          <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-lg">
            <div class="text-center">
              <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-indigo-600 to-violet-600 text-white shadow-lg">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 class="mt-4 text-xl font-bold text-slate-900">{{ t({ en: 'Start Simple, Scale Smart', kh: 'ចាប់ផ្តើមសាមញ្ញ ពង្រីកឆ្លាតវៃ' }) }}</h3>
              <p class="mt-2 text-slate-600">
                {{ t({ en: 'Begin with essential workflows today, upgrade to advanced features tomorrow—all on the same platform.', kh: 'ចាប់ផ្តើមពីលំហូរការងារចាំបាច់ថ្ងៃនេះ ហើយអាប់ក្រេដទៅមុខងារកម្រិតខ្ពស់ថ្ងៃស្អែក—ទាំងអស់លើវេទិកាតែមួយ។' }) }}
              </p>
              <div class="mt-6 flex gap-3">
                <UiButton as="router-link" to="/contact" variant="primary" class="flex-1">
                  {{ t({ en: 'Plan Implementation', kh: 'រៀបចំផែនការអនុវត្ត' }) }}
                </UiButton>
                <UiButton as="router-link" to="/pricing" variant="secondary" class="flex-1">
                  {{ t({ en: 'View Pricing', kh: 'មើលតម្លៃ' }) }}
                </UiButton>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section>
      <div class="relative overflow-hidden rounded-[2rem] border border-slate-900 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-12 text-white shadow-2xl">
        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-emerald-500/20 blur-3xl"></div>
        
        <div class="relative mx-auto max-w-3xl text-center">
          <h2 class="text-3xl font-bold sm:text-4xl">
            {{ t({ en: 'Ready to see Humaneti in action?', kh: 'ត្រៀមមើល ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ដំណើរការពិតហើយឬនៅ?' }) }}
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            {{ t({ en: 'Schedule a personalized demo and discover how our platform can transform your operations.', kh: 'កំណត់ពេលដេមូតាមតម្រូវការ ហើយស្វែងយល់ថាវេទិការបស់យើងអាចផ្លាស់ប្តូរប្រតិបត្តិការរបស់អ្នកយ៉ាងដូចម្តេច។' }) }}
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              {{ t({ en: 'Book a Demo', kh: 'កក់ពេលដេមូ' }) }}
              <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </UiButton>
            <UiButton as="router-link" to="/solutions" variant="ghost" size="lg" class="!text-white hover:!bg-white/10 border border-white/20">
              {{ t({ en: 'See Use Cases', kh: 'មើលករណីប្រើប្រាស់' }) }}
            </UiButton>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
