<script setup>
import { ref, computed, watch } from 'vue'
import { useRouter } from 'vue-router'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'

const router = useRouter()
const activeFaq = ref(null)
const activeCategory = ref('all')
const { locale, t } = usePublicI18n()
const khText = {
  Resources: 'ធនធាន',
  'All Resources': 'ធនធានទាំងអស់',
  'Getting Started': 'ការចាប់ផ្តើម',
  'Module Guides': 'មគ្គុទេសក៍ម៉ូឌុល',
  'Best Practices': 'អនុវត្តល្អបំផុត',
  Technical: 'បច្ចេកទេស',
  'What is Humaneti and what does it do?': 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ជាអ្វី ហើយវាធ្វើអ្វីខ្លះ?',
  'Humaneti is a multi-tenant operations platform covering People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, and Projects. It provides workflow approvals, role permissions, and complete activity traceability.':
    'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ជាវេទិកាប្រតិបត្តិការច្រើនតេណង់ ដែលគ្របដណ្តប់បុគ្គលិក វត្តមាន ច្បាប់ បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ និងគម្រោង។ វាផ្តល់ការអនុម័តតាមលំហូរការងារ សិទ្ធិតាមតួនាទី និងការតាមដានសកម្មភាពពេញលេញ។',
  'Can we start with just one module?': 'តើយើងអាចចាប់ផ្តើមតែម៉ូឌុលមួយបានទេ?',
  "Absolutely! Our modular approach allows you to start with the module that addresses your most pressing need-whether that's Purchase Requests, Asset Management, HRM, or Payroll. You can then add additional modules as your requirements evolve, all seamlessly integrated on the same platform.":
    'បាន។ វិធីសាស្ត្រម៉ូឌុលរបស់យើងអនុញ្ញាតឱ្យអ្នកចាប់ផ្តើមពីម៉ូឌុលដែលដោះស្រាយតម្រូវការបន្ទាន់បំផុតរបស់អ្នក មិនថា Purchase Requests, Asset Management, HRM ឬ Payroll ទេ។ បន្ទាប់មកអ្នកអាចបន្ថែមម៉ូឌុលផ្សេងៗតាមការផ្លាស់ប្តូរតម្រូវការ ដោយរួមបញ្ចូលបានរលូនលើវេទិកាតែមួយ។',
  "Absolutely! Our modular approach allows you to start with the module that addresses your most pressing need—whether that's Purchase Requests, Asset Management, HRM, or Payroll. You can then add additional modules as your requirements evolve, all seamlessly integrated on the same platform.":
    'បាន។ វិធីសាស្ត្រម៉ូឌុលរបស់យើងអនុញ្ញាតឱ្យអ្នកចាប់ផ្តើមពីម៉ូឌុលដែលដោះស្រាយតម្រូវការបន្ទាន់បំផុតរបស់អ្នក មិនថា Purchase Requests, Asset Management, HRM ឬ Payroll ទេ។ បន្ទាប់មកអ្នកអាចបន្ថែមម៉ូឌុលផ្សេងៗតាមការផ្លាស់ប្តូរតម្រូវការ ដោយរួមបញ្ចូលបានរលូនលើវេទិកាតែមួយ។',
  'How long does implementation take?': 'តើការអនុវត្តត្រូវការពេលប៉ុន្មាន?',
  'Typical implementation takes 4-6 weeks from kickoff to go-live, depending on complexity and the number of modules. This includes process mapping, configuration, data migration, training, and pilot testing. We work closely with your team to ensure a smooth transition.':
    'ការអនុវត្តជាទូទៅប្រើពេល 4-6 សប្តាហ៍ ចាប់ពីចាប់ផ្តើមរហូតដល់ដាក់ឱ្យប្រើប្រាស់ អាស្រ័យលើភាពស្មុគស្មាញ និងចំនួនម៉ូឌុល។ រួមមានផែនទីដំណើរការ ការកំណត់ ផ្លាស់ប្តូរទិន្នន័យ បណ្តុះបណ្តាល និងសាកល្បងដំបូង។ យើងធ្វើការជិតស្និទ្ធជាមួយក្រុមអ្នក ដើម្បីធានាការផ្លាស់ប្តូររលូន។',
  'How does the approval workflow system work?': 'ប្រព័ន្ធលំហូរអនុម័តដំណើរការយ៉ាងដូចម្តេច?',
  'Workflow definitions are configurable by type and can apply amount thresholds, scope, and step order. Each decision is recorded with actor and timestamp, giving a full approval trail.':
    'ការកំណត់ Workflow អាចកំណត់តាមប្រភេទ ហើយអាចអនុវត្តកម្រិតចំនួនទឹកប្រាក់ វិសាលភាព និងលំដាប់ជំហាន។ សេចក្តីសម្រេចនីមួយៗត្រូវបានកត់ត្រាជាមួយអ្នកអនុវត្ត និងពេលវេលា ផ្តល់ប្រវត្តិអនុម័តពេញលេញ។',
  'Can we customize approval rules for different departments?': 'តើយើងអាចកំណត់ច្បាប់អនុម័តខុសគ្នាតាមនាយកដ្ឋានបានទេ?',
  'Yes. You can configure approval chains by workflow type and organization rules, including amount ranges and role-based approver resolution.':
    'បាន។ អ្នកអាចកំណត់ខ្សែអនុម័តតាមប្រភេទ Workflow និងច្បាប់អង្គការ រួមមានចន្លោះចំនួនទឹកប្រាក់ និងការកំណត់អ្នកអនុម័តតាមតួនាទី។',
  'Does Humaneti support payroll tax calculations?': 'តើ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី គាំទ្រការគណនាពន្ធបៀវត្សរ៍ទេ?',
  'Yes. Payroll includes tax configuration and salary component rules. You can manage allowances/deductions, salary templates, and payroll runs with controlled approvals.':
    'គាំទ្រ។ Payroll រួមមានការកំណត់ពន្ធ និងច្បាប់សមាសភាគប្រាក់ខែ។ អ្នកអាចគ្រប់គ្រងប្រាក់បន្ថែម/ការកាត់ប្រាក់ Salary Templates និង Payroll Runs ជាមួយការអនុម័តមានការគ្រប់គ្រង។',
  "What's the best way to structure approval chains?": 'តើវិធីល្អបំផុតក្នុងការរៀបចំខ្សែអនុម័តជាយ៉ាងដូចម្តេច?',
  'Best practice is to keep approval chains as simple as possible while maintaining proper controls. Typically, 2-3 approval levels are sufficient for most organizations. Focus on clear ownership, reasonable amount thresholds, and ensuring approvers have the authority to make decisions.':
    'អនុវត្តល្អបំផុតគឺរក្សាខ្សែអនុម័តឱ្យសាមញ្ញតាមដែលអាចធ្វើបាន ខណៈរក្សាការគ្រប់គ្រងត្រឹមត្រូវ។ ជាទូទៅ 2-3 កម្រិតអនុម័តគ្រប់គ្រាន់សម្រាប់អង្គការភាគច្រើន។ ផ្តោតលើភាពជាម្ចាស់ច្បាស់ កម្រិតចំនួនទឹកប្រាក់សមហេតុផល និងធានាថាអ្នកអនុម័តមានអំណាចសម្រេចចិត្ត។',
  'How should we handle data migration?': 'តើយើងគួរគ្រប់គ្រងការផ្លាស់ប្តូរទិន្នន័យយ៉ាងដូចម្តេច?',
  "Start with clean, validated data. We provide Excel templates for bulk imports and work with your team to map existing data to our system. It's often better to import only active, current data rather than years of historical records. We guide you through this process during implementation.":
    'ចាប់ផ្តើមដោយទិន្នន័យស្អាតដែលបានផ្ទៀងផ្ទាត់។ យើងផ្តល់ Template Excel សម្រាប់នាំចូលច្រើន និងធ្វើការជាមួយក្រុមអ្នកដើម្បីផ្គូផ្គងទិន្នន័យដែលមានស្រាប់ទៅប្រព័ន្ធរបស់យើង។ ជាញឹកញាប់ វាល្អជាងក្នុងការនាំចូលតែទិន្នន័យសកម្មបច្ចុប្បន្ន ជំនួសឱ្យកំណត់ត្រាប្រវត្តិច្រើនឆ្នាំ។ យើងណែនាំអ្នកតាមដំណើរការនេះក្នុងពេលអនុវត្ត។',
  'Is my data secure?': 'តើទិន្នន័យរបស់ខ្ញុំមានសុវត្ថិភាពទេ?',
  'Yes. We use enterprise-grade security including data encryption at rest and in transit, role-based access controls, regular security updates, and comprehensive audit logging. All data is backed up regularly and stored in secure, compliant data centers.':
    'បាទ/ចាស។ យើងប្រើសុវត្ថិភាពកម្រិតសហគ្រាស រួមមានការអ៊ិនគ្រីបទិន្នន័យពេលរក្សាទុក និងពេលផ្ទេរ ការគ្រប់គ្រងសិទ្ធិតាមតួនាទី ការធ្វើបច្ចុប្បន្នភាពសុវត្ថិភាពទៀងទាត់ និងកំណត់ហេតុសវនកម្មពេញលេញ។ ទិន្នន័យទាំងអស់ត្រូវបានបម្រុងទុកទៀងទាត់ និងរក្សាទុកក្នុងមជ្ឈមណ្ឌលទិន្នន័យមានសុវត្ថិភាព និងអនុលោម។',
  'Can Humaneti integrate with our existing systems?': 'តើ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី អាចរួមបញ្ចូលជាមួយប្រព័ន្ធដែលយើងមានស្រាប់ទេ?',
  'Yes, on Enterprise plans. We offer API access for custom integrations with your existing systems such as accounting software, time clocks, or other business applications. We also support standard Excel import/export on all plans for basic data exchange.':
    'បាន សម្រាប់គម្រោង Enterprise។ យើងផ្តល់ការចូលប្រើ API សម្រាប់ការរួមបញ្ចូលតាមតម្រូវការជាមួយប្រព័ន្ធដែលអ្នកមានស្រាប់ ដូចជាកម្មវិធីគណនេយ្យ ម៉ាស៊ីនចុះម៉ោង ឬកម្មវិធីអាជីវកម្មផ្សេងៗ។ យើងក៏គាំទ្រនាំចូល/នាំចេញ Excel ស្តង់ដារលើគម្រោងទាំងអស់សម្រាប់ប្តូរទិន្នន័យមូលដ្ឋាន។',
  'Do you provide mobile access?': 'តើមានការចូលប្រើតាមទូរស័ព្ទទេ?',
  'Yes. Humaneti is responsive and works in mobile browsers so employees and managers can complete daily actions from phone or desktop.':
    'មាន។ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ឆបគ្នានឹងអេក្រង់ និងដំណើរការលើ browser ទូរស័ព្ទ ដូច្នេះបុគ្គលិក និងអ្នកគ្រប់គ្រងអាចបំពេញសកម្មភាពប្រចាំថ្ងៃពីទូរស័ព្ទ ឬកុំព្យូទ័រ។',
  'Can this platform become more dynamic in the future?': 'តើវេទិកានេះអាចបត់បែនកាន់តែខ្លាំងនៅពេលអនាគតទេ?',
  'Yes. Humaneti is built on Laravel + Vue and supports phased expansion by module, workflow policy, and integration requirements without re-platforming.':
    'បាន។ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ត្រូវបានបង្កើតលើ Laravel + Vue ហើយគាំទ្រការពង្រីកជាដំណាក់កាលតាមម៉ូឌុល គោលនយោបាយ Workflow និងតម្រូវការរួមបញ្ចូល ដោយមិនចាំបាច់ប្តូរវេទិកា។',
  'Quick Start Guide': 'មគ្គុទេសក៍ចាប់ផ្តើមរហ័ស',
  'Get up and running with Humaneti in 30 minutes': 'ចាប់ផ្តើមប្រើ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី បានក្នុង 30 នាទី',
  'Admin Setup Checklist': 'បញ្ជីពិនិត្យការរៀបចំសម្រាប់ Admin',
  'Step-by-step checklist for initial system configuration': 'បញ្ជីពិនិត្យជាជំហានៗ សម្រាប់ការកំណត់ប្រព័ន្ធដំបូង',
  'HRM Module Guide': 'មគ្គុទេសក៍ម៉ូឌុល HRM',
  'Complete guide to employee management and HR workflows': 'មគ្គុទេសក៍ពេញលេញសម្រាប់ការគ្រប់គ្រងបុគ្គលិក និងលំហូរការងារ HR',
  'Payroll Processing Guide': 'មគ្គុទេសក៍ដំណើរការបៀវត្សរ៍',
  'Step-by-step payroll processing and salary management': 'ដំណើរការបៀវត្សរ៍ និងការគ្រប់គ្រងប្រាក់ខែជាជំហានៗ',
  'Asset Management Best Practices': 'អនុវត្តល្អបំផុតសម្រាប់ការគ្រប់គ្រងទ្រព្យសម្បត្តិ',
  'How to track and manage company assets effectively': 'របៀបតាមដាន និងគ្រប់គ្រងទ្រព្យសម្បត្តិក្រុមហ៊ុនឱ្យមានប្រសិទ្ធភាព',
  'Purchase Request Workflows': 'លំហូរការងារសំណើទិញ',
  'Setting up effective procurement approval processes': 'រៀបចំដំណើរការអនុម័តលទ្ធកម្មឱ្យមានប្រសិទ្ធភាព',
  'Expense Claim Guide': 'មគ្គុទេសក៍ការទាមទារចំណាយ',
  'Cash Advance, Advance Clearance, and Reimbursement workflow setup':
    'ការរៀបចំលំហូរការងារបុរេប្រទានសាច់ប្រាក់ បិទបញ្ចប់បុរេប្រទាន និងសំណងចំណាយ',
  'Projects Module Guide': 'មគ្គុទេសក៍ម៉ូឌុលគម្រោង',
  'Project Master, Donor/Grant, Budget, Workplan, and Team management':
    'ការគ្រប់គ្រង Project Master, Donor/Grant, Budget, Workplan និងក្រុមគម្រោង',
  'Building Approval Matrices': 'ការបង្កើតម៉ាទ្រីសអនុម័ត',
  'How to design effective multi-level approval hierarchies': 'របៀបរចនាលំដាប់អនុម័តច្រើនកម្រិតឱ្យមានប្រសិទ្ធភាព',
  'Asset Custody Workflows': 'លំហូរការងារកាន់កាប់ទ្រព្យសម្បត្តិ',
  'Managing assignment, transfer, and return processes': 'ការគ្រប់គ្រងដំណើរការចាត់តាំង ផ្ទេរ និងប្រគល់ត្រឡប់',
  'Payroll Approvals & Change Control': 'ការអនុម័តបៀវត្សរ៍ និងការគ្រប់គ្រងការកែប្រែ',
  'Best practices for finance teams managing payroll': 'អនុវត្តល្អបំផុតសម្រាប់ក្រុមហិរញ្ញវត្ថុដែលគ្រប់គ្រងបៀវត្សរ៍',
  'Clean Employee Data Structure': 'រចនាសម្ព័ន្ធទិន្នន័យបុគ្គលិកស្អាត',
  'Organizing HR data for accuracy and compliance': 'រៀបចំទិន្នន័យ HR ដើម្បីភាពត្រឹមត្រូវ និងអនុលោម',
  'API Integration Guide': 'មគ្គុទេសក៍រួមបញ្ចូល API',
  'Connect Humaneti with your existing systems': 'ភ្ជាប់ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ជាមួយប្រព័ន្ធដែលអ្នកមានស្រាប់',
  'Data Import Templates': 'Template នាំចូលទិន្នន័យ',
  'Excel templates for bulk data import': 'Template Excel សម្រាប់នាំចូលទិន្នន័យច្រើន',
  Article: 'អត្ថបទ',
  Documentation: 'ឯកសារបច្ចេកទេស',
  Excel: 'Excel',
  PDF: 'PDF',
  Download: 'ទាញយក',
  'min read': 'នាទីអាន',
  '10 min read': 'អាន 10 នាទី',
  '11 min read': 'អាន 11 នាទី',
  '12 min read': 'អាន 12 នាទី',
  '14 min read': 'អាន 14 នាទី',
  '15 min read': 'អាន 15 នាទី',
  '16 min read': 'អាន 16 នាទី',
  '18 min read': 'អាន 18 នាទី',
  '20 min read': 'អាន 20 នាទី',
  '22 min read': 'អាន 22 នាទី',
  '25 min read': 'អាន 25 នាទី',
  '30 min read': 'អាន 30 នាទី',
  'Platform Overview': 'ទិដ្ឋភាពទូទៅវេទិកា',
  "A quick tour of Humaneti's main features": 'ការណែនាំខ្លីអំពីមុខងារសំខាន់ៗរបស់ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី',
  'Setting Up Your First Approval Workflow': 'រៀបចំលំហូរអនុម័តដំបូងរបស់អ្នក',
  'Learn how to configure approval chains': 'រៀនរបៀបកំណត់ខ្សែសង្វាក់អនុម័ត',
  'Processing Monthly Payroll': 'ដំណើរការបៀវត្សរ៍ប្រចាំខែ',
  'Complete walkthrough of the payroll process': 'ណែនាំពេញលេញអំពីដំណើរការបៀវត្សរ៍',
  'Asset Assignment & Tracking': 'ការចាត់តាំង និងតាមដានទ្រព្យសម្បត្តិ',
  'Managing company assets from assignment to return': 'គ្រប់គ្រងទ្រព្យសម្បត្តិក្រុមហ៊ុនពីការចាត់តាំងដល់ការប្រគល់ត្រឡប់',
  'Email Support': 'ការគាំទ្រតាមអ៊ីមែល',
  'Get help via email within 24 hours': 'ទទួលជំនួយតាមអ៊ីមែលក្នុងរយៈពេល 24 ម៉ោង',
  'Live Chat': 'ជជែកផ្ទាល់',
  'Chat with our team during business hours': 'ជជែកជាមួយក្រុមយើងក្នុងម៉ោងធ្វើការ',
  'Start Chat': 'ចាប់ផ្តើមជជែក',
  'Phone Support': 'ការគាំទ្រតាមទូរស័ព្ទ',
  'Talk to a specialist (Enterprise plans)': 'ពិភាក្សាជាមួយអ្នកជំនាញ (គម្រោង Enterprise)',
  'Training Sessions': 'វគ្គបណ្តុះបណ្តាល',
  'Schedule personalized training for your team': 'កំណត់ពេលបណ្តុះបណ្តាលតាមតម្រូវការសម្រាប់ក្រុមអ្នក',
  'Book Training': 'កក់វគ្គបណ្តុះបណ្តាល',
}
const normalizeTxKey = (value) => String(value || '').replace(/[’]/g, "'").replace(/[–—]/g, '-')
const tx = (value) => {
  if (locale.value !== 'kh') return value
  const direct = khText[value]
  if (direct) return direct
  const normalized = normalizeTxKey(value)
  return khText[normalized] || value
}

const categories = [
  { id: 'all', name: 'All Resources', icon: '📚' },
  { id: 'getting-started', name: 'Getting Started', icon: '🚀' },
  { id: 'modules', name: 'Module Guides', icon: '📖' },
  { id: 'best-practices', name: 'Best Practices', icon: '⭐' },
  { id: 'technical', name: 'Technical', icon: '⚙️' }
]

const faqs = [
  {
    category: 'getting-started',
    q: 'What is Humaneti and what does it do?',
    a: 'Humaneti is a multi-tenant operations platform covering People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, and Projects. It provides workflow approvals, role permissions, and complete activity traceability.'
  },
  {
    category: 'getting-started',
    q: 'Can we start with just one module?',
    a: 'Absolutely! Our modular approach allows you to start with the module that addresses your most pressing need—whether that\'s Purchase Requests, Asset Management, HRM, or Payroll. You can then add additional modules as your requirements evolve, all seamlessly integrated on the same platform.'
  },
  {
    category: 'getting-started',
    q: 'How long does implementation take?',
    a: 'Typical implementation takes 4-6 weeks from kickoff to go-live, depending on complexity and the number of modules. This includes process mapping, configuration, data migration, training, and pilot testing. We work closely with your team to ensure a smooth transition.'
  },
  {
    category: 'modules',
    q: 'How does the approval workflow system work?',
    a: 'Workflow definitions are configurable by type and can apply amount thresholds, scope, and step order. Each decision is recorded with actor and timestamp, giving a full approval trail.'
  },
  {
    category: 'modules',
    q: 'Can we customize approval rules for different departments?',
    a: 'Yes. You can configure approval chains by workflow type and organization rules, including amount ranges and role-based approver resolution.'
  },
  {
    category: 'modules',
    q: 'Does Humaneti support payroll tax calculations?',
    a: 'Yes. Payroll includes tax configuration and salary component rules. You can manage allowances/deductions, salary templates, and payroll runs with controlled approvals.'
  },
  {
    category: 'best-practices',
    q: 'What\'s the best way to structure approval chains?',
    a: 'Best practice is to keep approval chains as simple as possible while maintaining proper controls. Typically, 2-3 approval levels are sufficient for most organizations. Focus on clear ownership, reasonable amount thresholds, and ensuring approvers have the authority to make decisions.'
  },
  {
    category: 'best-practices',
    q: 'How should we handle data migration?',
    a: 'Start with clean, validated data. We provide Excel templates for bulk imports and work with your team to map existing data to our system. It\'s often better to import only active, current data rather than years of historical records. We guide you through this process during implementation.'
  },
  {
    category: 'technical',
    q: 'Is my data secure?',
    a: 'Yes. We use enterprise-grade security including data encryption at rest and in transit, role-based access controls, regular security updates, and comprehensive audit logging. All data is backed up regularly and stored in secure, compliant data centers.'
  },
  {
    category: 'technical',
    q: 'Can Humaneti integrate with our existing systems?',
    a: 'Yes, on Enterprise plans. We offer API access for custom integrations with your existing systems such as accounting software, time clocks, or other business applications. We also support standard Excel import/export on all plans for basic data exchange.'
  },
  {
    category: 'technical',
    q: 'Do you provide mobile access?',
    a: 'Yes. Humaneti is responsive and works in mobile browsers so employees and managers can complete daily actions from phone or desktop.'
  },
  {
    category: 'technical',
    q: 'Can this platform become more dynamic in the future?',
    a: 'Yes. Humaneti is built on Laravel + Vue and supports phased expansion by module, workflow policy, and integration requirements without re-platforming.'
  }
]

const guides = [
  {
    category: 'getting-started',
    title: 'Quick Start Guide',
    description: 'Get up and running with Humaneti in 30 minutes',
    icon: '🚀',
    type: 'PDF',
    time: '10 min read'
  },
  {
    category: 'getting-started',
    title: 'Admin Setup Checklist',
    description: 'Step-by-step checklist for initial system configuration',
    icon: '✅',
    type: 'PDF',
    time: '15 min read'
  },
  {
    category: 'modules',
    title: 'HRM Module Guide',
    description: 'Complete guide to employee management and HR workflows',
    icon: '👥',
    type: 'PDF',
    time: '25 min read'
  },
  {
    category: 'modules',
    title: 'Payroll Processing Guide',
    description: 'Step-by-step payroll processing and salary management',
    icon: '💰',
    type: 'PDF',
    time: '20 min read'
  },
  {
    category: 'modules',
    title: 'Asset Management Best Practices',
    description: 'How to track and manage company assets effectively',
    icon: '📦',
    type: 'PDF',
    time: '15 min read'
  },
  {
    category: 'modules',
    title: 'Purchase Request Workflows',
    description: 'Setting up effective procurement approval processes',
    icon: '🛒',
    type: 'PDF',
    time: '18 min read'
  },
  {
    category: 'modules',
    title: 'Expense Claim Guide',
    description: 'Cash Advance, Advance Clearance, and Reimbursement workflow setup',
    icon: '💳',
    type: 'PDF',
    time: '16 min read'
  },
  {
    category: 'modules',
    title: 'Projects Module Guide',
    description: 'Project Master, Donor/Grant, Budget, Workplan, and Team management',
    icon: '🧭',
    type: 'PDF',
    time: '22 min read'
  },
  {
    category: 'best-practices',
    title: 'Building Approval Matrices',
    description: 'How to design effective multi-level approval hierarchies',
    icon: '📊',
    type: 'Article',
    time: '12 min read'
  },
  {
    category: 'best-practices',
    title: 'Asset Custody Workflows',
    description: 'Managing assignment, transfer, and return processes',
    icon: '🔄',
    type: 'Article',
    time: '10 min read'
  },
  {
    category: 'best-practices',
    title: 'Payroll Approvals & Change Control',
    description: 'Best practices for finance teams managing payroll',
    icon: '🔐',
    type: 'Article',
    time: '14 min read'
  },
  {
    category: 'best-practices',
    title: 'Clean Employee Data Structure',
    description: 'Organizing HR data for accuracy and compliance',
    icon: '📋',
    type: 'Article',
    time: '11 min read'
  },
  {
    category: 'technical',
    title: 'API Integration Guide',
    description: 'Connect Humaneti with your existing systems',
    icon: '🔌',
    type: 'Documentation',
    time: '30 min read'
  },
  {
    category: 'technical',
    title: 'Data Import Templates',
    description: 'Excel templates for bulk data import',
    icon: '📥',
    type: 'Excel',
    time: 'Download'
  }
]

const videos = [
  {
    title: 'Platform Overview',
    duration: '5:32',
    thumbnail: '🎥',
    description: 'A quick tour of Humaneti\'s main features'
  },
  {
    title: 'Setting Up Your First Approval Workflow',
    duration: '8:15',
    thumbnail: '🎬',
    description: 'Learn how to configure approval chains'
  },
  {
    title: 'Processing Monthly Payroll',
    duration: '12:40',
    thumbnail: '🎞️',
    description: 'Complete walkthrough of the payroll process'
  },
  {
    title: 'Asset Assignment & Tracking',
    duration: '6:20',
    thumbnail: '📹',
    description: 'Managing company assets from assignment to return'
  }
]

const support = [
  {
    icon: '📧',
    title: 'Email Support',
    description: 'Get help via email within 24 hours',
    action: 'support@humaneti.com',
    link: 'mailto:support@humaneti.com'
  },
  {
    icon: '💬',
    title: 'Live Chat',
    description: 'Chat with our team during business hours',
    action: 'Start Chat',
    link: '/contact'
  },
  {
    icon: '📞',
    title: 'Phone Support',
    description: 'Talk to a specialist (Enterprise plans)',
    action: '(+855) 096 59 62 864',
    link: 'tel:+8550965962864'
  },
  {
    icon: '🎓',
    title: 'Training Sessions',
    description: 'Schedule personalized training for your team',
    action: 'Book Training',
    link: '/contact'
  }
]

const toggleFaq = (faqId) => {
  activeFaq.value = activeFaq.value === faqId ? null : faqId
}

const filteredFaqs = computed(() => {
  const source = activeCategory.value === 'all'
    ? faqs
    : faqs.filter((faq) => faq.category === activeCategory.value)
  return source.map((faq, index) => ({
    ...faq,
    id: `${faq.category}-${index}`,
  }))
})

const filteredGuides = computed(() => {
  if (activeCategory.value === 'all') return guides
  return guides.filter(guide => guide.category === activeCategory.value)
})

watch(activeCategory, () => {
  activeFaq.value = null
})

const openSupportLink = (link) => {
  if (!link) return
  if (link.startsWith('/')) {
    router.push(link)
    return
  }
  window.location.href = link
}
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t({ en: 'RESOURCES & SUPPORT', kh: 'ធនធាន និងការគាំទ្រ' }) }}</UiBadge>
      
      <UiSection
        :kicker="t({ en: 'HELP CENTER', kh: 'មជ្ឈមណ្ឌលជំនួយ' })"
        :title="t({ en: 'Everything you need to succeed with Humaneti', kh: 'អ្វីៗដែលអ្នកត្រូវការដើម្បីជោគជ័យជាមួយ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី' })"
        :subtitle="t({ en: 'Guides, FAQs, and support for the exact modules running in your Humaneti environment.', kh: 'មគ្គុទេសក៍ សំណួរញឹកញាប់ និងការគាំទ្រ សម្រាប់ម៉ូឌុលដែលអ្នកកំពុងប្រើក្នុង ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។' })"
      />
    </section>

    <!-- Category Filter -->
    <section>
      <div class="flex flex-wrap gap-3">
        <button
          v-for="category in categories"
          :key="category.id"
          @click="activeCategory = category.id"
          :class="[
            'inline-flex items-center gap-2 rounded-lg px-4 py-2.5 text-sm font-medium transition-all',
            activeCategory === category.id
              ? 'bg-indigo-600 text-white shadow-lg'
              : 'bg-white text-slate-700 border border-slate-200 hover:border-slate-300 hover:shadow-md'
          ]"
        >
          <span class="text-lg">{{ category.icon }}</span>
          {{ tx(category.name) }}
        </button>
      </div>
    </section>

    <!-- Video Tutorials -->
    <section>
      <UiSection
        :kicker="t({ en: 'VIDEO TUTORIALS', kh: 'វីដេអូមគ្គុទេសក៍' })"
        :title="t({ en: 'Learn by watching', kh: 'រៀនតាមការមើល' })"
        :subtitle="t({ en: 'Quick video guides to help you master Humaneti features.', kh: 'វីដេអូមគ្គុទេសក៍ខ្លីៗ ដើម្បីជួយឱ្យអ្នកប្រើមុខងារ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី បានជំនាញ។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="video in videos" 
          :key="video.title"
          class="group cursor-pointer rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-lg"
        >
          <div class="mb-4 flex h-32 items-center justify-center rounded-xl bg-gradient-to-br from-slate-900 to-slate-700 text-5xl text-white">
            {{ video.thumbnail }}
          </div>
          <div class="flex items-center justify-between">
            <h3 class="font-semibold text-slate-900 group-hover:text-indigo-600">{{ tx(video.title) }}</h3>
            <div class="flex-shrink-0">
              <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">
                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
                {{ video.duration }}
              </span>
            </div>
          </div>
          <p class="mt-2 text-sm text-slate-600">{{ tx(video.description) }}</p>
        </div>
      </div>
    </section>

    <!-- Downloadable Guides -->
    <section>
      <UiSection
        :kicker="t({ en: 'DOCUMENTATION', kh: 'ឯកសារ' })"
        :title="t({ en: 'Guides and resources', kh: 'មគ្គុទេសក៍ និងធនធាន' })"
        :subtitle="t({ en: 'Detailed documentation to help you implement and optimize Humaneti.', kh: 'ឯកសារលម្អិត ដើម្បីជួយអនុវត្ត និងបង្កើនប្រសិទ្ធភាព ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។' })"
      />

      <div class="mt-12 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        <div 
          v-for="guide in filteredGuides" 
          :key="guide.title"
          class="group cursor-pointer rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md hover:border-indigo-200"
        >
          <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-600 to-violet-600 text-2xl text-white shadow-md">
              {{ guide.icon }}
            </div>
            <div class="min-w-0 flex-1">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-semibold text-slate-900 group-hover:text-indigo-600">{{ tx(guide.title) }}</h3>
                <span class="inline-flex flex-shrink-0 rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">
                  {{ tx(guide.type) }}
                </span>
              </div>
              <p class="mt-1 text-sm text-slate-600">{{ tx(guide.description) }}</p>
              <div class="mt-3 flex items-center gap-2 text-xs text-slate-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ guide.time }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQs -->
    <section>
      <UiSection
        :kicker="t({ en: 'FREQUENTLY ASKED QUESTIONS', kh: 'សំណួរដែលសួរញឹកញាប់' })"
        :title="t({ en: 'Common questions answered', kh: 'ចម្លើយសម្រាប់សំណួរទូទៅ' })"
        :subtitle="t({ en: 'Find quick answers to the most common questions about Humaneti.', kh: 'ស្វែងរកចម្លើយរហ័សសម្រាប់សំណួរដែលសួរញឹកញាប់អំពី ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។' })"
      />

      <div class="mt-12 mx-auto max-w-3xl">
        <div class="space-y-4">
          <div 
            v-for="faq in filteredFaqs" 
            :key="faq.id"
            class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden transition-all"
            :class="activeFaq === faq.id ? 'ring-2 ring-indigo-500/20' : ''"
          >
            <button
              @click="toggleFaq(faq.id)"
              class="w-full px-6 py-5 text-left flex items-start justify-between gap-4 hover:bg-slate-50 transition-colors"
              :id="`resources-faq-trigger-${faq.id}`"
              :aria-expanded="activeFaq === faq.id ? 'true' : 'false'"
              :aria-controls="`resources-faq-panel-${faq.id}`"
            >
              <div class="flex-1">
                <span class="font-semibold text-slate-900">{{ tx(faq.q) }}</span>
              </div>
              <svg 
                class="h-5 w-5 flex-shrink-0 text-slate-400 transition-transform"
                :class="activeFaq === faq.id ? 'rotate-180' : ''"
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <Transition
              enter-active-class="transition duration-200 ease-out"
              enter-from-class="opacity-0 -translate-y-1"
              enter-to-class="opacity-100 translate-y-0"
              leave-active-class="transition duration-150 ease-in"
              leave-from-class="opacity-100 translate-y-0"
              leave-to-class="opacity-0 -translate-y-1"
            >
              <div
                :id="`resources-faq-panel-${faq.id}`"
                role="region"
                :aria-labelledby="`resources-faq-trigger-${faq.id}`"
                v-show="activeFaq === faq.id"
                class="px-6 pb-5"
              >
                <p class="text-slate-600 leading-relaxed">{{ tx(faq.a) }}</p>
              </div>
            </Transition>
          </div>
        </div>

        <div v-if="filteredFaqs.length === 0" class="text-center py-12">
          <div class="text-4xl mb-4">🔍</div>
          <p class="text-slate-600">{{ t({ en: 'No FAQs found in this category.', kh: 'មិនមានសំណួរញឹកញាប់ក្នុងប្រភេទនេះទេ។' }) }}</p>
          <UiButton @click="activeCategory = 'all'" variant="secondary" size="sm" class="mt-4">
            {{ t({ en: 'View All FAQs', kh: 'មើលសំណួរញឹកញាប់ទាំងអស់' }) }}
          </UiButton>
        </div>
      </div>
    </section>

    <!-- Support Options -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <UiSection
        :kicker="t({ en: 'GET HELP', kh: 'ស្នើសុំជំនួយ' })"
        :title="t({ en: 'We are here to support you', kh: 'យើងនៅទីនេះដើម្បីគាំទ្រអ្នក' })"
        :subtitle="t({ en: 'Multiple ways to get assistance when you need it.', kh: 'មានវិធីជាច្រើនសម្រាប់ទទួលជំនួយនៅពេលអ្នកត្រូវការ។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="option in support" 
          :key="option.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm text-center"
        >
          <div class="text-4xl mb-3">{{ option.icon }}</div>
          <h3 class="font-semibold text-slate-900">{{ tx(option.title) }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ tx(option.description) }}</p>
          <button
            type="button"
            @click="openSupportLink(option.link)"
            class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-indigo-600 hover:text-indigo-700"
          >
            {{ tx(option.action) }}
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
    </section>

    <!-- Documentation Setup CTA -->
    <section>
      <div class="rounded-3xl border border-indigo-200 bg-gradient-to-br from-indigo-50 to-white p-8 lg:p-12">
        <div class="mx-auto max-w-3xl text-center">
          <div class="inline-flex items-center gap-2 rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            {{ t({ en: 'CUSTOM DOCUMENTATION', kh: 'ឯកសារតាមតម្រូវការ' }) }}
          </div>
          
          <h2 class="mt-6 text-3xl font-bold text-slate-900">
            {{ t({ en: 'Need custom documentation for your team?', kh: 'ត្រូវការឯកសារតាមតម្រូវការសម្រាប់ក្រុមរបស់អ្នកមែនទេ?' }) }}
          </h2>
          <p class="mt-4 text-lg text-slate-600">
            {{ t({ en: 'We can create tailored guides, training materials, and documentation specific to your workflows and processes.', kh: 'យើងអាចបង្កើតមគ្គុទេសក៍ ឯកសារបណ្តុះបណ្តាល និងឯកសារផ្សេងៗដែលសមស្របតាមលំហូរការងារ និងដំណើរការរបស់អ្នក។' }) }}
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              {{ t({ en: 'Request Custom Docs', kh: 'ស្នើសុំឯកសារតាមតម្រូវការ' }) }}
            </UiButton>
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              {{ t({ en: 'Schedule Training', kh: 'កំណត់ពេលបណ្តុះបណ្តាល' }) }}
            </UiButton>
          </div>
        </div>
      </div>
    </section>

    <!-- Still Need Help CTA -->
    <section>
      <div class="relative overflow-hidden rounded-[2rem] border border-slate-900 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-12 text-white shadow-2xl">
        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-emerald-500/20 blur-3xl"></div>
        
        <div class="relative mx-auto max-w-3xl text-center">
          <h2 class="text-3xl font-bold sm:text-4xl">
            {{ t({ en: 'Still have questions?', kh: 'នៅតែមានសំណួរទេ?' }) }}
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            {{ t({ en: 'Our team is ready to help. Get in touch and we will answer any questions you have about Humaneti.', kh: 'ក្រុមការងាររបស់យើងត្រៀមជួយ។ សូមទាក់ទងមកយើង ហើយយើងនឹងឆ្លើយសំណួរទាំងអស់អំពី ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។' }) }}
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              {{ t({ en: 'Contact Support', kh: 'ទាក់ទងក្រុមគាំទ្រ' }) }}
            </UiButton>
            <UiButton as="router-link" to="/about" variant="ghost" size="lg" class="!text-white hover:!bg-white/10 border border-white/20">
              {{ t({ en: 'Learn More About Us', kh: 'ស្វែងយល់បន្ថែមអំពីយើង' }) }}
            </UiButton>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
