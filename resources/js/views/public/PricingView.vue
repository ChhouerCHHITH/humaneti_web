<script setup>
import { ref, computed, onMounted } from 'vue'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'
import { useToast } from '@/components/useToast'

const billingCycle = 'monthly'
const { locale, t } = usePublicI18n()
const { push } = useToast()

const khText = {
  Starter: 'ចាប់ផ្តើម',
  Business: 'អាជីវកម្ម',
  Enterprise: 'សហគ្រាស',
  Contact: 'ទាក់ទង',
  Custom: 'តាមតម្រូវការ',
  Features: 'មុខងារ',
  'Perfect for small teams': 'សមស្របសម្រាប់ក្រុមតូច',
  'Start with essential workflows and basic approvals.':
    'ចាប់ផ្តើមជាមួយលំហូរការងារចាំបាច់ និងការអនុម័តមូលដ្ឋាន។',
  'Start with selected modules': 'ចាប់ផ្តើមជាមួយម៉ូឌុលជ្រើសរើស',
  'Up to 25 users': 'រហូតដល់ 25 អ្នកប្រើ',
  'Standard approval workflows': 'លំហូរអនុម័តស្តង់ដារ',
  'Basic reporting & exports': 'របាយការណ៍ និងនាំចេញមូលដ្ឋាន',
  'Email support': 'ការគាំទ្រតាមអ៊ីមែល',
  'Web + mobile browser access': 'ការចូលប្រើតាម Web + Browser ទូរស័ព្ទ',
  'Advanced permissions': 'សិទ្ធិកម្រិតខ្ពស់',
  'Custom approval rules': 'ច្បាប់អនុម័តតាមតម្រូវការ',
  'API access': 'ការចូលប្រើ API',
  'Priority support': 'ការគាំទ្រអាទិភាព',
  'Start with Starter': 'ចាប់ផ្តើមជាមួយ Starter',
  'Most popular choice': 'ជម្រើសពេញនិយមបំផុត',
  'Complete platform with advanced controls and full support.':
    'វេទិកាពេញលេញជាមួយការគ្រប់គ្រងកម្រិតខ្ពស់ និងការគាំទ្រពេញលេញ។',
  'Core operations modules': 'ម៉ូឌុលប្រតិបត្តិការស្នូល',
  'Up to 100 users': 'រហូតដល់ 100 អ្នកប្រើ',
  'Multi-step approval workflows': 'លំហូរអនុម័តច្រើនជំហាន',
  'Advanced reporting & analytics': 'របាយការណ៍ និងវិភាគកម្រិតខ្ពស់',
  'Priority email & chat support': 'ការគាំទ្រអ៊ីមែល និងជជែកអាទិភាព',
  'Role-based permissions': 'សិទ្ធិតាមតួនាទី',
  'Audit-ready activity logs': 'កំណត់ហេតុសកម្មភាពត្រៀមសវនកម្ម',
  'Implementation guidance': 'ការណែនាំអនុវត្ត',
  'Onboarding & training': 'Onboarding និងបណ្តុះបណ្តាល',
  'Choose Business': 'ជ្រើសរើស Business',
  'For complex organizations': 'សម្រាប់អង្គការស្មុគស្មាញ',
  'Custom solutions for multi-department teams.':
    'ដំណោះស្រាយតាមតម្រូវការសម្រាប់ក្រុមការងារច្រើនផ្នែក។',
  'All modules + rollout customization': 'ម៉ូឌុលទាំងអស់ + ការកំណត់ការដាក់ឱ្យប្រើ',
  'Unlimited users': 'អ្នកប្រើគ្មានកំណត់',
  'Custom reports & dashboards': 'របាយការណ៍ និង dashboard តាមតម្រូវការ',
  'Dedicated account manager': 'អ្នកគ្រប់គ្រងគណនីជាក់លាក់',
  'Advanced security controls': 'ការគ្រប់គ្រងសុវត្ថិភាពកម្រិតខ្ពស់',
  'SLA guarantees': 'ការធានា SLA',
  'API access & integrations': 'ការចូលប្រើ API និងការរួមបញ្ចូល',
  'Tenant rollout support': 'ការគាំទ្រដាក់ឱ្យប្រើតាមតេណង់',
  'Contact Sales': 'ទាក់ទងក្រុមលក់',
  'Workflow Mapping': 'ផែនទីលំហូរការងារ',
  'We work with your team to define roles, approval steps, and responsibilities for each module.':
    'យើងធ្វើការជាមួយក្រុមអ្នក ដើម្បីកំណត់តួនាទី ជំហានអនុម័ត និងទំនួលខុសត្រូវសម្រាប់ម៉ូឌុលនីមួយៗ។',
  'Data Migration': 'ផ្លាស់ប្តូរទិន្នន័យ',
  'Support for importing existing data with templates and validation to ensure clean records.':
    'គាំទ្រការនាំចូលទិន្នន័យដែលមានស្រាប់ ជាមួយ template និងការផ្ទៀងផ្ទាត់ ដើម្បីធានាទិន្នន័យស្អាត។',
  'Team Training': 'បណ្តុះបណ្តាលក្រុម',
  'Comprehensive training for admins and end users with documentation and video guides.':
    'បណ្តុះបណ្តាលពេញលេញសម្រាប់អ្នកគ្រប់គ្រង និងអ្នកប្រើចុងក្រោយ ជាមួយឯកសារ និងវីដេអូមគ្គុទេសក៍។',
  'Go-Live Support': 'ការគាំទ្រពេលដាក់ឱ្យប្រើប្រាស់',
  'Pilot testing, refinement, and full rollout with dedicated support during transition.':
    'សាកល្បងដំបូង កែលម្អ និងដាក់ឱ្យប្រើពេញលេញ ជាមួយការគាំទ្រជាក់លាក់ក្នុងដំណាក់កាលផ្លាស់ប្តូរ។',
  'Core Features': 'មុខងារស្នូល',
  'People, Attendance, Leave': 'បុគ្គលិក វត្តមាន និងការឈប់សម្រាក',
  'Payroll Module': 'ម៉ូឌុលបៀវត្សរ៍',
  'Asset Management': 'ការគ្រប់គ្រងទ្រព្យសម្បត្តិ',
  'Purchase Requests': 'សំណើទិញ',
  'Expense Claim': 'ការទាមទារចំណាយ',
  'Projects Module': 'ម៉ូឌុលគម្រោង',
  'Users & Permissions': 'អ្នកប្រើ និងសិទ្ធិ',
  'User Limit': 'ដែនកំណត់អ្នកប្រើ',
  'Department Permissions': 'សិទ្ធិនាយកដ្ឋាន',
  'Custom Permission Sets': 'សំណុំសិទ្ធិតាមតម្រូវការ',
  'Role-Based Access': 'សិទ្ធិតាមតួនាទី',
  'Workflows & Approvals': 'លំហូរការងារ និងការអនុម័ត',
  'Basic Approvals': 'ការអនុម័តមូលដ្ឋាន',
  'Multi-Step Workflows': 'លំហូរការងារច្រើនជំហាន',
  'Conditional Rules': 'ច្បាប់លក្ខខណ្ឌ',
  'Workflow Governance Controls': 'ការគ្រប់គ្រងអភិបាលកិច្ចលំហូរការងារ',
  'Support & Services': 'ការគាំទ្រ និងសេវាកម្ម',
  'Email Support': 'ការគាំទ្រតាមអ៊ីមែល',
  'Priority Support': 'ការគាំទ្រអាទិភាព',
  'Dedicated Account Manager': 'អ្នកគ្រប់គ្រងគណនីជាក់លាក់',
  'SLA Guarantee': 'ការធានា SLA',
  'How is pricing calculated?': 'តម្លៃត្រូវបានគណនាយ៉ាងដូចម្តេច?',
  'Pricing is based on the number of users, modules selected, and level of customization needed. Contact us for a detailed quote tailored to your organization.':
    'តម្លៃផ្អែកលើចំនួនអ្នកប្រើ ម៉ូឌុលដែលជ្រើសរើស និងកម្រិតនៃការកំណត់តាមតម្រូវការ។ សូមទាក់ទងយើងសម្រាប់សម្រង់លម្អិតសមស្របនឹងអង្គការរបស់អ្នក។',
  'Can I start with one module and add more later?': 'តើខ្ញុំអាចចាប់ផ្តើមមួយម៉ូឌុល ហើយបន្ថែមពេលក្រោយបានទេ?',
  "Absolutely! Our modular approach allows you to start with what you need and seamlessly add modules as your requirements grow.":
    'បានពិតប្រាកដ! វិធីសាស្ត្រម៉ូឌុលរបស់យើងអនុញ្ញាតឱ្យអ្នកចាប់ផ្តើមតាមតម្រូវការ ហើយបន្ថែមម៉ូឌុលបានដោយរលូន ពេលតម្រូវការកើនឡើង។',
  "What's included in implementation?": 'តើការអនុវត្តរួមមានអ្វីខ្លះ?',
  'Implementation includes workflow mapping, data migration support, role configuration, team training, and go-live assistance. The scope varies by plan.':
    'ការអនុវត្តរួមមានផែនទីលំហូរការងារ គាំទ្រផ្លាស់ប្តូរទិន្នន័យ កំណត់តួនាទី បណ្តុះបណ្តាលក្រុម និងជំនួយពេលដាក់ឱ្យប្រើ។ វិសាលភាពប្រែប្រួលតាមគម្រោង។',
  'Is there a setup fee?': 'តើមានថ្លៃរៀបចំដែរឬទេ?',
  'Setup fees depend on the complexity of your implementation. Simple setups may have minimal fees, while custom configurations are quoted separately.':
    'ថ្លៃរៀបចំពឹងផ្អែកលើភាពស្មុគស្មាញនៃការអនុវត្តរបស់អ្នក។ ការរៀបចំសាមញ្ញអាចមានថ្លៃតិច ខណៈការកំណត់តាមតម្រូវការត្រូវសម្រង់ដាច់ដោយឡែក។',
  'Do you offer discounts for annual billing?': 'តើមានបញ្ចុះតម្លៃសម្រាប់បង់ប្រចាំឆ្នាំទេ?',
  'Yes, we offer significant discounts for annual commitments. Contact our sales team for specific pricing details.':
    'មាន។ យើងផ្តល់បញ្ចុះតម្លៃសមរម្យសម្រាប់ការប្តេជ្ញាបង់ប្រចាំឆ្នាំ។ សូមទាក់ទងក្រុមលក់សម្រាប់ព័ត៌មានតម្លៃលម្អិត។',
  'What happens if I need to cancel?': 'តើមានអ្វីកើតឡើងប្រសិនបើខ្ញុំចង់បញ្ឈប់?',
  'We offer flexible terms with no long-term lock-in on most plans. Enterprise plans may have different terms based on customization level.':
    'យើងផ្តល់លក្ខខណ្ឌបត់បែន ដោយគ្មានការចងរយៈពេលវែងសម្រាប់ភាគច្រើននៃគម្រោង។ គម្រោង Enterprise អាចមានលក្ខខណ្ឌខុសគ្នាតាមកម្រិតកំណត់តាមតម្រូវការ។',
  Unlimited: 'គ្មានកំណត់',
}

const normalizeTxKey = (value) => String(value || '').replace(/[’]/g, "'").replace(/[–—]/g, '-')
const tx = (value) => {
  if (locale.value !== 'kh') return value
  const direct = khText[value]
  if (direct) return direct
  const normalized = normalizeTxKey(value)
  return khText[normalized] || value
}

const plans = [
  {
    name: 'Starter',
    tagline: 'Perfect for small teams',
    price: { monthly: 'Contact', annual: 'Contact' },
    description: 'Start with essential workflows and basic approvals.',
    features: [
      { text: 'Start with selected modules', included: true },
      { text: 'Up to 25 users', included: true },
      { text: 'Standard approval workflows', included: true },
      { text: 'Basic reporting & exports', included: true },
      { text: 'Email support', included: true },
      { text: 'Web + mobile browser access', included: true },
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
      { text: 'Core operations modules', included: true },
      { text: 'Up to 100 users', included: true },
      { text: 'Multi-step approval workflows', included: true },
      { text: 'Advanced reporting & analytics', included: true },
      { text: 'Priority email & chat support', included: true },
      { text: 'Web + mobile browser access', included: true },
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
      { text: 'All modules + rollout customization', included: true },
      { text: 'Unlimited users', included: true },
      { text: 'Custom approval rules', included: true },
      { text: 'Custom reports & dashboards', included: true },
      { text: 'Dedicated account manager', included: true },
      { text: 'Web + mobile browser access', included: true },
      { text: 'Advanced security controls', included: true },
      { text: 'SLA guarantees', included: true },
      { text: 'API access & integrations', included: true },
      { text: 'Tenant rollout support', included: true }
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
      { name: 'People, Attendance, Leave', starter: true, business: true, enterprise: true },
      { name: 'Payroll Module', starter: true, business: true, enterprise: true },
      { name: 'Asset Management', starter: true, business: true, enterprise: true },
      { name: 'Purchase Requests', starter: true, business: true, enterprise: true },
      { name: 'Expense Claim', starter: false, business: true, enterprise: true },
      { name: 'Projects Module', starter: false, business: true, enterprise: true }
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
      { name: 'Workflow Governance Controls', starter: false, business: false, enterprise: true }
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

const publicPlans = ref([])
const plansLoading = ref(false)
const submitLoading = ref(false)
const submitError = ref('')
const submitSuccess = ref('')
const formErrors = ref({})

const subscriptionForm = ref({
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

const requestablePlans = computed(() => {
  if (publicPlans.value.length > 0) {
    return publicPlans.value.map((plan) => ({
      code: plan.code,
      name: locale.value === 'kh' ? (plan.name_kh || plan.name) : plan.name,
      tenant_type: plan.tenant_type || 'all',
      monthly_price: plan.monthly_price,
      yearly_price: plan.yearly_price,
      modules: Array.isArray(plan.modules) ? plan.modules : [],
    }))
  }

  return plans.map((plan) => ({
    code: String(plan.name || '').toUpperCase(),
    name: tx(plan.name),
    tenant_type: 'all',
    monthly_price: null,
    yearly_price: null,
    modules: [],
  }))
})

const selectedPlan = computed(() =>
  requestablePlans.value.find((plan) => plan.code === subscriptionForm.value.requested_plan_code) || null,
)

const selectedPlanPrice = computed(() => {
  const plan = selectedPlan.value
  if (!plan) return '-'

  const amount = subscriptionForm.value.billing_cycle === 'yearly' ? plan.yearly_price : plan.monthly_price
  if (amount == null) {
    return t({ en: 'Contact Sales', kh: 'ទាក់ទងផ្នែកលក់' })
  }

  return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(Number(amount))
})

const clearFieldError = (key) => {
  if (!formErrors.value[key]) return
  const next = { ...formErrors.value }
  delete next[key]
  formErrors.value = next
}

const firstFieldError = (key) => formErrors.value?.[key]?.[0] || ''

const normalizedTenantType = (value) => (value === 'sme' || value === 'ngo' ? value : '')

const fetchPublicPlans = async () => {
  plansLoading.value = true
  try {
    const tenantType = normalizedTenantType(subscriptionForm.value.tenant_type)
    const query = tenantType ? `?tenant_type=${encodeURIComponent(tenantType)}` : ''
    const response = await fetch(`/api/v1/public/subscription-plans${query}`, {
      method: 'GET',
      headers: { Accept: 'application/json' },
    })
    if (!response.ok) {
      throw new Error('Failed to load plans')
    }
    const payload = await response.json()
    publicPlans.value = Array.isArray(payload?.data) ? payload.data : []
  } catch (_) {
    publicPlans.value = []
  } finally {
    plansLoading.value = false
  }
}

const setAutoPlan = () => {
  if (requestablePlans.value.length === 0) {
    subscriptionForm.value.requested_plan_code = ''
    return
  }

  const tenantType = normalizedTenantType(subscriptionForm.value.tenant_type)
  const match = requestablePlans.value.find((plan) =>
    tenantType ? (plan.tenant_type === tenantType || plan.tenant_type === 'all') : true,
  )
  subscriptionForm.value.requested_plan_code = match?.code || requestablePlans.value[0].code
}

const onTenantTypeChange = async () => {
  await fetchPublicPlans()
  setAutoPlan()
}

const submitSubscription = async () => {
  if (submitLoading.value) return

  submitError.value = ''
  submitSuccess.value = ''
  formErrors.value = {}

  if (subscriptionForm.value.website) {
    submitError.value = t({ en: 'Submission failed. Please try again.', kh: 'ការដាក់ស្នើបរាជ័យ។ សូមព្យាយាមម្តងទៀត។' })
    return
  }

  submitLoading.value = true
  try {
    const payload = {
      company_name: subscriptionForm.value.company_name.trim(),
      contact_name: subscriptionForm.value.contact_name.trim(),
      contact_email: subscriptionForm.value.contact_email.trim(),
      contact_phone: subscriptionForm.value.contact_phone.trim() || null,
      tenant_type: normalizedTenantType(subscriptionForm.value.tenant_type) || null,
      requested_plan_code: subscriptionForm.value.requested_plan_code || null,
      preferred_users: subscriptionForm.value.preferred_users ? Number(subscriptionForm.value.preferred_users) : null,
      billing_cycle: subscriptionForm.value.billing_cycle || 'monthly',
      requested_modules: selectedPlan.value?.modules || [],
      message: subscriptionForm.value.message.trim() || null,
      metadata: {
        locale: locale.value,
        page: 'pricing',
      },
    }

    const response = await fetch('/api/v1/public/subscription-requests', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'X-Locale': locale.value,
      },
      body: JSON.stringify(payload),
    })

    const data = await response.json().catch(() => null)
    if (!response.ok) {
      if (response.status === 422 && data?.errors) {
        formErrors.value = data.errors
      }

      submitError.value = data?.message || t({
        en: 'Failed to submit subscription request. Please try again.',
        kh: 'ការដាក់ស្នើសំណើជាវបរាជ័យ។ សូមព្យាយាមម្តងទៀត។',
      })
      push(submitError.value, 'danger')
      return
    }

    submitSuccess.value = data?.message || t({
      en: 'Subscription request submitted successfully.',
      kh: 'បានដាក់ស្នើសំណើជាវដោយជោគជ័យ។',
    })
    push(submitSuccess.value, 'success')

    subscriptionForm.value = {
      company_name: '',
      contact_name: '',
      contact_email: '',
      contact_phone: '',
      tenant_type: subscriptionForm.value.tenant_type,
      requested_plan_code: subscriptionForm.value.requested_plan_code,
      preferred_users: null,
      billing_cycle: 'monthly',
      message: '',
      website: '',
    }
  } finally {
    submitLoading.value = false
  }
}

onMounted(async () => {
  await fetchPublicPlans()
  setAutoPlan()
})

const activeFaq = ref(null)
const faqItems = computed(() => faqs.map((faq, index) => ({
  ...faq,
  id: `pricing-faq-${index}`,
})))

const toggleFaq = (faqId) => {
  activeFaq.value = activeFaq.value === faqId ? null : faqId
}
</script>

<template>
  <div class="space-y-20">
    <!-- Hero Section -->
    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t({ en: 'PRICING', kh: 'តម្លៃ' }) }}</UiBadge>
      
      <UiSection
        :kicker="t({ en: 'TRANSPARENT PRICING', kh: 'តម្លៃច្បាស់លាស់' })"
        :title="t({ en: 'Simple plans that grow with you', kh: 'គម្រោងសាមញ្ញដែលពង្រីកទៅតាមអ្នក' })"
        :subtitle="t({ en: 'Start with priority modules today and expand by workflow complexity, user scope, and governance needs.', kh: 'ចាប់ផ្តើមពីម៉ូឌុលអាទិភាពថ្ងៃនេះ ហើយពង្រីកតាមភាពស្មុគស្មាញលំហូរការងារ វិសាលភាពអ្នកប្រើ និងតម្រូវការអភិបាលកិច្ច។' })"
      />

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
              {{ t({ en: 'Most Popular', kh: 'ពេញនិយមបំផុត' }) }}
            </div>
          </div>

          <div>
            <h3 :class="['text-2xl font-bold', plan.highlight ? 'text-white' : 'text-slate-900']">
              {{ tx(plan.name) }}
            </h3>
            <p :class="['mt-2 text-sm', plan.highlight ? 'text-slate-300' : 'text-slate-600']">
              {{ tx(plan.tagline) }}
            </p>
          </div>

          <div class="mt-6">
            <div :class="['text-4xl font-bold', plan.highlight ? 'text-white' : 'text-slate-900']">
              {{ tx(plan.price[billingCycle]) }}
            </div>
            <p :class="['mt-1 text-sm', plan.highlight ? 'text-slate-300' : 'text-slate-500']">
              {{ plan.price[billingCycle] === 'Contact' || plan.price[billingCycle] === 'Custom' 
                  ? t({ en: 'Custom pricing based on needs', kh: 'តម្លៃតាមតម្រូវការ' }) 
                  : t({ en: 'per month, billed annually', kh: 'ប្រចាំខែ គិតថ្លៃប្រចាំឆ្នាំ' }) }}
            </p>
          </div>

          <p :class="['mt-6 text-sm leading-relaxed', plan.highlight ? 'text-slate-300' : 'text-slate-600']">
            {{ tx(plan.description) }}
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
                {{ tx(feature.text) }}
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
              {{ tx(plan.cta) }}
            </UiButton>
          </div>
        </div>
      </div>

      <p class="mt-8 text-center text-sm text-slate-600">
        {{ t({ en: 'All plans include secure access controls, regular updates, and operational support options.', kh: 'គ្រប់គម្រោងរួមមានការគ្រប់គ្រងសិទ្ធិចូលប្រើដោយសុវត្ថិភាព ការធ្វើបច្ចុប្បន្នភាពទៀងទាត់ និងជម្រើសគាំទ្រប្រតិបត្តិការ។' }) }}
        <RouterLink to="/contact" class="font-medium text-indigo-600 hover:text-indigo-700">{{ t({ en: 'Contact us', kh: 'ទាក់ទងយើង' }) }}</RouterLink> {{ t({ en: 'for volume discounts.', kh: 'សម្រាប់ការបញ្ចុះតម្លៃតាមបរិមាណ។' }) }}
      </p>
    </section>

    <!-- Subscription Request -->
    <section>
      <UiSection
        :kicker="t({ en: 'SUBSCRIBE', kh: 'ការជាវ' })"
        :title="t({ en: 'Send subscription request', kh: 'ផ្ញើសំណើជាវ' })"
        :subtitle="t({ en: 'Submit your organization details and selected plan. The Humaneti team will follow up for onboarding.', kh: 'ដាក់ស្នើព័ត៌មានអង្គការ និងគម្រោងដែលជ្រើសរើស។ ក្រុម Humaneti នឹងទាក់ទងតាមក្រោយសម្រាប់ការចាប់ផ្តើមប្រើប្រាស់។' })"
      />

      <div class="mt-10 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
        <form class="grid gap-6" novalidate @submit.prevent="submitSubscription">
          <input
            v-model="subscriptionForm.website"
            type="text"
            tabindex="-1"
            autocomplete="off"
            class="hidden"
            aria-hidden="true"
          >

          <div class="grid gap-5 md:grid-cols-2">
            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Company Name', kh: 'ឈ្មោះអង្គការ/ក្រុមហ៊ុន' }) }}</label>
              <input
                v-model="subscriptionForm.company_name"
                type="text"
                maxlength="191"
                required
                :class="[
                  'mt-1.5 w-full rounded-xl border px-3 py-2.5 text-sm outline-none transition',
                  firstFieldError('company_name') ? 'border-rose-300 ring-2 ring-rose-100' : 'border-slate-200 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100',
                ]"
                @input="clearFieldError('company_name')"
              >
              <p v-if="firstFieldError('company_name')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('company_name') }}</p>
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Contact Name', kh: 'ឈ្មោះអ្នកទំនាក់ទំនង' }) }}</label>
              <input
                v-model="subscriptionForm.contact_name"
                type="text"
                maxlength="191"
                required
                :class="[
                  'mt-1.5 w-full rounded-xl border px-3 py-2.5 text-sm outline-none transition',
                  firstFieldError('contact_name') ? 'border-rose-300 ring-2 ring-rose-100' : 'border-slate-200 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100',
                ]"
                @input="clearFieldError('contact_name')"
              >
              <p v-if="firstFieldError('contact_name')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('contact_name') }}</p>
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Contact Email', kh: 'អ៊ីមែលទំនាក់ទំនង' }) }}</label>
              <input
                v-model="subscriptionForm.contact_email"
                type="email"
                maxlength="191"
                required
                :class="[
                  'mt-1.5 w-full rounded-xl border px-3 py-2.5 text-sm outline-none transition',
                  firstFieldError('contact_email') ? 'border-rose-300 ring-2 ring-rose-100' : 'border-slate-200 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100',
                ]"
                @input="clearFieldError('contact_email')"
              >
              <p v-if="firstFieldError('contact_email')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('contact_email') }}</p>
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Contact Phone', kh: 'លេខទូរស័ព្ទទំនាក់ទំនង' }) }}</label>
              <input
                v-model="subscriptionForm.contact_phone"
                type="text"
                maxlength="50"
                class="mt-1.5 w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
              >
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Tenant Type', kh: 'ប្រភេទតេណង់' }) }}</label>
              <select
                v-model="subscriptionForm.tenant_type"
                class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                @change="onTenantTypeChange"
              >
                <option value="">{{ t({ en: 'All', kh: 'ទាំងអស់' }) }}</option>
                <option value="sme">{{ t({ en: 'SME', kh: 'សហគ្រាសធុនតូច និងមធ្យម' }) }}</option>
                <option value="ngo">{{ t({ en: 'NGO', kh: 'អង្គការមិនមែនរដ្ឋាភិបាល' }) }}</option>
              </select>
              <p v-if="firstFieldError('tenant_type')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('tenant_type') }}</p>
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Preferred Users', kh: 'ចំនួនអ្នកប្រើដែលចង់បាន' }) }}</label>
              <input
                v-model.number="subscriptionForm.preferred_users"
                type="number"
                min="1"
                max="200000"
                class="mt-1.5 w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                @input="clearFieldError('preferred_users')"
              >
              <p v-if="firstFieldError('preferred_users')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('preferred_users') }}</p>
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Subscription Plan', kh: 'គម្រោងការជាវ' }) }}</label>
              <select
                v-model="subscriptionForm.requested_plan_code"
                class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                :disabled="plansLoading"
                @change="clearFieldError('requested_plan_code')"
              >
                <option value="" disabled>{{ t({ en: 'Select plan', kh: 'ជ្រើសរើសគម្រោង' }) }}</option>
                <option
                  v-for="plan in requestablePlans"
                  :key="plan.code"
                  :value="plan.code"
                >
                  {{ plan.name }}
                </option>
              </select>
              <p v-if="firstFieldError('requested_plan_code')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('requested_plan_code') }}</p>
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Billing Cycle', kh: 'រយៈពេលវិក្កយបត្រ' }) }}</label>
              <select
                v-model="subscriptionForm.billing_cycle"
                class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                @change="clearFieldError('billing_cycle')"
              >
                <option value="monthly">{{ t({ en: 'Monthly', kh: 'ប្រចាំខែ' }) }}</option>
                <option value="yearly">{{ t({ en: 'Yearly', kh: 'ប្រចាំឆ្នាំ' }) }}</option>
                <option value="custom">{{ t({ en: 'Custom', kh: 'តាមតម្រូវការ' }) }}</option>
              </select>
              <p v-if="firstFieldError('billing_cycle')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('billing_cycle') }}</p>
            </div>
          </div>

          <div class="rounded-2xl border border-indigo-100 bg-indigo-50/60 p-4">
            <p class="text-sm font-medium text-indigo-900">
              {{ t({ en: 'Selected Plan Price', kh: 'តម្លៃគម្រោងដែលបានជ្រើស' }) }}:
              <span class="font-semibold">{{ selectedPlanPrice }}</span>
            </p>
            <p class="mt-1 text-xs text-indigo-700">
              {{ plansLoading ? t({ en: 'Loading live plans from subscription service...', kh: 'កំពុងផ្ទុកគម្រោងពីសេវាកម្ម Subscription...' }) : t({ en: 'Pricing source is synchronized from Humaneti SaaS subscription plans.', kh: 'ប្រភពតម្លៃត្រូវបានសមកាលកម្មពីគម្រោង Subscription របស់ Humaneti SaaS។' }) }}
            </p>
          </div>

          <div>
            <label class="text-sm font-medium text-slate-700">{{ t({ en: 'Message', kh: 'សារ' }) }}</label>
            <textarea
              v-model="subscriptionForm.message"
              rows="4"
              maxlength="5000"
              class="mt-1.5 w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
              :placeholder="t({ en: 'Tell us your required modules, go-live timeline, and deployment priorities.', kh: 'សូមប្រាប់អំពីម៉ូឌុលដែលត្រូវការ កាលវិភាគដាក់ឱ្យប្រើ និងអាទិភាពអនុវត្ត។' })"
            ></textarea>
            <p v-if="firstFieldError('message')" class="mt-1 text-xs text-rose-600">{{ firstFieldError('message') }}</p>
          </div>

          <div v-if="submitError" class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-2 text-sm text-rose-700">
            {{ submitError }}
          </div>
          <div v-if="submitSuccess" class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-700">
            {{ submitSuccess }}
          </div>

          <div class="flex flex-wrap items-center justify-end gap-3">
            <UiButton type="button" variant="secondary" :disabled="submitLoading" @click="onTenantTypeChange">
              {{ t({ en: 'Refresh Plans', kh: 'ផ្ទុកគម្រោងឡើងវិញ' }) }}
            </UiButton>
            <UiButton type="submit" variant="primary" :disabled="submitLoading">
              {{ submitLoading ? t({ en: 'Submitting...', kh: 'កំពុងដាក់ស្នើ...' }) : t({ en: 'Submit Subscription Request', kh: 'ដាក់ស្នើសំណើជាវ' }) }}
            </UiButton>
          </div>
        </form>
      </div>
    </section>

    <!-- Implementation Services -->
    <section>
      <UiSection
        :kicker="t({ en: 'IMPLEMENTATION', kh: 'ការអនុវត្ត' })"
        :title="t({ en: 'What is included in setup', kh: 'អ្វីខ្លះរួមបញ្ចូលក្នុងការរៀបចំ' })"
        :subtitle="t({ en: 'We do not just hand you software—we partner with you for successful implementation.', kh: 'យើងមិនត្រឹមតែផ្តល់កម្មវិធីទេ ប៉ុន្តែធ្វើជាដៃគូជាមួយអ្នក ដើម្បីឱ្យការអនុវត្តជោគជ័យ។' })"
      />

      <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div 
          v-for="service in implementationServices" 
          :key="service.title"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="mb-4 text-4xl">{{ service.icon }}</div>
          <h3 class="text-lg font-semibold text-slate-900">{{ tx(service.title) }}</h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ tx(service.description) }}</p>
        </div>
      </div>
    </section>

    <!-- Feature Comparison Table -->
    <section>
      <UiSection
        :kicker="t({ en: 'DETAILED COMPARISON', kh: 'ការប្រៀបធៀបលម្អិត' })"
        :title="t({ en: 'Compare plans side-by-side', kh: 'ប្រៀបធៀបគម្រោងជាប់គ្នា' })"
        :subtitle="t({ en: 'See exactly what is included in each plan to make the right choice.', kh: 'មើលអ្វីដែលរួមបញ្ចូលក្នុងគម្រោងនីមួយៗ ដើម្បីជ្រើសរើសឱ្យត្រឹមត្រូវ។' })"
      />

      <div class="mt-12 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
          <table class="w-full">
            <caption class="sr-only">{{ t({ en: 'Plan features comparison table', kh: 'តារាងប្រៀបធៀបមុខងារគម្រោង' }) }}</caption>
            <thead>
              <tr class="border-b border-slate-200 bg-slate-50">
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">{{ t({ en: 'Features', kh: 'មុខងារ' }) }}</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-900">{{ tx('Starter') }}</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-900 bg-indigo-50">{{ tx('Business') }}</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-900">{{ tx('Enterprise') }}</th>
              </tr>
            </thead>
            <tbody>
              <template v-for="(section, idx) in comparison" :key="idx">
                <tr class="border-b border-slate-200 bg-slate-50">
                  <td colspan="4" class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-slate-700">
                    {{ tx(section.category) }}
                  </td>
                </tr>
                <tr 
                  v-for="feature in section.features" 
                  :key="feature.name"
                  class="border-b border-slate-100"
                >
                  <td class="px-6 py-4 text-sm text-slate-900">{{ tx(feature.name) }}</td>
                  <td class="px-6 py-4 text-center">
                    <template v-if="typeof feature.starter === 'boolean'">
                      <svg v-if="feature.starter" class="mx-auto h-5 w-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <svg v-else class="mx-auto h-5 w-5 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </template>
                    <span v-else class="text-sm text-slate-900">{{ tx(feature.starter) }}</span>
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
                    <span v-else class="text-sm font-medium text-slate-900">{{ tx(feature.business) }}</span>
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
                    <span v-else class="text-sm text-slate-900">{{ tx(feature.enterprise) }}</span>
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
        :kicker="t({ en: 'COMMON QUESTIONS', kh: 'សំណួរញឹកញាប់' })"
        :title="t({ en: 'Pricing & implementation FAQs', kh: 'សំណួរញឹកញាប់អំពីតម្លៃ និងការអនុវត្ត' })"
        :subtitle="t({ en: 'Have a question? We are here to help.', kh: 'មានសំណួរទេ? យើងនៅទីនេះដើម្បីជួយ។' })"
      />

      <div class="mt-12 mx-auto max-w-3xl">
        <div class="space-y-4">
          <div 
            v-for="faq in faqItems" 
            :key="faq.id"
            class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden transition-all"
            :class="activeFaq === faq.id ? 'ring-2 ring-indigo-500/20' : ''"
          >
            <button
              @click="toggleFaq(faq.id)"
              class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-slate-50 transition-colors"
              :id="`pricing-faq-trigger-${faq.id}`"
              :aria-expanded="activeFaq === faq.id ? 'true' : 'false'"
              :aria-controls="`pricing-faq-panel-${faq.id}`"
            >
              <span class="font-semibold text-slate-900">{{ tx(faq.q) }}</span>
              <svg 
                class="h-5 w-5 flex-shrink-0 text-slate-400 transition-transform"
                :class="activeFaq === faq.id ? 'rotate-180' : ''"
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
              <div
                :id="`pricing-faq-panel-${faq.id}`"
                role="region"
                :aria-labelledby="`pricing-faq-trigger-${faq.id}`"
                v-show="activeFaq === faq.id"
                class="px-6 pb-5 text-slate-600 leading-relaxed"
              >
                {{ tx(faq.a) }}
              </div>
            </Transition>
          </div>
        </div>

        <div class="mt-8 text-center">
          <p class="text-slate-600">{{ t({ en: 'Still have questions?', kh: 'នៅតែមានសំណួរទេ?' }) }}</p>
          <UiButton as="router-link" to="/contact" variant="secondary" size="md" class="mt-4">
            {{ t({ en: 'Contact Our Sales Team', kh: 'ទាក់ទងក្រុមលក់របស់យើង' }) }}
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
            {{ t({ en: 'Ready to get started?', kh: 'ត្រៀមចាប់ផ្តើមហើយឬនៅ?' }) }}
          </h2>
          <p class="mt-4 text-lg text-slate-600">
            {{ t({ en: 'Let us discuss your needs and find the perfect plan for your organization. No pressure, no commitments—just a conversation about how we can help.', kh: 'មកពិភាក្សាតម្រូវការរបស់អ្នក និងស្វែងរកគម្រោងដែលសមស្របបំផុតសម្រាប់អង្គការរបស់អ្នក។ គ្មានសម្ពាធ គ្មានកាតព្វកិច្ច—គ្រាន់តែជាការពិភាក្សាអំពីរបៀបដែលយើងអាចជួយបាន។' }) }}
          </p>
          
          <div class="mt-8 flex flex-wrap justify-center gap-4">
            <UiButton as="router-link" to="/contact" variant="primary" size="lg">
              {{ t({ en: 'Schedule a Demo', kh: 'កំណត់ពេលដេមូ' }) }}
            </UiButton>
            <UiButton as="router-link" to="/product" variant="secondary" size="lg">
              {{ t({ en: 'Explore Platform', kh: 'ស្វែងយល់វេទិកា' }) }}
            </UiButton>
          </div>

          <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm text-slate-600">
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'Free consultation', kh: 'ពិភាក្សាឥតគិតថ្លៃ' }) }}
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'Custom quote in 24h', kh: 'តម្លៃសម្រង់ក្នុង 24 ម៉ោង' }) }}
            </div>
            <div class="flex items-center gap-2">
              <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ t({ en: 'Flexible terms', kh: 'លក្ខខណ្ឌបត់បែន' }) }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
