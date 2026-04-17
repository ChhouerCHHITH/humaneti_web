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
      as="h1"
      :kicker="t({ en: 'TERMS OF SERVICE', kh: 'លក្ខខណ្ឌសេវាកម្ម' })"
      :title="t({ en: 'Terms of Service', kh: 'លក្ខខណ្ឌសេវាកម្ម' })"
      :subtitle="t({ en: 'Terms for use of the Humaneti public website and related communications.', kh: 'លក្ខខណ្ឌសម្រាប់ការប្រើប្រាស់គេហទំព័រសាធារណៈ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី និងការទំនាក់ទំនងដែលពាក់ព័ន្ធ។' })"
    />
  </div>

  <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-xs text-slate-600">
    {{ t({ en: 'Effective date: February 28, 2026', kh: 'កាលបរិច្ឆេទមានប្រសិទ្ធភាព៖ 28 កុម្ភៈ 2026' }) }}
  </div>

  <div class="mt-8 space-y-6 text-sm leading-relaxed text-slate-700">
    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '1) Acceptance of terms', kh: '1) ការទទួលយកលក្ខខណ្ឌ' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'By using this website, you agree to these terms. If you do not agree, do not use the site.', kh: 'ដោយប្រើគេហទំព័រនេះ អ្នកយល់ព្រមលក្ខខណ្ឌទាំងនេះ។ ប្រសិនបើមិនយល់ព្រម សូមមិនប្រើគេហទំព័រ។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '2) Website content', kh: '2) មាតិកាគេហទំព័រ' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'Website content is provided for general informational purposes about Humaneti services. Product capabilities, implementation scope, and commercial terms are finalized in signed agreements.', kh: 'មាតិកាគេហទំព័រត្រូវបានផ្តល់សម្រាប់គោលបំណងព័ត៌មានទូទៅអំពីសេវាកម្ម ក្រុមហ៊ុន ហ៊ូម៉ាណេទី។ សមត្ថភាពផលិតផល វិសាលភាពអនុវត្ត និងលក្ខខណ្ឌពាណិជ្ជកម្ម ត្រូវបានកំណត់ចុងក្រោយនៅក្នុងកិច្ចព្រមព្រៀងដែលបានចុះហត្ថលេខា។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '3) Acceptable use', kh: '3) ការប្រើប្រាស់ដែលអនុញ្ញាត' }) }}</h2>
      <ul class="mt-2 list-disc space-y-1 pl-5 text-slate-600">
        <li>{{ t({ en: 'Do not misuse website forms, APIs, or security controls.', kh: 'មិនត្រូវប្រើប្រាស់បែបបទគេហទំព័រ API ឬការគ្រប់គ្រងសុវត្ថិភាពខុសគោលបំណង។' }) }}</li>
        <li>{{ t({ en: 'Do not attempt unauthorized access to systems or data.', kh: 'មិនត្រូវព្យាយាមចូលប្រើប្រព័ន្ធ ឬទិន្នន័យដោយគ្មានសិទ្ធិ។' }) }}</li>
        <li>{{ t({ en: 'Do not submit unlawful, abusive, or misleading content.', kh: 'មិនត្រូវដាក់ស្នើមាតិកាខុសច្បាប់ បំពាន ឬបន្លំ។' }) }}</li>
      </ul>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '4) Intellectual property', kh: '4) កម្មសិទ្ធិបញ្ញា' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'Humaneti trademarks, logos, branding, and site content are protected by applicable law. No reproduction or redistribution is permitted without prior written permission.', kh: 'សញ្ញាពាណិជ្ជកម្ម និមិត្តសញ្ញា ម៉ាកសញ្ញា និងមាតិកាគេហទំព័រ ក្រុមហ៊ុន ហ៊ូម៉ាណេទី ត្រូវបានការពារដោយច្បាប់អនុវត្ត។ មិនអនុញ្ញាតឱ្យចម្លង ឬចែកចាយឡើងវិញដោយគ្មានការអនុញ្ញាតជាលាយលក្ខណ៍អក្សរជាមុន។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '5) Disclaimer', kh: '5) ការបដិសេធការទទួលខុសត្រូវ' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'The website and its content are provided “as is” and “as available,” without warranties of any kind, to the extent permitted by law.', kh: 'គេហទំព័រ និងមាតិការបស់វាត្រូវបានផ្តល់ជូន “តាមសភាពដើម” និង “តាមដែលមាន” ដោយគ្មានការធានាប្រភេទណាមួយ តាមវិសាលភាពដែលច្បាប់អនុញ្ញាត។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '6) Limitation of liability', kh: '6) ដែនកំណត់នៃការទទួលខុសត្រូវ' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'To the extent permitted by law, Humaneti is not liable for indirect or consequential damages arising from website use.', kh: 'តាមវិសាលភាពដែលច្បាប់អនុញ្ញាត ក្រុមហ៊ុន ហ៊ូម៉ាណេទី មិនទទួលខុសត្រូវចំពោះការខាតបង់ប្រយោល ឬបន្តបន្ទាប់ ដែលកើតឡើងពីការប្រើប្រាស់គេហទំព័រ។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '7) Changes to terms', kh: '7) ការកែប្រែលក្ខខណ្ឌ' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'We may update these terms from time to time. Updated terms become effective when published on this page.', kh: 'យើងអាចធ្វើបច្ចុប្បន្នភាពលក្ខខណ្ឌទាំងនេះពីពេលមួយទៅពេលមួយ។ លក្ខខណ្ឌដែលបានកែប្រែមានប្រសិទ្ធភាពនៅពេលបោះពុម្ពផ្សាយលើទំព័រនេះ។' }) }}
      </p>
    </section>

    <section>
      <h2 class="font-semibold text-slate-900">{{ t({ en: '8) Contact', kh: '8) ទំនាក់ទំនង' }) }}</h2>
      <p class="mt-2 text-slate-600">
        {{ t({ en: 'Legal inquiries:', kh: 'សំណួរផ្នែកច្បាប់៖' }) }}
        <a href="mailto:legal@humaneti.com" class="font-medium text-slate-900 hover:underline">legal@humaneti.com</a>
      </p>
      <p class="mt-1 text-slate-600">
        {{ t({ en: 'General inquiries:', kh: 'សំណួរទូទៅ៖' }) }}
        <RouterLink to="/contact" class="font-medium text-slate-900 hover:underline">{{ t({ en: 'Contact form', kh: 'បែបបទទំនាក់ទំនង' }) }}</RouterLink>
      </p>
    </section>
  </div>
</template>
