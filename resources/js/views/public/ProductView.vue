<script setup>
import { ref, computed } from 'vue'
import UiCard from '@/components/UiCard.vue'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { icons } from '@/components/icons'

const activeModule = ref(0)

const modules = [
  {
    name: 'HRM',
    fullName: 'Human Resource Management',
    icon: icons.people,
    color: 'indigo',
    tagline: 'Complete employee lifecycle management',
    description: 'Manage your entire workforce from hire to retire with structured processes, clear documentation, and automated workflows.',
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
        description: 'Multiple leave types, approval workflows, and automatic balance tracking.'
      },
      {
        title: 'Performance Reviews',
        description: 'Structured review cycles, goal tracking, and performance documentation.'
      },
      {
        title: 'Document Storage',
        description: 'Secure storage for contracts, certifications, and employee documents.'
      }
    ],
    benefits: [
      'Reduce HR administrative work by 60%',
      'Eliminate paper-based processes',
      'Improve employee self-service',
      'Ensure compliance with labor laws'
    ]
  },
  {
    name: 'Payroll',
    fullName: 'Payroll Processing',
    icon: icons.money,
    color: 'emerald',
    tagline: 'Automated, accurate, and compliant payroll',
    description: 'Process payroll with confidence using automated calculations, multi-level approvals, and complete audit trails.',
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
        description: 'Automatic tax calculations based on configurable rules and regulations.'
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
      'Process payroll 80% faster',
      'Eliminate calculation errors',
      'Ensure timely payments',
      'Maintain complete audit trails'
    ]
  },
  {
    name: 'Asset',
    fullName: 'Asset Management',
    icon: icons.box,
    color: 'violet',
    tagline: 'Track and manage company assets',
    description: 'Maintain complete visibility of assets from purchase to disposal with custody tracking and lifecycle management.',
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
        description: 'Asset utilization, depreciation, and inventory reports.'
      }
    ],
    benefits: [
      'Prevent asset loss and theft',
      'Improve asset utilization',
      'Simplify audits and compliance',
      'Reduce operational costs'
    ]
  },
  {
    name: 'Purchase Request',
    fullName: 'Purchase Request System',
    icon: icons.cart,
    color: 'amber',
    tagline: 'Streamlined procurement workflows',
    description: 'Control purchasing with structured request workflows, budget tracking, and complete documentation.',
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
      'Reduce maverick spending',
      'Improve budget control',
      'Accelerate approvals',
      'Maintain procurement records'
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
    title: 'Smart Notifications',
    description: 'Email and in-app alerts for approvals and important events'
  },
  {
    icon: '🔍',
    title: 'Advanced Search',
    description: 'Find any record instantly with powerful search and filters'
  }
]

const integrationPoints = [
  {
    name: 'API Access',
    description: 'RESTful API for custom integrations',
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
    name: 'SSO Support',
    description: 'Single sign-on with your existing systems',
    available: 'Enterprise'
  }
]

const setActiveModule = (index) => {
  activeModule.value = index
}
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">PRODUCT OVERVIEW</UiBadge>
      
      <div class="grid gap-12 lg:grid-cols-2 lg:gap-16 items-center">
        <div>
          <h1 class="text-4xl font-bold leading-tight tracking-tight text-slate-900 sm:text-5xl">
            Build your operations backbone
            <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent"> without rebuilding later</span>
          </h1>
          
          <p class="mt-6 text-lg leading-relaxed text-slate-600">
            Humaneti is designed as a modular platform. Start with what you need today, 
            then seamlessly upgrade into dynamic dashboards, advanced analytics, and custom integrations as you grow.
          </p>

          <div class="mt-8 flex flex-wrap gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              Schedule Demo
            </UiButton>
            <UiButton as="router-link" to="/pricing" variant="secondary" size="lg">
              View Pricing
            </UiButton>
          </div>
        </div>

        <!-- Platform Preview -->
        <div class="relative">
          <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-indigo-500/20 via-violet-500/20 to-emerald-500/20 blur-2xl"></div>
          <div class="relative rounded-3xl border border-slate-200/80 bg-white/80 p-6 shadow-2xl backdrop-blur-sm">
            <div class="mb-4 flex items-center justify-between">
              <div class="space-y-1">
                <div class="text-sm font-semibold text-slate-900">Humaneti Platform</div>
                <div class="text-xs text-slate-500">Unified workflow interface</div>
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
                    <div class="text-xs font-medium text-slate-500">Inbox</div>
                  </div>
                  <div class="text-sm font-semibold text-slate-900">Pending Approvals</div>
                  <div class="mt-2 space-y-2">
                    <div class="h-2 rounded-full bg-slate-200"></div>
                    <div class="h-2 w-2/3 rounded-full bg-slate-200"></div>
                  </div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                  <div class="mb-2 flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-emerald-500"></div>
                    <div class="text-xs font-medium text-slate-500">Status</div>
                  </div>
                  <div class="text-sm font-semibold text-slate-900">My Requests</div>
                  <div class="mt-2 space-y-2">
                    <div class="h-2 rounded-full bg-slate-200"></div>
                    <div class="h-2 w-1/2 rounded-full bg-slate-200"></div>
                  </div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                  <div class="mb-2 flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-violet-500"></div>
                    <div class="text-xs font-medium text-slate-500">History</div>
                  </div>
                  <div class="text-sm font-semibold text-slate-900">Audit Trail</div>
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
                Consistent UX across all modules
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Module Tabs -->
    <section>
      <UiSection
        kicker="CORE MODULES"
        title="Four powerful modules, one unified platform"
        subtitle="Everything works together seamlessly with consistent workflows and shared data."
      />

      <!-- Tab Navigation -->
      <div class="mt-12 flex flex-wrap gap-2 border-b border-slate-200">
        <button
          v-for="(module, idx) in modules"
          :key="module.name"
          @click="setActiveModule(idx)"
          :class="[
            'flex items-center gap-2 border-b-2 px-4 py-3 text-sm font-medium transition-all',
            activeModule === idx
              ? 'border-indigo-600 text-indigo-600'
              : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300'
          ]"
        >
          <span v-html="`<svg viewBox='0 0 24 24' class='h-5 w-5'>${module.icon}</svg>`"></span>
          {{ module.fullName }}
        </button>
      </div>

      <!-- Tab Content -->
      <div class="mt-8">
        <Transition
          mode="out-in"
          enter-active-class="transition duration-300 ease-out"
          enter-from-class="opacity-0 translate-y-4"
          enter-to-class="opacity-100 translate-y-0"
          leave-active-class="transition duration-200 ease-in"
          leave-from-class="opacity-100 translate-y-0"
          leave-to-class="opacity-0 -translate-y-4"
        >
          <div 
            :key="activeModule"
            class="grid gap-8 lg:grid-cols-2 lg:gap-12"
          >
            <div>
              <div class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                <span v-html="`<svg viewBox='0 0 24 24' class='h-4 w-4'>${modules[activeModule].icon}</svg>`"></span>
                {{ modules[activeModule].name }} Module
              </div>
              
              <h3 class="mt-4 text-3xl font-bold text-slate-900">{{ modules[activeModule].tagline }}</h3>
              <p class="mt-4 text-lg leading-relaxed text-slate-600">{{ modules[activeModule].description }}</p>

              <div class="mt-8">
                <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-500">Key Benefits</h4>
                <ul class="mt-4 space-y-3">
                  <li 
                    v-for="benefit in modules[activeModule].benefits" 
                    :key="benefit"
                    class="flex items-start gap-3"
                  >
                    <svg class="h-5 w-5 flex-shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-slate-700">{{ benefit }}</span>
                  </li>
                </ul>
              </div>
            </div>

            <div class="space-y-4">
              <div 
                v-for="feature in modules[activeModule].features" 
                :key="feature.title"
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:shadow-md"
              >
                <h4 class="font-semibold text-slate-900">{{ feature.title }}</h4>
                <p class="mt-1 text-sm text-slate-600">{{ feature.description }}</p>
              </div>
            </div>
          </div>
        </Transition>
      </div>
    </section>

    <!-- Platform Features -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <UiSection
        kicker="PLATFORM FEATURES"
        title="Built-in capabilities that power your operations"
        subtitle="Essential features included in every module for a consistent experience."
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div 
          v-for="feature in platformFeatures" 
          :key="feature.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm"
        >
          <div class="mb-3 text-3xl">{{ feature.icon }}</div>
          <h3 class="text-lg font-semibold text-slate-900">{{ feature.title }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ feature.description }}</p>
        </div>
      </div>
    </section>

    <!-- Integration & Extensibility -->
    <section>
      <UiSection
        kicker="INTEGRATIONS"
        title="Connect with your existing tools"
        subtitle="Humaneti works with your current systems through flexible integration options."
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2">
        <div 
          v-for="integration in integrationPoints" 
          :key="integration.name"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm"
        >
          <div class="flex items-start justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-semibold text-slate-900">{{ integration.name }}</h3>
              <p class="mt-2 text-sm text-slate-600">{{ integration.description }}</p>
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
                {{ integration.available }}
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
              Future-Ready Platform
            </div>
            <h2 class="mt-4 text-3xl font-bold text-slate-900">Grow beyond the basics</h2>
            <p class="mt-4 text-lg text-slate-700">
              Because Humaneti is built on Laravel + Vue, you can seamlessly add advanced capabilities 
              as your needs evolve—no platform migration required.
            </p>
            
            <ul class="mt-6 space-y-3">
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">Dynamic dashboards and real-time analytics</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">Custom reports and data visualizations</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">Third-party integrations and API extensions</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">Employee self-service portal</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-slate-700">Multi-language and multi-currency support</span>
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
              <h3 class="mt-4 text-xl font-bold text-slate-900">Start Simple, Scale Smart</h3>
              <p class="mt-2 text-slate-600">
                Begin with essential workflows today, upgrade to advanced features tomorrow—all on the same platform.
              </p>
              <div class="mt-6 flex gap-3">
                <UiButton as="router-link" to="/contact" variant="primary" class="flex-1">
                  Plan Implementation
                </UiButton>
                <UiButton as="router-link" to="/pricing" variant="secondary" class="flex-1">
                  View Pricing
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
            Ready to see Humaneti in action?
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            Schedule a personalized demo and discover how our platform can transform your operations.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              Book a Demo
              <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </UiButton>
            <UiButton as="router-link" to="/solutions" variant="ghost" size="lg" class="!text-white hover:!bg-white/10 border border-white/20">
              See Use Cases
            </UiButton>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>