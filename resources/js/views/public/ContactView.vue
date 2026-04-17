<script setup>
import { computed, onMounted, ref } from 'vue'
import UiSection from '@/components/UiSection.vue'
import UiCard from '@/components/UiCard.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { useToast } from '@/components/useToast'
import { usePublicI18n } from '@/composables/usePublicI18n'

const { push } = useToast()
const { t, locale } = usePublicI18n()

const submitting = ref(false)
const loadingPlans = ref(false)
const formErrors = ref({})
const plans = ref([])
const form = ref({
  company_name: '',
  contact_name: '',
  contact_email: '',
  contact_phone: '',
  tenant_type: '',
  requested_plan_code: '',
  preferred_users: null,
  billing_cycle: 'monthly',
  message: '',
  website: '',
})

const firstError = (key) => formErrors.value?.[key]?.[0] || ''

const clearFieldError = (key) => {
  if (!formErrors.value[key]) return
  const next = { ...formErrors.value }
  delete next[key]
  formErrors.value = next
}

const requestablePlans = computed(() =>
  (Array.isArray(plans.value) ? plans.value : []).map((plan) => ({
    code: plan.code,
    name: locale.value === 'kh' ? (plan.name_kh || plan.name) : plan.name,
    tenant_type: plan.tenant_type || 'all',
    modules: Array.isArray(plan.modules) ? plan.modules : [],
  })),
)

const selectedPlan = computed(() => requestablePlans.value.find((plan) => plan.code === form.value.requested_plan_code) || null)

const normalizePlansPayload = (payload) => {
  // Accept common response shapes:
  // 1) { data: [...] }
  // 2) { data: { data: [...] } }  (Laravel paginator/resource style)
  // 3) [...]
  if (Array.isArray(payload)) return payload
  if (Array.isArray(payload?.data)) return payload.data
  if (Array.isArray(payload?.data?.data)) return payload.data.data
  return []
}

const fetchPlans = async () => {
  loadingPlans.value = true
  try {
    const tenantType = form.value.tenant_type
    const query = tenantType ? `?tenant_type=${encodeURIComponent(tenantType)}` : ''
    const res = await fetch(`/api/v1/public/subscription-plans${query}`, {
      method: 'GET',
      headers: { Accept: 'application/json' },
    })
    const data = await res.json().catch(() => null)
    if (!res.ok) {
      plans.value = []
      push(
        data?.message || t({ en: 'Failed to load subscription plans.', kh: 'បរាជ័យក្នុងការទាញយកគម្រោងជាវ។' }),
        'danger',
      )
      return
    }

    plans.value = normalizePlansPayload(data)
    if (plans.value.length === 0) {
      push(
        t({
          en: 'No public subscription plans are available right now. Please contact sales.',
          kh: 'បច្ចុប្បន្នមិនមានគម្រោងជាវសាធារណៈទេ។ សូមទាក់ទងក្រុមលក់។',
        }),
        'warning',
      )
    }
  } finally {
    loadingPlans.value = false
  }
}

const chooseDefaultPlan = () => {
  if (requestablePlans.value.length === 0) {
    form.value.requested_plan_code = ''
    return
  }

  const type = form.value.tenant_type
  const match = requestablePlans.value.find((plan) => (type ? (plan.tenant_type === type || plan.tenant_type === 'all') : true))
  form.value.requested_plan_code = match?.code || requestablePlans.value[0].code
}

const onTenantTypeChange = async () => {
  await fetchPlans()
  chooseDefaultPlan()
}

const validateForm = (values) => {
  const errors = {}
  if (!values.company_name.trim()) {
    errors.company_name = [t({ en: 'Company name is required.', kh: 'ឈ្មោះក្រុមហ៊ុន/អង្គការចាំបាច់ត្រូវបំពេញ។' })]
  }
  if (!values.contact_name.trim()) {
    errors.contact_name = [t({ en: 'Contact name is required.', kh: 'ឈ្មោះអ្នកទំនាក់ទំនងចាំបាច់ត្រូវបំពេញ។' })]
  }
  if (!values.contact_email.trim()) {
    errors.contact_email = [t({ en: 'Contact email is required.', kh: 'អ៊ីមែលទំនាក់ទំនងចាំបាច់ត្រូវបំពេញ។' })]
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(values.contact_email.trim())) {
    errors.contact_email = [t({ en: 'Please enter a valid email address.', kh: 'សូមបញ្ចូលអ៊ីមែលត្រឹមត្រូវ។' })]
  }
  return errors
}

const submit = async () => {
  if (submitting.value) return

  formErrors.value = {}
  if (form.value.website) {
    push(t({ en: 'Failed to submit subscription request. Please try again.', kh: 'បរាជ័យក្នុងការដាក់ស្នើសំណើជាវ។ សូមព្យាយាមម្តងទៀត។' }), 'danger')
    return
  }

  const clientErrors = validateForm(form.value)
  if (Object.keys(clientErrors).length > 0) {
    formErrors.value = clientErrors
    return
  }

  submitting.value = true
  try {
    const payload = {
      company_name: form.value.company_name.trim(),
      contact_name: form.value.contact_name.trim(),
      contact_email: form.value.contact_email.trim(),
      contact_phone: form.value.contact_phone.trim() || null,
      tenant_type: form.value.tenant_type || null,
      requested_plan_code: form.value.requested_plan_code || null,
      preferred_users: form.value.preferred_users ? Number(form.value.preferred_users) : null,
      billing_cycle: form.value.billing_cycle || 'monthly',
      requested_modules: selectedPlan.value?.modules || [],
      message: form.value.message.trim() || null,
      metadata: {
        locale: locale.value,
        page: 'contact',
      },
    }

    const res = await fetch('/api/v1/public/subscription-requests', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'X-Locale': locale.value,
      },
      body: JSON.stringify(payload),
    })

    const data = await res.json().catch(() => null)
    if (!res.ok) {
      if (res.status === 422 && data?.errors) {
        formErrors.value = data.errors
      }
      const msg =
        res.status === 429
          ? t({ en: 'Too many attempts. Please wait a minute and try again.', kh: 'បានព្យាយាមច្រើនដងពេក។ សូមរង់ចាំបន្តិច ហើយព្យាយាមម្តងទៀត។' })
          : data?.message || t({ en: 'Failed to submit subscription request. Please try again.', kh: 'បរាជ័យក្នុងការដាក់ស្នើសំណើជាវ។ សូមព្យាយាមម្តងទៀត។' })
      push(msg, 'danger')
      return
    }

    push(data?.message || t({ en: 'Subscription request submitted successfully.', kh: 'បានដាក់ស្នើសំណើជាវដោយជោគជ័យ។' }), 'success')
    form.value = {
      company_name: '',
      contact_name: '',
      contact_email: '',
      contact_phone: '',
      tenant_type: form.value.tenant_type,
      requested_plan_code: form.value.requested_plan_code,
      preferred_users: null,
      billing_cycle: 'monthly',
      message: '',
      website: '',
    }
  } finally {
    submitting.value = false
  }
}

onMounted(async () => {
  await fetchPlans()
  chooseDefaultPlan()
})
</script>

<template>
  <UiBadge tone="neutral">{{ t({ en: 'CONTACT', kh: 'ទំនាក់ទំនង' }) }}</UiBadge>

  <div class="mt-4">
    <UiSection
      as="h1"
      :kicker="t({ en: 'SUBSCRIPTION REQUEST', kh: 'សំណើជាវ' })"
      :title="t({ en: 'Request subscription onboarding', kh: 'ស្នើសុំការចាប់ផ្តើមការជាវ' })"
      :subtitle="t({ en: 'Use one form to request your subscription plan. We will confirm by email and contact you for onboarding.', kh: 'ប្រើបែបបទតែមួយដើម្បីស្នើសុំគម្រោងជាវរបស់អ្នក។ យើងនឹងបញ្ជាក់តាមអ៊ីមែល និងទាក់ទងអ្នកសម្រាប់ការចាប់ផ្តើមប្រើប្រាស់។' })"
    />
  </div>

  <div class="mt-8 grid gap-6 lg:grid-cols-3">
    <UiCard class="lg:col-span-2">
      <div class="font-semibold text-lg">{{ t({ en: 'Subscription Request Form', kh: 'បែបបទសំណើជាវ' }) }}</div>
      <p class="mt-2 text-sm text-slate-600">
        {{ t({ en: 'After submission, confirmation is sent to your email and our sales team is notified.', kh: 'បន្ទាប់ពីដាក់ស្នើ ការបញ្ជាក់នឹងផ្ញើទៅអ៊ីមែលរបស់អ្នក ហើយក្រុមលក់នឹងទទួលការជូនដំណឹង។' }) }}
      </p>

      <form class="mt-6 grid gap-4" novalidate @submit.prevent="submit">
        <input
          v-model="form.website"
          type="text"
          tabindex="-1"
          autocomplete="off"
          class="hidden"
          aria-hidden="true"
        >

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Company Name', kh: 'ឈ្មោះអង្គការ/ក្រុមហ៊ុន' }) }}</label>
            <input
              v-model="form.company_name"
              type="text"
              maxlength="191"
              required
              :class="[
                'mt-1 w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-2',
                firstError('company_name') ? 'border-rose-300 focus:ring-rose-200' : 'border-slate-200 focus:ring-slate-300',
              ]"
              @input="clearFieldError('company_name')"
            >
            <p v-if="firstError('company_name')" class="mt-1 text-xs text-rose-600">{{ firstError('company_name') }}</p>
          </div>

          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Contact Name', kh: 'ឈ្មោះអ្នកទំនាក់ទំនង' }) }}</label>
            <input
              v-model="form.contact_name"
              type="text"
              maxlength="191"
              required
              :class="[
                'mt-1 w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-2',
                firstError('contact_name') ? 'border-rose-300 focus:ring-rose-200' : 'border-slate-200 focus:ring-slate-300',
              ]"
              @input="clearFieldError('contact_name')"
            >
            <p v-if="firstError('contact_name')" class="mt-1 text-xs text-rose-600">{{ firstError('contact_name') }}</p>
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Contact Email', kh: 'អ៊ីមែលទំនាក់ទំនង' }) }}</label>
            <input
              v-model="form.contact_email"
              type="email"
              maxlength="191"
              required
              :class="[
                'mt-1 w-full rounded-lg border px-3 py-2 text-sm focus:outline-none focus:ring-2',
                firstError('contact_email') ? 'border-rose-300 focus:ring-rose-200' : 'border-slate-200 focus:ring-slate-300',
              ]"
              @input="clearFieldError('contact_email')"
            >
            <p v-if="firstError('contact_email')" class="mt-1 text-xs text-rose-600">{{ firstError('contact_email') }}</p>
          </div>
          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Contact Phone', kh: 'លេខទូរស័ព្ទទំនាក់ទំនង' }) }}</label>
            <input
              v-model="form.contact_phone"
              type="text"
              maxlength="50"
              class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"
            >
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Tenant Type', kh: 'ប្រភេទតេណង់' }) }}</label>
            <select
              v-model="form.tenant_type"
              class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"
              @change="onTenantTypeChange"
            >
              <option value="">{{ t({ en: 'All', kh: 'ទាំងអស់' }) }}</option>
              <option value="sme">{{ t({ en: 'SME', kh: 'សហគ្រាសធុនតូច និងមធ្យម' }) }}</option>
              <option value="ngo">{{ t({ en: 'NGO', kh: 'អង្គការមិនមែនរដ្ឋាភិបាល' }) }}</option>
            </select>
          </div>
          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Plan', kh: 'គម្រោង' }) }}</label>
            <select
              v-model="form.requested_plan_code"
              :disabled="loadingPlans || requestablePlans.length === 0"
              class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300 disabled:cursor-not-allowed disabled:bg-slate-100"
              @change="clearFieldError('requested_plan_code')"
            >
              <option value="" disabled>{{ t({ en: 'Select plan', kh: 'ជ្រើសរើសគម្រោង' }) }}</option>
              <option v-if="!loadingPlans && requestablePlans.length === 0" value="" disabled>
                {{ t({ en: 'No plans available', kh: 'មិនមានគម្រោងទេ' }) }}
              </option>
              <option v-for="plan in requestablePlans" :key="plan.code" :value="plan.code">
                {{ plan.name }}
              </option>
            </select>
            <p v-if="firstError('requested_plan_code')" class="mt-1 text-xs text-rose-600">{{ firstError('requested_plan_code') }}</p>
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Preferred Users', kh: 'ចំនួនអ្នកប្រើដែលចង់បាន' }) }}</label>
            <input
              v-model.number="form.preferred_users"
              type="number"
              min="1"
              max="200000"
              class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"
              @input="clearFieldError('preferred_users')"
            >
            <p v-if="firstError('preferred_users')" class="mt-1 text-xs text-rose-600">{{ firstError('preferred_users') }}</p>
          </div>
          <div>
            <label class="text-sm font-medium">{{ t({ en: 'Billing Cycle', kh: 'រយៈពេលវិក្កយបត្រ' }) }}</label>
            <select
              v-model="form.billing_cycle"
              class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"
              @change="clearFieldError('billing_cycle')"
            >
              <option value="monthly">{{ t({ en: 'Monthly', kh: 'ប្រចាំខែ' }) }}</option>
              <option value="yearly">{{ t({ en: 'Yearly', kh: 'ប្រចាំឆ្នាំ' }) }}</option>
              <option value="custom">{{ t({ en: 'Custom', kh: 'តាមតម្រូវការ' }) }}</option>
            </select>
          </div>
        </div>

        <div>
          <label class="text-sm font-medium">{{ t({ en: 'Request Notes', kh: 'កំណត់ចំណាំសំណើ' }) }}</label>
          <textarea
            v-model="form.message"
            rows="4"
            maxlength="5000"
            class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"
            :placeholder="t({ en: 'Modules, timeline, onboarding notes...', kh: 'ម៉ូឌុល កាលវិភាគ កំណត់ចំណាំការចាប់ផ្តើមប្រើប្រាស់...' })"
          ></textarea>
          <p class="mt-1 text-xs text-slate-500">
            {{ t({ en: 'Selected plan', kh: 'គម្រោងដែលបានជ្រើស' }) }}:
            <span class="font-medium text-slate-700">{{ selectedPlan ? selectedPlan.name : '-' }}</span>
          </p>
        </div>

        <UiButton :disabled="submitting" variant="primary" class="w-full">
          {{ submitting ? t({ en: 'Submitting...', kh: 'កំពុងដាក់ស្នើ...' }) : t({ en: 'Submit Subscription Request', kh: 'ដាក់ស្នើសំណើជាវ' }) }}
        </UiButton>

        <p class="text-xs text-slate-500">
          {{ t({ en: 'By submitting, you agree to our', kh: 'ដោយដាក់ស្នើ អ្នកយល់ព្រមនឹង' }) }}
          <RouterLink to="/legal/privacy" class="font-medium text-slate-700 hover:text-slate-900 hover:underline">
            {{ t({ en: 'Privacy Policy', kh: 'គោលការណ៍ភាពឯកជន' }) }}
          </RouterLink>.
        </p>
      </form>
    </UiCard>

    <div class="space-y-4">
      <!-- Contact details card -->
      <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 bg-gradient-to-r from-slate-900 to-slate-700 px-5 py-4">
          <div class="font-semibold text-white">{{ t({ en: 'Business Contact', kh: 'ទំនាក់ទំនងអាជីវកម្ម' }) }}</div>
          <div class="mt-0.5 text-xs text-slate-300">{{ t({ en: 'Reach our sales team directly', kh: 'ទំនាក់ទំនងក្រុមលក់ដោយផ្ទាល់' }) }}</div>
        </div>
        <div class="divide-y divide-slate-100 px-5 py-1">
          <div class="flex items-center gap-3 py-3">
            <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <div class="text-[10px] font-semibold uppercase tracking-widest text-slate-400">{{ t({ en: 'Email', kh: 'អ៊ីមែល' }) }}</div>
              <a href="mailto:sales@humaneti.com" class="text-sm font-medium text-slate-800 hover:text-indigo-600">sales@humaneti.com</a>
            </div>
          </div>
          <div class="flex items-center gap-3 py-3">
            <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <div>
              <div class="text-[10px] font-semibold uppercase tracking-widest text-slate-400">{{ t({ en: 'Phone', kh: 'ទូរស័ព្ទ' }) }}</div>
              <a href="tel:+8550965962864" class="text-sm font-medium text-slate-800 hover:text-emerald-600">(+855) 096 59 62 864</a>
            </div>
          </div>
          <div class="flex items-center gap-3 py-3">
            <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-violet-100 text-violet-600">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div>
              <div class="text-[10px] font-semibold uppercase tracking-widest text-slate-400">{{ t({ en: 'Location', kh: 'ទីតាំង' }) }}</div>
              <div class="text-sm font-medium text-slate-800">{{ t({ en: 'Phnom Penh, Cambodia', kh: 'ភ្នំពេញ ប្រទេសកម្ពុជា' }) }}</div>
            </div>
          </div>
        </div>
      </div>

      <!-- What to include card -->
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-2 font-semibold text-slate-900">
          <svg class="h-4 w-4 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
          </svg>
          {{ t({ en: 'What to include', kh: 'ព័ត៌មានដែលគួរដាក់បញ្ចូល' }) }}
        </div>
        <ul class="mt-3 space-y-2.5">
          <li v-for="(item, idx) in [
            { en: 'Number of employees and departments', kh: 'ចំនួនបុគ្គលិក និងផ្នែក' },
            { en: 'Priority modules (e.g., Payroll, Expense Claim, Projects)', kh: 'ម៉ូឌុលអាទិភាព (ឧ. បៀវត្សរ៍ ចំណាយ គម្រោង)' },
            { en: 'Expected go-live timeline', kh: 'កាលវិភាគចង់ដាក់ឱ្យប្រើ' },
            { en: 'Any compliance or reporting requirements', kh: 'តម្រូវការអនុលោម ឬរបាយការណ៍ពាក់ព័ន្ធ' },
          ]" :key="idx" class="flex items-start gap-2 text-sm text-slate-600">
            <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            {{ t(item) }}
          </li>
        </ul>
      </div>

      <!-- Response time card -->
      <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-4">
        <div class="flex items-center gap-2 text-sm font-semibold text-emerald-800">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          {{ t({ en: 'Quick Response', kh: 'ការឆ្លើយតបរហ័ស' }) }}
        </div>
        <p class="mt-1.5 text-xs text-emerald-700">
          {{ t({ en: 'Our team typically responds within 1 business day to confirm your request and schedule onboarding.', kh: 'ក្រុមការងាររបស់យើងជាធម្មតាឆ្លើយតបក្នុងរយៈពេល 1 ថ្ងៃអាជីវកម្ម ដើម្បីបញ្ជាក់សំណើ និងកំណត់ពេល onboarding របស់អ្នក។' }) }}
        </p>
      </div>
    </div>
  </div>
</template>
