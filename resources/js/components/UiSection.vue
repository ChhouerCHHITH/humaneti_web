<script setup>
defineProps({
  kicker: { type: String, default: '' },
  title: { type: String, default: '' },
  subtitle: { type: String, default: '' },
  as: {
    type: String,
    default: 'h2',
    validator: (v) => ['h1', 'h2', 'h3'].includes(v),
  },
})
</script>

<template>
  <div class="max-w-3xl">
    <p v-if="kicker" class="text-xs font-semibold tracking-widest text-slate-500">{{ kicker }}</p>
    <component
      :is="as"
      v-if="title"
      class="mt-2 text-3xl md:text-4xl font-semibold leading-tight"
    >{{ title }}</component>
    <p v-if="subtitle" class="mt-3 text-slate-600">{{ subtitle }}</p>
  </div>
</template>
