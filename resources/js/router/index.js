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

const SITE_NAME = 'Humaneti'
const SITE_URL = 'https://humaneti.com' // change later when live

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
            title: 'HRM, Payroll, Assets & Purchase Requests',
            description:
              'Humaneti is a workflow-first platform for HRM, payroll, asset tracking, and purchase request approvals. Clean UX, clear controls, audit-ready history.',
          },
        },
        {
          path: 'product',
          name: 'public.product',
          component: ProductView,
          meta: {
            title: 'Product',
            description:
              'Explore Humaneti modules: HRM, payroll, asset management, and purchase request workflows. Standard approvals, roles, and traceable actions across teams.',
          },
        },
        {
          path: 'solutions',
          name: 'public.solutions',
          component: SolutionsView,
          meta: {
            title: 'Solutions',
            description:
              'Solutions for SMEs and NGOs: streamline approvals, reduce manual follow-ups, improve accountability, and keep decisions traceable across operations.',
          },
        },
        {
          path: 'pricing',
          name: 'public.pricing',
          component: PricingView,
          meta: {
            title: 'Pricing',
            description:
              'Flexible plans to start small and scale. Choose the Humaneti modules you need and expand into a complete operations backbone as your team grows.',
          },
        },
        {
          path: 'resources',
          name: 'public.resources',
          component: ResourcesView,
          meta: {
            title: 'Resources',
            description:
              'Guides and updates on HR workflows, payroll operations, asset tracking, and purchase request approvals—built for practical day-to-day use.',
          },
        },
        {
          path: 'about',
          name: 'public.about',
          component: AboutView,
          meta: {
            title: 'About',
            description:
              'Humaneti is built to help teams run HR and operations with clear workflows, strong control, and audit-ready records—without heavy complexity.',
          },
        },
        {
          path: 'contact',
          name: 'public.contact',
          component: ContactView,
          meta: {
            title: 'Contact',
            description:
              'Request a demo or ask a question. Contact Humaneti to discuss your HRM, payroll, asset, and purchase request workflow requirements.',
          },
        },
        {
          path: 'legal/privacy',
          name: 'public.privacy',
          component: PrivacyView,
          meta: {
            title: 'Privacy Policy',
            description:
              'Read the Humaneti Privacy Policy: how we collect, use, and protect information when you use our website and services.',
          },
        },
        {
          path: 'legal/terms',
          name: 'public.terms',
          component: TermsView,
          meta: {
            title: 'Terms of Service',
            description:
              'Read the Humaneti Terms of Service: usage rules, responsibilities, limitations, and service terms for the Humaneti platform.',
          },
        },
      ],
    },
  ],
  scrollBehavior() {
    return { top: 0 }
  },
})

function upsertMetaTag(name, content) {
  if (!content) return
  let el = document.querySelector(`meta[name="${name}"]`)
  if (!el) {
    el = document.createElement('meta')
    el.setAttribute('name', name)
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

router.afterEach((to) => {
  const titlePart = to.meta?.title ? `${SITE_NAME} - ${to.meta.title}` : SITE_NAME
  document.title = titlePart

  const desc =
    to.meta?.description ||
    'Humaneti is a workflow-first platform for HRM, payroll, asset tracking, and purchase request approvals.'
  upsertMetaTag('description', desc)

  // Optional but good practice for SEO: canonical URL
  const canonical = SITE_URL ? `${SITE_URL}${to.fullPath}` : null
  upsertLinkTag('canonical', canonical)
})

export default router
