import { createRouter, createWebHistory } from 'vue-router'
import PublicLayout from '../layouts/PublicLayout.vue'

import HomeView from '@/views/public/HomeView.vue'
import ProductView from '@/views/public/ProductView.vue'
import SolutionsView from '@/views/public/SolutionsView.vue'
import PricingView from '@/views/public/PricingView.vue'
import AboutView from '@/views/public/AboutView.vue'
import ResourcesView from '@/views/public/ResourcesView.vue'
import ContactView from '@/views/public/ContactView.vue'
import PrivacyView from '@/views/public/legal/PrivacyView.vue'
import TermsView from '@/views/public/legal/TermsView.vue'
import { LOCALE_CHANGED_EVENT, getPublicLocale, pickPublicText } from '@/composables/usePublicI18n'

const SITE_NAME = 'Humaneti'
const SITE_URL = (import.meta.env.VITE_SITE_URL || window.location.origin || '').replace(/\/$/, '')
const DEFAULT_DESCRIPTION =
  'Humaneti is a workflow-first platform for People, Payroll, Assets, Purchase Requests, Expense Claims, and Projects.'
const DEFAULT_OG_IMAGE = `${SITE_URL}/favicon/android-chrome-512x512.png`

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: PublicLayout,
      children: [
        {
          path: '',
          name: 'public.home',
          component: HomeView,
          meta: {
            title: {
              en: 'People, Payroll, Assets, Procurement, Claims & Projects',
              kh: 'បុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ចំណាយ និងគម្រោង',
            },
            description: {
              en: 'Humaneti is a workflow-first platform for People, Payroll, Assets, Purchase Requests, Expense Claims, and Projects. Clean UX, clear controls, audit-ready history.',
              kh: 'Humaneti ជាវេទិកាផ្អែកលើលំហូរការងារ សម្រាប់បុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ និងគម្រោង។ រចនាប័ទ្មច្បាស់ ការគ្រប់គ្រងច្បាស់ និងប្រវត្តិត្រួតពិនិត្យបាន។',
            },
          },
        },
        {
          path: 'product',
          name: 'public.product',
          component: ProductView,
          meta: {
            title: { en: 'Product', kh: 'ផលិតផល' },
            description: {
              en: 'Explore Humaneti modules: People, Payroll, Assets, Purchase Requests, Expense Claims, and Projects. Standard approvals, roles, and traceable actions across teams.',
              kh: 'ស្វែងយល់អំពីម៉ូឌុល Humaneti៖ បុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការទាមទារចំណាយ និងគម្រោង។ អនុម័តស្តង់ដារ តួនាទីច្បាស់ និងសកម្មភាពអាចតាមដានបាន។',
            },
          },
        },
        {
          path: 'solutions',
          name: 'public.solutions',
          component: SolutionsView,
          meta: {
            title: { en: 'Solutions', kh: 'ដំណោះស្រាយ' },
            description: {
              en: 'Solutions for SMEs and NGOs: streamline approvals, reduce manual follow-ups, improve accountability, and keep decisions traceable across operations.',
              kh: 'ដំណោះស្រាយសម្រាប់ SME និង NGO៖ បង្កើនល្បឿនអនុម័ត កាត់បន្ថយការតាមដានដៃ បង្កើនការទទួលខុសត្រូវ និងធានាថាការសម្រេចចិត្តអាចតាមដានបាន។',
            },
          },
        },
        {
          path: 'pricing',
          name: 'public.pricing',
          component: PricingView,
          meta: {
            title: { en: 'Pricing', kh: 'តម្លៃ' },
            description: {
              en: 'Flexible plans to start small and scale. Choose the Humaneti modules you need and expand into a complete operations backbone as your team grows.',
              kh: 'ផែនការតម្លៃបត់បែន សម្រាប់ចាប់ផ្ដើមតូច និងពង្រីកតាមតម្រូវការ។ ជ្រើសម៉ូឌុលដែលត្រូវការ ហើយពង្រីកជាវេទិកាប្រតិបត្តិការពេញលេញ។',
            },
          },
        },
        {
          path: 'resources',
          name: 'public.resources',
          component: ResourcesView,
          meta: {
            title: { en: 'Resources', kh: 'ធនធាន' },
            description: {
              en: 'Guides and updates on HR workflows, payroll operations, asset tracking, and purchase request approvals—built for practical day-to-day use.',
              kh: 'មគ្គុទេសក៍ និងព័ត៌មានថ្មីៗអំពីលំហូរការងារ HR បៀវត្សរ៍ ការតាមដានទ្រព្យសម្បត្តិ និងការអនុម័តសំណើទិញ សម្រាប់ការប្រើប្រាស់ប្រចាំថ្ងៃ។',
            },
          },
        },
        {
          path: 'about',
          name: 'public.about',
          component: AboutView,
          meta: {
            title: { en: 'About', kh: 'អំពី' },
            description: {
              en: 'Humaneti is built to help teams run HR and operations with clear workflows, strong control, and audit-ready records—without heavy complexity.',
              kh: 'Humaneti ត្រូវបានបង្កើតឡើងដើម្បីជួយក្រុមការងារគ្រប់គ្រង HR និងប្រតិបត្តិការ ដោយមានលំហូរការងារច្បាស់ ការគ្រប់គ្រងរឹងមាំ និងកំណត់ត្រាអាចត្រួតពិនិត្យបាន។',
            },
          },
        },
        {
          path: 'contact',
          name: 'public.contact',
          component: ContactView,
          meta: {
            title: { en: 'Contact', kh: 'ទំនាក់ទំនង' },
            description: {
              en: 'Request a demo or ask a question. Contact Humaneti to discuss People, Payroll, Asset, Procurement, Expense Claim, and Project workflow requirements.',
              kh: 'ស្នើសុំដេមូ ឬសាកសួរ។ ទាក់ទង Humaneti ដើម្បីពិភាក្សាតម្រូវការលំហូរការងារផ្នែកបុគ្គលិក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ចំណាយ និងគម្រោង។',
            },
          },
        },
        {
          path: 'legal/privacy',
          name: 'public.privacy',
          component: PrivacyView,
          meta: {
            title: { en: 'Privacy Policy', kh: 'គោលការណ៍ភាពឯកជន' },
            description: {
              en: 'Read the Humaneti Privacy Policy: how we collect, use, and protect information when you use our website and services.',
              kh: 'អានគោលការណ៍ភាពឯកជនរបស់ Humaneti៖ របៀបប្រមូល ប្រើប្រាស់ និងការពារព័ត៌មាន នៅពេលអ្នកប្រើគេហទំព័រ និងសេវាកម្ម។',
            },
          },
        },
        {
          path: 'legal/terms',
          name: 'public.terms',
          component: TermsView,
          meta: {
            title: { en: 'Terms of Service', kh: 'លក្ខខណ្ឌសេវាកម្ម' },
            description: {
              en: 'Read the Humaneti Terms of Service: usage rules, responsibilities, limitations, and service terms for the Humaneti platform.',
              kh: 'អានលក្ខខណ្ឌសេវាកម្មរបស់ Humaneti៖ ច្បាប់ប្រើប្រាស់ ភារកិច្ច ដែនកំណត់ និងលក្ខខណ្ឌសេវាកម្មសម្រាប់វេទិកា។',
            },
          },
        },
      ],
    },
  ],
  scrollBehavior(to) {
    if (to.hash) {
      return {
        el: to.hash,
        top: 96,
        behavior: 'smooth',
      }
    }
    return { top: 0 }
  },
})

function upsertMetaTag(name, content, attr = 'name') {
  if (!content) return
  let el = document.querySelector(`meta[${attr}="${name}"]`)
  if (!el) {
    el = document.createElement('meta')
    el.setAttribute(attr, name)
    document.head.appendChild(el)
  }
  el.setAttribute('content', content)
}

function upsertLinkTag(rel, href) {
  if (!href) return
  let el = document.querySelector(`link[rel="${rel}"]`)
  if (!el) {
    el = document.createElement('link')
    el.setAttribute('rel', rel)
    document.head.appendChild(el)
  }
  el.setAttribute('href', href)
}

function upsertAlternateLinkTag(hreflang, href) {
  if (!href) return
  let el = document.querySelector(`link[rel="alternate"][hreflang="${hreflang}"]`)
  if (!el) {
    el = document.createElement('link')
    el.setAttribute('rel', 'alternate')
    el.setAttribute('hreflang', hreflang)
    document.head.appendChild(el)
  }
  el.setAttribute('href', href)
}

const applyRouteMeta = (to) => {
  const activeLocale = getPublicLocale()
  const pageTitle = pickPublicText(to.meta?.title, activeLocale)
  const titlePart = pageTitle ? `${pageTitle} | ${SITE_NAME}` : SITE_NAME
  document.title = titlePart

  const desc = pickPublicText(to.meta?.description, activeLocale) || DEFAULT_DESCRIPTION
  upsertMetaTag('description', desc)
  upsertMetaTag('robots', 'index,follow')

  const canonical = SITE_URL ? `${SITE_URL}${to.path}` : null
  upsertLinkTag('canonical', canonical)
  upsertAlternateLinkTag('en', canonical ? `${canonical}?lang=en` : null)
  upsertAlternateLinkTag('kh', canonical ? `${canonical}?lang=kh` : null)
  upsertAlternateLinkTag('x-default', canonical)

  upsertMetaTag('og:title', titlePart, 'property')
  upsertMetaTag('og:description', desc, 'property')
  upsertMetaTag('og:type', 'website', 'property')
  upsertMetaTag('og:site_name', SITE_NAME, 'property')
  upsertMetaTag('og:url', canonical || window.location.href, 'property')
  upsertMetaTag('og:image', to.meta?.ogImage || DEFAULT_OG_IMAGE, 'property')
  upsertMetaTag('og:locale', activeLocale === 'kh' ? 'km_KH' : 'en_US', 'property')

  upsertMetaTag('twitter:card', 'summary_large_image')
  upsertMetaTag('twitter:title', titlePart)
  upsertMetaTag('twitter:description', desc)
  upsertMetaTag('twitter:image', to.meta?.ogImage || DEFAULT_OG_IMAGE)
}

router.afterEach((to) => {
  applyRouteMeta(to)
})

if (typeof window !== 'undefined') {
  window.addEventListener(LOCALE_CHANGED_EVENT, () => {
    applyRouteMeta(router.currentRoute.value)
  })
}

export default router
