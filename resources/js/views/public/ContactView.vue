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

const submit = async () => {
  if (submitting.value) return

  formErrors.value = {}
  if (form.value.website) {
    push(t({ en: 'Failed to submit subscription request. Please try again.', kh: 'បរាជ័យក្នុងការដាក់ស្នើសំណើជាវ។ សូមព្យាយាមម្តងទៀត។' }), 'danger')
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
      requested_modules: [],
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
      <UiCard>
        <div class="font-semibold">{{ t({ en: 'Business contact', kh: 'ទំនាក់ទំនងអាជីវកម្ម' }) }}</div>
        <div class="mt-2 text-sm text-slate-600">
          {{ t({ en: 'Email:', kh: 'អ៊ីមែល៖' }) }} <span class="text-slate-900">sales@humaneti.com</span><br>
          {{ t({ en: 'Phone:', kh: 'ទូរស័ព្ទ៖' }) }} <span class="text-slate-900">(+855) 096 59 62 864</span><br>
          {{ t({ en: 'Location:', kh: 'ទីតាំង៖' }) }} <span class="text-slate-900">{{ t({ en: 'Phnom Penh, Cambodia', kh: 'ភ្នំពេញ ប្រទេសកម្ពុជា' }) }}</span>
        </div>
      </UiCard>

      <UiCard>
        <div class="font-semibold">{{ t({ en: 'What to include', kh: 'ព័ត៌មានដែលគួរដាក់បញ្ចូល' }) }}</div>
        <ul class="mt-2 space-y-2 text-sm text-slate-600 list-disc pl-5">
          <li>{{ t({ en: 'Number of employees and departments', kh: 'ចំនួនបុគ្គលិក និងផ្នែក' }) }}</li>
          <li>{{ t({ en: 'Priority modules (e.g., Payroll, Expense Claim, Projects)', kh: 'ម៉ូឌុលអាទិភាព (ឧ. បៀវត្សរ៍ ចំណាយ គម្រោង)' }) }}</li>
          <li>{{ t({ en: 'Expected go-live timeline', kh: 'កាលវិភាគចង់ដាក់ឱ្យប្រើ' }) }}</li>
          <li>{{ t({ en: 'Any compliance or reporting requirements', kh: 'តម្រូវការអនុលោម ឬរបាយការណ៍ពាក់ព័ន្ធ' }) }}</li>
        </ul>
      </UiCard>
    </div>
  </div>
</template>
