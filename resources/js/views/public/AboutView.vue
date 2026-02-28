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
    'ការអនុម័តថ្លៃថ្នូរ និងប្រវត្តិសវនកម្មពេញលេញ បង្កើតការទទួលខុសត្រូវ និងទំនុកចិត្ត។',
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
    icon: '🎯'
  },
  {
    title: 'Modular & Flexible',
    description: 'Start with what you need today. Add modules as you grow. No forced bundles or unnecessary features.',
    icon: '🧩'
  },
  {
    title: 'Built for Trust',
    description: 'Transparent approvals and complete audit trails create accountability and confidence.',
    icon: '🤝'
  },
  {
    title: 'Local First',
    description: 'Designed for Southeast Asian businesses with understanding of local regulations and practices.',
    icon: '🌏'
  }
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

const stats = [
  { label: 'Core Domains', value: 'People + Payroll + Operations' },
  { label: 'Workflow Model', value: 'Dynamic approvals' },
  { label: 'Access Model', value: 'Role + Company scope' },
  { label: 'Implementation Focus', value: 'SME & NGO' }
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
            {{ t({ en: 'Many teams struggle with unclear approvals, scattered ownership, and lost records. Humaneti brings these critical actions into one workflow-driven platform across People, Payroll, Assets, Purchase Requests, Expense Claims, and Projects.', kh: 'ក្រុមជាច្រើនជួបបញ្ហាការអនុម័តមិនច្បាស់ ភាពទទួលខុសត្រូវបែកបាក់ និងកំណត់ត្រាបាត់បង់។ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី រួមបញ្ចូលសកម្មភាពសំខាន់ទាំងនេះទៅក្នុងវេទិកាមួយដែលដំណើរការតាមលំហូរការងារ។' }) }}
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
                :key="stat.label"
                class="rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center"
              >
                <div class="text-3xl font-bold text-slate-900">{{ tx(stat.value) }}</div>
                <div class="mt-1 text-sm text-slate-600">{{ tx(stat.label) }}</div>
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
            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-slate-100 text-2xl">
              {{ principle.icon }}
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
