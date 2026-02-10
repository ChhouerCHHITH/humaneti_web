<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import UiButton from '@/components/UiButton.vue'
import UiToast from '@/components/UiToast.vue'
import logoIcon from '@/assets/humaneti-icon-trimmed.png'
import logoFull from '@/assets/humaneti-logo-trimmed.png'

const route = useRoute()
const mobileMenuOpen = ref(false)
const scrolled = ref(false)

const navigation = [
  { name: 'Product', to: '/product' },
  { name: 'Solutions', to: '/solutions' },
  { name: 'Pricing', to: '/pricing' },
  { name: 'Resources', to: '/resources' },
  { name: 'About', to: '/about' }
]

const handleScroll = () => {
  scrolled.value = window.scrollY > 20
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})

// Close mobile menu when route changes
const closeMobileMenu = () => {
  mobileMenuOpen.value = false
}
</script>

<template>
  <div class="min-h-screen bg-white text-slate-900">
    <UiToast />

    <!-- Decorative Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
      <div class="absolute inset-0 bg-white"></div>
      <!-- Gradient orbs -->
      <div class="absolute -top-24 left-1/2 h-[600px] w-[600px] -translate-x-1/2 rounded-full bg-gradient-to-br from-slate-900/5 to-slate-900/10 blur-3xl"></div>
      <div class="absolute top-40 -right-32 h-[500px] w-[500px] rounded-full bg-gradient-to-bl from-indigo-500/8 to-violet-500/8 blur-3xl"></div>
      <div class="absolute bottom-0 -left-32 h-[500px] w-[500px] rounded-full bg-gradient-to-tr from-emerald-500/8 to-teal-500/8 blur-3xl"></div>
      <!-- Grid pattern -->
      <div 
        class="absolute inset-0 opacity-[0.04]" 
        style="background-image: radial-gradient(circle at 1px 1px, rgba(15,23,42,0.4) 1px, transparent 0); background-size: 32px 32px;"
      ></div>
    </div>

    <!-- Header -->
    <header 
      :class="[
        'sticky top-0 z-50 transition-all duration-300',
        scrolled 
          ? 'border-b border-slate-200/80 bg-white/80 shadow-sm backdrop-blur-xl' 
          : 'border-b border-transparent bg-white/60 backdrop-blur-md'
      ]"
    >
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <!-- Logo -->
          <!-- Logo -->
        <RouterLink to="/" class="flex items-center gap-3 group" @click="closeMobileMenu">
        <!-- Icon -->
        <span
            class="relative inline-flex h-10 w-10 items-center justify-center rounded-xl bg-white shadow-sm ring-1 ring-slate-900/10 transition-transform group-hover:scale-105"
        >
            <img :src="logoIcon" alt="Humaneti" class="h-8 w-8 object-contain" />
        </span>

        <!-- Text + Slogan -->
        <div class="leading-tight">
            <div class="flex items-baseline gap-2">
            <span
                class="text-[18px] font-extrabold tracking-tight text-slate-900 group-hover:text-slate-950"
            >
                Humaneti
            </span>

            <!-- Optional small badge (remove if not needed) -->
            <span class="hidden sm:inline-flex rounded-md bg-slate-100 px-1.5 py-0.5 text-[10px] font-semibold tracking-wide text-slate-700 ring-1 ring-slate-200">
                SaaS
            </span>
            </div>

            <div class="text-[10px] font-medium tracking-wider text-slate-500">
            HRMS • PAYROLL • ASSETS • PR
            </div>
        </div>
        </RouterLink>
          <!-- Desktop Navigation -->
          <nav class="hidden items-center gap-1 md:flex">
            <RouterLink
              v-for="item in navigation"
              :key="item.name"
              :to="item.to"
              class="rounded-lg px-3 py-2 text-sm font-medium text-slate-700 transition-colors hover:bg-slate-100 hover:text-slate-900"
              active-class="bg-slate-100 text-slate-900"
            >
              {{ item.name }}
            </RouterLink>
          </nav>

          <!-- Desktop CTA -->
          <div class="hidden items-center gap-3 md:flex">
            <UiButton 
              as="router-link" 
              to="/contact" 
              variant="primary" 
              size="sm"
              class="shadow-sm"
            >
              Request Demo
            </UiButton>
          </div>

          <!-- Mobile menu button -->
          <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="inline-flex items-center justify-center rounded-lg p-2 text-slate-700 hover:bg-slate-100 md:hidden"
            aria-label="Toggle menu"
          >
            <svg v-if="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg v-else class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation -->
      <Transition
        enter-active-class="transition duration-200 ease-out"
        enter-from-class="opacity-0 -translate-y-1"
        enter-to-class="opacity-100 translate-y-0"
        leave-active-class="transition duration-150 ease-in"
        leave-from-class="opacity-100 translate-y-0"
        leave-to-class="opacity-0 -translate-y-1"
      >
        <div v-show="mobileMenuOpen" class="border-t border-slate-200 bg-white/95 backdrop-blur-xl md:hidden">
          <div class="space-y-1 px-4 pb-4 pt-2">
            <RouterLink
              v-for="item in navigation"
              :key="item.name"
              :to="item.to"
              @click="closeMobileMenu"
              class="block rounded-lg px-3 py-2.5 text-base font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900"
              active-class="bg-slate-100 text-slate-900"
            >
              {{ item.name }}
            </RouterLink>
            <div class="pt-2">
              <UiButton 
                as="router-link" 
                to="/contact" 
                variant="primary" 
                size="md"
                class="w-full"
                @click="closeMobileMenu"
              >
                Request Demo
              </UiButton>
            </div>
          </div>
        </div>
      </Transition>
    </header>

    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
      <RouterView />
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200/80 bg-white/60 backdrop-blur-md">
      <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-8 lg:grid-cols-4">
          <!-- Company Info -->
          <div class="lg:col-span-2">
            <div class="flex items-center gap-3">
              <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-slate-900 to-slate-700 text-white shadow-md">
                <img :src="logoIcon" alt="Humaneti" class="h-8 w-8 object-contain" />
              </span>
              <div class="leading-tight">
                <div class="text-lg font-bold tracking-tight text-slate-900">Humaneti</div>
                <div class="text-xs text-slate-600">Complete HRMS Solution</div>
              </div>
            </div>
            <p class="mt-4 max-w-md text-sm leading-relaxed text-slate-600">
              Streamline HR, Payroll, Asset Management, and Purchase Requests with clean workflows, 
              clear approvals, and audit-ready history. Built for SMEs and NGOs that value clarity and control.
            </p>
            <div class="mt-6 space-y-2 text-sm">
              <div class="flex items-center gap-2 text-slate-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <a href="mailto:sales@humaneti.com" class="hover:text-slate-900">sales@humaneti.com</a>
              </div>
              <div class="flex items-center gap-2 text-slate-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <a href="tel:+855000000000" class="hover:text-slate-900">(+855) 000 000 000</a>
              </div>
            </div>
          </div>

          <!-- Quick Links -->
          <div>
            <h3 class="text-sm font-semibold text-slate-900">Product</h3>
            <ul class="mt-4 space-y-3 text-sm">
              <li><RouterLink to="/product" class="text-slate-600 hover:text-slate-900">Overview</RouterLink></li>
              <li><RouterLink to="/product#hrm" class="text-slate-600 hover:text-slate-900">HRM Module</RouterLink></li>
              <li><RouterLink to="/product#payroll" class="text-slate-600 hover:text-slate-900">Payroll Module</RouterLink></li>
              <li><RouterLink to="/product#assets" class="text-slate-600 hover:text-slate-900">Asset Management</RouterLink></li>
              <li><RouterLink to="/product#pr" class="text-slate-600 hover:text-slate-900">Purchase Requests</RouterLink></li>
            </ul>
          </div>

          <!-- Company Links -->
          <div>
            <h3 class="text-sm font-semibold text-slate-900">Company</h3>
            <ul class="mt-4 space-y-3 text-sm">
              <li><RouterLink to="/solutions" class="text-slate-600 hover:text-slate-900">Solutions</RouterLink></li>
              <li><RouterLink to="/pricing" class="text-slate-600 hover:text-slate-900">Pricing</RouterLink></li>
              <li><RouterLink to="/resources" class="text-slate-600 hover:text-slate-900">Resources</RouterLink></li>
              <li><RouterLink to="/about" class="text-slate-600 hover:text-slate-900">About Us</RouterLink></li>
              <li><RouterLink to="/contact" class="text-slate-600 hover:text-slate-900">Contact</RouterLink></li>
            </ul>
          </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 border-t border-slate-200 pt-8">
          <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <p class="text-sm text-slate-600">
              © {{ new Date().getFullYear() }} Humaneti. All rights reserved.
            </p>
            <div class="flex gap-6 text-sm">
              <RouterLink to="/legal/privacy" class="text-slate-600 hover:text-slate-900">Privacy Policy</RouterLink>
              <RouterLink to="/legal/terms" class="text-slate-600 hover:text-slate-900">Terms of Service</RouterLink>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<style scoped>
/* Smooth scrolling for the entire layout */
html {
  scroll-behavior: smooth;
}
</style>