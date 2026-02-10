<script setup>
import { ref } from 'vue'
import UiSection from '@/components/UiSection.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { useToast } from '@/components/useToast'

const { push } = useToast()

const loading = ref(false)
const form = ref({
  name: '',
  email: '',
  company: '',
  phone: '',
  employees: '',
  modules: [],
  message: '',
})

const moduleOptions = [
  { id: 'hrm', label: 'HRM (Human Resource Management)' },
  { id: 'payroll', label: 'Payroll Processing' },
  { id: 'asset', label: 'Asset Management' },
  { id: 'pr', label: 'Purchase Requests' }
]

const employeeSizes = [
  '1-25 employees',
  '26-50 employees',
  '51-100 employees',
  '101-250 employees',
  '250+ employees'
]

const contactMethods = [
  {
    icon: '📧',
    title: 'Email Us',
    description: 'Get a response within 24 hours',
    detail: 'sales@humaneti.com',
    link: 'mailto:sales@humaneti.com',
    action: 'Send Email'
  },
  {
    icon: '📞',
    title: 'Call Us',
    description: 'Speak with our team directly',
    detail: '(+855) 000 000 000',
    link: 'tel:+855000000000',
    action: 'Call Now'
  },
  {
    icon: '📍',
    title: 'Visit Us',
    description: 'Meet us at our office',
    detail: 'Phnom Penh, Cambodia',
    link: '#',
    action: 'Get Directions'
  },
  {
    icon: '💬',
    title: 'Live Chat',
    description: 'Chat during business hours',
    detail: 'Mon-Fri, 9AM-5PM ICT',
    link: '#',
    action: 'Start Chat'
  }
]

const reasons = [
  {
    icon: '🎯',
    title: 'Request a Demo',
    description: 'See Humaneti in action with a personalized walkthrough'
  },
  {
    icon: '💼',
    title: 'Discuss Implementation',
    description: 'Plan your rollout with our implementation specialists'
  },
  {
    icon: '💰',
    title: 'Get Pricing Quote',
    description: 'Receive a custom quote based on your needs'
  },
  {
    icon: '🤝',
    title: 'Partnership Inquiry',
    description: 'Explore partnership and integration opportunities'
  }
]

const quickFaqs = [
  {
    q: 'How quickly can we start?',
    a: 'Most implementations take 4-6 weeks from kickoff to go-live.'
  },
  {
    q: 'Do you offer training?',
    a: 'Yes, comprehensive training is included with all plans.'
  },
  {
    q: 'Can we schedule a demo?',
    a: 'Absolutely! Submit the form and we\'ll schedule a personalized demo.'
  }
]

async function submit() {
  loading.value = true
  try {
    const res = await fetch('/api/v1/public/contact', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify(form.value),
    })

    if (!res.ok) {
      const data = await res.json().catch(() => null)
      const msg = data?.message || 'Failed to submit. Please try again.'
      push(msg, 'danger')
      return
    }

    const data = await res.json().catch(() => null)
    push(data?.message || 'Thank you! We\'ll get back to you within 24 hours.', 'success')

    // Reset form
    form.value = {
      name: '',
      email: '',
      company: '',
      phone: '',
      employees: '',
      modules: [],
      message: '',
    }
  } catch (error) {
    push('An error occurred. Please try again or contact us directly.', 'danger')
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">GET IN TOUCH</UiBadge>
      
      <UiSection
        kicker="LET'S TALK"
        title="Ready to transform your operations?"
        subtitle="Schedule a demo, discuss implementation, or get answers to your questions. Our team is here to help."
      />
    </section>

    <!-- Why Contact Us -->
    <section>
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="reason in reasons" 
          :key="reason.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm transition-all hover:shadow-md"
        >
          <div class="text-4xl mb-3">{{ reason.icon }}</div>
          <h3 class="font-semibold text-slate-900">{{ reason.title }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ reason.description }}</p>
        </div>
      </div>
    </section>

    <!-- Main Contact Section -->
    <section>
      <div class="grid gap-8 lg:grid-cols-3">
        <!-- Contact Form -->
        <div class="lg:col-span-2">
          <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm lg:p-10">
            <div class="mb-8">
              <h2 class="text-2xl font-bold text-slate-900">Send us a message</h2>
              <p class="mt-2 text-slate-600">Fill out the form below and we'll respond within 24 hours.</p>
            </div>

            <form @submit.prevent="submit" class="space-y-6">
              <!-- Name and Email -->
              <div class="grid gap-6 md:grid-cols-2">
                <div>
                  <label class="block text-sm font-medium text-slate-700">
                    Full Name <span class="text-red-500">*</span>
                  </label>
                  <input 
                    v-model="form.name" 
                    type="text"
                    required
                    placeholder="John Doe"
                    class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-slate-700">
                    Email Address <span class="text-red-500">*</span>
                  </label>
                  <input 
                    v-model="form.email" 
                    type="email"
                    required
                    placeholder="john@company.com"
                    class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                  />
                </div>
              </div>

              <!-- Company and Phone -->
              <div class="grid gap-6 md:grid-cols-2">
                <div>
                  <label class="block text-sm font-medium text-slate-700">
                    Company Name
                  </label>
                  <input 
                    v-model="form.company" 
                    type="text"
                    placeholder="Your Company"
                    class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-slate-700">
                    Phone Number
                  </label>
                  <input 
                    v-model="form.phone" 
                    type="tel"
                    placeholder="+855 12 345 678"
                    class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                  />
                </div>
              </div>

              <!-- Company Size -->
              <div>
                <label class="block text-sm font-medium text-slate-700">
                  Company Size
                </label>
                <select 
                  v-model="form.employees"
                  class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                >
                  <option value="">Select company size</option>
                  <option v-for="size in employeeSizes" :key="size" :value="size">
                    {{ size }}
                  </option>
                </select>
              </div>

              <!-- Modules Interest -->
              <div>
                <label class="block text-sm font-medium text-slate-700">
                  Which modules are you interested in?
                </label>
                <div class="mt-3 grid gap-3 sm:grid-cols-2">
                  <label 
                    v-for="module in moduleOptions" 
                    :key="module.id"
                    class="flex items-center gap-3 rounded-lg border border-slate-200 px-4 py-3 cursor-pointer transition-all hover:border-indigo-500 hover:bg-indigo-50"
                    :class="form.modules.includes(module.id) ? 'border-indigo-600 bg-indigo-50' : ''"
                  >
                    <input 
                      type="checkbox" 
                      :value="module.id"
                      v-model="form.modules"
                      class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-2 focus:ring-indigo-500"
                    />
                    <span class="text-sm font-medium text-slate-700">{{ module.label }}</span>
                  </label>
                </div>
              </div>

              <!-- Message -->
              <div>
                <label class="block text-sm font-medium text-slate-700">
                  Message
                </label>
                <textarea 
                  v-model="form.message" 
                  rows="5"
                  placeholder="Tell us about your needs, timeline, or any specific questions you have..."
                  class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                ></textarea>
              </div>

              <!-- Submit Button -->
              <div class="flex items-center gap-4">
                <UiButton 
                  type="submit"
                  :disabled="loading" 
                  variant="primary" 
                  size="lg"
                  class="flex-1"
                >
                  <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  {{ loading ? 'Sending...' : 'Send Message' }}
                </UiButton>
              </div>

              <!-- Privacy Notice -->
              <p class="text-xs text-slate-500">
                By submitting this form, you agree to our 
                <RouterLink to="/legal/privacy" class="text-indigo-600 hover:text-indigo-700">Privacy Policy</RouterLink>. 
                We'll use your information to contact you about Humaneti and may send you relevant product updates.
              </p>
            </form>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
          <!-- Contact Methods -->
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Other ways to reach us</h3>
            <div class="mt-4 space-y-4">
              <div class="flex items-start gap-3">
                <div class="text-2xl">📧</div>
                <div>
                  <div class="text-sm font-medium text-slate-900">Email</div>
                  <a href="mailto:sales@humaneti.com" class="text-sm text-indigo-600 hover:text-indigo-700">
                    sales@humaneti.com
                  </a>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <div class="text-2xl">📞</div>
                <div>
                  <div class="text-sm font-medium text-slate-900">Phone</div>
                  <a href="tel:+855000000000" class="text-sm text-indigo-600 hover:text-indigo-700">
                    (+855) 000 000 000
                  </a>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <div class="text-2xl">📍</div>
                <div>
                  <div class="text-sm font-medium text-slate-900">Location</div>
                  <div class="text-sm text-slate-600">Phnom Penh, Cambodia</div>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <div class="text-2xl">🕐</div>
                <div>
                  <div class="text-sm font-medium text-slate-900">Business Hours</div>
                  <div class="text-sm text-slate-600">Mon-Fri: 9AM - 5PM ICT</div>
                </div>
              </div>
            </div>
          </div>

          <!-- What to Include -->
          <div class="rounded-2xl border border-indigo-200 bg-indigo-50 p-6">
            <h3 class="text-lg font-semibold text-indigo-900">What to include in your message</h3>
            <ul class="mt-4 space-y-2 text-sm text-indigo-700">
              <li class="flex items-start gap-2">
                <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>Number of employees and departments</span>
              </li>
              <li class="flex items-start gap-2">
                <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>Which modules you need first</span>
              </li>
              <li class="flex items-start gap-2">
                <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>Desired timeline and go-live date</span>
              </li>
              <li class="flex items-start gap-2">
                <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>Compliance or audit requirements</span>
              </li>
            </ul>
          </div>

          <!-- Quick FAQs -->
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Quick answers</h3>
            <div class="mt-4 space-y-4">
              <div v-for="faq in quickFaqs" :key="faq.q">
                <div class="text-sm font-medium text-slate-900">{{ faq.q }}</div>
                <div class="mt-1 text-sm text-slate-600">{{ faq.a }}</div>
              </div>
            </div>
            <RouterLink 
              to="/resources" 
              class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-indigo-600 hover:text-indigo-700"
            >
              View all FAQs
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </RouterLink>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Methods Grid -->
    <section>
      <UiSection
        kicker="MULTIPLE CHANNELS"
        title="Choose your preferred way to connect"
        subtitle="We're available through various channels to accommodate your preferences."
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <a
          v-for="method in contactMethods" 
          :key="method.title"
          :href="method.link"
          class="group rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm transition-all hover:shadow-lg hover:border-indigo-200"
        >
          <div class="text-4xl mb-3">{{ method.icon }}</div>
          <h3 class="font-semibold text-slate-900 group-hover:text-indigo-600">{{ method.title }}</h3>
          <p class="mt-1 text-sm text-slate-600">{{ method.description }}</p>
          <div class="mt-3 text-sm font-medium text-slate-700">{{ method.detail }}</div>
          <div class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-indigo-600">
            {{ method.action }}
            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </div>
        </a>
      </div>
    </section>

    <!-- Trust Section -->
    <section class="rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 lg:p-12">
      <div class="mx-auto max-w-3xl text-center">
        <h2 class="text-2xl font-bold text-slate-900 sm:text-3xl">
          What happens after you contact us?
        </h2>
        <div class="mt-8 grid gap-6 md:grid-cols-3">
          <div>
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 font-bold">
              1
            </div>
            <h3 class="mt-4 font-semibold text-slate-900">We Review Your Needs</h3>
            <p class="mt-2 text-sm text-slate-600">
              Our team reviews your requirements and prepares a customized response
            </p>
          </div>
          <div>
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 font-bold">
              2
            </div>
            <h3 class="mt-4 font-semibold text-slate-900">We Schedule a Call</h3>
            <p class="mt-2 text-sm text-slate-600">
              We reach out within 24 hours to schedule a demo or discovery call
            </p>
          </div>
          <div>
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 font-bold">
              3
            </div>
            <h3 class="mt-4 font-semibold text-slate-900">We Create Your Plan</h3>
            <p class="mt-2 text-sm text-slate-600">
              You receive a tailored implementation plan with timeline and pricing
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
            Prefer to explore on your own?
          </h2>
          <p class="mt-4 text-lg text-slate-300">
            Check out our product pages, pricing, and resources to learn more about Humaneti at your own pace.
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/product" variant="secondary" size="lg">
              Explore Platform
            </UiButton>
            <UiButton as="router-link" to="/pricing" variant="ghost" size="lg" class="!text-white hover:!bg-white/10 border border-white/20">
              View Pricing
            </UiButton>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>