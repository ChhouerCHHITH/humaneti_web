<script setup>
const props = defineProps({
  tone: { type: String, default: 'neutral' }, // neutral | dark | success
})
const tones = {
  neutral: 'bg-slate-100 text-slate-700',
  dark: 'bg-slate-900 text-white',
  success: 'bg-emerald-100 text-emerald-700',
}
</script>

<template>
  <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold" :class="tones[tone]">
    <slot />
  </span>
</template>
