# QWEN.md - Personal Portfolio (Andres Lopez)

## Project Overview

This is **Andres Lopez's personal portfolio website** built with **Nuxt 3** (SSG/SSR). It showcases his professional experience, projects, and technical blog. The site is bilingual (English/Spanish), supports dark mode, and features a modern UI with animations and particle effects.

**Live URL:** `https://andreslopez.com.mx`

### Key Technologies

| Layer | Technology |
|-------|------------|
| Framework | Nuxt 3 (Vue 3, Composition API) |
| Language | TypeScript (strict mode) |
| Styling | Tailwind CSS + PrimeVue (custom theme) |
| Content | @nuxt/content (Markdown-driven blog & projects) |
| i18n | @nuxtjs/i18n (en-US, es-MX) |
| UI Components | PrimeVue, Inspira UI, custom Vue components |
| Image Optimization | @nuxt/image (WebP) |
| Utilities | VueUse, Nuxt Lodash, Motion-V (animations) |
| Fonts | @nuxt/fonts (Montserrat, Oswald, Rubik Glitch) |
| Analytics | Ahrefs Analytics |

### Architecture

```
app/
├── assets/css/        # Tailwind CSS + custom styles
├── components/        # Vue components (section components, UI widgets)
├── composables/       # Vue composables/reusable logic
├── layouts/           # Page layouts (default.vue)
├── lib/               # Utility libraries
├── pages/             # File-based routing (index, blog)
│   └── blog/
│       ├── [page].vue       # Blog pagination
│       └── posts/[slug].vue # Individual blog post
├── themes/            # PrimeVue theme configuration
└── types/             # TypeScript type definitions

content/
├── posts/es/          # Spanish blog posts (Markdown)
├── projects/en/       # English project descriptions (Markdown)
└── projects/es/       # Spanish project descriptions (Markdown)
```

## Building and Running

### Prerequisites
- Node.js (latest LTS)
- npm

### Commands

```bash
# Install dependencies
npm install

# Run development server (localhost:3000)
npm run dev

# Build for production
npm run build

# Generate static site (SSG)
npm run generate

# Preview production build
npm run preview
```

### Environment Variables

Copy `.env.example` to `.env` and configure:

| Variable | Description |
|----------|-------------|
| `APP_NAME` | Application name |
| `APP_URL` | Application base URL |
| `NUTRIX_API_BASE_URL` | API base URL (optional layer) |
| `NUTRIX_API_SERVER_TOKEN` | Server token for API |
| `GITHUB_TOKEN` | GitHub token for fetching contributions |

## Content Management

### Blog Posts
Blog posts are stored as Markdown files in `content/posts/es/` (Spanish). They follow the `@nuxt/content` schema with:
- `title`, `image`, `description`, `tags`, `date`, `order`

### Projects
Project descriptions are stored in `content/projects/{en,es}/` with:
- `title`, `description`, `image`, `link`

The site uses **prerendering** for optimized image variants (`@nuxt/image`) and some blog routes.

## Development Conventions

### TypeScript
- **Strict mode** enabled (`strict: true`)
- **Type checking** enabled at build time
- Use `<script setup lang="ts">` in all Vue SFCs

### Styling
- **Tailwind CSS** with custom `red-plug` color palette (reds) and `purple-heart` palette
- **PrimeVue** components with custom theme (`themes/default`)
- **Dark mode** via `.dark` class selector (not media query)
- **CSS Layers** order: `tailwind-base` → `primevue` → `tailwind-utilities`

### Fonts
- **Sans-serif:** Montserrat (body text)
- **Serif:** Oswald (headings)
- **Decorative:** Rubik Glitch (brand)

### i18n
- **Default locale:** English (`en`)
- **Locales:** `en-US`, `es-MX`
- **Base URL:** `https://andreslopez.com.mx`
- Translations defined in `i18n.config.ts`
- Language switcher: `LangSwitch.client.vue`

### Page Transitions
Defined in `app.vue`: fade with grayscale effect (`200ms`).

## Key Components

| Component | Purpose |
|-----------|---------|
| `AppHeader` | Navigation header |
| `AppFooter` | Site footer |
| `SectionHeroWelcome` | Hero/welcome section |
| `SectionAboutMe` | About me section |
| `SectionExperience` | Work experience timeline |
| `SectionProjects` | Projects showcase |
| `SectionBlog` | Blog preview section |
| `SectionContact` | Contact CTA section |
| `DarkModeSwitch` | Dark/light mode toggle |
| `LangSwitch` | Language switcher |
| `ParticlesBackground` | Animated particle background |
| `Meteors`, `Marquee`, `IconCloud` | Decorative UI elements |
| `BlogGrid`, `BlogCard` | Blog listing components |
| `ContributionCard` | Project contribution cards |

## Notes

- The project uses **file-based routing** (Nuxt convention)
- Blog posts are primarily in **Spanish** (`posts/es/`); English posts collection is configured but not present
- The `pages/blog/posts/[slug].vue` handles dynamic blog post rendering
- The error page (`error.vue`) includes particle background animation and i18n support
- Prerendering in `nuxt.config.ts` pre-generates multiple image size variants for responsive loading
- The `extends` array in Nuxt config has a commented-out GitHub layer reference (legacy/unused)
