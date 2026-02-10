<script setup>
import UiSection from '../../../components/UiSection.vue'
import UiBadge from '../../../components/UiBadge.vue'
</script>

<template>
  <UiBadge tone="neutral">LEGAL</UiBadge>

  <div class="mt-4">
    <UiSection
      kicker="PRIVACY POLICY"
      title="Privacy Policy (Starter Template)"
      subtitle="This is a starter policy text for a marketing site contact form. Replace with your legal version."
    />
  </div>

  <div class="mt-8 space-y-6 text-sm text-slate-700 leading-relaxed">
    <div>
      <div class="font-semibold">1) Information we collect</div>
      <p class="mt-2 text-slate-600">
        When you submit a contact request, we may collect your name, email, company, phone, and message content.
        We may also record technical metadata such as IP address and browser information for security and abuse prevention.
      </p>
    </div>

    <div>
      <div class="font-semibold">2) How we use information</div>
      <p class="mt-2 text-slate-600">
        We use the information to respond to your inquiry, provide product information, schedule demos, and improve our services.
      </p>
    </div>

    <div>
      <div class="font-semibold">3) Data retention</div>
      <p class="mt-2 text-slate-600">
        We retain contact submissions only as long as needed for business and legal purposes.
      </p>
    </div>

    <div>
      <div class="font-semibold">4) Sharing</div>
      <p class="mt-2 text-slate-600">
        We do not sell your personal information. We may share data with service providers strictly to operate our business,
        or as required by law.
      </p>
    </div>

    <div>
      <div class="font-semibold">5) Contact</div>
      <p class="mt-2 text-slate-600">
        For privacy questions, contact: <span class="text-slate-900">privacy@humaneti.com</span>
      </p>
    </div>
  </div>
</template>
