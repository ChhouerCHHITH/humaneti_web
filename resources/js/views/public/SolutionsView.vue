<script setup>
import { ref, watch, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'

const route = useRoute()
const router = useRouter()
const selectedUseCase = ref(0)
const { locale, t } = usePublicI18n()

const khText = {
  Solutions: 'ដំណោះស្រាយ',
  SME: 'SME',
  NGO: 'NGO',
  Enterprise: 'សហគ្រាស',
  'Small & Medium Enterprises': 'សហគ្រាសខ្នាតតូច និងមធ្យម',
  'Non-Profit Organizations': 'អង្គការមិនរកប្រាក់ចំណេញ',
  'Multi-Department Organizations': 'អង្គការច្រើនផ្នែក',
  'Expected Outcomes': 'លទ្ធផលដែលរំពឹងទុក',
  'Professional workflows without enterprise complexity':
    'លំហូរការងារមានវិជ្ជាជីវៈ ដោយគ្មានភាពស្មុគស្មាញកម្រិតសហគ្រាសធំ',
  'Growing businesses need structured controls without unnecessary complexity. Humaneti provides practical workflows that teams can adopt quickly.':
    'អាជីវកម្មកំពុងរីកចម្រើនត្រូវការការគ្រប់គ្រងមានរចនាសម្ព័ន្ធ ដោយគ្មានភាពស្មុគស្មាញលើសចាំបាច់។ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ផ្តល់លំហូរការងារជាក់ស្តែង ដែលក្រុមអាចអនុវត្តបានរហ័ស។',
  'Manual approvals create delays and rework': 'ការអនុម័តដោយដៃបង្កើតការយឺតយ៉ាវ និងការងារធ្វើឡើងវិញ',
  'Scattered documents and unclear ownership': 'ឯកសារបែកបាក់ និងភាពជាម្ចាស់មិនច្បាស់',
  'No visibility into request status': 'មិនអាចមើលឃើញស្ថានភាពសំណើ',
  'Difficulty scaling operations': 'លំបាកពេលពង្រីកប្រតិបត្តិការ',
  'Configurable approval workflows with clear ownership': 'លំហូរការអនុម័តកំណត់បាន ជាមួយភាពជាម្ចាស់ច្បាស់',
  'Centralized document storage and retrieval': 'ការផ្ទុក និងស្វែងរកឯកសារកណ្តាល',
  'Real-time status tracking for all requests': 'ការតាមដានស្ថានភាពគ្រប់សំណើបានភ្លាមៗ',
  'Modular system that grows with your business': 'ប្រព័ន្ធម៉ូឌុលដែលពង្រីកទៅតាមអាជីវកម្មរបស់អ្នក',
  'Faster approval cycle times': 'វដ្ដអនុម័តលឿនជាងមុន',
  'Better document control': 'ការគ្រប់គ្រងឯកសារល្អប្រសើរ',
  'Clear pending-request visibility': 'ភាពមើលឃើញសំណើកំពុងរង់ចាំច្បាស់',
  'Scalable process design as teams grow': 'រចនាដំណើរការដែលអាចពង្រីកបាន ពេលក្រុមរីកចម្រើន',
  'Transparent workflows that meet donor requirements': 'លំហូរការងារថ្លៃថ្នូរ បំពេញតម្រូវការម្ចាស់ជំនួយ',
  'NGOs face donor compliance, grant reporting, and control requirements. Humaneti provides traceable workflows and project-linked operational records.':
    'NGO ប្រឈមនឹងតម្រូវការអនុលោមម្ចាស់ជំនួយ របាយការណ៍មូលនិធិ និងការគ្រប់គ្រង។ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ផ្តល់លំហូរការងារអាចតាមដានបាន និងកំណត់ត្រាប្រតិបត្តិការភ្ជាប់គម្រោង។',
  'Donor audit and compliance requirements': 'តម្រូវការសវនកម្ម និងអនុលោមរបស់ម្ចាស់ជំនួយ',
  'Grant-specific approval rules': 'ច្បាប់អនុម័តជាក់លាក់តាមមូលនិធិ',
  'Limited admin resources': 'ធនធានរដ្ឋបាលមានកម្រិត',
  'Need for complete traceability': 'ត្រូវការភាពអាចតាមដានពេញលេញ',
  'Complete audit trails for all transactions': 'ប្រវត្តិសវនកម្មពេញលេញសម្រាប់ប្រតិបត្តិការទាំងអស់',
  'Configurable approval rules by company/project context': 'ច្បាប់អនុម័តកំណត់បានតាមបរិបទក្រុមហ៊ុន/គម្រោង',
  'Structured workflows reduce admin burden': 'លំហូរការងារមានរចនាសម្ព័ន្ធ កាត់បន្ថយបន្ទុករដ្ឋបាល',
  'Exportable records for compliance preparation': 'កំណត់ត្រាអាចនាំចេញសម្រាប់ត្រៀមអនុលោម',
  'Improved documentation readiness': 'បង្កើនភាពត្រៀមឯកសារ',
  'Stronger grant-related controls': 'ពង្រឹងការគ្រប់គ្រងពាក់ព័ន្ធមូលនិធិ',
  'Less manual administrative tracking': 'កាត់បន្ថយការតាមដានរដ្ឋបាលដោយដៃ',
  'Higher donor confidence in process quality': 'បង្កើនទំនុកចិត្តម្ចាស់ជំនួយលើគុណភាពដំណើរការ',
  'Unified platform for complex organizational structures': 'វេទិការួមសម្រាប់រចនាសម្ព័ន្ធអង្គការស្មុគស្មាញ',
  'Multi-department organizations need consistent controls while preserving delegated authority. Humaneti combines centralized governance with flexible configuration.':
    'អង្គការច្រើនផ្នែកត្រូវការការគ្រប់គ្រងស្របគ្នា ខណៈរក្សាអំណាចប្រគល់ជូនតាមជាន់។ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី រួមបញ្ចូលអភិបាលកិច្ចកណ្ដាលជាមួយការកំណត់បត់បែន។',
  'Inconsistent processes across departments': 'ដំណើរការមិនស្របគ្នាទូទាំងផ្នែក',
  'Complex approval hierarchies': 'លំដាប់អនុម័តស្មុគស្មាញ',
  'Siloed data and duplicate systems': 'ទិន្នន័យបែងចែកជាប្រអប់ និងប្រព័ន្ធស្ទួន',
  'Difficulty in cross-department visibility': 'លំបាកក្នុងភាពមើលឃើញឆ្លងផ្នែក',
  'Standardized workflows with department-level customization':
    'លំហូរការងារធ្វើស្តង់ដារ ជាមួយការកំណត់តាមកម្រិតផ្នែក',
  'Multi-level approval chains by department/amount': 'ខ្សែអនុម័តច្រើនកម្រិត តាមផ្នែក/ចំនួនទឹកប្រាក់',
  'Unified platform with role-based access': 'វេទិការួមជាមួយសិទ្ធិតាមតួនាទី',
  'Enterprise-wide reporting and analytics': 'របាយការណ៍ និងវិភាគទូទាំងសហគ្រាស',
  'Consistent controls across departments': 'ការគ្រប់គ្រងស្របគ្នាទូទាំងផ្នែក',
  'Fewer approval bottlenecks': 'កាត់បន្ថយចំណុចកកស្ទះក្នុងការអនុម័ត',
  'Single operational source of truth': 'ប្រភពទិន្នន័យប្រតិបត្តិការតែមួយដែលអាចទុកចិត្តបាន',
  'Better cross-department coordination': 'កិច្ចសម្របសម្រួលឆ្លងផ្នែកល្អប្រសើរ',
  'Discovery & Planning': 'សិក្សា និងរៀបចំផែនការ',
  '1 week': '1 សប្តាហ៍',
  'Current process mapping and pain point analysis': 'ផែនទីដំណើរការបច្ចុប្បន្ន និងវិភាគបញ្ហាចម្បង',
  'Define workflows and approval hierarchies': 'កំណត់លំហូរការងារ និងលំដាប់អនុម័ត',
  'Identify key stakeholders and roles': 'កំណត់អ្នកពាក់ព័ន្ធសំខាន់ និងតួនាទី',
  'Set success metrics and KPIs': 'កំណត់សូចនាករជោគជ័យ និង KPI',
  'Configuration & Setup': 'ការកំណត់ និងរៀបចំ',
  '2 weeks': '2 សប្តាហ៍',
  'System configuration based on requirements': 'កំណត់ប្រព័ន្ធតាមតម្រូវការ',
  'Role and permission setup': 'កំណត់តួនាទី និងសិទ្ធិ',
  'Workflow customization': 'ការកែតម្រូវលំហូរការងារ',
  'Data migration and import': 'ផ្លាស់ប្តូរ និងនាំចូលទិន្នន័យ',
  'Training & Testing': 'បណ្តុះបណ្តាល និងសាកល្បង',
  'End-user training sessions': 'វគ្គបណ្តុះបណ្តាលអ្នកប្រើចុងក្រោយ',
  'Admin training and documentation': 'បណ្តុះបណ្តាលអ្នកគ្រប់គ្រង និងឯកសារ',
  'Pilot testing with select teams': 'សាកល្បងដំបូងជាមួយក្រុមតំណាង',
  'Refinement based on feedback': 'កែលម្អតាមមតិយោបល់',
  'Go-Live & Support': 'ដាក់ឱ្យប្រើប្រាស់ និងគាំទ្រ',
  Ongoing: 'បន្តជាប្រចាំ',
  'Phased rollout to all departments': 'ដាក់ឱ្យប្រើជាដំណាក់កាលទៅគ្រប់ផ្នែក',
  'Dedicated support during transition': 'គាំទ្រជាក់លាក់ក្នុងអំឡុងពេលផ្លាស់ប្តូរ',
  'Performance monitoring and optimization': 'តាមដានប្រសិទ្ធភាព និងបង្កើនប្រសិទ្ធភាព',
  'Continuous improvement': 'ការកែលម្អជាបន្តបន្ទាប់',
  Manufacturing: 'ផលិតកម្ម',
  Retail: 'លក់រាយ',
  Healthcare: 'សុខាភិបាល',
  Education: 'អប់រំ',
  Construction: 'សំណង់',
  Technology: 'បច្ចេកវិទ្យា',
  'Asset tracking': 'ការតាមដានទ្រព្យសម្បត្តិ',
  'Employee management': 'ការគ្រប់គ្រងបុគ្គលិក',
  'Purchase control': 'ការគ្រប់គ្រងការទិញ',
  'Multi-location HR': 'HR ច្រើនទីតាំង',
  'Payroll processing': 'ដំណើរការបៀវត្សរ៍',
  'Inventory requests': 'សំណើសារពើភណ្ឌ',
  'Compliance tracking': 'ការតាមដានអនុលោម',
  'Equipment management': 'ការគ្រប់គ្រងឧបករណ៍',
  'Staff scheduling': 'ការរៀបចំកាលវិភាគបុគ្គលិក',
  'Faculty management': 'ការគ្រប់គ្រងបុគ្គលិកបង្រៀន',
  'Asset allocation': 'ការបែងចែកទ្រព្យសម្បត្តិ',
  'Budget approvals': 'ការអនុម័តថវិកា',
  'Equipment tracking': 'ការតាមដានឧបករណ៍',
  'Project payroll': 'បៀវត្សរ៍គម្រោង',
  'Material requests': 'សំណើសម្ភារៈ',
  'Remote HR': 'HR ពីចម្ងាយ',
  'Device management': 'ការគ្រប់គ្រងឧបករណ៍',
  'Rapid scaling': 'ពង្រីកលឿន',
  Workflow: 'លំហូរការងារ',
  Consistency: 'ភាពស្របគ្នា',
  'Standard approval patterns across modules': 'លំនាំអនុម័តស្តង់ដារទូទាំងម៉ូឌុល',
  'Role-based': 'ផ្អែកតាមតួនាទី',
  'Access Control': 'ការគ្រប់គ្រងសិទ្ធិចូលប្រើ',
  'Permission-driven menu and action visibility': 'ម៉ឺនុយ និងសកម្មភាពមើលឃើញតាមសិទ្ធិ',
  Audit: 'សវនកម្ម',
  Traceability: 'ភាពអាចតាមដាន',
  'Timestamped activities and approval records': 'សកម្មភាពមានពេលវេលា និងកំណត់ត្រាអនុម័ត',
  Tenant: 'តេណង់',
  'Data Isolation': 'ការបែងចែកទិន្នន័យ',
  'Company-scope operations by design': 'ប្រតិបត្តិការតាមវិសាលភាពក្រុមហ៊ុន តាមការរចនា',
}

const normalizeTxKey = (value) => String(value || '').replace(/[’]/g, "'").replace(/[–—]/g, '-')
const tx = (value) => {
  if (locale.value !== 'kh') return value
  const direct = khText[value]
  if (direct) return direct
  const normalized = normalizeTxKey(value)
  return khText[normalized] || value
}

const useCases = [
  {
    id: 'sme',
    type: 'SME',
    icon: '🏢',
    title: 'Small & Medium Enterprises',
    subtitle: 'Professional workflows without enterprise complexity',
    description: 'Growing businesses need structured controls without unnecessary complexity. Humaneti provides practical workflows that teams can adopt quickly.',
    challenges: [
      'Manual approvals create delays and rework',
      'Scattered documents and unclear ownership',
      'No visibility into request status',
      'Difficulty scaling operations'
    ],
    solutions: [
      'Configurable approval workflows with clear ownership',
      'Centralized document storage and retrieval',
      'Real-time status tracking for all requests',
      'Modular system that grows with your business'
    ],
    outcomes: [
      'Faster approval cycle times',
      'Better document control',
      'Clear pending-request visibility',
      'Scalable process design as teams grow'
    ]
  },
  {
    id: 'ngo',
    type: 'NGO',
    icon: '🤝',
    title: 'Non-Profit Organizations',
    subtitle: 'Transparent workflows that meet donor requirements',
    description: 'NGOs face donor compliance, grant reporting, and control requirements. Humaneti provides traceable workflows and project-linked operational records.',
    challenges: [
      'Donor audit and compliance requirements',
      'Grant-specific approval rules',
      'Limited admin resources',
      'Need for complete traceability'
    ],
    solutions: [
      'Complete audit trails for all transactions',
      'Configurable approval rules by company/project context',
      'Structured workflows reduce admin burden',
      'Exportable records for compliance preparation'
    ],
    outcomes: [
      'Improved documentation readiness',
      'Stronger grant-related controls',
      'Less manual administrative tracking',
      'Higher donor confidence in process quality'
    ]
  },
  {
    id: 'enterprise',
    type: 'Enterprise',
    icon: '🏭',
    title: 'Multi-Department Organizations',
    subtitle: 'Unified platform for complex organizational structures',
    description: 'Multi-department organizations need consistent controls while preserving delegated authority. Humaneti combines centralized governance with flexible configuration.',
    challenges: [
      'Inconsistent processes across departments',
      'Complex approval hierarchies',
      'Siloed data and duplicate systems',
      'Difficulty in cross-department visibility'
    ],
    solutions: [
      'Standardized workflows with department-level customization',
      'Multi-level approval chains by department/amount',
      'Unified platform with role-based access',
      'Enterprise-wide reporting and analytics'
    ],
    outcomes: [
      'Consistent controls across departments',
      'Fewer approval bottlenecks',
      'Single operational source of truth',
      'Better cross-department coordination'
    ]
  }
]

const implementationSteps = [
  {
    step: '01',
    title: 'Discovery & Planning',
    duration: '1 week',
    activities: [
      'Current process mapping and pain point analysis',
      'Define workflows and approval hierarchies',
      'Identify key stakeholders and roles',
      'Set success metrics and KPIs'
    ]
  },
  {
    step: '02',
    title: 'Configuration & Setup',
    duration: '2 weeks',
    activities: [
      'System configuration based on requirements',
      'Role and permission setup',
      'Workflow customization',
      'Data migration and import'
    ]
  },
  {
    step: '03',
    title: 'Training & Testing',
    duration: '1 week',
    activities: [
      'Admin training and documentation',
      'End-user training sessions',
      'Pilot testing with select teams',
      'Refinement based on feedback'
    ]
  },
  {
    step: '04',
    title: 'Go-Live & Support',
    duration: 'Ongoing',
    activities: [
      'Phased rollout to all departments',
      'Dedicated support during transition',
      'Performance monitoring and optimization',
      'Continuous improvement'
    ]
  }
]

const industries = [
  {
    name: 'Manufacturing',
    icon: '⚙️',
    needs: ['Asset tracking', 'Employee management', 'Purchase control']
  },
  {
    name: 'Retail',
    icon: '🛍️',
    needs: ['Multi-location HR', 'Payroll processing', 'Inventory requests']
  },
  {
    name: 'Healthcare',
    icon: '🏥',
    needs: ['Compliance tracking', 'Equipment management', 'Staff scheduling']
  },
  {
    name: 'Education',
    icon: '🎓',
    needs: ['Faculty management', 'Asset allocation', 'Budget approvals']
  },
  {
    name: 'Construction',
    icon: '🏗️',
    needs: ['Equipment tracking', 'Project payroll', 'Material requests']
  },
  {
    name: 'Technology',
    icon: '💻',
    needs: ['Remote HR', 'Device management', 'Rapid scaling']
  }
]

const metrics = [
  {
    metric: 'Workflow',
    label: 'Consistency',
    description: 'Standard approval patterns across modules'
  },
  {
    metric: 'Role-based',
    label: 'Access Control',
    description: 'Permission-driven menu and action visibility'
  },
  {
    metric: 'Audit',
    label: 'Traceability',
    description: 'Timestamped activities and approval records'
  },
  {
    metric: 'Tenant',
    label: 'Data Isolation',
    description: 'Company-scope operations by design'
  }
]

const selectUseCase = (index, updateHash = true) => {
  selectedUseCase.value = index

  if (!updateHash) return

  const targetHash = `#${useCases[index].id}`
  if (route.hash === targetHash) return

  router.replace({
    path: route.path,
    query: route.query,
    hash: targetHash,
  })
}

const syncUseCaseFromHash = (hash) => {
  if (!hash) return
  const normalized = hash.replace(/^#/, '').toLowerCase()
  const foundIndex = useCases.findIndex((item) => item.id === normalized)
  if (foundIndex >= 0) {
    selectUseCase(foundIndex, false)
  }
}

onMounted(() => {
  syncUseCaseFromHash(route.hash)
})

watch(() => route.hash, (hash) => {
  syncUseCaseFromHash(hash)
})
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t({ en: 'SOLUTIONS', kh: 'ដំណោះស្រាយ' }) }}</UiBadge>
      
      <UiSection
        :kicker="t({ en: 'REAL-WORLD APPLICATIONS', kh: 'ការអនុវត្តជាក់ស្តែង' })"
        :title="t({ en: 'Built for real operations: approvals, accountability, and records', kh: 'បង្កើតសម្រាប់ប្រតិបត្តិការពិត៖ អនុម័ត ទទួលខុសត្រូវ និងកំណត់ត្រា' })"
        :subtitle="t({ en: 'Whether you are an SME, NGO, or multi-department team, Humaneti adapts to your workflow and governance needs.', kh: 'មិនថាអ្នកជា SME NGO ឬក្រុមការងារច្រើនផ្នែក ក្រុមហ៊ុន ហ៊ូម៉ាណេទី អាចបត់បែនតាមលំហូរការងារ និងតម្រូវការអភិបាលកិច្ចរបស់អ្នក។' })"
      />
    </section>

    <!-- Use Case Selector -->
    <section>
      <div
        class="grid gap-4 md:grid-cols-3"
        role="tablist"
        :aria-label="t({ en: 'Solution types', kh: 'ប្រភេទដំណោះស្រាយ' })"
      >
        <button
          v-for="(useCase, idx) in useCases"
          :key="useCase.id"
          :id="useCase.id"
          :aria-selected="selectedUseCase === idx ? 'true' : 'false'"
          :aria-controls="`solution-panel-${useCase.id}`"
          role="tab"
          @click="selectUseCase(idx)"
          :class="[
            'group rounded-2xl border-2 p-6 text-left transition-all',
            selectedUseCase === idx
              ? 'border-indigo-600 bg-indigo-50 shadow-lg'
              : 'border-slate-200 bg-white hover:border-slate-300 hover:shadow-md'
          ]"
        >
          <div class="text-4xl mb-3">{{ useCase.icon }}</div>
          <div 
            :class="[
              'text-lg font-bold',
              selectedUseCase === idx ? 'text-indigo-900' : 'text-slate-900'
            ]"
          >
            {{ tx(useCase.title) }}
          </div>
          <div 
            :class="[
              'mt-1 text-sm',
              selectedUseCase === idx ? 'text-indigo-700' : 'text-slate-600'
            ]"
          >
            {{ tx(useCase.subtitle) }}
          </div>
        </button>
      </div>

      <!-- Use Case Detail -->
      <div class="mt-12">
        <div 
          v-for="(useCase, idx) in useCases"
          :key="useCase.id"
          v-show="selectedUseCase === idx"
          :id="`solution-panel-${useCase.id}`"
          :aria-labelledby="useCase.id"
          role="tabpanel"
          class="grid gap-8 lg:grid-cols-2 lg:gap-12"
        >
          <div class="space-y-8">
            <div>
              <h3 class="text-3xl font-bold text-slate-900">{{ tx(useCase.title) }}</h3>
              <p class="mt-4 text-lg leading-relaxed text-slate-600">{{ tx(useCase.description) }}</p>
            </div>

            <div>
              <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-500">{{ t({ en: 'Common Challenges', kh: 'បញ្ហាប្រឈមទូទៅ' }) }}</h4>
              <ul class="mt-4 space-y-3">
                <li 
                  v-for="challenge in useCase.challenges" 
                  :key="challenge"
                  class="flex items-start gap-3"
                >
                  <svg class="h-5 w-5 flex-shrink-0 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-slate-700">{{ tx(challenge) }}</span>
                </li>
              </ul>
            </div>

            <div>
              <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-500">{{ t({ en: 'Our Solutions', kh: 'ដំណោះស្រាយរបស់យើង' }) }}</h4>
              <ul class="mt-4 space-y-3">
                <li 
                  v-for="solution in useCase.solutions" 
                  :key="solution"
                  class="flex items-start gap-3"
                >
                  <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-slate-700">{{ tx(solution) }}</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="space-y-6">
            <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-8">
              <h4 class="flex items-center gap-2 text-lg font-bold text-emerald-900">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t({ en: 'Expected Outcomes', kh: 'លទ្ធផលដែលរំពឹងទុក' }) }}
              </h4>
              <ul class="mt-4 space-y-3">
                <li 
                  v-for="outcome in useCase.outcomes" 
                  :key="outcome"
                  class="flex items-start gap-3"
                >
                  <svg class="h-5 w-5 flex-shrink-0 text-emerald-700" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                  <span class="font-medium text-emerald-900">{{ tx(outcome) }}</span>
                </li>
              </ul>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
              <div class="text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100">
                  <span class="text-2xl">{{ useCase.icon }}</span>
                </div>
                <h5 class="mt-4 font-semibold text-slate-900">{{ t({ en: 'Perfect for', kh: 'សមស្របសម្រាប់' }) }} {{ tx(useCase.type) }}</h5>
                <p class="mt-2 text-sm text-slate-600">
                  {{ t({ en: 'Join organizations like yours that have transformed their operations with Humaneti.', kh: 'ចូលរួមជាមួយអង្គការដូចរបស់អ្នក ដែលបានផ្លាស់ប្តូរប្រតិបត្តិការដោយប្រើ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។' }) }}
                </p>
                <UiButton as="router-link" to="/contact" variant="primary" class="mt-4 w-full">
                  {{ t({ en: 'Discuss Your Needs', kh: 'ពិភាក្សាតម្រូវការរបស់អ្នក' }) }}
                </UiButton>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Success Metrics -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <UiSection
        :kicker="t({ en: 'PROVEN RESULTS', kh: 'លទ្ធផលជាក់ស្តែង' })"
        :title="t({ en: 'Operational outcomes you can standardize', kh: 'លទ្ធផលប្រតិបត្តិការដែលអាចស្តង់ដារបាន' })"
        :subtitle="t({ en: 'Humaneti focuses on governance quality, traceability, and repeatable execution.', kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ផ្តោតលើគុណភាពអភិបាលកិច្ច ភាពអាចតាមដាន និងការអនុវត្តដែលធ្វើឡើងវិញបាន។' })"
      />

      <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="metric in metrics" 
          :key="metric.metric"
          class="text-center"
        >
          <div class="text-5xl font-bold bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">
            {{ metric.metric }}
          </div>
          <div class="mt-2 text-lg font-semibold text-slate-900">{{ tx(metric.label) }}</div>
          <div class="mt-1 text-sm text-slate-600">{{ tx(metric.description) }}</div>
        </div>
      </div>
    </section>

    <!-- Industries Served -->
    <section>
      <UiSection
        :kicker="t({ en: 'INDUSTRY EXPERIENCE', kh: 'បទពិសោធន៍តាមវិស័យ' })"
        :title="t({ en: 'Trusted across diverse industries', kh: 'ទទួលការជឿទុកចិត្តគ្រប់វិស័យ' })"
        :subtitle="t({ en: 'Humaneti supports sector-specific workflows while keeping one consistent operating model.', kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី គាំទ្រលំហូរការងារជាក់លាក់តាមវិស័យ ដោយរក្សាគំរូប្រតិបត្តិការស្របគ្នា។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div 
          v-for="industry in industries" 
          :key="industry.name"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="text-4xl mb-3">{{ industry.icon }}</div>
          <h3 class="text-lg font-semibold text-slate-900">{{ tx(industry.name) }}</h3>
          <ul class="mt-3 space-y-2">
            <li 
              v-for="need in industry.needs" 
              :key="need"
              class="flex items-center gap-2 text-sm text-slate-600"
            >
              <svg class="h-4 w-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              {{ tx(need) }}
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Implementation Roadmap -->
    <section>
      <UiSection
        :kicker="t({ en: 'IMPLEMENTATION', kh: 'ការអនុវត្ត' })"
        :title="t({ en: 'Fast, structured rollout process', kh: 'ដំណើរការអនុវត្តរហ័ស និងមានរចនាសម្ព័ន្ធ' })"
        :subtitle="t({ en: 'From discovery to go-live in 4-6 weeks with our proven methodology.', kh: 'ចាប់ពីសិក្សាតម្រូវការ ដល់ដាក់ឱ្យប្រើប្រាស់ក្នុង 4-6 សប្តាហ៍ ដោយប្រើវិធីសាស្ត្រដែលបានសាកល្បង។' })"
      />

      <div class="mt-12">
        <div class="relative">
          <!-- Timeline line -->
          <div class="absolute left-12 top-0 bottom-0 w-0.5 bg-gradient-to-b from-indigo-600 via-violet-600 to-emerald-600 hidden lg:block"></div>

          <div class="space-y-8">
            <div 
              v-for="(step, idx) in implementationSteps" 
              :key="idx"
              class="relative grid gap-6 lg:grid-cols-[auto_1fr] lg:gap-8"
            >
              <!-- Step Number -->
              <div class="flex items-start justify-center lg:justify-start">
                <div class="relative flex h-24 w-24 flex-shrink-0 items-center justify-center rounded-full border-4 border-white bg-gradient-to-br from-indigo-600 to-violet-600 text-white shadow-lg">
                  <div class="text-center">
                    <div class="text-2xl font-bold">{{ step.step }}</div>
                  </div>
                </div>
              </div>

              <!-- Step Content -->
              <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
                <div class="flex items-start justify-between">
                  <div>
                    <h3 class="text-2xl font-bold text-slate-900">{{ tx(step.title) }}</h3>
                    <div class="mt-1 inline-flex items-center gap-2 text-sm text-slate-600">
                      <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                        {{ tx(step.duration) }}
                    </div>
                  </div>
                </div>
                
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                  <li 
                    v-for="activity in step.activities" 
                    :key="activity"
                    class="flex items-start gap-2 text-sm text-slate-700"
                  >
                    <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ tx(activity) }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-12 rounded-2xl border border-indigo-200 bg-indigo-50 p-6">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
              <svg class="h-6 w-6 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-indigo-900">{{ t({ en: 'Dedicated Implementation Support', kh: 'ការគាំទ្រអនុវត្តដោយក្រុមជំនាញ' }) }}</h4>
              <p class="mt-1 text-sm text-indigo-700">
                {{ t({ en: 'Every implementation includes a dedicated project manager, technical support, and comprehensive training materials.', kh: 'ការអនុវត្តគ្រប់ករណីរួមមានអ្នកគ្រប់គ្រងគម្រោងជាក់លាក់ ការគាំទ្របច្ចេកទេស និងឯកសារបណ្តុះបណ្តាលពេញលេញ។' }) }}
              </p>
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
            {{ t({ en: 'Let us discuss your specific needs', kh: 'មកពិភាក្សាតម្រូវការជាក់លាក់របស់អ្នក' }) }}
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            {{ t({ en: 'Every organization is unique. Schedule a consultation to explore how Humaneti can be tailored to your workflows and challenges.', kh: 'អង្គការនីមួយៗមានលក្ខណៈពិសេស។ សូមកំណត់ពេលពិភាក្សា ដើម្បីស្វែងយល់ថា ក្រុមហ៊ុន ហ៊ូម៉ាណេទី អាចកែតម្រូវតាមលំហូរការងារ និងបញ្ហាប្រឈមរបស់អ្នកយ៉ាងដូចម្តេច។' }) }}
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              {{ t({ en: 'Schedule Consultation', kh: 'កំណត់ពេលពិភាក្សា' }) }}
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
