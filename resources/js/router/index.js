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
import ModuleView from '@/views/public/product/ModuleView.vue'
import AudienceView from '@/views/public/solutions/AudienceView.vue'
import GuideIndexView from '@/views/public/guides/GuideIndexView.vue'
import GuideView from '@/views/public/guides/GuideView.vue'
import { LOCALE_CHANGED_EVENT, getPublicLocale, pickPublicText } from '@/composables/usePublicI18n'
import { getModule } from '@/data/modules'
import { getAudience } from '@/data/audiences'
import { getGuide } from '@/data/guides'

const SITE_NAME = 'Humaneti'
const SITE_URL = (import.meta.env.VITE_SITE_URL || window.location.origin || '').replace(/\/$/, '')
const DEFAULT_DESCRIPTION =
  'Humaneti is a workflow-first HRMS, payroll, and operations platform for Cambodia SMEs and NGOs.'
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
              en: 'HRMS, Payroll & Operations Software for Cambodia',
              kh: 'កម្មវិធី HRMS បៀវត្សរ៍ និងប្រតិបត្តិការសម្រាប់កម្ពុជា',
            },
            description: {
              en: 'Humaneti is the HRMS, payroll, and operations platform built for Cambodia SMEs and NGOs — bilingual, mobile-first, and audit-ready.',
              kh: 'Humaneti ជាវេទិកា HRMS បៀវត្សរ៍ និងប្រតិបត្តិការបង្កើតសម្រាប់ SME និងអង្គការនៅកម្ពុជា — ពីរភាសា ផ្តើមពីទូរស័ព្ទ និងត្រៀមសវនកម្ម។',
            },
          },
        },
        {
          path: 'product',
          name: 'public.product',
          component: ProductView,
          meta: {
            title: {
              en: 'Product Modules: HR, Payroll, Assets, Procurement',
              kh: 'ម៉ូឌុលផលិតផល៖ ធនធានមនុស្ស បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម',
            },
            description: {
              en: 'Humaneti product modules: People, Attendance, Leave, Payroll, Assets, Purchase Requests, Expense Claims, Projects, and Announcements — one platform for Cambodia operations.',
              kh: 'ម៉ូឌុលផលិតផល Humaneti៖ បុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ សំណើទិញ ការស្នើសុំសងថ្លៃចំណាយ គម្រោង និងសេចក្តីប្រកាស — វេទិកាមួយសម្រាប់ប្រតិបត្តិការកម្ពុជា។',
            },
          },
        },
        {
          path: 'product/:slug',
          name: 'public.product.module',
          component: ModuleView,
          meta: { dynamic: 'module' },
        },
        {
          path: 'solutions',
          name: 'public.solutions',
          component: SolutionsView,
          meta: {
            title: {
              en: 'Solutions for Cambodia NGOs, SMEs & Schools',
              kh: 'ដំណោះស្រាយសម្រាប់អង្គការ SME និងសាលារៀននៅកម្ពុជា',
            },
            description: {
              en: 'Humaneti solutions tailored for Cambodia: NGO compliance, SME growth, and school HR — with bilingual Khmer/English across every module.',
              kh: 'ដំណោះស្រាយ Humaneti សមស្របសម្រាប់កម្ពុជា៖ អនុលោមអង្គការ ការរីកលូតលាស់ SME និងធនធានមនុស្សសាលារៀន — ជាមួយភាសាខ្មែរ/អង់គ្លេសលើគ្រប់ម៉ូឌុល។',
            },
          },
        },
        {
          path: 'solutions/:slug',
          name: 'public.solutions.audience',
          component: AudienceView,
          meta: { dynamic: 'audience' },
        },
        {
          path: 'guides',
          name: 'public.guides',
          component: GuideIndexView,
          meta: {
            title: {
              en: 'Guides: HR, Payroll & Operations in Cambodia',
              kh: 'មគ្គុទេសក៍៖ ធនធានមនុស្ស បៀវត្សរ៍ និងប្រតិបត្តិការនៅកម្ពុជា',
            },
            description: {
              en: 'Practical guides for Cambodia teams running HR, payroll, procurement, and expense workflows — written for SMEs and NGOs.',
              kh: 'មគ្គុទេសក៍ជាក់ស្តែងសម្រាប់ក្រុមកម្ពុជាគ្រប់គ្រងធនធានមនុស្ស បៀវត្សរ៍ លទ្ធកម្ម និងលំហូរចំណាយ — សរសេរសម្រាប់ SME និងអង្គការ។',
            },
          },
        },
        {
          path: 'guides/:slug',
          name: 'public.guides.detail',
          component: GuideView,
          meta: { dynamic: 'guide' },
        },
        {
          path: 'pricing',
          name: 'public.pricing',
          component: PricingView,
          meta: {
            title: { en: 'Pricing', kh: 'តម្លៃ' },
            description: {
              en: 'Flexible plans aligned to the live Humaneti SaaS catalog: Starter for people operations, Business for payroll, Professional for expense and procurement, and Enterprise for the full module set.',
              kh: 'ផែនការតម្លៃបត់បែន ដែលស្របតាមកាតាឡុក SaaS របស់ Humaneti៖ Starter សម្រាប់ប្រតិបត្តិការបុគ្គលិក Business សម្រាប់បៀវត្សរ៍ Professional សម្រាប់ចំណាយ និងលទ្ធកម្ម និង Enterprise សម្រាប់ម៉ូឌុលពេញលេញ។',
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
              kh: 'មគ្គុទេសក៍ និងព័ត៌មានថ្មីៗអំពីលំហូរការងារធនធានមនុស្ស បៀវត្សរ៍ ការតាមដានទ្រព្យសម្បត្តិ និងការអនុម័តសំណើទិញ សម្រាប់ការប្រើប្រាស់ប្រចាំថ្ងៃ។',
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
              kh: 'Humaneti ត្រូវបានបង្កើតឡើងដើម្បីជួយក្រុមការងារគ្រប់គ្រងធនធានមនុស្ស និងប្រតិបត្តិការ ដោយមានលំហូរការងារច្បាស់ ការគ្រប់គ្រងរឹងមាំ និងកំណត់ត្រាអាចត្រួតពិនិត្យបាន។',
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
              en: 'Request a demo or ask a question. Contact Humaneti to discuss People, Attendance, Leave, Payroll, Asset, Procurement, Expense Claim, Project, and announcement workflow requirements.',
              kh: 'ស្នើសុំដេមូ ឬសាកសួរ។ ទាក់ទង Humaneti ដើម្បីពិភាក្សាតម្រូវការលំហូរការងារផ្នែកបុគ្គលិក វត្តមាន ការឈប់សម្រាក បៀវត្សរ៍ ទ្រព្យសម្បត្តិ លទ្ធកម្ម ចំណាយ គម្រោង និងសេចក្តីប្រកាស។',
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

// Resolve dynamic meta from data files for /product/:slug, /solutions/:slug, /guides/:slug
function resolveDynamicMeta(to) {
  const kind = to.meta?.dynamic
  if (!kind) return null
  const slug = to.params?.slug
  if (!slug) return null
  if (kind === 'module') {
    const mod = getModule(slug)
    if (!mod) return null
    return { title: mod.seoTitle || mod.name, description: mod.description }
  }
  if (kind === 'audience') {
    const a = getAudience(slug)
    if (!a) return null
    return { title: a.seoTitle || a.name, description: a.description }
  }
  if (kind === 'guide') {
    const g = getGuide(slug)
    if (!g) return null
    return { title: g.seoTitle || g.title, description: g.description }
  }
  return null
}

const applyRouteMeta = (to) => {
  const activeLocale = getPublicLocale()
  const dyn = resolveDynamicMeta(to)
  const titleSrc = dyn?.title || to.meta?.title
  const descSrc = dyn?.description || to.meta?.description

  const pageTitle = pickPublicText(titleSrc, activeLocale)
  const titlePart = pageTitle ? `${pageTitle} | ${SITE_NAME}` : SITE_NAME
  document.title = titlePart

  const desc = pickPublicText(descSrc, activeLocale) || DEFAULT_DESCRIPTION
  upsertMetaTag('description', desc)
  upsertMetaTag('robots', 'index,follow')

  const canonical = SITE_URL ? `${SITE_URL}${to.path}` : null
  upsertLinkTag('canonical', canonical)
  upsertAlternateLinkTag('en', canonical ? `${canonical}?lang=en` : null)
  upsertAlternateLinkTag('km', canonical ? `${canonical}?lang=kh` : null)
  upsertAlternateLinkTag('x-default', canonical)

  const ogType = to.meta?.dynamic === 'guide' ? 'article' : 'website'
  upsertMetaTag('og:title', titlePart, 'property')
  upsertMetaTag('og:description', desc, 'property')
  upsertMetaTag('og:type', ogType, 'property')
  upsertMetaTag('og:site_name', SITE_NAME, 'property')
  upsertMetaTag('og:url', canonical || window.location.href, 'property')
  upsertMetaTag('og:image', to.meta?.ogImage || DEFAULT_OG_IMAGE, 'property')
  upsertMetaTag('og:image:type', 'image/png', 'property')
  upsertMetaTag('og:image:width', '512', 'property')
  upsertMetaTag('og:image:height', '512', 'property')
  upsertMetaTag('og:image:alt', `${SITE_NAME} logo`, 'property')
  upsertMetaTag('og:locale', activeLocale === 'kh' ? 'km_KH' : 'en_US', 'property')
  upsertMetaTag('og:locale:alternate', activeLocale === 'kh' ? 'en_US' : 'km_KH', 'property')

  upsertMetaTag('twitter:card', 'summary_large_image')
  upsertMetaTag('twitter:title', titlePart)
  upsertMetaTag('twitter:description', desc)
  upsertMetaTag('twitter:image', to.meta?.ogImage || DEFAULT_OG_IMAGE)
  upsertMetaTag('twitter:image:alt', `${SITE_NAME} logo`)
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
