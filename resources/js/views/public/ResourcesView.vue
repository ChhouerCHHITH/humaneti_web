<script setup>
import { ref, computed } from 'vue'
import UiSection from '@/components/UiSection.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { icons } from '@/components/icons'

const activeFaq = ref(null)
const activeCategory = ref('all')

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
    a: 'Humaneti is a comprehensive HRMS platform that streamlines HR operations, payroll processing, asset management, and purchase requests. It provides automated workflows, multi-level approvals, and complete audit trails to help organizations manage their operations efficiently and transparently.'
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
    a: 'Our approval system is fully configurable based on your organizational structure. You can set up multi-level approvals based on amount thresholds, departments, request types, or any combination. Each approval step is tracked with timestamps and user attribution, creating a complete audit trail.'
  },
  {
    category: 'modules',
    q: 'Can we customize approval rules for different departments?',
    a: 'Yes, especially on Business and Enterprise plans. You can configure different approval chains for different departments, set amount-based thresholds, and create custom rules for specific scenarios. This flexibility ensures the system adapts to your organizational needs.'
  },
  {
    category: 'modules',
    q: 'Does Humaneti support payroll tax calculations?',
    a: 'Yes, our payroll module includes configurable tax calculation rules that can be customized to match local tax regulations. We work with you during implementation to set up the correct tax tables and deduction rules for your jurisdiction.'
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
    a: 'Yes, Humaneti is fully responsive and works on all devices. Employees can check in/out, request leave, view payslips, and managers can approve requests—all from their mobile devices. No separate mobile app needed.'
  },
  {
    category: 'technical',
    q: 'Can this platform become more dynamic in the future?',
    a: 'Absolutely. Humaneti is built on Laravel + Vue, a modern tech stack that allows for seamless expansion. You can later add features like a CMS for blog content, case studies, lead tracking, customer portals, multilingual support, or custom integrations—all without changing platforms or rebuilding.'
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
    action: '(+855) 000 000 000',
    link: 'tel:+855000000000'
  },
  {
    icon: '🎓',
    title: 'Training Sessions',
    description: 'Schedule personalized training for your team',
    action: 'Book Training',
    link: '/contact'
  }
]

const toggleFaq = (index) => {
  activeFaq.value = activeFaq.value === index ? null : index
}

const filteredFaqs = computed(() => {
  if (activeCategory.value === 'all') return faqs
  return faqs.filter(faq => faq.category === activeCategory.value)
})

const filteredGuides = computed(() => {
  if (activeCategory.value === 'all') return guides
  return guides.filter(guide => guide.category === activeCategory.value)
})
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">RESOURCES & SUPPORT</UiBadge>
      
      <UiSection
        kicker="HELP CENTER"
        title="Everything you need to succeed with Humaneti"
        subtitle="Comprehensive guides, FAQs, video tutorials, and support to help you get the most from the platform."
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
          {{ category.name }}
        </button>
      </div>
    </section>

    <!-- Video Tutorials -->
    <section>
      <UiSection
        kicker="VIDEO TUTORIALS"
        title="Learn by watching"
        subtitle="Quick video guides to help you master Humaneti features."
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
            <h3 class="font-semibold text-slate-900 group-hover:text-indigo-600">{{ video.title }}</h3>
            <div class="flex-shrink-0">
              <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">
                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
                {{ video.duration }}
              </span>
            </div>
          </div>
          <p class="mt-2 text-sm text-slate-600">{{ video.description }}</p>
        </div>
      </div>
    </section>

    <!-- Downloadable Guides -->
    <section>
      <UiSection
        kicker="DOCUMENTATION"
        title="Guides and resources"
        subtitle="Detailed documentation to help you implement and optimize Humaneti."
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
                <h3 class="font-semibold text-slate-900 group-hover:text-indigo-600">{{ guide.title }}</h3>
                <span class="inline-flex flex-shrink-0 rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">
                  {{ guide.type }}
                </span>
              </div>
              <p class="mt-1 text-sm text-slate-600">{{ guide.description }}</p>
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
        kicker="FREQUENTLY ASKED QUESTIONS"
        title="Common questions answered"
        subtitle="Find quick answers to the most common questions about Humaneti."
      />

      <div class="mt-12 mx-auto max-w-3xl">
        <div class="space-y-4">
          <div 
            v-for="(faq, idx) in filteredFaqs" 
            :key="idx"
            class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden transition-all"
            :class="activeFaq === idx ? 'ring-2 ring-indigo-500/20' : ''"
          >
            <button
              @click="toggleFaq(idx)"
              class="w-full px-6 py-5 text-left flex items-start justify-between gap-4 hover:bg-slate-50 transition-colors"
            >
              <div class="flex-1">
                <span class="font-semibold text-slate-900">{{ faq.q }}</span>
              </div>
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
              <div v-show="activeFaq === idx" class="px-6 pb-5">
                <p class="text-slate-600 leading-relaxed">{{ faq.a }}</p>
              </div>
            </Transition>
          </div>
        </div>

        <div v-if="filteredFaqs.length === 0" class="text-center py-12">
          <div class="text-4xl mb-4">🔍</div>
          <p class="text-slate-600">No FAQs found in this category.</p>
          <UiButton @click="activeCategory = 'all'" variant="secondary" size="sm" class="mt-4">
            View All FAQs
          </UiButton>
        </div>
      </div>
    </section>

    <!-- Support Options -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <UiSection
        kicker="GET HELP"
        title="We're here to support you"
        subtitle="Multiple ways to get assistance when you need it."
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="option in support" 
          :key="option.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm text-center"
        >
          <div class="text-4xl mb-3">{{ option.icon }}</div>
          <h3 class="font-semibold text-slate-900">{{ option.title }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ option.description }}</p>
          <a 
            :href="option.link"
            class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-indigo-600 hover:text-indigo-700"
          >
            {{ option.action }}
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
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
            CUSTOM DOCUMENTATION
          </div>
          
          <h2 class="mt-6 text-3xl font-bold text-slate-900">
            Need custom documentation for your team?
          </h2>
          <p class="mt-4 text-lg text-slate-600">
            We can create tailored guides, training materials, and documentation specific to your workflows and processes.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              Request Custom Docs
            </UiButton>
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              Schedule Training
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
            Still have questions?
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            Our team is ready to help. Get in touch and we'll answer any questions you have about Humaneti.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              Contact Support
            </UiButton>
            <UiButton as="router-link" to="/about" variant="ghost" size="lg" class="!text-white hover:!bg-white/10 border border-white/20">
              Learn More About Us
            </UiButton>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>