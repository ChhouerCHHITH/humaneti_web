<script setup>
import { ref } from 'vue'
import UiSection from '../../components/UiSection.vue'
import UiCard from '../../components/UiCard.vue'
import UiBadge from '../../components/UiBadge.vue'
import UiButton from '../../components/UiButton.vue'
import { useToast } from '../../components/useToast'

const { push } = useToast()

const loading = ref(false)
const form = ref({
  name: '',
  email: '',
  company: '',
  phone: '',
  message: 'Hello Humaneti team, I would like a demo for HRM/Payroll/Asset/Purchase Request.',
})

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
    push(data?.message || 'Submitted successfully.', 'success')

    form.value = {
      name: '',
      email: '',
      company: '',
      phone: '',
      message: 'Hello Humaneti team, I would like a demo for HRM/Payroll/Asset/Purchase Request.',
    }
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <UiBadge tone="neutral">CONTACT</UiBadge>

  <div class="mt-4">
    <UiSection
      kicker="TALK TO SALES / IMPLEMENTATION"
      title="Request a demo or implementation discussion"
      subtitle="Send your details and we will respond with a short plan and timeline options."
    />
  </div>

  <div class="mt-8 grid gap-6 md:grid-cols-2">
    <UiCard>
      <div class="font-semibold text-lg">Contact form</div>
      <p class="mt-2 text-sm text-slate-600">We typically respond within business hours.</p>

      <form class="mt-6 grid gap-4" @submit.prevent="submit">
        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-sm font-medium">Name</label>
            <input v-model="form.name" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300" required />
          </div>
          <div>
            <label class="text-sm font-medium">Email</label>
            <input v-model="form.email" type="email" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300" required />
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-sm font-medium">Company</label>
            <input v-model="form.company" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300" />
          </div>
          <div>
            <label class="text-sm font-medium">Phone</label>
            <input v-model="form.phone" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300" />
          </div>
        </div>

        <div>
          <label class="text-sm font-medium">Message</label>
          <textarea v-model="form.message" rows="5" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300" required />
        </div>

        <UiButton :disabled="loading" variant="primary" class="w-full">
          {{ loading ? 'Submitting...' : 'Submit Request' }}
        </UiButton>

        <p class="text-xs text-slate-500">
          By submitting, you agree to our Privacy Policy.
        </p>
      </form>
    </UiCard>

    <div class="space-y-4">
      <UiCard>
        <div class="font-semibold">Business contact</div>
        <div class="mt-2 text-sm text-slate-600">
          Email: <span class="text-slate-900">sales@humaneti.com</span><br>
          Phone: <span class="text-slate-900">(+855) 000 000 000</span><br>
          Location: <span class="text-slate-900">Phnom Penh, Cambodia</span>
        </div>
      </UiCard>

      <UiCard>
        <div class="font-semibold">What to include</div>
        <ul class="mt-2 space-y-2 text-sm text-slate-600 list-disc pl-5">
          <li>Number of employees and departments</li>
          <li>Which modules you want first</li>
          <li>Approval steps (who approves what)</li>
          <li>Any compliance/audit requirements</li>
        </ul>
      </UiCard>
    </div>
  </div>
</template>
