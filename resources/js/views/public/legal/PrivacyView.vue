<script setup>
import UiSection from '@/components/UiSection.vue'
import UiBadge from '@/components/UiBadge.vue'
import { usePublicI18n } from '@/composables/usePublicI18n'

const { t } = usePublicI18n()
</script>

<template>
  <UiBadge tone="neutral">{{ t({ en: 'LEGAL', kh: 'ផ្នែកច្បាប់' }) }}</UiBadge>

  <div class="mt-4">
    <UiSection
      :kicker="t({ en: 'PRIVACY POLICY', kh: 'គោលការណ៍ភាពឯកជន' })"
      :title="t({ en: 'Privacy Policy', kh: 'គោលការណ៍ភាពឯកជន' })"
      :subtitle="t({ en: 'How Humaneti collects, uses, and protects information submitted through this website.', kh: 'របៀបដែល ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ប្រមូល ប្រើប្រាស់ និងការពារព័ត៌មានដែលបានដាក់ស្នើតាមគេហទំព័រនេះ។' })"
    />
  </div>

  <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-xs text-slate-600">
    {{ t({ en: 'Effective date: February 28, 2026', kh: 'កាលបរិច្ឆេទមានប្រសិទ្ធភាព៖ 28 កុម្ភៈ 2026' }) }}
  </div>

  <div class="mt-8 space-y-6 text-sm leading-relaxed text-slate-700">
    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '1) Scope', kh: '1) វិសាលភាព' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'This policy applies to personal information collected through the Humaneti public website, including contact and demo request forms.', kh: 'គោលការណ៍នេះអនុវត្តចំពោះព័ត៌មានផ្ទាល់ខ្លួនដែលប្រមូលតាមគេហទំព័រសាធារណៈ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី រួមទាំងបែបបទទំនាក់ទំនង និងស្នើសុំដេមូ។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '2) Information we collect', kh: '2) ព័ត៌មានដែលយើងប្រមូល' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'We may collect your name, email, company, phone number, and message content when you submit a request. We may also collect technical data such as IP address, browser type, and request timestamps for security and abuse prevention.', kh: 'យើងអាចប្រមូលឈ្មោះ អ៊ីមែល ក្រុមហ៊ុន លេខទូរស័ព្ទ និងមាតិកាសារ នៅពេលអ្នកដាក់ស្នើសំណើ។ យើងក៏អាចប្រមូលទិន្នន័យបច្ចេកទេសដូចជា IP ប្រភេទកម្មវិធីរុករក និងពេលវេលាសំណើ សម្រាប់សុវត្ថិភាព និងការពារការប្រើប្រាស់ខុសគោលបំណង។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '3) How we use your information', kh: '3) របៀបប្រើប្រាស់ព័ត៌មានរបស់អ្នក' }) }}</h2>
      <ul class="mt-2 list-disc space-y-1 pl-5 text-slate-600">
        <li>{{ t({ en: 'Respond to inquiries and schedule demos.', kh: 'ឆ្លើយតបសំណួរ និងរៀបចំការដេមូ។' }) }}</li>
        <li>{{ t({ en: 'Provide product, implementation, and pricing information.', kh: 'ផ្តល់ព័ត៌មានអំពីផលិតផល ការអនុវត្ត និងតម្លៃ។' }) }}</li>
        <li>{{ t({ en: 'Improve service quality, support responsiveness, and website security.', kh: 'កែលម្អគុណភាពសេវា ប្រសិទ្ធភាពគាំទ្រ និងសុវត្ថិភាពគេហទំព័រ។' }) }}</li>
        <li>{{ t({ en: 'Meet legal and regulatory obligations where applicable.', kh: 'អនុវត្តតាមកាតព្វកិច្ចច្បាប់ និងបទប្បញ្ញត្តិដែលពាក់ព័ន្ធ។' }) }}</li>
      </ul>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '4) Legal basis', kh: '4) មូលដ្ឋានច្បាប់' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'We process information based on legitimate business interests, your consent when you submit forms, and compliance requirements where applicable.', kh: 'យើងដំណើរការព័ត៌មានផ្អែកលើប្រយោជន៍អាជីវកម្មសមស្រប ការយល់ព្រមរបស់អ្នកពេលដាក់ស្នើបែបបទ និងតម្រូវការអនុលោមដែលពាក់ព័ន្ធ។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '5) Data retention', kh: '5) រយៈពេលរក្សាទុកទិន្នន័យ' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'Contact records are retained only as long as necessary for business follow-up, legal compliance, and security monitoring, then securely deleted or anonymized.', kh: 'កំណត់ត្រាទំនាក់ទំនងត្រូវបានរក្សាទុកត្រឹមត្រូវតាមតម្រូវការសម្រាប់ការតាមដានអាជីវកម្ម ការអនុលោមច្បាប់ និងការត្រួតពិនិត្យសុវត្ថិភាព បន្ទាប់មកលុប ឬមិនបង្ហាញអត្តសញ្ញាណដោយសុវត្ថិភាព។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '6) Data sharing', kh: '6) ការចែករំលែកទិន្នន័យ' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'Humaneti does not sell personal data. Information may be shared with vetted service providers supporting hosting, communication, or analytics, and with authorities if required by law.', kh: 'ក្រុមហ៊ុន ហ៊ូម៉ាណេទី មិនលក់ទិន្នន័យផ្ទាល់ខ្លួនទេ។ ព័ត៌មានអាចចែករំលែកជាមួយអ្នកផ្តល់សេវាដែលបានត្រួតពិនិត្យសម្រាប់ហេដ្ឋារចនាសម្ព័ន្ធ ការទំនាក់ទំនង ឬវិភាគ និងជាមួយអាជ្ញាធរនៅពេលច្បាប់ទាមទារ។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '7) Security', kh: '7) សុវត្ថិភាព' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'We apply reasonable administrative, technical, and organizational controls to protect personal information, including encrypted transport, access controls, and audit logging.', kh: 'យើងអនុវត្តវិធានការគ្រប់គ្រងផ្នែករដ្ឋបាល បច្ចេកទេស និងអង្គភាពដែលសមស្រប ដើម្បីការពារព័ត៌មានផ្ទាល់ខ្លួន រួមមានការអ៊ិនគ្រីបពេលផ្ទេរ ការគ្រប់គ្រងសិទ្ធិចូលប្រើ និងកំណត់ហេតុត្រួតពិនិត្យ។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '8) Your rights', kh: '8) សិទ្ធិរបស់អ្នក' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'Depending on your jurisdiction, you may request access, correction, or deletion of your personal information. To submit a request, contact us using the details below.', kh: 'អាស្រ័យលើតំបន់ច្បាប់របស់អ្នក អ្នកអាចស្នើសុំចូលប្រើ កែតម្រូវ ឬលុបព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នក។ ដើម្បីដាក់ស្នើសំណើ សូមទាក់ទងយើងតាមព័ត៌មានខាងក្រោម។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '9) Contact', kh: '9) ទំនាក់ទំនង' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'Privacy inquiries:', kh: 'សំណួរអំពីភាពឯកជន៖' }) }}
        <a href="mailto:privacy@humaneti.com" class="font-medium text-slate-900 hover:underline">privacy@humaneti.com</a>
      </p>
      <p class="mt-1 text-slate-600">
        {{ t({ en: 'General inquiries:', kh: 'សំណួរទូទៅ៖' }) }}
        <RouterLink to="/contact" class="font-medium text-slate-900 hover:underline">{{ t({ en: 'Contact form', kh: 'បែបបទទំនាក់ទំនង' }) }}</RouterLink>
      </p>
    </section>
  </div>
</template>
