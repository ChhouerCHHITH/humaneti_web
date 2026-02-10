<script setup>
import { useToast } from './useToast'
const { state } = useToast()

const tones = {
  neutral: 'bg-white border-slate-200 text-slate-900',
  success: 'bg-emerald-50 border-emerald-200 text-emerald-900',
  danger: 'bg-rose-50 border-rose-200 text-rose-900',
}
</script>

<template>
  <div class="fixed right-4 top-4 z-[999] grid gap-2 w-[320px] max-w-[calc(100vw-2rem)]">
    <div
      v-for="t in state.items"
      :key="t.id"
      class="rounded-xl border p-3 shadow-sm"
      :class="tones[t.tone] || tones.neutral"
    >
      <div class="text-sm font-medium">{{ t.message }}</div>
    </div>
  </div>
</template>
