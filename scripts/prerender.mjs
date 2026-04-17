#!/usr/bin/env node
import fs from 'node:fs/promises'
import path from 'node:path'
import { fileURLToPath } from 'node:url'
import puppeteer from 'puppeteer'

const __dirname = path.dirname(fileURLToPath(import.meta.url))
const projectRoot = path.resolve(__dirname, '..')

const BASE = (process.env.PRERENDER_BASE || 'http://127.0.0.1:8000').replace(/\/$/, '')
const OUTPUT_DIR = path.join(projectRoot, 'storage', 'app', 'prerender')

const ROUTES = [
  '/',
  '/product',
  '/solutions',
  '/pricing',
  '/resources',
  '/about',
  '/contact',
  '/legal/privacy',
  '/legal/terms',
]

const LOCALES = ['en', 'kh']

const pathToFile = (route, locale) => {
  const rel = route === '/' ? '/index' : route
  return path.join(OUTPUT_DIR, locale, `${rel}.html`)
}

const stripRuntimeArtifacts = (html) =>
  // Remove data-v-app/scoped-id attrs and trim obvious SPA-only noise.
  html.replace(/\s(data-v-[0-9a-f-]+)(="[^"]*")?/g, '')

async function main() {
  console.log(`[prerender] base=${BASE}`)
  console.log(`[prerender] out=${OUTPUT_DIR}`)

  const browser = await puppeteer.launch({
    headless: true,
    args: ['--no-sandbox', '--disable-setuid-sandbox'],
  })

  let failed = 0
  try {
    for (const locale of LOCALES) {
      for (const route of ROUTES) {
        const url = `${BASE}${route}?lang=${locale}`
        const outPath = pathToFile(route, locale)
        const page = await browser.newPage()
        await page.setUserAgent('Humaneti-Prerender/1.0 (+prerender)')
        await page.setExtraHTTPHeaders({ 'Accept-Language': locale === 'kh' ? 'km,en;q=0.8' : 'en' })

        try {
          await page.goto(url, { waitUntil: 'networkidle0', timeout: 30000 })
          // Wait for Vue to mount — app root must contain children.
          await page.waitForFunction(
            () => !!document.querySelector('#app')?.firstElementChild,
            { timeout: 15000 },
          )
          const html = stripRuntimeArtifacts(await page.content())
          await fs.mkdir(path.dirname(outPath), { recursive: true })
          await fs.writeFile(outPath, html, 'utf8')
          console.log(`[prerender] ok  ${locale} ${route} -> ${path.relative(projectRoot, outPath)}`)
        } catch (err) {
          failed += 1
          console.error(`[prerender] fail ${locale} ${route}: ${err.message}`)
        } finally {
          await page.close()
        }
      }
    }
  } finally {
    await browser.close()
  }

  if (failed > 0) {
    console.error(`[prerender] ${failed} route(s) failed`)
    process.exit(1)
  }
  console.log('[prerender] done')
}

main().catch((err) => {
  console.error(err)
  process.exit(1)
})
