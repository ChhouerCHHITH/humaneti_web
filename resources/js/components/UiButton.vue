<script setup>
import { computed } from 'vue'
import { RouterLink } from 'vue-router'

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

const tag = computed(() => {
  if (props.as === 'router-link') return RouterLink
  return props.as
})
</script>

<template>
  <component
    :is="tag"
    :to="as === 'router-link' ? to : undefined"
    :href="as === 'a' ? href : undefined"
    :type="as === 'button' ? type : undefined"
    :class="klass"
    :disabled="as === 'button' ? disabled : undefined"
  >
    <slot />
  </component>
</template>
