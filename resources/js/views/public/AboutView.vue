<script setup>
import { ref } from 'vue'
import UiSection from '@/components/UiSection.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { icons } from '@/components/icons'

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
  { label: 'Organizations Served', value: '50+' },
  { label: 'Active Users', value: '500+' },
  { label: 'Approval Workflows', value: '10K+' },
  { label: 'Customer Satisfaction', value: '98%' }
]
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">ABOUT HUMANETI</UiBadge>
      
      <div class="grid gap-12 lg:grid-cols-2 lg:gap-16 items-center">
        <div>
          <h1 class="text-4xl font-bold leading-tight tracking-tight text-slate-900 sm:text-5xl">
            We exist to make operational workflows
            <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent"> simple, consistent, and traceable</span>
          </h1>
          
          <p class="mt-6 text-lg leading-relaxed text-slate-600">
            Many teams struggle with unclear approvals, scattered ownership, and lost records. 
            Humaneti brings these critical actions into one clean, workflow-driven platform.
          </p>

          <div class="mt-8 flex flex-wrap gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              Start Your Journey
            </UiButton>
            <UiButton as="router-link" to="/product" variant="secondary" size="lg">
              See the Platform
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
                <div class="text-3xl font-bold text-slate-900">{{ stat.value }}</div>
                <div class="mt-1 text-sm text-slate-600">{{ stat.label }}</div>
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
          OUR MISSION
        </div>
        <h2 class="mt-6 text-3xl font-bold text-slate-900 sm:text-4xl">
          Empowering businesses with workflows that work
        </h2>
        <p class="mt-4 text-lg leading-relaxed text-slate-600">
          We believe that great operations don't require complex systems. With clear workflows, 
          proper approvals, and complete traceability, any organization can achieve operational excellence.
          That's why we built Humaneti—to make professional-grade workflow management accessible to every business.
        </p>
      </div>
    </section>

    <!-- Core Values -->
    <section>
      <UiSection
        kicker="WHAT WE STAND FOR"
        title="Our core values drive everything we build"
        subtitle="These principles guide our product decisions and shape our company culture."
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

            <h3 class="text-xl font-bold text-slate-900">{{ value.title }}</h3>
            <p class="mt-3 leading-relaxed text-slate-600">{{ value.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Principles -->
    <section>
      <UiSection
        kicker="HOW WE WORK"
        title="Principles that guide our approach"
        subtitle="Simple promises we make to every customer."
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
              <h3 class="text-lg font-semibold text-slate-900">{{ principle.title }}</h3>
              <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ principle.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Timeline -->
    <section>
      <UiSection
        kicker="OUR JOURNEY"
        title="Building the future, one milestone at a time"
        subtitle="From a vision to a platform trusted by growing businesses."
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
                <h3 class="text-lg font-semibold text-slate-900">{{ item.title }}</h3>
                <p class="mt-1 text-slate-600">{{ item.description }}</p>
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
            <h2 class="text-2xl font-bold text-slate-900">Security & Governance Statement</h2>
            <p class="mt-3 leading-relaxed text-slate-700">
              Humaneti is architected from the ground up to support operational governance through 
              structured approvals and comprehensive activity tracking. Our platform includes:
            </p>
            <ul class="mt-4 grid gap-3 sm:grid-cols-2 text-sm">
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Role-based access control (RBAC)
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Separation of duties
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Audit-ready event logs
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Data encryption at rest and in transit
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Regular security updates
              </li>
              <li class="flex items-center gap-2 text-slate-700">
                <svg class="h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Compliance support
              </li>
            </ul>
            <p class="mt-4 text-sm text-slate-600">
              Implementation details can be aligned to your internal policies and regulatory requirements 
              during the setup phase. We work closely with your team to ensure compliance with local regulations.
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
            Ready to join our story?
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            Let's build something great together. Start with a conversation about your needs, 
            and we'll show you how Humaneti can transform your operations.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="secondary" size="lg">
              Get in Touch
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