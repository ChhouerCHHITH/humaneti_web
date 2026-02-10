<script setup>
import { computed } from 'vue'

const props = defineProps({
  as: { type: String, default: 'button' }, // button | a | router-link
  to: { type: [String, Object], default: null },
  href: { type: String, default: null },
  variant: { type: String, default: 'primary' }, // primary | secondary | ghost
  size: { type: String, default: 'md' }, // sm | md | lg
  type: { type: String, default: 'button' },
  disabled: { type: Boolean, default: false },
})

const base = 'inline-flex items-center justify-center rounded-lg font-medium transition focus:outline-none focus:ring-2 focus:ring-slate-300 disabled:opacity-60 disabled:pointer-events-none'
const variants = {
  primary: 'bg-slate-900 text-white hover:opacity-90',
  secondary: 'border border-slate-200 bg-white hover:bg-slate-50 text-slate-900',
  ghost: 'text-slate-700 hover:bg-slate-50',
}
const sizes = {
  sm: 'px-3 py-2 text-sm',
  md: 'px-4 py-2 text-sm',
  lg: 'px-5 py-3 text-base',
}

const klass = computed(() => [base, variants[props.variant], sizes[props.size]].join(' '))
</script>

<template>
  <component
    :is="as === 'router-link' ? 'RouterLink' : as"
    :to="as === 'router-link' ? to : null"
    :href="as === 'a' ? href : null"
    :type="as === 'button' ? type : null"
    :class="klass"
    :disabled="disabled"
  >
    <slot />
  </component>
</template>
