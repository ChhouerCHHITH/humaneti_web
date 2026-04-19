<script setup>
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import UiButton from '@/components/UiButton.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'
import { getGuide } from '@/data/guides'
import { modules as allModules } from '@/data/modules'

const route = useRoute()
const { t } = usePublicI18n()

const guide = computed(() => getGuide(route.params.slug))
const relatedModules = computed(() => {
  if (!guide.value?.relatedModules?.length) return []
  return guide.value.relatedModules
    .map((slug) => allModules.find((m) => m.slug === slug))
    .filter(Boolean)
})
</script>

<template>
  <div v-if="guide" class="space-y-12">
    <nav class="text-sm text-slate-500" :aria-label="t({ en: 'Breadcrumb', kh: 'ផ្លូវ' })">
      <RouterLink to="/" class="hover:text-slate-700">{{ t({ en: 'Home', kh: 'ទំព័រដើម' }) }}</RouterLink>
      <span class="px-2">/</span>
      <RouterLink to="/guides" class="hover:text-slate-700">{{ t({ en: 'Guides', kh: 'មគ្គុទេសក៍' }) }}</RouterLink>
      <span class="px-2">/</span>
      <span class="text-slate-900">{{ t(guide.title) }}</span>
    </nav>

    <article class="space-y-10">
      <header class="space-y-4">
        <UiBadge tone="neutral">{{ guide.category }}</UiBadge>
        <UiSection as="h1" :title="t(guide.title)" :subtitle="t(guide.description)" />
        <div class="text-xs text-slate-500">
          {{ t({ en: 'Updated', kh: 'ធ្វើបច្ចុប្បន្នភាព' }) }} {{ guide.updatedAt }}
          · {{ guide.readMinutes }} {{ t({ en: 'min read', kh: 'នាទីអាន' }) }}
        </div>
      </header>

      <section
        v-for="(section, idx) in guide.sections"
        :key="idx"
        class="space-y-3"
      >
        <h2 class="text-2xl font-semibold text-slate-900">{{ t(section.heading) }}</h2>
        <p v-if="section.body" class="text-slate-700 leading-relaxed">
          {{ t(section.body) }}
        </p>
        <ul v-if="section.bullets?.length" class="space-y-2">
          <li
            v-for="(bullet, bIdx) in section.bullets"
            :key="bIdx"
            class="flex items-start gap-3 rounded-lg border border-slate-200 bg-white p-3"
          >
            <span class="mt-0.5 text-emerald-600" aria-hidden="true">✓</span>
            <span class="text-slate-800">{{ t(bullet) }}</span>
          </li>
        </ul>
      </section>
    </article>

    <section v-if="relatedModules.length" class="border-t border-slate-200 pt-10">
      <h2 class="text-2xl font-semibold text-slate-900">
        {{ t({ en: 'Related modules', kh: 'ម៉ូឌុលពាក់ព័ន្ធ' }) }}
      </h2>
      <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <RouterLink
          v-for="mod in relatedModules"
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
            {{ t({ en: 'Want a demo for your team?', kh: 'ចង់បានដេមូសម្រាប់ក្រុមរបស់អ្នក?' }) }}
          </h2>
          <p class="mt-1 text-sm text-slate-600">
            {{ t({ en: 'We run live sessions tailored to your operations in Cambodia.', kh: 'យើងរៀបចំសេស្សផ្ទាល់សមស្របនឹងប្រតិបត្តិការរបស់អ្នកនៅកម្ពុជា។' }) }}
          </p>
        </div>
        <div class="flex gap-3">
          <UiButton as="router-link" :to="'/guides'" variant="secondary">{{ t({ en: 'All guides', kh: 'មគ្គុទេសក៍ទាំងអស់' }) }}</UiButton>
          <UiButton as="router-link" :to="'/contact'">{{ t({ en: 'Contact us', kh: 'ទាក់ទង' }) }}</UiButton>
        </div>
      </div>
    </section>
  </div>

  <div v-else class="py-16 text-center text-slate-600">
    {{ t({ en: 'Guide not found.', kh: 'រកមិនឃើញមគ្គុទេសក៍។' }) }}
    <div class="mt-4">
      <RouterLink to="/guides" class="text-indigo-600 hover:underline">
        {{ t({ en: 'Back to Guides', kh: 'ត្រឡប់ទៅមគ្គុទេសក៍' }) }}
      </RouterLink>
    </div>
  </div>
</template>
