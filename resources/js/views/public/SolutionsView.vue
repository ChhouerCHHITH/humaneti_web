<script setup>
import { ref } from 'vue'
import UiSection from '@/components/UiSection.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { icons } from '@/components/icons'

const selectedUseCase = ref(0)

const useCases = [
  {
    type: 'SME',
    icon: '🏢',
    title: 'Small & Medium Enterprises',
    subtitle: 'Professional workflows without enterprise complexity',
    description: 'Growing businesses need structured processes but can\'t afford complex enterprise systems. Humaneti provides professional-grade workflows that are easy to implement and intuitive to use.',
    challenges: [
      'Manual approval processes cause delays',
      'Lost documents and unclear ownership',
      'No visibility into request status',
      'Difficulty scaling operations'
    ],
    solutions: [
      'Automated approval workflows with clear ownership',
      'Centralized document storage and retrieval',
      'Real-time status tracking for all requests',
      'Modular system that grows with your business'
    ],
    outcomes: [
      '60% faster approval cycles',
      '80% reduction in lost documents',
      '100% visibility on pending requests',
      'Seamless scaling as you add employees'
    ]
  },
  {
    type: 'NGO',
    icon: '🤝',
    title: 'Non-Profit Organizations',
    subtitle: 'Transparent workflows that meet donor requirements',
    description: 'NGOs face unique challenges with donor compliance, grant reporting, and limited resources. Humaneti provides the transparency and audit trails needed for accountability.',
    challenges: [
      'Donor audit and compliance requirements',
      'Grant-specific approval rules',
      'Limited admin resources',
      'Need for complete traceability'
    ],
    solutions: [
      'Complete audit trails for all transactions',
      'Configurable approval rules per grant',
      'Self-service workflows reduce admin burden',
      'Exportable reports for donor compliance'
    ],
    outcomes: [
      'Pass audits with complete documentation',
      'Faster grant reporting and compliance',
      '50% less time on administrative tasks',
      'Improved donor confidence and trust'
    ]
  },
  {
    type: 'Enterprise',
    icon: '🏭',
    title: 'Multi-Department Organizations',
    subtitle: 'Unified platform for complex organizational structures',
    description: 'Large organizations with multiple departments need consistent workflows while maintaining departmental autonomy. Humaneti provides centralized control with flexible configurations.',
    challenges: [
      'Inconsistent processes across departments',
      'Complex approval hierarchies',
      'Siloed data and duplicate systems',
      'Difficulty in cross-department visibility'
    ],
    solutions: [
      'Standardized workflows with department customization',
      'Multi-level approval chains by department/amount',
      'Unified platform with role-based access',
      'Enterprise-wide reporting and analytics'
    ],
    outcomes: [
      'Consistent processes across all departments',
      '40% reduction in approval bottlenecks',
      'Single source of truth for all operations',
      'Better cross-department collaboration'
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
    metric: '70%',
    label: 'Faster Approvals',
    description: 'Average reduction in approval cycle time'
  },
  {
    metric: '85%',
    label: 'Admin Time Saved',
    description: 'Less time spent on manual processes'
  },
  {
    metric: '100%',
    label: 'Audit Compliance',
    description: 'Complete traceability for all actions'
  },
  {
    metric: '95%',
    label: 'User Satisfaction',
    description: 'Teams love the simplified workflows'
  }
]
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">SOLUTIONS</UiBadge>
      
      <UiSection
        kicker="REAL-WORLD APPLICATIONS"
        title="Built for real operations: approvals, accountability, and records"
        subtitle="Whether you're an SME, NGO, or enterprise, Humaneti adapts to your unique workflows and challenges."
      />
    </section>

    <!-- Use Case Selector -->
    <section>
      <div class="grid gap-4 md:grid-cols-3">
        <button
          v-for="(useCase, idx) in useCases"
          :key="idx"
          @click="selectedUseCase = idx"
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
            {{ useCase.title }}
          </div>
          <div 
            :class="[
              'mt-1 text-sm',
              selectedUseCase === idx ? 'text-indigo-700' : 'text-slate-600'
            ]"
          >
            {{ useCase.subtitle }}
          </div>
        </button>
      </div>

      <!-- Use Case Detail -->
      <div class="mt-12">
        <div 
          v-for="(useCase, idx) in useCases"
          :key="idx"
          v-show="selectedUseCase === idx"
          class="grid gap-8 lg:grid-cols-2 lg:gap-12"
        >
          <div class="space-y-8">
            <div>
              <h3 class="text-3xl font-bold text-slate-900">{{ useCase.title }}</h3>
              <p class="mt-4 text-lg leading-relaxed text-slate-600">{{ useCase.description }}</p>
            </div>

            <div>
              <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-500">Common Challenges</h4>
              <ul class="mt-4 space-y-3">
                <li 
                  v-for="challenge in useCase.challenges" 
                  :key="challenge"
                  class="flex items-start gap-3"
                >
                  <svg class="h-5 w-5 flex-shrink-0 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-slate-700">{{ challenge }}</span>
                </li>
              </ul>
            </div>

            <div>
              <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-500">Our Solutions</h4>
              <ul class="mt-4 space-y-3">
                <li 
                  v-for="solution in useCase.solutions" 
                  :key="solution"
                  class="flex items-start gap-3"
                >
                  <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-slate-700">{{ solution }}</span>
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
                Expected Outcomes
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
                  <span class="font-medium text-emerald-900">{{ outcome }}</span>
                </li>
              </ul>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
              <div class="text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100">
                  <span class="text-2xl">{{ useCase.icon }}</span>
                </div>
                <h5 class="mt-4 font-semibold text-slate-900">Perfect for {{ useCase.type }}s</h5>
                <p class="mt-2 text-sm text-slate-600">
                  Join organizations like yours that have transformed their operations with Humaneti.
                </p>
                <UiButton as="router-link" to="/contact" variant="primary" class="mt-4 w-full">
                  Discuss Your Needs
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
        kicker="PROVEN RESULTS"
        title="Real improvements across organizations"
        subtitle="Average metrics from organizations using Humaneti for 6+ months."
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
          <div class="mt-2 text-lg font-semibold text-slate-900">{{ metric.label }}</div>
          <div class="mt-1 text-sm text-slate-600">{{ metric.description }}</div>
        </div>
      </div>
    </section>

    <!-- Industries Served -->
    <section>
      <UiSection
        kicker="INDUSTRY EXPERIENCE"
        title="Trusted across diverse industries"
        subtitle="Humaneti adapts to the unique needs of different sectors."
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div 
          v-for="industry in industries" 
          :key="industry.name"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="text-4xl mb-3">{{ industry.icon }}</div>
          <h3 class="text-lg font-semibold text-slate-900">{{ industry.name }}</h3>
          <ul class="mt-3 space-y-2">
            <li 
              v-for="need in industry.needs" 
              :key="need"
              class="flex items-center gap-2 text-sm text-slate-600"
            >
              <svg class="h-4 w-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              {{ need }}
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Implementation Roadmap -->
    <section>
      <UiSection
        kicker="IMPLEMENTATION"
        title="Fast, structured rollout process"
        subtitle="From discovery to go-live in 4-6 weeks with our proven methodology."
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
                    <h3 class="text-2xl font-bold text-slate-900">{{ step.title }}</h3>
                    <div class="mt-1 inline-flex items-center gap-2 text-sm text-slate-600">
                      <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      {{ step.duration }}
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
                    {{ activity }}
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
              <h4 class="font-semibold text-indigo-900">Dedicated Implementation Support</h4>
              <p class="mt-1 text-sm text-indigo-700">
                Every implementation includes a dedicated project manager, technical support, and comprehensive training materials.
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
            Let's discuss your specific needs
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            Every organization is unique. Schedule a consultation to explore how Humaneti can be tailored to your workflows and challenges.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              Schedule Consultation
            </UiButton>
            <UiButton as="router-link" to="/product" variant="ghost" size="lg" class="!text-white hover:!bg-white/10 border border-white/20">
              Explore Platform
            </UiButton>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>