<script setup>
import { RouterLink } from 'vue-router'
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'
import { guides } from '@/data/guides'

const { t } = usePublicI18n()
</script>

<template>
  <div class="space-y-12">
    <section>
      <UiBadge tone="neutral" class="mb-6">{{ t({ en: 'GUIDES', kh: 'មគ្គុទេសក៍' }) }}</UiBadge>
      <UiSection
        as="h1"
        :title="t({ en: 'Guides for HR, payroll, and operations in Cambodia', kh: 'មគ្គុទេសក៍សម្រាប់ធនធានមនុស្ស បៀវត្សរ៍ និងប្រតិបត្តិការនៅកម្ពុជា' })"
        :subtitle="t({ en: 'Practical articles for teams running people, payroll, procurement, and expense workflows.', kh: 'អត្ថបទជាក់ស្តែងសម្រាប់ក្រុមដែលកំពុងដំណើរការលំហូរបុគ្គលិក បៀវត្សរ៍ លទ្ធកម្ម និងចំណាយ។' })"
      />
    </section>

    <section>
      <div class="grid gap-6 md:grid-cols-2">
        <article
          v-for="guide in guides"
          :key="guide.slug"
          class="flex flex-col rounded-2xl border border-slate-200 bg-white p-6 transition hover:border-slate-300 hover:shadow-sm"
        >
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">
            {{ guide.category }} · {{ guide.readMinutes }} {{ t({ en: 'min read', kh: 'នាទីអាន' }) }}
          </div>
          <h2 class="mt-3 text-xl font-semibold text-slate-900">
            <RouterLink :to="`/guides/${guide.slug}`" class="hover:text-indigo-600">
              {{ t(guide.title) }}
            </RouterLink>
          </h2>
          <p class="mt-3 flex-1 text-sm text-slate-600">{{ t(guide.description) }}</p>
          <RouterLink :to="`/guides/${guide.slug}`" class="mt-4 text-sm font-medium text-indigo-600 hover:underline">
            {{ t({ en: 'Read guide', kh: 'អានមគ្គុទេសក៍' }) }} →
          </RouterLink>
        </article>
      </div>
    </section>
  </div>
</template>
