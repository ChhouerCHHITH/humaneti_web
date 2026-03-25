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
    id: 'people',
    name: { en: 'People', kh: 'បុគ្គលិក' },
    fullName: { en: 'People & Organization', kh: 'បុគ្គលិក និងរចនាសម្ព័ន្ធអង្គការ' },
    icon: icons.people,
    tagline: { en: 'Foundational workforce records', kh: 'កំណត់ត្រាបុគ្គលិកជាគ្រឹះ' },
    description: {
      en: 'Centralize employee records, departments, designations, recruitment, contracts, and onboarding or offboarding workflows in one operational system.',
      kh: 'កណ្ដាលកំណត់ត្រាបុគ្គលិក នាយកដ្ឋាន តួនាទី ការជ្រើសរើស កិច្ចសន្យា និងលំហូរ onboarding ឬ offboarding ក្នុងប្រព័ន្ធតែមួយ។',
    },
    availableIn: { en: 'Starter and above', kh: 'Starter និងខ្ពស់ជាង' },
    features: [
      { title: { en: 'Employee Profiles', kh: 'ប្រវត្តិបុគ្គលិក' }, description: { en: 'One source of truth for employee data, documents, and lifecycle history.', kh: 'ប្រភពទិន្នន័យតែមួយសម្រាប់ព័ត៌មាន ឯកសារ និងប្រវត្តិបុគ្គលិក។' } },
      { title: { en: 'Departments & Designations', kh: 'នាយកដ្ឋាន និងតួនាទី' }, description: { en: 'Maintain department structure and position mapping for approvals and reporting.', kh: 'គ្រប់គ្រងរចនាសម្ព័ន្ធនាយកដ្ឋាន និងការភ្ជាប់តួនាទី សម្រាប់អនុម័ត និងរបាយការណ៍។' } },
      { title: { en: 'Recruitment', kh: 'ការជ្រើសរើសបុគ្គលិក' }, description: { en: 'Track openings, candidates, and recruitment progression in the same HR workspace.', kh: 'តាមដានតំណែងទំនេរ បេក្ខជន និងវឌ្ឍនភាពជ្រើសរើស ក្នុងកន្លែងធ្វើការ HR ដូចគ្នា។' } },
      { title: { en: 'Contracts & Documents', kh: 'កិច្ចសន្យា និងឯកសារ' }, description: { en: 'Store contracts and supporting files with cleaner employee context.', kh: 'រក្សាទុកកិច្ចសន្យា និងឯកសារគាំទ្រ ជាមួយបរិបទបុគ្គលិកច្បាស់លាស់។' } },
      { title: { en: 'Onboarding & Offboarding', kh: 'Onboarding និង Offboarding' }, description: { en: 'Use checklist-based controls when employees join or leave the organization.', kh: 'ប្រើការគ្រប់គ្រងតាម checklist នៅពេលបុគ្គលិកចូល ឬចាកចេញពីអង្គការ។' } },
      { title: { en: 'Company Structure', kh: 'រចនាសម្ព័ន្ធក្រុមហ៊ុន' }, description: { en: 'Keep reporting lines and organization context aligned across modules.', kh: 'រក្សាខ្សែរបាយការណ៍ និងបរិបទរចនាសម្ព័ន្ធអង្គការ ឱ្យស្របគ្នាទូទាំងម៉ូឌុល។' } },
    ],
    benefits: [
      { en: 'Reduce duplicate HR records', kh: 'កាត់បន្ថយកំណត់ត្រា HR ស្ទួន' },
      { en: 'Improve role and reporting clarity', kh: 'បង្កើនភាពច្បាស់នៃតួនាទី និងខ្សែរបាយការណ៍' },
      { en: 'Keep employee history auditable', kh: 'រក្សាប្រវត្តិបុគ្គលិកឱ្យអាចត្រួតពិនិត្យបាន' },
      { en: 'Support cleaner onboarding handoffs', kh: 'គាំទ្រការផ្ទេរការងារ onboarding ឱ្យស្អាតជាងមុន' },
    ],
  },
  {
    id: 'attendance',
    name: { en: 'Attendance', kh: 'វត្តមាន' },
    fullName: { en: 'Attendance & Shift Controls', kh: 'វត្តមាន និងការគ្រប់គ្រងវេន' },
    icon: icons.workflow,
    tagline: { en: 'Daily time visibility', kh: 'ភាពមើលឃើញលើពេលវេលាប្រចាំថ្ងៃ' },
    description: {
      en: 'Manage attendance capture, shifts, holidays, overtime context, and attendance reporting with company-scoped visibility.',
      kh: 'គ្រប់គ្រងការកត់វត្តមាន វេនធ្វើការ ថ្ងៃឈប់សម្រាក បរិបទ OT និងរបាយការណ៍វត្តមាន ជាមួយភាពមើលឃើញតាមវិសាលភាពក្រុមហ៊ុន។',
    },
    availableIn: { en: 'Starter and above', kh: 'Starter និងខ្ពស់ជាង' },
    features: [
      { title: { en: 'My Attendance', kh: 'វត្តមានរបស់ខ្ញុំ' }, description: { en: 'Employees can review their own attendance and workday history.', kh: 'បុគ្គលិកអាចពិនិត្យវត្តមាន និងប្រវត្តិថ្ងៃធ្វើការរបស់ខ្លួនបាន។' } },
      { title: { en: 'Attendance Management', kh: 'ការគ្រប់គ្រងវត្តមាន' }, description: { en: 'Managers and HR teams can review attendance with company controls.', kh: 'អ្នកគ្រប់គ្រង និងក្រុម HR អាចពិនិត្យវត្តមានបាន ជាមួយការគ្រប់គ្រងតាមក្រុមហ៊ុន។' } },
      { title: { en: 'Shift Setup', kh: 'ការកំណត់វេន' }, description: { en: 'Define shift patterns that align with payroll and workforce operations.', kh: 'កំណត់លំនាំវេនឱ្យស្របតាមបៀវត្សរ៍ និងប្រតិបត្តិការកម្លាំងការងារ។' } },
      { title: { en: 'Holiday Calendar', kh: 'ប្រតិទិនថ្ងៃឈប់សម្រាក' }, description: { en: 'Maintain holiday rules centrally for more consistent attendance handling.', kh: 'រក្សាគោលការណ៍ថ្ងៃឈប់សម្រាកនៅកណ្ដាល ដើម្បីគ្រប់គ្រងវត្តមានឱ្យស្របគ្នា។' } },
      { title: { en: 'Attendance Reporting', kh: 'របាយការណ៍វត្តមាន' }, description: { en: 'Use reporting to review punctuality, presence, and operational coverage.', kh: 'ប្រើរបាយការណ៍ដើម្បីពិនិត្យពេលវេលា វត្តមាន និងការគ្របដណ្ដប់ប្រតិបត្តិការ។' } },
      { title: { en: 'Manager Review', kh: 'ការពិនិត្យរបស់អ្នកគ្រប់គ្រង' }, description: { en: 'Support manager follow-up before records flow into later processes.', kh: 'គាំទ្រការតាមដានរបស់អ្នកគ្រប់គ្រង មុនពេលទិន្នន័យឆ្លងទៅដំណើរការបន្ទាប់។' } },
    ],
    benefits: [
      { en: 'Reduce manual attendance consolidation', kh: 'កាត់បន្ថយការបូកសរុបវត្តមានដោយដៃ' },
      { en: 'Connect shift context to payroll readiness', kh: 'ភ្ជាប់បរិបទវេនទៅនឹងភាពត្រៀមសម្រាប់បៀវត្សរ៍' },
      { en: 'Improve daily team visibility', kh: 'បង្កើនភាពមើលឃើញលើក្រុមការងារប្រចាំថ្ងៃ' },
      { en: 'Support cleaner exception handling', kh: 'គាំទ្រការដោះស្រាយករណីលើកលែងឱ្យស្អាតជាងមុន' },
    ],
  },
  {
    id: 'leave',
    name: { en: 'Leave', kh: 'ការឈប់សម្រាក' },
    fullName: { en: 'Leave Management', kh: 'ការគ្រប់គ្រងការឈប់សម្រាក' },
    icon: icons.shield,
    tagline: { en: 'Policy-based leave approvals', kh: 'អនុម័តការឈប់សម្រាកតាមគោលនយោបាយ' },
    description: {
      en: 'Manage leave types, balances, employee requests, approval routing, and entitlement visibility with stronger policy control.',
      kh: 'គ្រប់គ្រងប្រភេទច្បាប់ សមតុល្យ សំណើបុគ្គលិក លំហូរអនុម័ត និងភាពមើលឃើញសិទ្ធិច្បាប់ ជាមួយការគ្រប់គ្រងតាមគោលនយោបាយកាន់តែរឹងមាំ។',
    },
    availableIn: { en: 'Starter and above', kh: 'Starter និងខ្ពស់ជាង' },
    features: [
      { title: { en: 'Leave Requests', kh: 'សំណើឈប់សម្រាក' }, description: { en: 'Employees can request leave from the same operational workspace.', kh: 'បុគ្គលិកអាចស្នើឈប់សម្រាកពីកន្លែងធ្វើការប្រតិបត្តិការដូចគ្នា។' } },
      { title: { en: 'Leave Balances', kh: 'សមតុល្យការឈប់សម្រាក' }, description: { en: 'Monitor current leave balances and employee entitlement visibility.', kh: 'តាមដានសមតុល្យច្បាប់បច្ចុប្បន្ន និងភាពមើលឃើញសិទ្ធិបុគ្គលិក។' } },
      { title: { en: 'Leave Types', kh: 'ប្រភេទការឈប់សម្រាក' }, description: { en: 'Configure policy-aligned leave categories and rules.', kh: 'កំណត់ប្រភេទច្បាប់ និងច្បាប់ស្របតាមគោលនយោបាយ។' } },
      { title: { en: 'Approvals', kh: 'ការអនុម័ត' }, description: { en: 'Route requests through appropriate managers with visible decision history.', kh: 'បញ្ជូនសំណើទៅអ្នកគ្រប់គ្រងត្រឹមត្រូវ ជាមួយប្រវត្តិសម្រេចចិត្តដែលអាចមើលឃើញបាន។' } },
      { title: { en: 'Policy Controls', kh: 'ការគ្រប់គ្រងគោលនយោបាយ' }, description: { en: 'Keep leave administration aligned with internal leave rules.', kh: 'រក្សាការគ្រប់គ្រងច្បាប់ឱ្យស្របតាមគោលនយោបាយខាងក្នុង។' } },
      { title: { en: 'History & Reporting', kh: 'ប្រវត្តិ និងរបាយការណ៍' }, description: { en: 'Review leave history with clearer traceability for teams and managers.', kh: 'ពិនិត្យប្រវត្តិច្បាប់ជាមួយភាពអាចតាមដានបានកាន់តែច្បាស់ សម្រាប់ក្រុម និងអ្នកគ្រប់គ្រង។' } },
    ],
    benefits: [
      { en: 'Standardize leave request handling', kh: 'ធ្វើស្តង់ដារការដោះស្រាយសំណើច្បាប់' },
      { en: 'Improve entitlement transparency', kh: 'បង្កើនភាពថ្លៃថ្នូរនៃសិទ្ធិច្បាប់' },
      { en: 'Reduce approval ambiguity', kh: 'កាត់បន្ថយភាពមិនច្បាស់នៃការអនុម័ត' },
      { en: 'Keep leave history accessible', kh: 'រក្សាប្រវត្តិច្បាប់ឱ្យអាចចូលប្រើបាន' },
    ],
  },
  {
    id: 'payroll',
    name: { en: 'Payroll', kh: 'បៀវត្សរ៍' },
    fullName: { en: 'Payroll & Employee Salaries', kh: 'បៀវត្សរ៍ និងប្រាក់ខែបុគ្គលិក' },
    icon: icons.money,
    tagline: { en: 'Controlled payroll execution', kh: 'ដំណើរការបៀវត្សរ៍មានការគ្រប់គ្រង' },
    description: {
      en: 'Run payroll with salary grades, salary templates, employee salary structures, tax configuration, exchange rates, payment methods, loans, payroll runs, and payslips.',
      kh: 'ដំណើរការបៀវត្សរ៍ជាមួយថ្នាក់ប្រាក់ខែ គំរូប្រាក់ខែ រចនាសម្ព័ន្ធប្រាក់ខែបុគ្គលិក ការកំណត់ពន្ធ អត្រាប្តូរប្រាក់ វិធីបង់ប្រាក់ កម្ចី វដ្ដបៀវត្សរ៍ និងសន្លឹកបៀវត្សរ៍។',
    },
    availableIn: { en: 'Business and above', kh: 'Business និងខ្ពស់ជាង' },
    features: [
      { title: { en: 'Salary Grades & Templates', kh: 'ថ្នាក់ និងគំរូប្រាក់ខែ' }, description: { en: 'Standardize pay structures before they flow to employee salary records.', kh: 'ធ្វើស្តង់ដាររចនាសម្ព័ន្ធប្រាក់ខែ មុនឆ្លងទៅកំណត់ត្រាប្រាក់ខែបុគ្គលិក។' } },
      { title: { en: 'Employee Salary Structures', kh: 'រចនាសម្ព័ន្ធប្រាក់ខែបុគ្គលិក' }, description: { en: 'Manage effective-dated employee salary setups with approval routing.', kh: 'គ្រប់គ្រងការរៀបចំបៀវត្សរ៍បុគ្គលិកតាមកាលបរិច្ឆេទមានប្រសិទ្ធិភាព ជាមួយលំហូរអនុម័ត។' } },
      { title: { en: 'Payroll Runs & Payslips', kh: 'វដ្ដបៀវត្សរ៍ និងសន្លឹកបៀវត្សរ៍' }, description: { en: 'Create draft runs, process employees, and generate auditable payslips.', kh: 'បង្កើតវដ្ដ draft ដំណើរការបុគ្គលិក និងបង្កើតសន្លឹកបៀវត្សរ៍ដែលអាចត្រួតពិនិត្យបាន។' } },
      { title: { en: 'Tax & Exchange Rates', kh: 'ពន្ធ និងអត្រាប្តូរប្រាក់' }, description: { en: 'Use configurable tax rules and rate sources for payroll calculations.', kh: 'ប្រើច្បាប់ពន្ធ និងប្រភពអត្រាប្តូរប្រាក់ដែលអាចកំណត់បាន សម្រាប់ការគណនាបៀវត្សរ៍។' } },
      { title: { en: 'Loans & Deductions', kh: 'កម្ចី និងការកាត់ប្រាក់' }, description: { en: 'Handle employee loans and payroll deductions with cleaner traceability.', kh: 'គ្រប់គ្រងកម្ចីបុគ្គលិក និងការកាត់ប្រាក់បៀវត្សរ៍ ជាមួយភាពអាចតាមដានបានកាន់តែស្អាត។' } },
      { title: { en: 'Bank Export & Reports', kh: 'នាំចេញទៅធនាគារ និងរបាយការណ៍' }, description: { en: 'Support payment files and payroll reporting for finance review.', kh: 'គាំទ្រឯកសារបង់ប្រាក់ និងរបាយការណ៍បៀវត្សរ៍ សម្រាប់ការពិនិត្យរបស់ហិរញ្ញវត្ថុ។' } },
    ],
    benefits: [
      { en: 'Standardize payroll change controls', kh: 'ធ្វើស្តង់ដារការគ្រប់គ្រងការកែប្រែបៀវត្សរ៍' },
      { en: 'Improve salary component consistency', kh: 'បង្កើនភាពស្របគ្នានៃសមាសភាគប្រាក់ខែ' },
      { en: 'Support finance approval checkpoints', kh: 'គាំទ្រចំណុចពិនិត្យអនុម័តរបស់ហិរញ្ញវត្ថុ' },
      { en: 'Maintain full payroll traceability', kh: 'រក្សាភាពអាចតាមដានបៀវត្សរ៍ពេញលេញ' },
    ],
  },
  {
    id: 'expense-claim',
    name: { en: 'Expense Claim', kh: 'ការទាមទារចំណាយ' },
    fullName: { en: 'Expense Claims & Cash Advances', kh: 'ការទាមទារចំណាយ និងបុរេប្រទានសាច់ប្រាក់' },
    icon: icons.audit,
    tagline: { en: 'Controlled employee spending workflows', kh: 'លំហូរការងារចំណាយបុគ្គលិកមានការគ្រប់គ្រង' },
    description: {
      en: 'Handle cash advances, advance clearances, and reimbursements with workflow approvals, supporting evidence, and settlement visibility.',
      kh: 'គ្រប់គ្រងបុរេប្រទានសាច់ប្រាក់ ការបិទបញ្ចប់បុរេប្រទាន និងសំណងចំណាយ ជាមួយការអនុម័តតាមលំហូរការងារ ភស្តុតាងគាំទ្រ និងភាពមើលឃើញការទូទាត់។',
    },
    availableIn: { en: 'Professional and above', kh: 'Professional និងខ្ពស់ជាង' },
    features: [
      { title: { en: 'Cash Advances', kh: 'បុរេប្រទានសាច់ប្រាក់' }, description: { en: 'Submit and track advance requests with approval visibility.', kh: 'ដាក់ស្នើ និងតាមដានសំណើបុរេប្រទាន ជាមួយភាពមើលឃើញការអនុម័ត។' } },
      { title: { en: 'Advance Clearances', kh: 'ការបិទបញ្ចប់បុរេប្រទាន' }, description: { en: 'Close advances with supporting records and controlled settlement steps.', kh: 'បិទបញ្ចប់បុរេប្រទាន ជាមួយកំណត់ត្រាគាំទ្រ និងជំហានទូទាត់ដែលមានការគ្រប់គ្រង។' } },
      { title: { en: 'Reimbursements', kh: 'សំណងចំណាយ' }, description: { en: 'Handle reimbursement workflows with clearer evidence and approval history.', kh: 'គ្រប់គ្រងលំហូរសំណងចំណាយ ជាមួយភស្តុតាង និងប្រវត្តិអនុម័តកាន់តែច្បាស់។' } },
      { title: { en: 'Settlement Tracking', kh: 'ការតាមដានការទូទាត់' }, description: { en: 'Keep visibility over outstanding balances and cleared transactions.', kh: 'រក្សាភាពមើលឃើញលើសមតុល្យដែលនៅសល់ និងប្រតិបត្តិការដែលបានទូទាត់រួច។' } },
      { title: { en: 'Approval Routing', kh: 'លំហូរអនុម័ត' }, description: { en: 'Route spending decisions through the right reviewers.', kh: 'បញ្ជូនសេចក្តីសម្រេចអំពីចំណាយទៅអ្នកពិនិត្យត្រឹមត្រូវ។' } },
      { title: { en: 'Supporting Documents', kh: 'ឯកសារគាំទ្រ' }, description: { en: 'Attach bills and supporting evidence to improve review quality.', kh: 'ភ្ជាប់វិក្កយបត្រ និងភស្តុតាងគាំទ្រ ដើម្បីបង្កើនគុណភាពការពិនិត្យ។' } },
    ],
    benefits: [
      { en: 'Reduce uncontrolled employee spending', kh: 'កាត់បន្ថយការចំណាយបុគ្គលិកដែលគ្មានការគ្រប់គ្រង' },
      { en: 'Improve settlement visibility', kh: 'បង្កើនភាពមើលឃើញលើការទូទាត់' },
      { en: 'Keep supporting evidence linked', kh: 'រក្សាភស្តុតាងគាំទ្រឱ្យភ្ជាប់ជាប់' },
      { en: 'Support cleaner finance review', kh: 'គាំទ្រការពិនិត្យរបស់ហិរញ្ញវត្ថុឱ្យស្អាតជាងមុន' },
    ],
  },
  {
    id: 'purchase-requests',
    name: { en: 'Purchase Request', kh: 'សំណើទិញ' },
    fullName: { en: 'Purchase Requests & Procurement', kh: 'សំណើទិញ និងលទ្ធកម្ម' },
    icon: icons.cart,
    tagline: { en: 'End-to-end procurement controls', kh: 'ការគ្រប់គ្រងលទ្ធកម្មគ្រប់ដំណាក់កាល' },
    description: {
      en: 'Control procurement through dashboards, request queues, budget accounts, budget allocations, quotes, vendors, purchase orders, goods received, workflows, and audit logs.',
      kh: 'គ្រប់គ្រងលទ្ធកម្មតាម dashboard ជួរសំណើ គណនីថវិកា ការបែងចែកថវិកា សម្រង់ អ្នកផ្គត់ផ្គង់ ពាក្យបញ្ជាទិញ ការទទួលទំនិញ workflow និងកំណត់ហេតុសវនកម្ម។',
    },
    availableIn: { en: 'Professional and above', kh: 'Professional និងខ្ពស់ជាង' },
    features: [
      { title: { en: 'Dashboard & Request Queues', kh: 'Dashboard និងជួរសំណើ' }, description: { en: 'Monitor my requests, drafts, pending approvals, and all requests in one view.', kh: 'តាមដានសំណើរបស់ខ្ញុំ draft ការអនុម័តកំពុងរង់ចាំ និងសំណើទាំងអស់ ក្នុងទិដ្ឋភាពតែមួយ។' } },
      { title: { en: 'Budget Accounts & Allocations', kh: 'គណនី និងការបែងចែកថវិកា' }, description: { en: 'Link procurement actions to budget ownership and allocation controls.', kh: 'ភ្ជាប់សកម្មភាពលទ្ធកម្មទៅម្ចាស់ថវិកា និងការគ្រប់គ្រងការបែងចែក។' } },
      { title: { en: 'Quotes, Tenders & Vendors', kh: 'សម្រង់ ការប្រកួតតម្លៃ និងអ្នកផ្គត់ផ្គង់' }, description: { en: 'Manage vendor evidence and quotation flows around each request.', kh: 'គ្រប់គ្រងភស្តុតាងអ្នកផ្គត់ផ្គង់ និងលំហូរសម្រង់ជុំវិញសំណើនីមួយៗ។' } },
      { title: { en: 'Purchase Orders', kh: 'ពាក្យបញ្ជាទិញ' }, description: { en: 'Convert approved requests into purchase orders with cleaner control.', kh: 'បម្លែងសំណើដែលបានអនុម័តទៅជាពាក្យបញ្ជាទិញ ជាមួយការគ្រប់គ្រងកាន់តែស្អាត។' } },
      { title: { en: 'Goods Received', kh: 'ការទទួលទំនិញ' }, description: { en: 'Record received goods and connect them back to procurement history.', kh: 'កត់ត្រាការទទួលទំនិញ និងភ្ជាប់វាត្រឡប់ទៅប្រវត្តិលទ្ធកម្ម។' } },
      { title: { en: 'Workflow & Audit Logs', kh: 'Workflow និងកំណត់ហេតុសវនកម្ម' }, description: { en: 'Keep approval routing and decision history visible for procurement review.', kh: 'រក្សាលំហូរអនុម័ត និងប្រវត្តិសម្រេចចិត្ត ឱ្យអាចមើលឃើញសម្រាប់ការពិនិត្យលទ្ធកម្ម។' } },
    ],
    benefits: [
      { en: 'Reduce off-process purchasing', kh: 'កាត់បន្ថយការទិញក្រៅដំណើរការ' },
      { en: 'Improve budget discipline', kh: 'បង្កើនវិន័យថវិកា' },
      { en: 'Keep vendor evidence attached', kh: 'រក្សាភស្តុតាងអ្នកផ្គត់ផ្គង់ឱ្យភ្ជាប់ជាប់' },
      { en: 'Maintain procurement auditability', kh: 'រក្សាភាពអាចត្រួតពិនិត្យបាននៃលទ្ធកម្ម' },
    ],
  },
  {
    id: 'assets',
    name: { en: 'Assets', kh: 'ទ្រព្យសម្បត្តិ' },
    fullName: { en: 'Assets & Categories', kh: 'ទ្រព្យសម្បត្តិ និងប្រភេទ' },
    icon: icons.box,
    tagline: { en: 'Controlled asset accountability', kh: 'ការទទួលខុសត្រូវលើទ្រព្យសម្បត្តិមានការគ្រប់គ្រង' },
    description: {
      en: 'Register asset categories and assets, track assignment, returns, custody history, and branch-aware lifecycle context.',
      kh: 'ចុះបញ្ជីប្រភេទទ្រព្យសម្បត្តិ និងទ្រព្យសម្បត្តិ តាមដានការចាត់តាំង ការបង្វិលត្រឡប់ ប្រវត្តិកាន់កាប់ និងបរិបទវដ្ដជីវិតតាមសាខា។',
    },
    availableIn: { en: 'Enterprise', kh: 'Enterprise' },
    features: [
      { title: { en: 'Asset Register', kh: 'បញ្ជីទ្រព្យសម្បត្តិ' }, description: { en: 'Maintain inventory details in a structured asset register.', kh: 'រក្សាព័ត៌មានសារពើភណ្ឌនៅក្នុងបញ្ជីទ្រព្យសម្បត្តិដែលមានរចនាសម្ព័ន្ធ។' } },
      { title: { en: 'Category Policies', kh: 'គោលនយោបាយប្រភេទ' }, description: { en: 'Use category rules to standardize asset registration requirements.', kh: 'ប្រើច្បាប់ប្រភេទ ដើម្បីធ្វើស្តង់ដារតម្រូវការចុះបញ្ជីទ្រព្យសម្បត្តិ។' } },
      { title: { en: 'Assignment & Return', kh: 'ការចាត់តាំង និងការប្រគល់ត្រឡប់' }, description: { en: 'Track who holds each asset and when it is returned.', kh: 'តាមដានថានរណាកាន់កាប់ទ្រព្យសម្បត្តិនីមួយៗ និងពេលណាប្រគល់ត្រឡប់។' } },
      { title: { en: 'Custody History', kh: 'ប្រវត្តិកាន់កាប់' }, description: { en: 'Keep traceable transfer and custody history per item.', kh: 'រក្សាប្រវត្តិផ្ទេរ និងកាន់កាប់ដែលអាចតាមដានបាន សម្រាប់ទ្រព្យសម្បត្តិនីមួយៗ។' } },
      { title: { en: 'QR, Photos & Documents', kh: 'QR រូបថត និងឯកសារ' }, description: { en: 'Attach photos, codes, and supporting files to assets.', kh: 'ភ្ជាប់រូបថត កូដ និងឯកសារគាំទ្រ ទៅទ្រព្យសម្បត្តិ។' } },
      { title: { en: 'Branch-aware Tracking', kh: 'ការតាមដានតាមសាខា' }, description: { en: 'Keep visibility across sites and responsible teams.', kh: 'រក្សាភាពមើលឃើញឆ្លងកាត់ទីតាំង និងក្រុមទទួលខុសត្រូវ។' } },
    ],
    benefits: [
      { en: 'Improve asset accountability', kh: 'បង្កើនការទទួលខុសត្រូវលើទ្រព្យសម្បត្តិ' },
      { en: 'Reduce assignment disputes', kh: 'កាត់បន្ថយជម្លោះការចាត់តាំង' },
      { en: 'Support operational audits', kh: 'គាំទ្រសវនកម្មប្រតិបត្តិការ' },
      { en: 'Keep lifecycle status visible', kh: 'រក្សាភាពមើលឃើញស្ថានភាពវដ្ដជីវិត' },
    ],
  },
  {
    id: 'projects',
    name: { en: 'Projects', kh: 'គម្រោង' },
    fullName: { en: 'Projects & Grant Operations', kh: 'គម្រោង និងប្រតិបត្តិការមូលនិធិ' },
    icon: icons.workflow,
    tagline: { en: 'NGO and donor project structure', kh: 'រចនាសម្ព័ន្ធគម្រោង NGO និងម្ចាស់ជំនួយ' },
    description: {
      en: 'Support donor-driven operations with project master data, grants, budgets, workplans, activities, partners, beneficiaries, and compliance views.',
      kh: 'គាំទ្រប្រតិបត្តិការដែលដឹកនាំដោយម្ចាស់ជំនួយ ជាមួយទិន្នន័យស្នូលគម្រោង មូលនិធិ ថវិកា ផែនការការងារ សកម្មភាព ដៃគូ អ្នកទទួលផល និងទិដ្ឋភាពអនុលោម។',
    },
    availableIn: { en: 'Enterprise', kh: 'Enterprise' },
    features: [
      { title: { en: 'Project Master Data', kh: 'ទិន្នន័យស្នូលគម្រោង' }, description: { en: 'Keep project identities and structures organized in one place.', kh: 'រក្សាអត្តសញ្ញាណ និងរចនាសម្ព័ន្ធគម្រោងឱ្យមានរបៀបរៀបរយ ក្នុងកន្លែងតែមួយ។' } },
      { title: { en: 'Donor & Grant Management', kh: 'ម្ចាស់ជំនួយ និងការគ្រប់គ្រងមូលនិធិ' }, description: { en: 'Track funding structures that support NGO reporting.', kh: 'តាមដានរចនាសម្ព័ន្ធមូលនិធិ ដែលគាំទ្ររបាយការណ៍ NGO។' } },
      { title: { en: 'Budget & Workplans', kh: 'ថវិកា និងផែនការការងារ' }, description: { en: 'Link budgets and workplans to project execution controls.', kh: 'ភ្ជាប់ថវិកា និងផែនការការងារ ទៅការគ្រប់គ្រងការអនុវត្តគម្រោង។' } },
      { title: { en: 'Activities & M&E', kh: 'សកម្មភាព និង M&E' }, description: { en: 'Manage activity planning and monitoring views for programs.', kh: 'គ្រប់គ្រងការរៀបចំសកម្មភាព និងទិដ្ឋភាពតាមដាន សម្រាប់កម្មវិធី។' } },
      { title: { en: 'Partners & Beneficiaries', kh: 'ដៃគូ និងអ្នកទទួលផល' }, description: { en: 'Keep relationship and beneficiary context connected to projects.', kh: 'រក្សាបរិបទដៃគូ និងអ្នកទទួលផល ឱ្យភ្ជាប់ជាមួយគម្រោង។' } },
      { title: { en: 'Audit & Compliance Views', kh: 'ទិដ្ឋភាពសវនកម្ម និងអនុលោម' }, description: { en: 'Support traceability for donor-facing reviews.', kh: 'គាំទ្រភាពអាចតាមដានបាន សម្រាប់ការពិនិត្យដែលប្រឈមមុខម្ចាស់ជំនួយ។' } },
    ],
    benefits: [
      { en: 'Support structured grant operations', kh: 'គាំទ្រប្រតិបត្តិការមូលនិធិដែលមានរចនាសម្ព័ន្ធ' },
      { en: 'Connect projects to budgets and teams', kh: 'ភ្ជាប់គម្រោងទៅថវិកា និងក្រុមការងារ' },
      { en: 'Improve NGO reporting readiness', kh: 'បង្កើនភាពត្រៀមសម្រាប់របាយការណ៍ NGO' },
      { en: 'Keep donor context visible', kh: 'រក្សាភាពមើលឃើញលើបរិបទម្ចាស់ជំនួយ' },
    ],
  },
  {
    id: 'announcements',
    name: { en: 'Announcements', kh: 'សេចក្តីប្រកាស' },
    fullName: { en: 'Announcements & Internal Notices', kh: 'សេចក្តីប្រកាស និងសារជូនដំណឹងខាងក្នុង' },
    icon: icons.audit,
    tagline: { en: 'Company-wide communication with acknowledgment', kh: 'ការទំនាក់ទំនងទូទាំងក្រុមហ៊ុនជាមួយការទទួលស្គាល់' },
    description: {
      en: 'Publish internal announcements with scoped visibility, acknowledgment tracking, and cleaner policy communication across teams.',
      kh: 'ផ្សាយសេចក្តីប្រកាសខាងក្នុង ជាមួយភាពមើលឃើញតាមវិសាលភាព ការតាមដានការទទួលស្គាល់ និងការទំនាក់ទំនងគោលនយោបាយឱ្យស្អាតជាងមុន ទូទាំងក្រុម។',
    },
    availableIn: { en: 'Enterprise', kh: 'Enterprise' },
    features: [
      { title: { en: 'Internal Broadcasts', kh: 'ការជូនដំណឹងខាងក្នុងទូទាំងអង្គការ' }, description: { en: 'Share notices across targeted groups inside the company.', kh: 'ចែករំលែកសារជូនដំណឹងទៅក្រុមគោលដៅខាងក្នុងក្រុមហ៊ុន។' } },
      { title: { en: 'Audience Scope', kh: 'វិសាលភាពទស្សនិកជន' }, description: { en: 'Control which users or groups can view each announcement.', kh: 'គ្រប់គ្រងថា អ្នកប្រើ ឬក្រុមណាអាចមើលសេចក្តីប្រកាសនីមួយៗបាន។' } },
      { title: { en: 'Acknowledgments', kh: 'ការទទួលស្គាល់' }, description: { en: 'Track who has seen or acknowledged key notices.', kh: 'តាមដានថានរណាបានមើល ឬទទួលស្គាល់សារសំខាន់ៗ។' } },
      { title: { en: 'Notice History', kh: 'ប្រវត្តិសារជូនដំណឹង' }, description: { en: 'Keep a reviewable history of published internal communication.', kh: 'រក្សាប្រវត្តិដែលអាចពិនិត្យឡើងវិញបាន នៃការទំនាក់ទំនងខាងក្នុងដែលបានផ្សាយ។' } },
      { title: { en: 'Policy Communication', kh: 'ការទំនាក់ទំនងគោលនយោបាយ' }, description: { en: 'Use announcements for policy and company-wide operational messaging.', kh: 'ប្រើសេចក្តីប្រកាស សម្រាប់សារគោលនយោបាយ និងសារប្រតិបត្តិការទូទាំងក្រុមហ៊ុន។' } },
      { title: { en: 'Audit Visibility', kh: 'ភាពមើលឃើញសម្រាប់សវនកម្ម' }, description: { en: 'Support traceability for critical internal notices.', kh: 'គាំទ្រភាពអាចតាមដានបាន សម្រាប់សារជូនដំណឹងខាងក្នុងសំខាន់ៗ។' } },
    ],
    benefits: [
      { en: 'Improve internal communication control', kh: 'បង្កើនការគ្រប់គ្រងលើការទំនាក់ទំនងខាងក្នុង' },
      { en: 'Track acknowledgment of important notices', kh: 'តាមដានការទទួលស្គាល់សារសំខាន់ៗ' },
      { en: 'Keep policy communication traceable', kh: 'រក្សាការទំនាក់ទំនងគោលនយោបាយឱ្យអាចតាមដានបាន' },
      { en: 'Support organization-wide alignment', kh: 'គាំទ្រការសម្របសម្រួលទូទាំងអង្គការ' },
    ],
  },
]

const platformFeatures = [
  {
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />',
    color: 'indigo',
    title: 'Unified Workflows',
    description: 'Same UX patterns across all modules for consistency and ease of use',
  },
  {
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />',
    color: 'emerald',
    title: 'Role-Based Access',
    description: 'Granular permissions ensuring users see only what they need',
  },
  {
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />',
    color: 'violet',
    title: 'Real-Time Reports',
    description: 'Instant insights into operations with customizable dashboards',
  },
  {
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />',
    color: 'slate',
    title: 'Mobile Access',
    description: 'Full functionality on any device, anywhere, anytime',
  },
  {
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />',
    color: 'amber',
    title: 'Operational Notifications',
    description: 'In-app and email alerts for workflow actions and status updates',
  },
  {
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />',
    color: 'rose',
    title: 'Scoped Data Access',
    description: 'Company-scope and role-based controls across operational modules',
  },
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
            {{ t({ en: 'Humaneti is modular by design. The live SaaS catalog currently spans People, Attendance, Leave, Payroll, Expense Claims, Purchase Requests, Assets, Projects, and Announcements, with plan availability expanding from Starter to Enterprise.', kh: 'Humaneti ត្រូវបានរចនាជាម៉ូឌុល។ កាតាឡុក SaaS បច្ចុប្បន្នរួមមាន បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ការទាមទារចំណាយ សំណើទិញ ទ្រព្យសម្បត្តិ គម្រោង និងសេចក្តីប្រកាស ដោយការប្រើប្រាស់ពង្រីកពី Starter ទៅ Enterprise។' }) }}
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
        :title="t({ en: 'Operational modules available today', kh: 'ម៉ូឌុលប្រតិបត្តិការដែលមាននៅថ្ងៃនេះ' })"
        :subtitle="t({ en: 'These public product modules now match the Humaneti SaaS subscription catalog. Availability differs by plan, but the workflow model stays consistent across the platform.', kh: 'ម៉ូឌុលផលិតផលសាធារណៈទាំងនេះឥឡូវត្រូវនឹងកាតាឡុក Subscription របស់ Humaneti SaaS។ ការប្រើប្រាស់ខុសគ្នាតាមគម្រោង ប៉ុន្តែគំរូ workflow នៅតែស្របគ្នាទូទាំងវេទិកា។' })"
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
          {{ t(module.fullName) }}
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
              {{ t(module.name) }} {{ t({ en: 'Module', kh: 'ម៉ូឌុល' }) }}
            </div>
            
            <h3 class="mt-4 text-3xl font-bold text-slate-900">{{ t(module.tagline) }}</h3>
            <p class="mt-4 text-lg leading-relaxed text-slate-600">{{ t(module.description) }}</p>

            <div class="mt-4 inline-flex items-center rounded-full border border-indigo-200 bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
              {{ t({ en: 'Available in', kh: 'មានក្នុង' }) }}: {{ t(module.availableIn) }}
            </div>

            <div class="mt-8">
              <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-500">{{ t({ en: 'Key Benefits', kh: 'អត្ថប្រយោជន៍សំខាន់' }) }}</h4>
              <ul class="mt-4 space-y-3">
                <li 
                  v-for="benefit in module.benefits" 
                  :key="benefit.en"
                  class="flex items-start gap-3"
                >
                  <svg class="h-5 w-5 flex-shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-slate-700">{{ t(benefit) }}</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="space-y-4">
            <div 
              v-for="feature in module.features" 
              :key="feature.title.en"
              class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:shadow-md"
            >
              <h4 class="font-semibold text-slate-900">{{ t(feature.title) }}</h4>
              <p class="mt-1 text-sm text-slate-600">{{ t(feature.description) }}</p>
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
        :subtitle="t({ en: 'Consistent controls across people, attendance, leave, payroll, procurement, expense claims, assets, projects, and internal announcements.', kh: 'ការគ្រប់គ្រងស្របគ្នាទូទាំងបុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ លទ្ធកម្ម ចំណាយ ទ្រព្យសម្បត្តិ គម្រោង និងសេចក្តីប្រកាសខាងក្នុង។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div
          v-for="feature in platformFeatures"
          :key="feature.title"
          class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md hover:-translate-y-0.5"
        >
          <div
            class="mb-4 inline-flex rounded-xl p-2.5 shadow-sm"
            :class="{
              'bg-indigo-100 text-indigo-700': feature.color === 'indigo',
              'bg-emerald-100 text-emerald-700': feature.color === 'emerald',
              'bg-violet-100 text-violet-700': feature.color === 'violet',
              'bg-slate-100 text-slate-700': feature.color === 'slate',
              'bg-amber-100 text-amber-700': feature.color === 'amber',
              'bg-rose-100 text-rose-700': feature.color === 'rose',
            }"
          >
            <span v-html="`<svg viewBox='0 0 24 24' class='h-5 w-5' fill='none' stroke='currentColor'>${feature.icon}</svg>`"></span>
          </div>
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
