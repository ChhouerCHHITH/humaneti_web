<script setup>
import { ref } from 'vue'
import UiSection from '@/components/UiSection.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { icons } from '@/components/icons'

const billingCycle = ref('monthly')

const plans = [
  {
    name: 'Starter',
    tagline: 'Perfect for small teams',
    price: { monthly: 'Contact', annual: 'Contact' },
    description: 'Start with essential workflows and basic approvals.',
    features: [
      { text: 'Choose 1-2 core modules', included: true },
      { text: 'Up to 25 users', included: true },
      { text: 'Standard approval workflows', included: true },
      { text: 'Basic reporting & exports', included: true },
      { text: 'Email support', included: true },
      { text: 'Mobile app access', included: true },
      { text: 'Advanced permissions', included: false },
      { text: 'Custom approval rules', included: false },
      { text: 'API access', included: false },
      { text: 'Priority support', included: false }
    ],
    cta: 'Start with Starter',
    highlight: false,
    popular: false
  },
  {
    name: 'Business',
    tagline: 'Most popular choice',
    price: { monthly: 'Contact', annual: 'Contact' },
    description: 'Complete platform with advanced controls and full support.',
    features: [
      { text: 'All 4 core modules', included: true },
      { text: 'Up to 100 users', included: true },
      { text: 'Multi-step approval workflows', included: true },
      { text: 'Advanced reporting & analytics', included: true },
      { text: 'Priority email & chat support', included: true },
      { text: 'Mobile app access', included: true },
      { text: 'Role-based permissions', included: true },
      { text: 'Audit-ready activity logs', included: true },
      { text: 'Implementation guidance', included: true },
      { text: 'Onboarding & training', included: true }
    ],
    cta: 'Choose Business',
    highlight: true,
    popular: true
  },
  {
    name: 'Enterprise',
    tagline: 'For complex organizations',
    price: { monthly: 'Custom', annual: 'Custom' },
    description: 'Custom solutions for multi-department teams.',
    features: [
      { text: 'All modules + custom features', included: true },
      { text: 'Unlimited users', included: true },
      { text: 'Custom approval rules', included: true },
      { text: 'Custom reports & dashboards', included: true },
      { text: 'Dedicated account manager', included: true },
      { text: 'Mobile app access', included: true },
      { text: 'Advanced security controls', included: true },
      { text: 'SLA guarantees', included: true },
      { text: 'API access & integrations', included: true },
      { text: 'White-label options', included: true }
    ],
    cta: 'Contact Sales',
    highlight: false,
    popular: false
  }
]

const implementationServices = [
  {
    icon: '🎯',
    title: 'Workflow Mapping',
    description: 'We work with your team to define roles, approval steps, and responsibilities for each module.'
  },
  {
    icon: '📊',
    title: 'Data Migration',
    description: 'Support for importing existing data with templates and validation to ensure clean records.'
  },
  {
    icon: '👥',
    title: 'Team Training',
    description: 'Comprehensive training for admins and end users with documentation and video guides.'
  },
  {
    icon: '🚀',
    title: 'Go-Live Support',
    description: 'Pilot testing, refinement, and full rollout with dedicated support during transition.'
  }
]

const comparison = [
  {
    category: 'Core Features',
    features: [
      { name: 'HRM Module', starter: true, business: true, enterprise: true },
      { name: 'Payroll Module', starter: true, business: true, enterprise: true },
      { name: 'Asset Management', starter: true, business: true, enterprise: true },
      { name: 'Purchase Requests', starter: true, business: true, enterprise: true },
      { name: 'Mobile Access', starter: true, business: true, enterprise: true }
    ]
  },
  {
    category: 'Users & Permissions',
    features: [
      { name: 'User Limit', starter: '25', business: '100', enterprise: 'Unlimited' },
      { name: 'Role-Based Access', starter: false, business: true, enterprise: true },
      { name: 'Department Permissions', starter: false, business: true, enterprise: true },
      { name: 'Custom Permission Sets', starter: false, business: false, enterprise: true }
    ]
  },
  {
    category: 'Workflows & Approvals',
    features: [
      { name: 'Basic Approvals', starter: true, business: true, enterprise: true },
      { name: 'Multi-Step Workflows', starter: false, business: true, enterprise: true },
      { name: 'Conditional Rules', starter: false, business: true, enterprise: true },
      { name: 'Custom Approval Logic', starter: false, business: false, enterprise: true }
    ]
  },
  {
    category: 'Support & Services',
    features: [
      { name: 'Email Support', starter: true, business: true, enterprise: true },
      { name: 'Priority Support', starter: false, business: true, enterprise: true },
      { name: 'Dedicated Account Manager', starter: false, business: false, enterprise: true },
      { name: 'SLA Guarantee', starter: false, business: false, enterprise: true }
    ]
  }
]

const faqs = [
  {
    q: 'How is pricing calculated?',
    a: 'Pricing is based on the number of users, modules selected, and level of customization needed. Contact us for a detailed quote tailored to your organization.'
  },
  {
    q: 'Can I start with one module and add more later?',
    a: 'Absolutely! Our modular approach allows you to start with what you need and seamlessly add modules as your requirements grow.'
  },
  {
    q: 'What\'s included in implementation?',
    a: 'Implementation includes workflow mapping, data migration support, role configuration, team training, and go-live assistance. The scope varies by plan.'
  },
  {
    q: 'Is there a setup fee?',
    a: 'Setup fees depend on the complexity of your implementation. Simple setups may have minimal fees, while custom configurations are quoted separately.'
  },
  {
    q: 'Do you offer discounts for annual billing?',
    a: 'Yes, we offer significant discounts for annual commitments. Contact our sales team for specific pricing details.'
  },
  {
    q: 'What happens if I need to cancel?',
    a: 'We offer flexible terms with no long-term lock-in on most plans. Enterprise plans may have different terms based on customization level.'
  }
]

const activeFaq = ref(null)

const toggleFaq = (index) => {
  activeFaq.value = activeFaq.value === index ? null : index
}
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">PRICING</UiBadge>
      
      <UiSection
        kicker="TRANSPARENT PRICING"
        title="Simple plans that grow with you"
        subtitle="Start with what you need today. Scale seamlessly as your organization grows. No hidden fees, no surprises."
      />

      <!-- Billing Toggle (for future use) -->
      <!-- <div class="mt-8 flex justify-center">
        <div class="inline-flex rounded-lg border border-slate-200 bg-slate-100 p-1">
          <button
            @click="billingCycle = 'monthly'"
            :class="[
              'rounded-md px-4 py-2 text-sm font-medium transition-all',
              billingCycle === 'monthly'
                ? 'bg-white text-slate-900 shadow-sm'
                : 'text-slate-600 hover:text-slate-900'
            ]"
          >
            Monthly
          </button>
          <button
            @click="billingCycle = 'annual'"
            :class="[
              'rounded-md px-4 py-2 text-sm font-medium transition-all',
              billingCycle === 'annual'
                ? 'bg-white text-slate-900 shadow-sm'
                : 'text-slate-600 hover:text-slate-900'
            ]"
          >
            Annual
            <span class="ml-1 text-xs text-emerald-600">(Save 20%)</span>
          </button>
        </div>
      </div> -->
    </section>

    <!-- Pricing Cards -->
    <section>
      <div class="grid gap-8 lg:grid-cols-3">
        <div 
          v-for="plan in plans" 
          :key="plan.name"
          :class="[
            'relative rounded-3xl border p-8 transition-all',
            plan.highlight
              ? 'border-slate-900 bg-slate-900 text-white shadow-2xl lg:-mt-4 lg:scale-105'
              : 'border-slate-200 bg-white shadow-sm hover:shadow-lg'
          ]"
        >
          <!-- Popular Badge -->
          <div v-if="plan.popular" class="absolute -top-4 left-1/2 -translate-x-1/2">
            <div class="inline-flex items-center gap-1 rounded-full bg-gradient-to-r from-indigo-600 to-violet-600 px-4 py-1 text-xs font-semibold text-white shadow-lg">
              <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              Most Popular
            </div>
          </div>

          <div>
            <h3 :class="['text-2xl font-bold', plan.highlight ? 'text-white' : 'text-slate-900']">
              {{ plan.name }}
            </h3>
            <p :class="['mt-2 text-sm', plan.highlight ? 'text-slate-300' : 'text-slate-600']">
              {{ plan.tagline }}
            </p>
          </div>

          <div class="mt-6">
            <div :class="['text-4xl font-bold', plan.highlight ? 'text-white' : 'text-slate-900']">
              {{ plan.price[billingCycle] }}
            </div>
            <p :class="['mt-1 text-sm', plan.highlight ? 'text-slate-300' : 'text-slate-500']">
              {{ plan.price[billingCycle] === 'Contact' || plan.price[billingCycle] === 'Custom' 
                  ? 'Custom pricing based on needs' 
                  : 'per month, billed annually' }}
            </p>
          </div>

          <p :class="['mt-6 text-sm leading-relaxed', plan.highlight ? 'text-slate-300' : 'text-slate-600']">
            {{ plan.description }}
          </p>

          <ul class="mt-8 space-y-3">
            <li 
              v-for="feature in plan.features" 
              :key="feature.text"
              class="flex items-start gap-3 text-sm"
            >
              <svg 
                v-if="feature.included"
                :class="['h-5 w-5 flex-shrink-0', plan.highlight ? 'text-emerald-400' : 'text-emerald-600']"
                fill="currentColor" 
                viewBox="0 0 20 20"
              >
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              <svg 
                v-else
                :class="['h-5 w-5 flex-shrink-0', plan.highlight ? 'text-slate-500' : 'text-slate-300']"
                fill="currentColor" 
                viewBox="0 0 20 20"
              >
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
              </svg>
              <span :class="feature.included ? '' : 'text-slate-400'">
                {{ feature.text }}
              </span>
            </li>
          </ul>

          <div class="mt-8">
            <UiButton 
              as="router-link" 
              to="/contact" 
              :variant="plan.highlight ? 'secondary' : 'primary'"
              class="w-full"
              size="lg"
            >
              {{ plan.cta }}
            </UiButton>
          </div>
        </div>
      </div>

      <p class="mt-8 text-center text-sm text-slate-600">
        All plans include SSL security, regular updates, and data backup. 
        <RouterLink to="/contact" class="font-medium text-indigo-600 hover:text-indigo-700">Contact us</RouterLink> for volume discounts.
      </p>
    </section>

    <!-- Implementation Services -->
    <section>
      <UiSection
        kicker="IMPLEMENTATION"
        title="What's included in setup"
        subtitle="We don't just hand you software—we partner with you for successful implementation."
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="service in implementationServices" 
          :key="service.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="mb-4 text-4xl">{{ service.icon }}</div>
          <h3 class="text-lg font-semibold text-slate-900">{{ service.title }}</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ service.description }}</p>
        </div>
      </div>
    </section>

    <!-- Feature Comparison Table -->
    <section>
      <UiSection
        kicker="DETAILED COMPARISON"
        title="Compare plans side-by-side"
        subtitle="See exactly what's included in each plan to make the right choice."
      />

      <div class="mt-12 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="border-b border-slate-200 bg-slate-50">
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Features</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-900">Starter</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-900 bg-indigo-50">Business</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-900">Enterprise</th>
              </tr>
            </thead>
            <tbody>
              <template v-for="(section, idx) in comparison" :key="idx">
                <tr class="border-b border-slate-200 bg-slate-50">
                  <td colspan="4" class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-slate-700">
                    {{ section.category }}
                  </td>
                </tr>
                <tr 
                  v-for="feature in section.features" 
                  :key="feature.name"
                  class="border-b border-slate-100"
                >
                  <td class="px-6 py-4 text-sm text-slate-900">{{ feature.name }}</td>
                  <td class="px-6 py-4 text-center">
                    <template v-if="typeof feature.starter === 'boolean'">
                      <svg v-if="feature.starter" class="mx-auto h-5 w-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <svg v-else class="mx-auto h-5 w-5 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </template>
                    <span v-else class="text-sm text-slate-900">{{ feature.starter }}</span>
                  </td>
                  <td class="px-6 py-4 text-center bg-indigo-50/50">
                    <template v-if="typeof feature.business === 'boolean'">
                      <svg v-if="feature.business" class="mx-auto h-5 w-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <svg v-else class="mx-auto h-5 w-5 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </template>
                    <span v-else class="text-sm font-medium text-slate-900">{{ feature.business }}</span>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <template v-if="typeof feature.enterprise === 'boolean'">
                      <svg v-if="feature.enterprise" class="mx-auto h-5 w-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <svg v-else class="mx-auto h-5 w-5 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </template>
                    <span v-else class="text-sm text-slate-900">{{ feature.enterprise }}</span>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section>
      <UiSection
        kicker="COMMON QUESTIONS"
        title="Pricing & implementation FAQs"
        subtitle="Have a question? We're here to help."
      />

      <div class="mt-12 mx-auto max-w-3xl">
        <div class="space-y-4">
          <div 
            v-for="(faq, idx) in faqs" 
            :key="idx"
            class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden transition-all"
            :class="activeFaq === idx ? 'ring-2 ring-indigo-500/20' : ''"
          >
            <button
              @click="toggleFaq(idx)"
              class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-slate-50 transition-colors"
            >
              <span class="font-semibold text-slate-900">{{ faq.q }}</span>
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
                {{ faq.a }}
              </div>
            </Transition>
          </div>
        </div>

        <div class="mt-8 text-center">
          <p class="text-slate-600">Still have questions?</p>
          <UiButton as="router-link" to="/contact" variant="secondary" size="md" class="mt-4">
            Contact Our Sales Team
          </UiButton>
        </div>
      </div>
    </section>

    <!-- Final CTA -->
    <section>
      <div class="relative overflow-hidden rounded-[2rem] border border-indigo-200 bg-gradient-to-br from-indigo-50 to-white p-12 lg:p-16">
        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-indigo-500/10 blur-3xl"></div>
        
        <div class="relative mx-auto max-w-3xl text-center">
          <h2 class="text-3xl font-bold text-slate-900 sm:text-4xl">
            Ready to get started?
          </h2>
          <p class="mt-4 text-lg text-slate-600">
            Let's discuss your needs and find the perfect plan for your organization.
            No pressure, no commitments—just a conversation about how we can help.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              Schedule a Demo
            </UiButton>
            <UiButton as="router-link" to="/product" variant="secondary" size="lg">
              Explore Platform
            </UiButton>
          </div>

          <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm text-slate-600">
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              Free consultation
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              Custom quote in 24h
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              Flexible terms
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>