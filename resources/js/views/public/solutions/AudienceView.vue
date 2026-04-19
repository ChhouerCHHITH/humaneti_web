<script setup>
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import UiCard from '@/components/UiCard.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'
import { getAudience } from '@/data/audiences'
import { modules as allModules } from '@/data/modules'

const route = useRoute()
const { t } = usePublicI18n()

const audience = computed(() => getAudience(route.params.slug))
const ctaModules = computed(() => {
  if (!audience.value) return []
  return audience.value.ctaModules
    .map((slug) => allModules.find((m) => m.slug === slug))
    .filter(Boolean)
})
</script>

<template>
  <div v-if="audience" class="space-y-16">
    <nav class="text-sm text-slate-500" :aria-label="t({ en: 'Breadcrumb', kh: 'ផ្លូវ' })">
      <RouterLink to="/" class="hover:text-slate-700">{{ t({ en: 'Home', kh: 'ទំព័រដើម' }) }}</RouterLink>
      <span class="px-2">/</span>
      <RouterLink to="/solutions" class="hover:text-slate-700">{{ t({ en: 'Solutions', kh: 'ដំណោះស្រាយ' }) }}</RouterLink>
      <span class="px-2">/</span>
      <span class="text-slate-900">{{ t(audience.name) }}</span>
    </nav>

    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t(audience.name) }}</UiBadge>
      <UiSection as="h1" :title="t(audience.h1)" :subtitle="t(audience.lede)" />
    </section>

    <section v-if="audience.painPoints?.length">
      <h2 class="text-2xl font-semibold text-slate-900 sm:text-3xl">
        {{ t({ en: 'Problems we hear about', kh: 'បញ្ហាដែលយើងឃើញ' }) }}
      </h2>
      <ul class="mt-6 grid gap-4 md:grid-cols-3">
        <li v-for="(point, idx) in audience.painPoints" :key="idx" class="rounded-xl border border-slate-200 bg-white p-5">
          <p class="text-slate-800">{{ t(point) }}</p>
        </li>
      </ul>
    </section>

    <section v-if="audience.highlights?.length">
      <h2 class="text-2xl font-semibold text-slate-900 sm:text-3xl">
        {{ t({ en: 'What changes with Humaneti', kh: 'អ្វីដែលផ្លាស់ប្តូរជាមួយ Humaneti' }) }}
      </h2>
      <ul class="mt-6 grid gap-4 md:grid-cols-3">
        <li v-for="(highlight, idx) in audience.highlights" :key="idx" class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-5">
          <span class="mt-0.5 text-emerald-600" aria-hidden="true">✓</span>
          <span class="text-slate-800">{{ t(highlight) }}</span>
        </li>
      </ul>
    </section>

    <section v-if="ctaModules.length">
      <h2 class="text-2xl font-semibold text-slate-900 sm:text-3xl">
        {{ t({ en: 'Recommended modules', kh: 'ម៉ូឌុលដែលស្នើ' }) }}
      </h2>
      <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <RouterLink
          v-for="mod in ctaModules"
          :key="mod.slug"
          :to="`/product/${mod.slug}`"
          class="block rounded-xl border border-slate-200 bg-white p-5 transition hover:border-slate-300 hover:shadow-sm"
        >
          <div class="font-semibold text-slate-900">{{ t(mod.name) }}</div>
          <p class="mt-2 text-sm text-slate-600">{{ t(mod.description) }}</p>
        </RouterLink>
      </div>
    </section>

    <section class="rounded-2xl border border-slate-200 bg-slate-50 p-8">
      <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
          <h2 class="text-xl font-semibold text-slate-900">
            {{ t({ en: 'Talk to our team', kh: 'និយាយជាមួយក្រុមរបស់យើង' }) }}
          </h2>
          <p class="mt-1 text-sm text-slate-600">
            {{ t({ en: 'Get a walkthrough tailored to your operations.', kh: 'ទទួលការណែនាំសមស្របនឹងប្រតិបត្តិការរបស់អ្នក។' }) }}
          </p>
        </div>
        <div class="flex gap-3">
          <UiButton as="router-link" :to="'/pricing'" variant="secondary">{{ t({ en: 'See pricing', kh: 'មើលតម្លៃ' }) }}</UiButton>
          <UiButton as="router-link" :to="'/contact'">{{ t({ en: 'Contact us', kh: 'ទាក់ទង' }) }}</UiButton>
        </div>
      </div>
    </section>
  </div>

  <div v-else class="py-16 text-center text-slate-600">
    {{ t({ en: 'Solution not found.', kh: 'រកមិនឃើញដំណោះស្រាយ។' }) }}
    <div class="mt-4">
      <RouterLink to="/solutions" class="text-indigo-600 hover:underline">
        {{ t({ en: 'Back to Solutions', kh: 'ត្រឡប់ទៅដំណោះស្រាយ' }) }}
      </RouterLink>
    </div>
  </div>
</template>
