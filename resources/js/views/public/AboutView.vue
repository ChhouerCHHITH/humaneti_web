<script setup>
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { icons } from '@/components/icons'
import { usePublicI18n } from '@/composables/usePublicI18n'

const { locale, t } = usePublicI18n()
const khText = {
  About: 'អំពី',
  'Clarity First': 'ភាពច្បាស់លាស់មុនគេ',
  'Controlled Access': 'ការគ្រប់គ្រងសិទ្ធិ',
  'Full Traceability': 'ការតាមដានពេញលេញ',
  'Every request has a clear status, designated owner, and defined next step. No ambiguity, no confusion.':
    'សំណើរាល់មុខមានស្ថានភាពច្បាស់ ម្ចាស់ទទួលខុសត្រូវច្បាស់ និងជំហានបន្ទាប់ច្បាស់។ គ្មានភាពស្រពិចស្រពិល គ្មានភាពច្របូកច្របល់។',
  'Permissions and approvals align perfectly with organizational responsibility and authority.':
    'សិទ្ធិ និងការអនុម័ត ស្របគ្នាជាមួយទំនួលខុសត្រូវ និងអំណាចរបស់អង្គការ។',
  'All actions are recorded with timestamps and user attribution to support governance and audits.':
    'សកម្មភាពទាំងអស់ត្រូវបានកត់ត្រាជាមួយពេលវេលា និងអ្នកអនុវត្ត ដើម្បីគាំទ្រអភិបាលកិច្ច និងសវនកម្ម។',
  'Simple by Design': 'សាមញ្ញតាមការរចនា',
  "Complex doesn't mean better. We build intuitive workflows that teams actually want to use.":
    'ភាពស្មុគស្មាញមិនមានន័យថាល្អជាងទេ។ យើងបង្កើតលំហូរការងារដែលងាយយល់ និងក្រុមការងារចង់ប្រើប្រាស់ពិតប្រាកដ។',
  'Modular & Flexible': 'ម៉ូឌុល និងបត់បែន',
  'Start with what you need today. Add modules as you grow. No forced bundles or unnecessary features.':
    'ចាប់ផ្តើមពីអ្វីដែលអ្នកត្រូវការថ្ងៃនេះ។ បន្ថែមម៉ូឌុលពេលអង្គការរីកចម្រើន។ គ្មានការបង្ខំបញ្ចូលកញ្ចប់ ឬមុខងារមិនចាំបាច់។',
  'Built for Trust': 'បង្កើតឡើងសម្រាប់ការជឿទុកចិត្ត',
  'Transparent approvals and complete audit trails create accountability and confidence.':
    'ការអនុម័តតម្លាភាព និងប្រវត្តិសវនកម្មពេញលេញ បង្កើតការទទួលខុសត្រូវ និងទំនុកចិត្ត។',
  'Local First': 'ផ្តោតទីផ្សារក្នុងតំបន់មុនគេ',
  'Designed for Southeast Asian businesses with understanding of local regulations and practices.':
    'រចនាឡើងសម្រាប់អាជីវកម្មអាស៊ីអាគ្នេយ៍ ដោយយល់ដឹងពីបទប្បញ្ញត្តិ និងអនុវត្តក្នុងតំបន់។',
  'The Beginning': 'ការចាប់ផ្តើម',
  'Founded with a mission to simplify operational workflows for growing businesses in Cambodia.':
    'បានបង្កើតឡើងដោយបេសកកម្មធ្វើឱ្យលំហូរការងារប្រតិបត្តិការរបស់អាជីវកម្មកំពុងរីកចម្រើននៅកម្ពុជា កាន់តែសាមញ្ញ។',
  'First Customers': 'អតិថិជនដំបូង',
  'Launched with SMEs and NGOs, learning from real-world feedback and refining our approach.':
    'ចាប់ផ្តើមជាមួយ SME និង NGO ដោយរៀនពីមតិយោបល់ជាក់ស្តែង និងកែលម្អវិធីសាស្ត្ររបស់យើងជាបន្តបន្ទាប់។',
  'Expanding Impact': 'ពង្រីកឥទ្ធិពល',
  'Growing our platform with advanced features while maintaining simplicity and clarity.':
    'ពង្រីកវេទិការបស់យើងជាមួយមុខងារកម្រិតខ្ពស់ ខណៈរក្សាភាពសាមញ្ញ និងច្បាស់លាស់។',
  Future: 'អនាគត',
  'Your Story': 'រឿងរ៉ាវរបស់អ្នក',
  'Join us in building the future of workflow management for businesses across the region.':
    'ចូលរួមជាមួយយើងក្នុងការកសាងអនាគតនៃការគ្រប់គ្រងលំហូរការងារ សម្រាប់អាជីវកម្មទូទាំងតំបន់។',
  'Core Domains': 'ដែនប្រតិបត្តិការស្នូល',
  'People + Payroll + Operations': 'បុគ្គលិក + បៀវត្សរ៍ + ប្រតិបត្តិការ',
  'Workflow Model': 'គំរូលំហូរការងារ',
  'Dynamic approvals': 'ការអនុម័តបត់បែន',
  'Access Model': 'គំរូសិទ្ធិចូលប្រើ',
  'Role + Company scope': 'តួនាទី + វិសាលភាពក្រុមហ៊ុន',
  'Implementation Focus': 'គោលដៅអនុវត្ត',
  'SME & NGO': 'SME និង NGO',
}
const normalizeTxKey = (value) => String(value || '').replace(/[’]/g, "'").replace(/[–—]/g, '-')
const tx = (value) => {
  if (locale.value !== 'kh') return value
  const direct = khText[value]
  if (direct) return direct
  const normalized = normalizeTxKey(value)
  return khText[normalized] || value
}

const values = [
  {
    icon: icons.workflow,
    title: 'Clarity First',
    description: 'Every request has a clear status, designated owner, and defined next step. No ambiguity, no confusion.',
    color: 'indigo'
  },
  {
    icon: icons.shield,
    title: 'Controlled Access',
    description: 'Permissions and approvals align perfectly with organizational responsibility and authority.',
    color: 'emerald'
  },
  {
    icon: icons.audit,
    title: 'Full Traceability',
    description: 'All actions are recorded with timestamps and user attribution to support governance and audits.',
    color: 'violet'
  }
]

const principles = [
  {
    title: 'Simple by Design',
    description: 'Complex doesn\'t mean better. We build intuitive workflows that teams actually want to use.',
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />',
    color: 'amber',
  },
  {
    title: 'Modular & Flexible',
    description: 'Start with what you need today. Add modules as you grow. No forced bundles or unnecessary features.',
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />',
    color: 'indigo',
  },
  {
    title: 'Built for Trust',
    description: 'Transparent approvals and complete audit trails create accountability and confidence.',
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
    color: 'emerald',
  },
  {
    title: 'Local First',
    description: 'Designed for Southeast Asian businesses with understanding of local regulations and practices.',
    icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
    color: 'violet',
  },
]

const timeline = [
  {
    year: '2023',
    title: 'The Beginning',
    description: 'Founded with a mission to simplify operational workflows for growing businesses in Cambodia.'
  },
  {
    year: '2024',
    title: 'First Customers',
    description: 'Launched with SMEs and NGOs, learning from real-world feedback and refining our approach.'
  },
  {
    year: '2025',
    title: 'Expanding Impact',
    description: 'Growing our platform with advanced features while maintaining simplicity and clarity.'
  },
  {
    year: 'Future',
    title: 'Your Story',
    description: 'Join us in building the future of workflow management for businesses across the region.'
  }
]

const identityCards = [
  {
    title: {
      en: 'A workflow-first operations platform',
      kh: 'វេទិកាប្រតិបត្តិការផ្អែកលើលំហូរការងារ',
    },
    description: {
      en: 'Humaneti brings people operations, payroll, procurement, expense claims, assets, projects, and announcements into one operating model instead of disconnected tools.',
      kh: 'Humaneti រួមបញ្ចូលប្រតិបត្តិការបុគ្គលិក បៀវត្សរ៍ លទ្ធកម្ម ការស្នើសុំសងថ្លៃចំណាយ ទ្រព្យសម្បត្តិ គម្រោង និងសេចក្តីប្រកាស ទៅក្នុងគំរូប្រតិបត្តិការតែមួយ ជំនួសឱ្យឧបករណ៍ដែលបែកចេញពីគ្នា។',
    },
    accent: 'indigo',
  },
  {
    title: {
      en: 'A governance layer for approvals and access',
      kh: 'ស្រទាប់អភិបាលកិច្ចសម្រាប់ការអនុម័ត និងសិទ្ធិចូលប្រើ',
    },
    description: {
      en: 'Requests follow role permissions, company scope, approval rules, and audit history so teams can work with stronger control and accountability.',
      kh: 'សំណើត្រូវបានដំណើរការតាមសិទ្ធិតួនាទី វិសាលភាពក្រុមហ៊ុន ច្បាប់អនុម័ត និងប្រវត្តិត្រួតពិនិត្យ ដើម្បីឱ្យក្រុមការងារធ្វើការជាមួយការគ្រប់គ្រង និងការទទួលខុសត្រូវកាន់តែរឹងមាំ។',
    },
    accent: 'emerald',
  },
  {
    title: {
      en: 'A modular SaaS that scales in phases',
      kh: 'សេវា SaaS ជាម៉ូឌុល ដែលអាចពង្រីកជាដំណាក់កាល',
    },
    description: {
      en: 'Organizations can start with a priority area like payroll or purchase requests, then add more modules later without changing platform patterns.',
      kh: 'អង្គការអាចចាប់ផ្តើមពីផ្នែកអាទិភាពដូចជា បៀវត្សរ៍ ឬ សំណើទិញ ហើយបន្ថែមម៉ូឌុលផ្សេងទៀតពេលក្រោយ ដោយមិនចាំបាច់ប្តូរគំរូវេទិកា។',
    },
    accent: 'violet',
  },
  {
    title: {
      en: 'An implementation partner for real operations',
      kh: 'ដៃគូអនុវត្តសម្រាប់ប្រតិបត្តិការពិត',
    },
    description: {
      en: 'We do not stop at software delivery. Humaneti also helps shape workflows, roles, onboarding, migration, and rollout practices that teams can sustain.',
      kh: 'យើងមិនបញ្ឈប់ត្រឹមការផ្តល់កម្មវិធីទេ។ Humaneti ក៏ជួយរៀបចំលំហូរការងារ តួនាទី onboarding ការផ្លាស់ប្តូរទិន្នន័យ និងការដាក់ឱ្យប្រើប្រាស់ ដែលក្រុមការងារអាចរក្សាបានក្នុងរយៈពេលវែង។',
    },
    accent: 'amber',
  },
]

const fitCards = [
  {
    title: {
      en: 'SMEs building stronger internal control',
      kh: 'SME ដែលកំពុងបង្កើតការគ្រប់គ្រងផ្ទៃក្នុងឱ្យរឹងមាំ',
    },
    description: {
      en: 'For growing companies that want structured approvals, clearer ownership, and less dependence on manual follow-up.',
      kh: 'សម្រាប់ក្រុមហ៊ុនកំពុងរីកចម្រើន ដែលចង់បានការអនុម័តមានរចនាសម្ព័ន្ធ ភាពជាម្ចាស់ការងារច្បាស់ និងកាត់បន្ថយការតាមដានដោយដៃ។',
    },
    tags: [
      { en: 'People and payroll control', kh: 'ការគ្រប់គ្រងបុគ្គលិក និងបៀវត្សរ៍' },
      { en: 'Faster approvals', kh: 'ការអនុម័តលឿនជាងមុន' },
      { en: 'Cleaner records', kh: 'កំណត់ត្រាស្អាតជាងមុន' },
    ],
  },
  {
    title: {
      en: 'NGOs with compliance and donor visibility needs',
      kh: 'អង្គការដែលត្រូវការអនុលោម និងភាពអាចមើលឃើញសម្រាប់ម្ចាស់ជំនួយ',
    },
    description: {
      en: 'For organizations that need traceable approvals, project-linked operations, and stronger audit readiness across teams.',
      kh: 'សម្រាប់អង្គការដែលត្រូវការការអនុម័តអាចតាមដានបាន ប្រតិបត្តិការភ្ជាប់គម្រោង និងភាពត្រៀមសម្រាប់សវនកម្មកាន់តែរឹងមាំទូទាំងក្រុម។',
    },
    tags: [
      { en: 'Project-linked workflows', kh: 'លំហូរការងារភ្ជាប់គម្រោង' },
      { en: 'Audit-ready history', kh: 'ប្រវត្តិត្រៀមសវនកម្ម' },
      { en: 'Governance support', kh: 'ការគាំទ្រអភិបាលកិច្ច' },
    ],
  },
  {
    title: {
      en: 'Multi-branch or multi-department teams',
      kh: 'ក្រុមការងារច្រើនសាខា ឬ ច្រើនផ្នែក',
    },
    description: {
      en: 'For organizations that need one consistent system while preserving delegated authority by company, branch, and role.',
      kh: 'សម្រាប់អង្គការដែលត្រូវការប្រព័ន្ធតែមួយស្របគ្នា ខណៈរក្សាសិទ្ធិប្រគល់អំណាចតាមក្រុមហ៊ុន សាខា និងតួនាទី។',
    },
    tags: [
      { en: 'Company-scope controls', kh: 'ការគ្រប់គ្រងតាមវិសាលភាពក្រុមហ៊ុន' },
      { en: 'Role-based access', kh: 'សិទ្ធិតាមតួនាទី' },
      { en: 'Repeatable processes', kh: 'ដំណើរការដែលអាចធ្វើឡើងវិញបាន' },
    ],
  },
]

const stats = [
  {
    label: { en: 'Platform Type', kh: 'ប្រភេទវេទិកា' },
    value: { en: 'Workflow-first SaaS', kh: 'SaaS ផ្អែកលើលំហូរការងារ' },
  },
  {
    label: { en: 'Core Domains', kh: 'ដែនប្រតិបត្តិការស្នូល' },
    value: { en: 'People + Payroll + Operations', kh: 'បុគ្គលិក + បៀវត្សរ៍ + ប្រតិបត្តិការ' },
  },
  {
    label: { en: 'Control Model', kh: 'គំរូគ្រប់គ្រង' },
    value: { en: 'Roles + approvals + audit trail', kh: 'តួនាទី + អនុម័ត + ប្រវត្តិត្រួតពិនិត្យ' },
  },
  {
    label: { en: 'Best Fit', kh: 'សមស្របសម្រាប់' },
    value: { en: 'SMEs, NGOs, multi-branch teams', kh: 'SME, អង្គការ និងក្រុមច្រើនសាខា' },
  },
]
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t({ en: 'ABOUT HUMANETI', kh: 'អំពី ក្រុមហ៊ុន ហ៊ូម៉ាណេទី' }) }}</UiBadge>
      
      <div class="grid gap-12 lg:grid-cols-2 lg:gap-16 items-center">
        <div>
          <h1 class="text-4xl font-bold leading-tight tracking-tight text-slate-900 sm:text-5xl">
            {{ t({ en: 'We exist to make operational workflows', kh: 'យើងមានដើម្បីធ្វើឱ្យលំហូរការងារប្រតិបត្តិការ' }) }}
            <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent"> {{ t({ en: 'simple, consistent, and traceable', kh: 'សាមញ្ញ ស្របស្តង់ដារ និងអាចតាមដានបាន' }) }}</span>
          </h1>
          
          <p class="mt-6 text-lg leading-relaxed text-slate-600">
            {{ t({ en: 'Humaneti is a workflow-first SaaS platform for organizations that need stronger control across people, payroll, procurement, expense, assets, projects, and internal communication. It replaces scattered spreadsheets, chat approvals, and disconnected records with one structured operating model.', kh: 'Humaneti គឺជាវេទិកា SaaS ផ្អែកលើលំហូរការងារ សម្រាប់អង្គការដែលត្រូវការការគ្រប់គ្រងកាន់តែរឹងមាំលើបុគ្គលិក បៀវត្សរ៍ លទ្ធកម្ម ចំណាយ ទ្រព្យសម្បត្តិ គម្រោង និងការទំនាក់ទំនងផ្ទៃក្នុង។ វាជំនួស spreadsheet បែកចេញ ការអនុម័តតាម chat និងកំណត់ត្រាមិនភ្ជាប់គ្នា ដោយគំរូប្រតិបត្តិការមានរចនាសម្ព័ន្ធតែមួយ។' }) }}
          </p>

          <p class="mt-4 text-base leading-relaxed text-slate-600">
            {{ t({ en: 'Teams use Humaneti to run People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, Projects, and Announcements with clear ownership, role-based access, and traceable approval history.', kh: 'ក្រុមការងារប្រើ Humaneti ដើម្បីដំណើរការ បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការស្នើសុំសងថ្លៃចំណាយ គម្រោង និងសេចក្តីប្រកាស ជាមួយភាពជាម្ចាស់ការងារច្បាស់ សិទ្ធិតាមតួនាទី និងប្រវត្តិអនុម័តអាចតាមដានបាន។' }) }}
          </p>

          <div class="mt-8 flex flex-wrap gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              {{ t({ en: 'Start Your Journey', kh: 'ចាប់ផ្តើមដំណើររបស់អ្នក' }) }}
            </UiButton>
            <UiButton as="router-link" to="/product" variant="secondary" size="lg">
              {{ t({ en: 'See the Platform', kh: 'មើលវេទិកា' }) }}
            </UiButton>
          </div>
        </div>

        <div class="relative">
          <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-indigo-500/20 via-violet-500/20 to-emerald-500/20 blur-2xl"></div>
          <div class="relative rounded-3xl border border-slate-200 bg-white/80 p-8 shadow-2xl backdrop-blur-sm">
            <div class="grid gap-4 sm:grid-cols-2">
              <div 
                v-for="stat in stats" 
                :key="stat.label.en"
                class="rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center"
              >
                <div class="text-3xl font-bold text-slate-900">{{ t(stat.value) }}</div>
                <div class="mt-1 text-sm text-slate-600">{{ t(stat.label) }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Mission Statement -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <div class="mx-auto max-w-3xl text-center">
        <div class="inline-flex items-center gap-2 rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
          <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          {{ t({ en: 'OUR MISSION', kh: 'បេសកកម្មរបស់យើង' }) }}
        </div>
        <h2 class="mt-6 text-3xl font-bold text-slate-900 sm:text-4xl">
          {{ t({ en: 'Empowering businesses with workflows that work', kh: 'ជួយអាជីវកម្មឱ្យរីកចម្រើនដោយលំហូរការងារដែលដំណើរការពិត' }) }}
        </h2>
        <p class="mt-4 text-lg leading-relaxed text-slate-600">
          {{ t({ en: 'We believe strong operations do not require unnecessary complexity. With clear workflows, proper approvals, role-based access, and complete traceability, teams can execute reliably at scale. That is why we built Humaneti—to make professional-grade workflow management accessible to every business.', kh: 'យើងជឿថាប្រតិបត្តិការរឹងមាំ មិនចាំបាច់ស្មុគស្មាញលើសចាំបាច់។ ដោយមានលំហូរការងារច្បាស់ ការអនុម័តត្រឹមត្រូវ សិទ្ធិតាមតួនាទី និងការតាមដានពេញលេញ ក្រុមការងារអាចអនុវត្តបានគួរឱ្យទុកចិត្តក្នុងកម្រិតធំ។ នេះជាមូលហេតុដែលយើងបង្កើត ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។' }) }}
        </p>
      </div>
    </section>

    <!-- What Humaneti Is -->
    <section>
      <UiSection
        :kicker="t({ en: 'WHAT HUMANETI IS', kh: 'HUMANETI ជាអ្វី' })"
        :title="t({ en: 'More than software screens', kh: 'លើសពីអេក្រង់កម្មវិធីធម្មតា' })"
        :subtitle="t({ en: 'Humaneti is designed as an operating system for structured work, not a collection of isolated forms.', kh: 'Humaneti ត្រូវបានរចនាឡើងជាប្រព័ន្ធប្រតិបត្តិការសម្រាប់ការងារមានរចនាសម្ព័ន្ធ មិនមែនជាការប្រមូលផ្តុំទម្រង់ឯកត្តាឡើយ។' })"
      />

      <div class="mt-12 grid gap-6 lg:grid-cols-2">
        <div
          v-for="card in identityCards"
          :key="card.title.en"
          class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-lg"
        >
          <div
            class="absolute -right-10 -top-10 h-28 w-28 rounded-full blur-3xl transition-transform group-hover:scale-110"
            :class="{
              'bg-indigo-500/10': card.accent === 'indigo',
              'bg-emerald-500/10': card.accent === 'emerald',
              'bg-violet-500/10': card.accent === 'violet',
              'bg-amber-500/10': card.accent === 'amber',
            }"
          ></div>
          <div class="relative">
            <h3 class="text-xl font-bold text-slate-900">{{ t(card.title) }}</h3>
            <p class="mt-3 leading-relaxed text-slate-600">{{ t(card.description) }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Who It Fits -->
    <section>
      <UiSection
        :kicker="t({ en: 'WHO IT FITS', kh: 'សមស្របសម្រាប់អ្នកណា' })"
        :title="t({ en: 'Built for teams that need structure without heavy complexity', kh: 'បង្កើតសម្រាប់ក្រុមការងារដែលត្រូវការរចនាសម្ព័ន្ធ ដោយមិនមានភាពស្មុគស្មាញលើសចាំបាច់' })"
        :subtitle="t({ en: 'Humaneti works best where approvals, controls, and repeatable operations matter every day.', kh: 'Humaneti សមស្របបំផុតសម្រាប់កន្លែងដែលការអនុម័ត ការគ្រប់គ្រង និងប្រតិបត្តិការដែលអាចធ្វើឡើងវិញបាន មានសារៈសំខាន់រាល់ថ្ងៃ។' })"
      />

      <div class="mt-12 grid gap-6 lg:grid-cols-3">
        <div
          v-for="card in fitCards"
          :key="card.title.en"
          class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-7 shadow-sm"
        >
          <h3 class="text-xl font-bold text-slate-900">{{ t(card.title) }}</h3>
          <p class="mt-3 leading-relaxed text-slate-600">{{ t(card.description) }}</p>
          <div class="mt-5 flex flex-wrap gap-2">
            <span
              v-for="tag in card.tags"
              :key="tag.en"
              class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700"
            >
              {{ t(tag) }}
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- Core Values -->
    <section>
      <UiSection
        :kicker="t({ en: 'WHAT WE STAND FOR', kh: 'អ្វីដែលយើងជឿជាក់' })"
        :title="t({ en: 'Our core values drive everything we build', kh: 'តម្លៃស្នូលរបស់យើងជាកម្លាំងជំរុញអ្វីៗដែលយើងបង្កើត' })"
        :subtitle="t({ en: 'These principles guide our product decisions and shape our company culture.', kh: 'គោលការណ៍ទាំងនេះដឹកនាំការសម្រេចចិត្តផលិតផល និងវប្បធម៌ក្រុមហ៊ុនរបស់យើង។' })"
      />

      <div class="mt-12 grid gap-8 lg:grid-cols-3">
        <div 
          v-for="value in values" 
          :key="value.title"
          class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all hover:shadow-xl"
        >
          <div 
            class="absolute -right-12 -top-12 h-32 w-32 rounded-full blur-3xl transition-transform group-hover:scale-125"
            :class="{
              'bg-indigo-500/10': value.color === 'indigo',
              'bg-emerald-500/10': value.color === 'emerald',
              'bg-violet-500/10': value.color === 'violet'
            }"
          ></div>
          
          <div class="relative">
            <div 
              class="mb-4 inline-flex rounded-xl p-3 text-white shadow-lg"
              :class="{
                'bg-gradient-to-br from-indigo-600 to-indigo-700': value.color === 'indigo',
                'bg-gradient-to-br from-emerald-600 to-emerald-700': value.color === 'emerald',
                'bg-gradient-to-br from-violet-600 to-violet-700': value.color === 'violet'
              }"
            >
              <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${value.icon}</svg>`"></span>
            </div>

            <h3 class="text-xl font-bold text-slate-900">{{ tx(value.title) }}</h3>
            <p class="mt-3 leading-relaxed text-slate-600">{{ tx(value.description) }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Principles -->
    <section>
      <UiSection
        :kicker="t({ en: 'HOW WE WORK', kh: 'របៀបដែលយើងធ្វើការ' })"
        :title="t({ en: 'Principles that guide our approach', kh: 'គោលការណ៍ដែលណែនាំវិធីសាស្ត្ររបស់យើង' })"
        :subtitle="t({ en: 'Simple promises we make to every customer.', kh: 'ការសន្យាសាមញ្ញដែលយើងផ្តល់ជូនអតិថិជនគ្រប់រូប។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2">
        <div 
          v-for="principle in principles" 
          :key="principle.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="flex items-start gap-4">
            <div
              class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl shadow-sm"
              :class="{
                'bg-amber-100 text-amber-700': principle.color === 'amber',
                'bg-indigo-100 text-indigo-700': principle.color === 'indigo',
                'bg-emerald-100 text-emerald-700': principle.color === 'emerald',
                'bg-violet-100 text-violet-700': principle.color === 'violet',
              }"
            >
              <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6' fill='none' stroke='currentColor'>${principle.icon}</svg>`"></span>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-slate-900">{{ tx(principle.title) }}</h3>
              <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ tx(principle.description) }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Timeline -->
    <section>
      <UiSection
        :kicker="t({ en: 'OUR JOURNEY', kh: 'ដំណើររបស់យើង' })"
        :title="t({ en: 'Building the future, one milestone at a time', kh: 'កសាងអនាគត មួយជំហានម្តងៗ' })"
        :subtitle="t({ en: 'From a vision to a platform trusted by growing businesses.', kh: 'ពីចក្ខុវិស័យ ទៅជាវេទិកាដែលទទួលការជឿទុកចិត្តដោយអាជីវកម្មកំពុងរីកចម្រើន។' })"
      />

      <div class="mt-12 relative">
        <!-- Timeline line -->
        <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-slate-200 hidden lg:block"></div>

        <div class="space-y-8">
          <div 
            v-for="(item, idx) in timeline" 
            :key="idx"
            class="relative rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md lg:ml-20"
          >
            <!-- Timeline dot -->
            <div class="absolute -left-[4.5rem] top-8 hidden lg:flex h-4 w-4 items-center justify-center rounded-full border-4 border-white bg-indigo-600 ring-4 ring-slate-100"></div>
            
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0">
                <div class="inline-flex rounded-lg bg-indigo-100 px-3 py-1 text-sm font-bold text-indigo-700">
                  {{ item.year }}
                </div>
              </div>
              <div class="min-w-0 flex-1">
                <h3 class="text-lg font-semibold text-slate-900">{{ tx(item.title) }}</h3>
                <p class="mt-1 text-slate-600">{{ tx(item.description) }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Security & Governance -->
    <section>
      <div class="rounded-3xl border border-indigo-200 bg-gradient-to-br from-indigo-50 to-white p-8 lg:p-12">
        <div class="flex items-start gap-4">
          <div class="flex-shrink-0">
            <div class="inline-flex rounded-xl bg-indigo-600 p-3 text-white shadow-lg">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
          </div>
          <div class="flex-1">
            <h2 class="text-2xl font-bold text-slate-900">
              {{ t({ en: 'Security & Governance Statement', kh: 'សេចក្តីថ្លែងការណ៍សុវត្ថិភាព និងអភិបាលកិច្ច' }) }}
            </h2>
            <p class="mt-3 leading-relaxed text-slate-700">
              {{
                t({
                  en: 'Humaneti is architected from the ground up to support operational governance through structured approvals and comprehensive activity tracking. Our platform includes:',
                  kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ត្រូវបានរចនាឡើងពីគ្រឹះ ដើម្បីគាំទ្រអភិបាលកិច្ចប្រតិបត្តិការ តាមរយៈការអនុម័តមានរចនាសម្ព័ន្ធ និងការតាមដានសកម្មភាពពេញលេញ។ វេទិការបស់យើងរួមមាន៖',
                })
              }}
            </p>
            <ul class="mt-4 grid gap-3 sm:grid-cols-2 text-sm">
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Role-based access control (RBAC)', kh: 'ការគ្រប់គ្រងសិទ្ធិចូលប្រើតាមតួនាទី (RBAC)' }) }}
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Separation of duties', kh: 'ការបែងចែកតួនាទីកាតព្វកិច្ច' }) }}
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Audit-ready event logs', kh: 'កំណត់ហេតុព្រឹត្តិការណ៍ត្រៀមសវនកម្ម' }) }}
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Data encryption at rest and in transit', kh: 'ការអ៊ិនគ្រីបទិន្នន័យពេលរក្សាទុក និងពេលផ្ទេរ' }) }}
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Regular security updates', kh: 'ការធ្វើបច្ចុប្បន្នភាពសុវត្ថិភាពទៀងទាត់' }) }}
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Compliance support', kh: 'ការគាំទ្រអនុលោម' }) }}
              </li>
            </ul>
            <p class="mt-4 text-sm text-slate-600">
              {{
                t({
                  en: 'Implementation details can be aligned to your internal policies and regulatory requirements during the setup phase. We work closely with your team to ensure compliance with local regulations.',
                  kh: 'ព័ត៌មានលម្អិតនៃការអនុវត្តអាចកែសម្រួលឱ្យស្របនឹងគោលនយោបាយផ្ទៃក្នុង និងតម្រូវការបទប្បញ្ញត្តិរបស់អ្នក ក្នុងដំណាក់កាលរៀបចំ។ យើងធ្វើការជិតស្និទ្ធជាមួយក្រុមរបស់អ្នក ដើម្បីធានាអនុលោមតាមបទប្បញ្ញត្តិក្នុងតំបន់។',
                })
              }}
            </p>
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
            {{ t({ en: 'Ready to join our story?', kh: 'ត្រៀមខ្លួនចូលរួមជាមួយដំណើររបស់យើងហើយឬនៅ?' }) }}
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            {{
              t({
                en: "Let's build something great together. Start with a conversation about your needs, and we'll show you how Humaneti can transform your operations.",
                kh: 'មកសហការបង្កើតអ្វីដែលអស្ចារ្យជាមួយគ្នា។ ចាប់ផ្តើមពីការពិភាក្សាអំពីតម្រូវការរបស់អ្នក ហើយយើងនឹងបង្ហាញរបៀបដែល ក្រុមហ៊ុន ហ៊ូម៉ាណេទី អាចផ្លាស់ប្តូរប្រតិបត្តិការរបស់អ្នក។',
              })
            }}
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              {{ t({ en: 'Get in Touch', kh: 'ទាក់ទងមកយើង' }) }}
            </UiButton>
            <UiButton as="router-link" to="/product" variant="ghost" size="lg" class="!text-white hover:!bg-white/10 border border-white/20">
              {{ t({ en: 'Explore Platform', kh: 'ស្វែងយល់វេទិកា' }) }}
            </UiButton>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
