import { computed, ref } from 'vue'

const STORAGE_KEY = 'public_locale'
const LOCALE_CHANGED_EVENT = 'public-locale-changed'

const normalizeLocale = (value) => (value === 'kh' ? 'kh' : 'en')

const readLocaleFromUrl = () => {
  if (typeof window === 'undefined') return null
  try {
    const value = new URLSearchParams(window.location.search).get('lang')
    if (!value) return null
    return normalizeLocale(value)
  } catch (_) {
    return null
  }
}

const readStoredLocale = () => {
  if (typeof window === 'undefined') return 'en'
  const fromUrl = readLocaleFromUrl()
  if (fromUrl) {
    try {
      window.localStorage.setItem(STORAGE_KEY, fromUrl)
    } catch (_) {
      // ignore storage errors
    }
    return fromUrl
  }
  try {
    return normalizeLocale(window.localStorage.getItem(STORAGE_KEY))
  } catch (_) {
    return 'en'
  }
}

const applyDocumentLang = (value) => {
  if (typeof document === 'undefined') return
  document.documentElement.setAttribute('lang', value === 'kh' ? 'km' : 'en')
}

const locale = ref(readStoredLocale())
applyDocumentLang(locale.value)

const writeStoredLocale = (value) => {
  try {
    window.localStorage.setItem(STORAGE_KEY, value)
  } catch (_) {
    // ignore storage errors (private mode, blocked storage, etc.)
  }
}

const emitLocaleChange = (value) => {
  try {
    window.dispatchEvent(
      new CustomEvent(LOCALE_CHANGED_EVENT, {
        detail: { locale: value },
      }),
    )
  } catch (_) {
    // ignore event errors
  }
}

const pickPublicText = (value, activeLocale = locale.value) => {
  if (value == null) return ''
  if (typeof value === 'string') return value

  if (typeof value === 'object') {
    if ('en' in value || 'kh' in value) {
      return value[activeLocale] || value.en || value.kh || ''
    }
  }

  return String(value)
}

export function getPublicLocale() {
  return locale.value
}

export function usePublicI18n() {
  const setLocale = (value) => {
    const next = normalizeLocale(value)
    if (next === locale.value) return
    locale.value = next
    writeStoredLocale(next)
    applyDocumentLang(next)
    emitLocaleChange(next)
  }

  const toggleLocale = () => {
    setLocale(locale.value === 'en' ? 'kh' : 'en')
  }

  const t = (value) => pickPublicText(value, locale.value)

  return {
    locale,
    isKh: computed(() => locale.value === 'kh'),
    setLocale,
    toggleLocale,
    t,
  }
}

export { LOCALE_CHANGED_EVENT, pickPublicText }
