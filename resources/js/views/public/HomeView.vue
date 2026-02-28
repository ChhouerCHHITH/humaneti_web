<script setup>
import { ref } from 'vue'
import UiButton from '@/components/UiButton.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiSection from '@/components/UiSection.vue'
import { icons } from '@/components/icons'
import { usePublicI18n } from '@/composables/usePublicI18n'

const { t } = usePublicI18n()

const stats = [
  {
    label: { en: 'Core Modules', kh: 'ម៉ូឌុលស្នូល' },
    value: '8+',
    icon: icons.people,
  },
  {
    label: { en: 'Workflow Engine', kh: 'ម៉ាស៊ីនលំហូរការងារ' },
    value: { en: 'Dynamic', kh: 'បត់បែន' },
    icon: icons.workflow,
  },
  {
    label: { en: 'Company Scope', kh: 'វិសាលភាពក្រុមហ៊ុន' },
    value: { en: 'Multi-tenant', kh: 'ច្រើនតេណង់' },
    icon: icons.shield,
  },
  {
    label: { en: 'Auditability', kh: 'ភាពអាចត្រួតពិនិត្យ' },
    value: { en: 'End-to-end', kh: 'គ្រប់ដំណាក់កាល' },
    icon: icons.audit,
  },
]

const features = [
  {
    icon: icons.people,
    title: { en: 'Human Resource Management', kh: 'ការគ្រប់គ្រងធនធានមនុស្ស' },
    preview: {
      en: 'Employees, org chart, contracts, and recruitment in one workspace.',
      kh: 'បុគ្គលិក រចនាសម្ព័ន្ធអង្គការ កិច្ចសន្យា និងជ្រើសរើសបុគ្គលិក ក្នុងកន្លែងតែមួយ។',
    },
    description: {
      en: 'Manage employees, departments, designations, reporting lines, contracts, recruitment, and core HR records in one place.',
      kh: 'គ្រប់គ្រងបុគ្គលិក នាយកដ្ឋាន តួនាទី ខ្សែរបាយការណ៍ កិច្ចសន្យា ការជ្រើសរើស និងកំណត់ត្រា HR សំខាន់ៗក្នុងកន្លែងតែមួយ។',
    },
    benefits: [
      { en: 'Employee records', kh: 'កំណត់ត្រាបុគ្គលិក' },
      { en: 'Org structure', kh: 'រចនាសម្ព័ន្ធអង្គការ' },
      { en: 'Recruitment', kh: 'ជ្រើសរើសបុគ្គលិក' },
      { en: 'Contracts', kh: 'កិច្ចសន្យា' },
    ],
  },
  {
    icon: icons.money,
    title: { en: 'Payroll Processing', kh: 'ដំណើរការបៀវត្សរ៍' },
    preview: {
      en: 'From salary structure to tax and payroll approval history.',
      kh: 'ពីរចនាសម្ព័ន្ធប្រាក់ខែ ដល់ពន្ធ និងប្រវត្តិអនុម័តបៀវត្សរ៍។',
    },
    description: {
      en: 'Run payroll with salary structures, adjustments, bonus/incentives, tax configuration, loans, and full approval history.',
      kh: 'ដំណើរការបៀវត្សរ៍ជាមួយរចនាសម្ព័ន្ធប្រាក់ខែ ការកែសម្រួល ប្រាក់រង្វាន់/លើកទឹកចិត្ត ការកំណត់ពន្ធ កម្ចី និងប្រវត្តិអនុម័តពេញលេញ។',
    },
    benefits: [
      { en: 'Salary structures', kh: 'រចនាសម្ព័ន្ធប្រាក់ខែ' },
      { en: 'Payroll runs', kh: 'វដ្ដដំណើរការបៀវត្សរ៍' },
      { en: 'Tax configuration', kh: 'ការកំណត់ពន្ធ' },
      { en: 'Loan deductions', kh: 'ការកាត់កម្ចី' },
    ],
  },
  {
    icon: icons.box,
    title: { en: 'Asset Management', kh: 'ការគ្រប់គ្រងទ្រព្យសម្បត្តិ' },
    preview: {
      en: 'Track assignment, transfer, status, and return lifecycle.',
      kh: 'តាមដានការចាត់តាំង ផ្ទេរ ស្ថានភាព និងការបង្វិលត្រឡប់ក្នុងវដ្ដជីវិត។',
    },
    description: {
      en: 'Track assets from category setup to assignment, transfer, status history, and return workflows.',
      kh: 'តាមដានទ្រព្យសម្បត្តិចាប់ពីការកំណត់ប្រភេទ ដល់ការចាត់តាំង ផ្ទេរ ប្រវត្តិស្ថានភាព និងលំហូរការងារបង្វិលត្រឡប់។',
    },
    benefits: [
      { en: 'Asset registry', kh: 'បញ្ជីទ្រព្យសម្បត្តិ' },
      { en: 'Assignment history', kh: 'ប្រវត្តិចាត់តាំង' },
      { en: 'Lifecycle status', kh: 'ស្ថានភាពវដ្ដជីវិត' },
      { en: 'Asset categories', kh: 'ប្រភេទទ្រព្យសម្បត្តិ' },
    ],
  },
  {
    icon: icons.cart,
    title: { en: 'Purchase Requests', kh: 'សំណើទិញ' },
    preview: {
      en: 'End-to-end procurement from PR to PO and goods receipt.',
      kh: 'លទ្ធកម្មពេញលេញចាប់ពី PR ដល់ PO និងការទទួលទំនិញ។',
    },
    description: {
      en: 'Control procurement with PR approvals, vendor/quote handling, budget checks, purchase orders, and goods received.',
      kh: 'គ្រប់គ្រងលទ្ធកម្មជាមួយការអនុម័ត PR ការគ្រប់គ្រងអ្នកផ្គត់ផ្គង់/សម្រង់ ការត្រួតពិនិត្យថវិកា ពាក្យបញ្ជាទិញ និងការទទួលទំនិញ។',
    },
    benefits: [
      { en: 'PR approvals', kh: 'អនុម័ត PR' },
      { en: 'Budget controls', kh: 'ការគ្រប់គ្រងថវិកា' },
      { en: 'PO & GR flow', kh: 'លំហូរ PO និង GR' },
      { en: 'Vendor/quote tracking', kh: 'តាមដានអ្នកផ្គត់ផ្គង់/សម្រង់' },
    ],
  },
  {
    icon: icons.money,
    title: { en: 'Expense Claim', kh: 'ការទាមទារចំណាយ' },
    preview: {
      en: 'Cash advance, clearance, and reimbursement with settlement control.',
      kh: 'បុរេប្រទានសាច់ប្រាក់ បិទបញ្ចប់ និងសំណងចំណាយ ជាមួយការគ្រប់គ្រងទូទាត់។',
    },
    description: {
      en: 'Handle cash advances, advance clearances, and reimbursements with workflow approvals and settlement records.',
      kh: 'គ្រប់គ្រងបុរេប្រទានសាច់ប្រាក់ ការបិទបញ្ចប់បុរេប្រទាន និងសំណងចំណាយ ជាមួយការអនុម័តតាមលំហូរការងារ និងកំណត់ត្រាទូទាត់។',
    },
    benefits: [
      { en: 'Cash advance flow', kh: 'លំហូរបុរេប្រទានសាច់ប្រាក់' },
      { en: 'Advance clearance', kh: 'ការបិទបញ្ចប់បុរេប្រទាន' },
      { en: 'Reimbursement', kh: 'សំណងចំណាយ' },
      { en: 'Settlement visibility', kh: 'ភាពមើលឃើញការទូទាត់' },
    ],
  },
  {
    icon: icons.workflow,
    title: { en: 'Project Management', kh: 'ការគ្រប់គ្រងគម្រោង' },
    preview: {
      en: 'Project master, donors, grants, budgets, and workplans.',
      kh: 'ទិន្នន័យស្នូលគម្រោង ម្ចាស់ជំនួយ មូលនិធិ ថវិកា និងផែនការការងារ។',
    },
    description: {
      en: 'Support NGO and donor operations with project master data, grants, budgets, workplans, and project teams.',
      kh: 'គាំទ្រប្រតិបត្តិការ NGO និងម្ចាស់ជំនួយ ជាមួយទិន្នន័យស្នូលគម្រោង មូលនិធិ ថវិកា ផែនការការងារ និងក្រុមគម្រោង។',
    },
    benefits: [
      { en: 'Project master', kh: 'ទិន្នន័យស្នូលគម្រោង' },
      { en: 'Donor & grant', kh: 'ម្ចាស់ជំនួយ និងមូលនិធិ' },
      { en: 'Budget/workplan', kh: 'ថវិកា/ផែនការការងារ' },
      { en: 'Project team', kh: 'ក្រុមគម្រោង' },
    ],
  },
]

const useCases = [
  {
    type: 'SME',
    typeLabel: { en: 'SME', kh: 'SME' },
    title: { en: 'Small & Medium Enterprises', kh: 'សហគ្រាសខ្នាតតូច និងមធ្យម' },
    description: {
      en: 'Scale your operations with professional HR and payroll processes without enterprise complexity.',
      kh: 'ពង្រីកប្រតិបត្តិការរបស់អ្នកជាមួយដំណើរការ HR និងបៀវត្សរ៍មានវិជ្ជាជីវៈ ដោយមិនមានភាពស្មុគស្មាញដូចសហគ្រាសធំ។',
    },
    highlights: [
      { en: 'Quick setup', kh: 'ដំឡើងរហ័ស' },
      { en: 'Affordable pricing', kh: 'តម្លៃសមរម្យ' },
      { en: 'Essential features', kh: 'មុខងារចាំបាច់' },
    ],
  },
  {
    type: 'NGO',
    typeLabel: { en: 'NGO', kh: 'NGO' },
    title: { en: 'Non-Profit Organizations', kh: 'អង្គការមិនរកប្រាក់ចំណេញ' },
    description: {
      en: 'Transparent workflows and audit trails that meet donor requirements and compliance standards.',
      kh: 'លំហូរការងារថ្លៃថ្នូរ និងប្រវត្តិត្រួតពិនិត្យ ដែលបំពេញតាមតម្រូវការម្ចាស់ជំនួយ និងស្តង់ដារអនុលោម។',
    },
    highlights: [
      { en: 'Grant structures', kh: 'រចនាសម្ព័ន្ធមូលនិធិ' },
      { en: 'Project budgeting', kh: 'ថវិកាគម្រោង' },
      { en: 'Audit-ready records', kh: 'កំណត់ត្រាត្រៀមសវនកម្ម' },
    ],
  },
  {
    type: 'Enterprise',
    typeLabel: { en: 'Enterprise', kh: 'សហគ្រាសធំ' },
    title: { en: 'Multi-Department Teams', kh: 'ក្រុមការងារច្រើនផ្នែក' },
    description: {
      en: 'Unified platform for all departments with role-based access and centralized approval management.',
      kh: 'វេទិការួមសម្រាប់គ្រប់ផ្នែក ជាមួយសិទ្ធិតាមតួនាទី និងការគ្រប់គ្រងអនុម័តកណ្ដាល។',
    },
    highlights: [
      { en: 'Departmental control', kh: 'ការគ្រប់គ្រងតាមផ្នែក' },
      { en: 'Tenant scope', kh: 'វិសាលភាពតេណង់' },
      { en: 'Advanced permissions', kh: 'សិទ្ធិកម្រិតខ្ពស់' },
    ],
  },
]

const testimonials = [
  {
    quote: 'មុននេះការអនុម័តនៅក្នុងក្រុមរបស់យើងច្របូកច្របល់ណាស់។ ពេលនេះគ្រប់ជំហានច្បាស់លាស់ មើលប្រវត្តិបានពេញលេញ ហើយការងាររត់លឿនជាងមុនខ្លាំង។',
    name: 'Sophal Chen',
    role: { en: 'Operations Manager', kh: 'អ្នកគ្រប់គ្រងប្រតិបត្តិការ' },
    company: { en: 'Tech SME, Phnom Penh', kh: 'SME បច្ចេកវិទ្យា ភ្នំពេញ' },
    avatar: '💼',
  },
  {
    quote: 'Payroll used to take us days of back-and-forth. Now approvals are clean, errors dropped, and month-end closes on time without last-minute stress.',
    name: 'Dara Sok',
    role: { en: 'HR & Admin Lead', kh: 'មេដឹកនាំ HR និងរដ្ឋបាល' },
    company: { en: 'International NGO', kh: 'NGO អន្តរជាតិ' },
    avatar: '👨‍💼',
  },
  {
    quote: 'Asset control finally feels reliable. We can see full custody history per item, resolve issues quickly, and keep every site accountable.',
    name: 'Ponleak Heng',
    role: { en: 'IT Supervisor', kh: 'អ្នកគ្រប់គ្រង IT' },
    company: { en: 'Multi-Site Manufacturing', kh: 'រោងចក្រច្រើនទីតាំង' },
    avatar: '👩‍💻',
  },
]

const faqs = [
  {
    question: {
      en: 'Can I start with just one module?',
      kh: 'តើខ្ញុំអាចចាប់ផ្តើមតែម៉ូឌុលមួយមុនបានទេ?',
    },
    answer: {
      en: 'Yes. Start with one domain (for example Payroll or Purchase Request), then enable additional modules as your operations expand.',
      kh: 'បាន។ អ្នកអាចចាប់ផ្តើមពីផ្នែកមួយ (ឧ. បៀវត្សរ៍ ឬ សំណើទិញ) បន្ទាប់មកបើកម៉ូឌុលបន្ថែមតាមការពង្រីកប្រតិបត្តិការ។',
    },
  },
  {
    question: {
      en: 'Is the approval workflow customizable?',
      kh: 'តើលំហូរការអនុម័តអាចកែតម្រូវបានទេ?',
    },
    answer: {
      en: 'Yes. Workflow definitions support dynamic steps and amount-based rules, with role-based access and full action history.',
      kh: 'បាន។ ការកំណត់ Workflow គាំទ្រជំហានបត់បែន និងច្បាប់ផ្អែកលើចំនួនទឹកប្រាក់ ជាមួយសិទ្ធិតាមតួនាទី និងប្រវត្តិសកម្មភាពពេញលេញ។',
    },
  },
  {
    question: {
      en: 'How secure is my data?',
      kh: 'តើទិន្នន័យរបស់ខ្ញុំមានសុវត្ថិភាពកម្រិតណា?',
    },
    answer: {
      en: 'Humaneti enforces role permissions, company scope controls, and full audit trails for key transactions and approvals.',
      kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី អនុវត្តសិទ្ធិតាមតួនាទី ការគ្រប់គ្រងវិសាលភាពក្រុមហ៊ុន និងប្រវត្តិត្រួតពិនិត្យពេញលេញសម្រាប់ប្រតិបត្តិការសំខាន់ៗ និងការអនុម័ត។',
    },
  },
  {
    question: {
      en: 'Where is our data stored after subscription, and what security controls are applied?',
      kh: 'បន្ទាប់ពីជាវរួច ទិន្នន័យរបស់យើងត្រូវរក្សាទុកនៅឯណា ហើយមានវិធានការសុវត្ថិភាពអ្វីខ្លះ?',
    },
    answer: {
      en: 'During onboarding, Humaneti confirms your data hosting scope, ownership, and access policy. Tenant company scope isolation, role-based permissions, and audit history are enforced in the system. We also align backup, retention/deletion, and export/handover terms in the service agreement so your team knows exactly how data is protected and managed.',
      kh: 'នៅដំណាក់កាល Onboarding ក្រុមហ៊ុន ហ៊ូម៉ាណេទី នឹងបញ្ជាក់អំពីវិសាលភាពទីតាំងរក្សាទុកទិន្នន័យ កម្មសិទ្ធិទិន្នន័យ និងគោលនយោបាយការចូលប្រើ។ ក្នុងប្រព័ន្ធ មានការបំបែកវិសាលភាពតាមក្រុមហ៊ុន សិទ្ធិតាមតួនាទី និងប្រវត្តិត្រួតពិនិត្យ។ ក៏មានការកំណត់អំពីការបម្រុងទុក ការរក្សាទុក/លុបទិន្នន័យ និងការនាំចេញ/ប្រគល់ទិន្នន័យ ក្នុងកិច្ចព្រមព្រៀងសេវាកម្ម ដើម្បីឱ្យក្រុមរបស់អ្នកយល់ច្បាស់ពីការការពារ និងការគ្រប់គ្រងទិន្នន័យ។',
    },
  },
  {
    question: {
      en: 'Do you offer training and support?',
      kh: 'តើមានការបណ្តុះបណ្តាល និងគាំទ្រឬទេ?',
    },
    answer: {
      en: 'Yes, we provide onboarding training, documentation, video tutorials, and ongoing support to ensure your team succeeds.',
      kh: 'មាន។ យើងផ្តល់ការបណ្តុះបណ្តាលដំបូង ឯកសារ វីដេអូណែនាំ និងការគាំទ្របន្ត ដើម្បីឱ្យក្រុមរបស់អ្នកប្រើប្រាស់បានជោគជ័យ។',
    },
  },
]

const activeFaq = ref(null)

const toggleFaq = (index) => {
  activeFaq.value = activeFaq.value === index ? null : index
}
</script>

<template>
  <div class="space-y-24">
    <!-- HERO SECTION -->
    <section class="grid gap-12 lg:grid-cols-2 lg:gap-16 items-center">
      <div class="space-y-8">
        <div>
          <UiBadge tone="neutral" class="mb-5">
            <span class="flex items-center gap-2">
              <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'HRM • PAYROLL • ASSETS • PURCHASE REQUESTS • EXPENSE CLAIM • PROJECTS', kh: 'HRM • បៀវត្សរ៍ • ទ្រព្យសម្បត្តិ • សំណើទិញ • ទាមទារចំណាយ • គម្រោង' }) }}
            </span>
          </UiBadge>

          <h1 class="text-4xl font-bold leading-[1.1] tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
            {{ t({ en: 'One Platform for', kh: 'វេទិកាតែមួយសម្រាប់' }) }}
            <span class="bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent"> {{ t({ en: 'People', kh: 'បុគ្គលិក' }) }}</span>,
            <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent"> {{ t({ en: 'Pay', kh: 'បៀវត្សរ៍' }) }}</span>,
            <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent"> {{ t({ en: 'Assets', kh: 'ទ្រព្យសម្បត្តិ' }) }}</span>,
            {{ t({ en: 'and', kh: 'និង' }) }} <span class="bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent">{{ t({ en: 'Purchasing', kh: 'លទ្ធកម្ម' }) }}</span>
          </h1>
        </div>

        <p class="text-lg leading-relaxed text-slate-600 sm:text-xl">
          {{ t({
            en: 'Humaneti streamlines people, payroll, assets, procurement, expense claims, and projects with clear approvals and complete traceability. Start with your current priority and expand without changing platforms.',
            kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ធ្វើឱ្យការងារបុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ការទាមទារចំណាយ និងគម្រោង មានភាពរលូនជាមួយការអនុម័តច្បាស់ និងការតាមដានពេញលេញ។ ចាប់ផ្តើមពីអាទិភាពរបស់អ្នក ហើយពង្រីកដោយមិនចាំបាច់ប្តូរវេទិកា។',
          }) }}
        </p>

        <div class="flex flex-wrap gap-4">
          <UiButton 
            as="router-link" 
            to="/contact" 
            variant="primary" 
            size="lg"
            class="shadow-lg shadow-slate-900/10 hover:shadow-xl hover:shadow-slate-900/20 transition-shadow"
          >
            {{ t({ en: 'Request Demo', kh: 'ស្នើសុំដេមូ' }) }}
            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </UiButton>
          <UiButton as="router-link" to="/product" variant="secondary" size="lg">
            {{ t({ en: 'Explore Features', kh: 'ស្វែងយល់មុខងារ' }) }}
          </UiButton>
        </div>

        <!-- Trust Indicators -->
        <div class="flex flex-wrap items-center gap-3 pt-4">
          <span class="text-xs font-semibold tracking-widest text-slate-500">{{ t({ en: 'TRUSTED BY', kh: 'ទទួលការជឿទុកចិត្តដោយ' }) }}</span>
          <div class="flex flex-wrap gap-2">
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">
              {{ t({ en: 'SMEs', kh: 'សហគ្រាស SME' }) }}
            </span>
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">
              {{ t({ en: 'NGOs', kh: 'អង្គការ NGO' }) }}
            </span>
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">{{ t({ en: 'Multi-Company Teams', kh: 'ក្រុមការងារច្រើនក្រុមហ៊ុន' }) }}</span>
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">{{ t({ en: 'Operations & Finance Units', kh: 'អង្គភាពប្រតិបត្តិការ និងហិរញ្ញវត្ថុ' }) }}</span>
          </div>
        </div>
      </div>

      <!-- Hero Visual -->
      <div class="relative">
        <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-indigo-500/20 via-violet-500/20 to-emerald-500/20 blur-2xl"></div>
        <div class="relative rounded-3xl border border-slate-200/80 bg-white/80 p-6 shadow-2xl backdrop-blur-sm sm:p-8">
          <div class="mb-6 flex items-center justify-between">
            <div class="space-y-1">
              <div class="text-sm font-semibold text-slate-900">{{ t({ en: 'Humaneti Platform', kh: 'វេទិកា ក្រុមហ៊ុន ហ៊ូម៉ាណេទី' }) }}</div>
              <div class="text-xs text-slate-500">{{ t({ en: 'Integrated workflow modules', kh: 'ម៉ូឌុលលំហូរការងាររួមបញ្ចូល' }) }}</div>
            </div>
            <div class="rounded-lg bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
              {{ t({ en: 'All-in-One', kh: 'គ្រប់យ៉ាងក្នុងតែមួយ' }) }}
            </div>
          </div>

          <div class="space-y-3">
            <div 
              v-for="(feature, idx) in features" 
              :key="idx"
              class="group rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition-all hover:shadow-md hover:border-slate-300"
            >
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 rounded-lg bg-gradient-to-br from-slate-900 to-slate-700 p-2.5 text-white shadow-md group-hover:scale-105 transition-transform">
                  <span v-html="`<svg viewBox='0 0 24 24' class='h-5 w-5'>${feature.icon}</svg>`"></span>
                </div>
                <div class="min-w-0 flex-1">
                  <div class="font-semibold text-slate-900">{{ t(feature.title) }}</div>
                  <div class="mt-1 text-xs leading-relaxed text-slate-600">
                    {{ t(feature.preview || feature.description) }}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50/50 p-4">
            <div class="mb-2 flex items-center gap-2 text-xs font-semibold tracking-widest text-emerald-900">
              <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'KEY BENEFITS', kh: 'អត្ថប្រយោជន៍សំខាន់' }) }}
            </div>
            <div class="text-sm text-slate-700">
              {{ t({ en: 'Consistent approvals • Role-based access • Complete audit trail • Seamless integration', kh: 'អនុម័តស្របស្តង់ដារ • សិទ្ធិតាមតួនាទី • ប្រវត្តិត្រួតពិនិត្យពេញលេញ • ការរួមបញ្ចូលរលូន' }) }}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- STATS SECTION -->
    <section>
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="stat in stats" 
          :key="stat.label"
          class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-gradient-to-br from-slate-900/5 to-transparent blur-2xl transition-transform group-hover:scale-110"></div>
          <div class="relative">
            <div class="mb-3 inline-flex rounded-lg bg-slate-100 p-2.5 text-slate-700">
              <span v-html="`<svg viewBox='0 0 24 24' class='h-5 w-5'>${stat.icon}</svg>`"></span>
            </div>
            <div class="text-3xl font-bold text-slate-900">{{ t(stat.value) }}</div>
            <div class="mt-1 text-sm font-medium text-slate-600">{{ t(stat.label) }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- FEATURES SECTION -->
    <section>
      <UiSection
        :kicker="t({ en: 'COMPLETE SOLUTION', kh: 'ដំណោះស្រាយពេញលេញ' })"
        :title="t({ en: 'Everything you need to manage your operations', kh: 'អ្វីៗគ្រប់យ៉ាងដែលអ្នកត្រូវការសម្រាប់គ្រប់គ្រងប្រតិបត្តិការ' })"
        :subtitle="t({ en: 'Integrated modules for HR, payroll, assets, procurement, expense claims, and projects with consistent approvals across your organization.', kh: 'ម៉ូឌុលរួមបញ្ចូលសម្រាប់ HR បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ការទាមទារចំណាយ និងគម្រោង ជាមួយការអនុម័តស្របគ្នាទូទាំងអង្គការ។' })"
      />

      <div class="mt-12 grid gap-8 lg:grid-cols-2">
        <div 
          v-for="(feature, idx) in features" 
          :key="idx"
          class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all hover:shadow-xl"
        >
          <div class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-gradient-to-br from-indigo-500/10 to-transparent blur-3xl transition-transform group-hover:scale-125"></div>
          
          <div class="relative">
            <div class="mb-4 inline-flex rounded-xl bg-gradient-to-br from-slate-900 to-slate-700 p-3 text-white shadow-lg">
              <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${feature.icon}</svg>`"></span>
            </div>

            <h3 class="text-2xl font-bold text-slate-900">{{ t(feature.title) }}</h3>
            <p class="mt-3 text-slate-600 leading-relaxed">{{ t(feature.description) }}</p>

            <ul class="mt-6 grid gap-3 sm:grid-cols-2">
              <li 
                v-for="benefit in feature.benefits" 
                :key="benefit"
                class="flex items-center gap-2 text-sm text-slate-700"
              >
                <svg class="h-5 w-5 flex-shrink-0 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ t(benefit) }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- VALUE PROPS -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <UiSection
        :kicker="t({ en: 'WHY HUMANETI', kh: 'ហេតុអ្វី ក្រុមហ៊ុន ហ៊ូម៉ាណេទី' })"
        :title="t({ en: 'Built for teams that value clarity and control', kh: 'បង្កើតឡើងសម្រាប់ក្រុមដែលអោយតម្លៃលើភាពច្បាស់ និងការគ្រប់គ្រង' })"
        :subtitle="t({ en: 'Professional workflows without enterprise complexity. Start simple, scale smart.', kh: 'លំហូរការងារមានវិជ្ជាជីវៈ ដោយគ្មានភាពស្មុគស្មាញលើសចាំបាច់។ ចាប់ផ្តើមសាមញ្ញ ពង្រីកឆ្លាតវៃ។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        <UiCard class="border-slate-200 bg-white">
          <div class="mb-4 inline-flex rounded-lg bg-indigo-100 p-3 text-indigo-600">
            <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${icons.shield}</svg>`"></span>
          </div>
          <h3 class="text-lg font-semibold text-slate-900">{{ t({ en: 'Role-Based Access', kh: 'សិទ្ធិតាមតួនាទី' }) }}</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">
            {{ t({ en: 'Precise permissions and structured approvals keep every action consistent and authorized.', kh: 'សិទ្ធិកំណត់ច្បាស់ និងការអនុម័តមានរចនាសម្ព័ន្ធ ធានាថាសកម្មភាពគ្រប់យ៉ាងស្របស្តង់ដារ និងមានសិទ្ធិ។' }) }}
          </p>
        </UiCard>

        <UiCard class="border-slate-200 bg-white">
          <div class="mb-4 inline-flex rounded-lg bg-emerald-100 p-3 text-emerald-600">
            <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${icons.audit}</svg>`"></span>
          </div>
          <h3 class="text-lg font-semibold text-slate-900">{{ t({ en: 'Complete Traceability', kh: 'ការតាមដានពេញលេញ' }) }}</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">
            {{ t({ en: 'Every change tracked and timestamped for compliance, audits, and organizational transparency.', kh: 'រាល់ការកែប្រែត្រូវបានតាមដាន និងកត់ពេលវេលា សម្រាប់អនុលោម សវនកម្ម និងភាពថ្លៃថ្នូរអង្គការ។' }) }}
          </p>
        </UiCard>

        <UiCard class="border-slate-200 bg-white">
          <div class="mb-4 inline-flex rounded-lg bg-violet-100 p-3 text-violet-600">
            <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${icons.workflow}</svg>`"></span>
          </div>
          <h3 class="text-lg font-semibold text-slate-900">{{ t({ en: 'Streamlined Workflows', kh: 'លំហូរការងាររលូន' }) }}</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">
            {{ t({ en: 'Standard processes reduce delays, eliminate confusion, and accelerate decision-making.', kh: 'ដំណើរការស្តង់ដារកាត់បន្ថយការយឺតយ៉ាវ កាត់បន្ថយភាពច្របូកច្របល់ និងបង្កើនល្បឿនសម្រេចចិត្ត។' }) }}
          </p>
        </UiCard>
      </div>
    </section>

    <!-- USE CASES -->
    <section>
      <UiSection
        :kicker="t({ en: 'PERFECT FOR', kh: 'សមស្របសម្រាប់' })"
        :title="t({ en: 'Solutions tailored to your organization type', kh: 'ដំណោះស្រាយសមស្របតាមប្រភេទអង្គការរបស់អ្នក' })"
        :subtitle="t({ en: 'Whether you are a startup, NGO, or enterprise, Humaneti adapts to your needs.', kh: 'មិនថាអ្នកជាអាជីវកម្មចាប់ផ្តើម NGO ឬសហគ្រាស ក្រុមហ៊ុន ហ៊ូម៉ាណេទី អាចបត់បែនតាមតម្រូវការរបស់អ្នក។' })"
      />

      <div class="mt-12 grid gap-6 lg:grid-cols-3">
        <div 
          v-for="useCase in useCases" 
          :key="useCase.type"
          class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all hover:shadow-xl hover:border-slate-300"
        >
          <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-1.5 text-xs font-semibold text-slate-700">
            {{ t(useCase.typeLabel || useCase.type) }}
          </div>
          <h3 class="text-xl font-bold text-slate-900">{{ t(useCase.title) }}</h3>
          <p class="mt-3 text-slate-600 leading-relaxed">{{ t(useCase.description) }}</p>
          
          <ul class="mt-6 space-y-2">
            <li 
              v-for="highlight in useCase.highlights" 
              :key="highlight"
              class="flex items-center gap-2 text-sm text-slate-700"
            >
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              {{ t(highlight) }}
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- TESTIMONIALS -->
    <section>
      <UiSection
        :kicker="t({ en: 'CUSTOMER STORIES', kh: 'បទពិសោធន៍អតិថិជន' })"
        :title="t({ en: 'What teams say about Humaneti', kh: 'អ្វីដែលក្រុមការងារនិយាយអំពី ក្រុមហ៊ុន ហ៊ូម៉ាណេទី' })"
        :subtitle="t({ en: 'Real feedback from organizations that transformed their operations.', kh: 'មតិយោបល់ពិតពីអង្គការដែលបានផ្លាស់ប្តូរប្រតិបត្តិការ។' })"
      />

      <div class="mt-12 grid gap-8 lg:grid-cols-3">
        <div 
          v-for="testimonial in testimonials" 
          :key="testimonial.name"
          class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all hover:shadow-lg"
        >
          <div class="mb-6 flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-slate-900 to-slate-700 text-2xl text-white shadow-lg">
              {{ testimonial.avatar }}
            </div>
            <div>
              <div class="font-semibold text-slate-900">{{ testimonial.name }}</div>
              <div class="text-sm text-slate-600">{{ t(testimonial.role) }}</div>
            </div>
          </div>
          
          <blockquote class="text-slate-700 leading-relaxed">
            "{{ t(testimonial.quote) }}"
          </blockquote>
          
          <div class="mt-4 text-sm font-medium text-slate-500">
            — {{ t(testimonial.company) }}
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ SECTION -->
    <section>
      <UiSection
        :kicker="t({ en: 'COMMON QUESTIONS', kh: 'សំណួរដែលសួរញឹកញាប់' })"
        :title="t({ en: 'Frequently asked questions', kh: 'សំណួរដែលសួរញឹកញាប់' })"
        :subtitle="t({ en: 'Everything you need to know about Humaneti.', kh: 'អ្វីៗដែលអ្នកត្រូវដឹងអំពី ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។' })"
      />

      <div class="mt-12 mx-auto max-w-3xl">
        <div class="space-y-4">
          <div 
            v-for="(faq, idx) in faqs" 
            :key="idx"
            class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden transition-all"
            :class="activeFaq === idx ? 'ring-2 ring-slate-900/5' : ''"
          >
            <button
              @click="toggleFaq(idx)"
              class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-slate-50 transition-colors"
              :id="`home-faq-trigger-${idx}`"
              :aria-expanded="activeFaq === idx ? 'true' : 'false'"
              :aria-controls="`home-faq-panel-${idx}`"
            >
              <span class="font-semibold text-slate-900">{{ t(faq.question) }}</span>
              <svg 
                class="h-5 w-5 flex-shrink-0 text-slate-400 transition-transform"
                :class="activeFaq === idx ? 'rotate-180' : ''"
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
                :id="`home-faq-panel-${idx}`"
                role="region"
                :aria-labelledby="`home-faq-trigger-${idx}`"
                v-show="activeFaq === idx"
                class="px-6 pb-5 text-slate-600 leading-relaxed"
              >
                {{ t(faq.answer) }}
              </div>
            </Transition>
          </div>
        </div>
      </div>
    </section>

    <!-- FINAL CTA -->
    <section>
      <div class="relative overflow-hidden rounded-[2rem] border border-slate-900 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-12 text-white shadow-2xl lg:p-16">
        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-emerald-500/20 blur-3xl"></div>
        
        <div class="relative mx-auto max-w-3xl text-center">
          <h2 class="text-3xl font-bold leading-tight sm:text-4xl lg:text-5xl">
            {{ t({ en: 'Ready to transform your operations?', kh: 'ត្រៀមខ្លួនផ្លាស់ប្តូរប្រតិបត្តិការរបស់អ្នកហើយឬនៅ?' }) }}
          </h2>
          <p class="mt-4 text-lg leading-relaxed text-slate-300">
            {{ t({ en: 'Use Humaneti to run HR, payroll, assets, procurement, expense claims, and projects with one consistent workflow model. Start with one area and expand based on your rollout plan.', kh: 'ប្រើ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ដើម្បីដំណើរការ HR បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ការទាមទារចំណាយ និងគម្រោង ជាមួយគំរូលំហូរការងារស្របគ្នា។ ចាប់ផ្តើមពីផ្នែកមួយ ហើយពង្រីកតាមផែនការអនុវត្តរបស់អ្នក។' }) }}
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton 
              as="router-link" 
              to="/contact" 
              variant="secondary" 
              size="lg"
              class="shadow-xl"
            >
              {{ t({ en: 'Schedule a Demo', kh: 'កំណត់ពេលដេមូ' }) }}
              <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </UiButton>
            <UiButton 
              as="router-link" 
              to="/pricing" 
              variant="ghost" 
              size="lg"
              class="!text-white hover:!bg-white/10 border border-white/20"
            >
              {{ t({ en: 'View Pricing', kh: 'មើលតម្លៃ' }) }}
            </UiButton>
          </div>

          <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm text-slate-400">
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'Tenant-based controls', kh: 'ការគ្រប់គ្រងតាមតេណង់' }) }}
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'Workflow approvals', kh: 'ការអនុម័តតាមលំហូរការងារ' }) }}
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'Audit-ready history', kh: 'ប្រវត្តិត្រៀមសវនកម្ម' }) }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
