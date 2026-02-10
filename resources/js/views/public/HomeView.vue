<script setup>
import { ref } from 'vue'
import UiButton from '@/components/UiButton.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiSection from '@/components/UiSection.vue'
import { icons } from '@/components/icons'

const stats = [
  { label: 'Active Users', value: '500+', icon: icons.people },
  { label: 'Payroll Cycles', value: '10K+', icon: icons.money },
  { label: 'Assets Tracked', value: '5K+', icon: icons.box },
  { label: 'Approvals/Month', value: '2K+', icon: icons.workflow }
]

const features = [
  {
    icon: icons.people,
    title: 'Human Resource Management',
    description: 'Complete employee lifecycle management with attendance tracking, leave management, performance reviews, and comprehensive HR analytics.',
    benefits: ['Employee records', 'Attendance tracking', 'Leave management', 'Performance reviews']
  },
  {
    icon: icons.money,
    title: 'Payroll Processing',
    description: 'Automated payroll calculations with multi-step approvals, tax management, and instant payslip delivery to employees.',
    benefits: ['Automated calculations', 'Tax compliance', 'Multi-step approvals', 'Payslip delivery']
  },
  {
    icon: icons.box,
    title: 'Asset Management',
    description: 'Track asset assignments, monitor lifecycle status, manage custody transfers, and maintain complete asset history.',
    benefits: ['Asset tracking', 'Custody management', 'Lifecycle monitoring', 'Full audit trail']
  },
  {
    icon: icons.cart,
    title: 'Purchase Requests',
    description: 'Streamlined PR workflow with approval chains, budget tracking, vendor management, and complete documentation.',
    benefits: ['Approval workflows', 'Budget control', 'Vendor management', 'Documentation']
  }
]

const useCases = [
  {
    type: 'SME',
    title: 'Small & Medium Enterprises',
    description: 'Scale your operations with professional HR and payroll processes without enterprise complexity.',
    highlights: ['Quick setup', 'Affordable pricing', 'Essential features']
  },
  {
    type: 'NGO',
    title: 'Non-Profit Organizations',
    description: 'Transparent workflows and audit trails that meet donor requirements and compliance standards.',
    highlights: ['Grant compliance', 'Donor reporting', 'Audit-ready']
  },
  {
    type: 'Enterprise',
    title: 'Multi-Department Teams',
    description: 'Unified platform for all departments with role-based access and centralized approval management.',
    highlights: ['Departmental control', 'Unified platform', 'Advanced permissions']
  }
]

const testimonials = [
  {
    quote: 'Humaneti transformed our HR operations. Approvals are crystal clear, and we can finally track who approved what and when. No more email chains!',
    name: 'Sophal Chen',
    role: 'Operations Manager',
    company: 'Tech SME, Phnom Penh',
    avatar: '💼'
  },
  {
    quote: 'The payroll workflow is so much easier now. Fewer mistakes, faster confirmations, and our team actually understands the approval process.',
    name: 'Dara Sok',
    role: 'HR & Admin Lead',
    company: 'International NGO',
    avatar: '👨‍💼'
  },
  {
    quote: 'Asset tracking used to be a nightmare. Now we have complete custody history that eliminated disputes and improved accountability across all sites.',
    name: 'Ponleak Heng',
    role: 'IT Supervisor',
    company: 'Multi-Site Manufacturing',
    avatar: '👩‍💻'
  }
]

const faqs = [
  {
    question: 'Can I start with just one module?',
    answer: 'Yes! Start with HRM or Payroll, then add other modules as you grow. All modules integrate seamlessly.'
  },
  {
    question: 'Is the approval workflow customizable?',
    answer: 'Absolutely. Configure approval chains, set up role-based permissions, and customize workflows to match your organization structure.'
  },
  {
    question: 'How secure is my data?',
    answer: 'Enterprise-grade security with encrypted data storage, role-based access control, and comprehensive audit trails for all actions.'
  },
  {
    question: 'Do you offer training and support?',
    answer: 'Yes, we provide onboarding training, documentation, video tutorials, and ongoing support to ensure your team succeeds.'
  }
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
              HRM • PAYROLL • ASSETS • PURCHASE REQUESTS
            </span>
          </UiBadge>

          <h1 class="text-4xl font-bold leading-[1.1] tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
            One Platform for
            <span class="bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent"> People</span>,
            <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent"> Pay</span>,
            <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent"> Assets</span>,
            and <span class="bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent">Purchasing</span>
          </h1>
        </div>

        <p class="text-lg leading-relaxed text-slate-600 sm:text-xl">
          Humaneti streamlines your operations with clean workflows, trusted approvals, and complete traceability. 
          Start with what you need now, scale into a complete business operations platform.
        </p>

        <div class="flex flex-wrap gap-4">
          <UiButton 
            as="router-link" 
            to="/contact" 
            variant="primary" 
            size="lg"
            class="shadow-lg shadow-slate-900/10 hover:shadow-xl hover:shadow-slate-900/20 transition-shadow"
          >
            Request Demo
            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </UiButton>
          <UiButton as="router-link" to="/product" variant="secondary" size="lg">
            Explore Features
          </UiButton>
        </div>

        <!-- Trust Indicators -->
        <div class="flex flex-wrap items-center gap-3 pt-4">
          <span class="text-xs font-semibold tracking-widest text-slate-500">TRUSTED BY</span>
          <div class="flex flex-wrap gap-2">
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">SMEs</span>
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">NGOs</span>
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">Factories</span>
            <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700 shadow-sm">Multi-Department Teams</span>
          </div>
        </div>
      </div>

      <!-- Hero Visual -->
      <div class="relative">
        <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-indigo-500/20 via-violet-500/20 to-emerald-500/20 blur-2xl"></div>
        <div class="relative rounded-3xl border border-slate-200/80 bg-white/80 p-6 shadow-2xl backdrop-blur-sm sm:p-8">
          <div class="mb-6 flex items-center justify-between">
            <div class="space-y-1">
              <div class="text-sm font-semibold text-slate-900">Humaneti Platform</div>
              <div class="text-xs text-slate-500">Integrated workflow modules</div>
            </div>
            <div class="rounded-lg bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
              All-in-One
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
                  <div class="font-semibold text-slate-900">{{ feature.title }}</div>
                  <div class="mt-1 text-xs leading-relaxed text-slate-600">
                    {{ feature.description.split('.')[0] }}.
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
              KEY BENEFITS
            </div>
            <div class="text-sm text-slate-700">
              Consistent approvals • Role-based access • Complete audit trail • Seamless integration
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
            <div class="text-3xl font-bold text-slate-900">{{ stat.value }}</div>
            <div class="mt-1 text-sm font-medium text-slate-600">{{ stat.label }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- FEATURES SECTION -->
    <section>
      <UiSection
        kicker="COMPLETE SOLUTION"
        title="Everything you need to manage your operations"
        subtitle="Four powerful modules that work together seamlessly, with consistent workflows and unified approvals across your entire organization."
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

            <h3 class="text-2xl font-bold text-slate-900">{{ feature.title }}</h3>
            <p class="mt-3 text-slate-600 leading-relaxed">{{ feature.description }}</p>

            <ul class="mt-6 grid gap-3 sm:grid-cols-2">
              <li 
                v-for="benefit in feature.benefits" 
                :key="benefit"
                class="flex items-center gap-2 text-sm text-slate-700"
              >
                <svg class="h-5 w-5 flex-shrink-0 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ benefit }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- VALUE PROPS -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <UiSection
        kicker="WHY HUMANETI"
        title="Built for teams that value clarity and control"
        subtitle="Professional workflows without enterprise complexity. Start simple, scale smart."
      />

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        <UiCard class="border-slate-200 bg-white">
          <div class="mb-4 inline-flex rounded-lg bg-indigo-100 p-3 text-indigo-600">
            <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${icons.shield}</svg>`"></span>
          </div>
          <h3 class="text-lg font-semibold text-slate-900">Role-Based Access</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">
            Precise permissions and structured approvals keep every action consistent and authorized.
          </p>
        </UiCard>

        <UiCard class="border-slate-200 bg-white">
          <div class="mb-4 inline-flex rounded-lg bg-emerald-100 p-3 text-emerald-600">
            <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${icons.audit}</svg>`"></span>
          </div>
          <h3 class="text-lg font-semibold text-slate-900">Complete Traceability</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">
            Every change tracked and timestamped for compliance, audits, and organizational transparency.
          </p>
        </UiCard>

        <UiCard class="border-slate-200 bg-white">
          <div class="mb-4 inline-flex rounded-lg bg-violet-100 p-3 text-violet-600">
            <span v-html="`<svg viewBox='0 0 24 24' class='h-6 w-6'>${icons.workflow}</svg>`"></span>
          </div>
          <h3 class="text-lg font-semibold text-slate-900">Streamlined Workflows</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">
            Standard processes reduce delays, eliminate confusion, and accelerate decision-making.
          </p>
        </UiCard>
      </div>
    </section>

    <!-- USE CASES -->
    <section>
      <UiSection
        kicker="PERFECT FOR"
        title="Solutions tailored to your organization type"
        subtitle="Whether you're a startup, NGO, or enterprise, Humaneti adapts to your needs."
      />

      <div class="mt-12 grid gap-6 lg:grid-cols-3">
        <div 
          v-for="useCase in useCases" 
          :key="useCase.type"
          class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all hover:shadow-xl hover:border-slate-300"
        >
          <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-1.5 text-xs font-semibold text-slate-700">
            {{ useCase.type }}
          </div>
          <h3 class="text-xl font-bold text-slate-900">{{ useCase.title }}</h3>
          <p class="mt-3 text-slate-600 leading-relaxed">{{ useCase.description }}</p>
          
          <ul class="mt-6 space-y-2">
            <li 
              v-for="highlight in useCase.highlights" 
              :key="highlight"
              class="flex items-center gap-2 text-sm text-slate-700"
            >
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              {{ highlight }}
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- TESTIMONIALS -->
    <section>
      <UiSection
        kicker="CUSTOMER STORIES"
        title="What teams say about Humaneti"
        subtitle="Real feedback from organizations that transformed their operations."
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
              <div class="text-sm text-slate-600">{{ testimonial.role }}</div>
            </div>
          </div>
          
          <blockquote class="text-slate-700 leading-relaxed">
            "{{ testimonial.quote }}"
          </blockquote>
          
          <div class="mt-4 text-sm font-medium text-slate-500">
            — {{ testimonial.company }}
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ SECTION -->
    <section>
      <UiSection
        kicker="COMMON QUESTIONS"
        title="Frequently asked questions"
        subtitle="Everything you need to know about Humaneti."
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
            >
              <span class="font-semibold text-slate-900">{{ faq.question }}</span>
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
              <div v-show="activeFaq === idx" class="px-6 pb-5 text-slate-600 leading-relaxed">
                {{ faq.answer }}
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
            Ready to transform your operations?
          </h2>
          <p class="mt-4 text-lg leading-relaxed text-slate-300">
            Join forward-thinking organizations using Humaneti to streamline HR, payroll, assets, and purchasing. 
            Start with one module or go all-in—either way, you'll have a platform that grows with you.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton 
              as="router-link" 
              to="/contact" 
              variant="secondary" 
              size="lg"
              class="shadow-xl"
            >
              Schedule a Demo
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
              View Pricing
            </UiButton>
          </div>

          <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm text-slate-400">
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              No credit card required
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              Free training included
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              Cancel anytime
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>