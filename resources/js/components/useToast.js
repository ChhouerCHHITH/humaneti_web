import { reactive } from 'vue'

const state = reactive({
  items: [],
})

export function useToast() {
  function push(message, tone = 'neutral') {
    const id = Math.random().toString(36).slice(2)
    state.items.push({ id, message, tone })
    setTimeout(() => {
      const idx = state.items.findIndex(x => x.id === id)
      if (idx >= 0) state.items.splice(idx, 1)
    }, 3500)
  }

  return { state, push }
}
