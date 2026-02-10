<script setup>
defineProps({
  kicker: { type: String, default: '' },
  title: { type: String, default: '' },
  subtitle: { type: String, default: '' },
})
</script>

<template>
  <div class="max-w-3xl">
    <p v-if="kicker" class="text-xs font-semibold tracking-widest text-slate-500">{{ kicker }}</p>
    <h2 v-if="title" class="mt-2 text-3xl md:text-4xl font-semibold leading-tight">{{ title }}</h2>
    <p v-if="subtitle" class="mt-3 text-slate-600">{{ subtitle }}</p>
  </div>
</template>
