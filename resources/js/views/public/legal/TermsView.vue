<script setup>
import UiSection from '../../../components/UiSection.vue'
import UiBadge from '../../../components/UiBadge.vue'
</script>

<template>
  <UiBadge tone="neutral">LEGAL</UiBadge>

  <div class="mt-4">
    <UiSection
      kicker="TERMS OF SERVICE"
      title="Terms of Service (Starter Template)"
      subtitle="This is a starter text for a marketing site. Replace with your legal version."
    />
  </div>

  <div class="mt-8 space-y-6 text-sm text-slate-700 leading-relaxed">
    <div>
      <div class="font-semibold">1) Website use</div>
      <p class="mt-2 text-slate-600">
        This website provides general information about Humaneti. Content may change without notice.
      </p>
    </div>

    <div>
      <div class="font-semibold">2) No warranties</div>
      <p class="mt-2 text-slate-600">
        Information is provided “as is” without warranties of any kind. Implementation scope and product capabilities
        are confirmed during engagement.
      </p>
    </div>

    <div>
      <div class="font-semibold">3) Intellectual property</div>
      <p class="mt-2 text-slate-600">
        Brand, logo, and content belong to Humaneti or respective owners. Do not reproduce without permission.
      </p>
    </div>

    <div>
      <div class="font-semibold">4) Contact</div>
      <p class="mt-2 text-slate-600">
        Questions: <span class="text-slate-900">legal@humaneti.com</span>
      </p>
    </div>
  </div>
</template>
