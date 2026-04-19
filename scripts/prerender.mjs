#!/usr/bin/env node
import fs from 'node:fs/promises'
import path from 'node:path'
import { fileURLToPath, pathToFileURL } from 'node:url'
import puppeteer from 'puppeteer'

const __dirname = path.dirname(fileURLToPath(import.meta.url))
const projectRoot = path.resolve(__dirname, '..')

const BASE = (process.env.PRERENDER_BASE || 'http://127.0.0.1:8000').replace(/\/$/, '')
const OUTPUT_DIR = path.join(projectRoot, 'storage', 'app', 'prerender')

// Dynamic slugs are loaded from the same JS data files the SPA uses,
// so the sitemap, Blade catalog, and prerender list stay aligned through
// a single source of truth for content and a PHP mirror for SSR meta.
const modulesUrl = pathToFileURL(path.join(projectRoot, 'resources/js/data/modules.js')).href
const audiencesUrl = pathToFileURL(path.join(projectRoot, 'resources/js/data/audiences.js')).href
const guidesUrl = pathToFileURL(path.join(projectRoot, 'resources/js/data/guides.js')).href

const { modules } = await import(modulesUrl)
const { audiences } = await import(audiencesUrl)
const { guides } = await import(guidesUrl)

const STATIC_ROUTES = [
  '/',
  '/product',
  '/solutions',
  '/pricing',
  '/guides',
  '/resources',
  '/about',
  '/contact',
  '/legal/privacy',
  '/legal/terms',
]

const DYNAMIC_ROUTES = [
  ...modules.map((m) => `/product/${m.slug}`),
  ...audiences.map((a) => `/solutions/${a.slug}`),
  ...guides.map((g) => `/guides/${g.slug}`),
]

const ROUTES = [...STATIC_ROUTES, ...DYNAMIC_ROUTES]

const LOCALES = ['en', 'kh']

const pathToFile = (route, locale) => {
  const rel = route === '/' ? '/index' : route
  return path.join(OUTPUT_DIR, locale, `${rel}.html`)
}

const stripRuntimeArtifacts = (html) =>
  html.replace(/\s(data-v-[0-9a-f-]+)(="[^"]*")?/g, '')

async function main() {
  console.log(`[prerender] base=${BASE}`)
  console.log(`[prerender] out=${OUTPUT_DIR}`)
  console.log(`[prerender] routes=${ROUTES.length} locales=${LOCALES.length}`)

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
