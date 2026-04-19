<script setup>
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import UiCard from '@/components/UiCard.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'
import { getModule, modules } from '@/data/modules'

const route = useRoute()
const { t } = usePublicI18n()

const mod = computed(() => getModule(route.params.slug))
const related = computed(() =>
  modules.filter((m) => m.slug !== route.params.slug).slice(0, 4),
)
</script>

<template>
  <div v-if="mod" class="space-y-16">
    <nav class="text-sm text-slate-500" :aria-label="t({ en: 'Breadcrumb', kh: 'ផ្លូវ' })">
      <RouterLink to="/" class="hover:text-slate-700">{{ t({ en: 'Home', kh: 'ទំព័រដើម' }) }}</RouterLink>
      <span class="px-2">/</span>
      <RouterLink to="/product" class="hover:text-slate-700">{{ t({ en: 'Product', kh: 'ផលិតផល' }) }}</RouterLink>
      <span class="px-2">/</span>
      <span class="text-slate-900">{{ t(mod.name) }}</span>
    </nav>

    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t(mod.name) }}</UiBadge>
      <UiSection as="h1" :title="t(mod.h1)" :subtitle="t(mod.lede)" />
    </section>

    <section v-if="mod.features?.length">
      <h2 class="text-2xl font-semibold text-slate-900 sm:text-3xl">
        {{ t({ en: 'What you get', kh: 'អ្វីដែលអ្នកទទួល' }) }}
      </h2>
      <ul class="mt-6 grid gap-4 sm:grid-cols-2">
        <li
          v-for="(feature, idx) in mod.features"
          :key="idx"
          class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4"
        >
          <span class="mt-0.5 text-emerald-600" aria-hidden="true">✓</span>
          <span class="text-slate-800">{{ t(feature) }}</span>
        </li>
      </ul>
    </section>

    <section v-if="mod.useCases?.length">
      <h2 class="text-2xl font-semibold text-slate-900 sm:text-3xl">
        {{ t({ en: 'Built for teams like these', kh: 'បង្កើតសម្រាប់ក្រុមការងារបែបនេះ' }) }}
      </h2>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <UiCard v-for="(uc, idx) in mod.useCases" :key="idx">
          <p class="text-slate-800">{{ t(uc) }}</p>
        </UiCard>
      </div>
    </section>

    <section v-if="mod.faq?.length">
      <h2 class="text-2xl font-semibold text-slate-900 sm:text-3xl">
        {{ t({ en: 'Frequently asked', kh: 'សំណួរញឹកញាប់' }) }}
      </h2>
      <dl class="mt-6 space-y-4">
        <div
          v-for="(item, idx) in mod.faq"
          :key="idx"
          class="rounded-xl border border-slate-200 bg-white p-5"
        >
          <dt class="font-semibold text-slate-900">{{ t(item.q) }}</dt>
          <dd class="mt-2 text-slate-700">{{ t(item.a) }}</dd>
        </div>
      </dl>
    </section>

    <section>
      <h2 class="text-2xl font-semibold text-slate-900 sm:text-3xl">
        {{ t({ en: 'Explore other modules', kh: 'ស្វែងយល់ម៉ូឌុលផ្សេងៗ' }) }}
      </h2>
      <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <RouterLink
          v-for="rel in related"
          :key="rel.slug"
          :to="`/product/${rel.slug}`"
          class="block rounded-xl border border-slate-200 bg-white p-5 transition hover:border-slate-300 hover:shadow-sm"
        >
          <div class="font-semibold text-slate-900">{{ t(rel.name) }}</div>
          <p class="mt-2 text-sm text-slate-600">{{ t(rel.description) }}</p>
        </RouterLink>
      </div>
    </section>

    <section class="rounded-2xl border border-slate-200 bg-slate-50 p-8">
      <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
          <h2 class="text-xl font-semibold text-slate-900">
            {{ t({ en: 'Ready to see it live?', kh: 'រួចរាល់មើលវាដំណើរការ?' }) }}
          </h2>
          <p class="mt-1 text-sm text-slate-600">
            {{ t({ en: 'Request a demo tailored to your team.', kh: 'ស្នើសុំដេមូសមស្របនឹងក្រុមរបស់អ្នក។' }) }}
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
    {{ t({ en: 'Module not found.', kh: 'រកមិនឃើញម៉ូឌុល។' }) }}
    <div class="mt-4">
      <RouterLink to="/product" class="text-indigo-600 hover:underline">
        {{ t({ en: 'Back to Product', kh: 'ត្រឡប់ទៅផលិតផល' }) }}
      </RouterLink>
    </div>
  </div>
</template>
