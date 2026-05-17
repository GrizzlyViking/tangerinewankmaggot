# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Dev (run both concurrently)
php artisan serve          # Laravel backend on :8000
npm run dev                # Vite + HMR

# Build
npm run build

# Tests
php artisan test
php artisan test --filter=ExampleTest   # single test

# Code quality
./vendor/bin/pint          # PHP style (Laravel Pint)
npm run lint               # ESLint
npm run format             # Prettier

# Database
php artisan migrate
php artisan migrate:fresh --seed
php artisan ziggy:generate  # must run before tests (generates JS route file)
```

## Architecture

**Laravel 12 + Vue 3 + Inertia.js**, SQLite, Tailwind CSS v4, TypeScript, shadcn/vue.

Inertia is the bridge between backend and frontend — there is no separate API. Controllers return `Inertia::render('PageName', [...props...])` and the corresponding Vue page in `resources/js/pages/` receives those props via `defineProps`. Navigation uses Inertia `<Link>` and `router`, not `<a>` tags or fetch.

**Data flow:**
`routes/web.php` → Controller → `Inertia::render()` → `resources/js/pages/*.vue` (typed props)

**Shared data** (available on every page via `usePage().props`): auth user, Ziggy route map, app name, a random Inspiring quote, sidebar open state — injected in `app/Http/Middleware/HandleInertiaRequests.php`.

**Theme/appearance:** Cookie + localStorage, toggled via `resources/js/composables/useAppearance.ts`. The `HandleAppearance` middleware passes the cookie to Blade so the dark class can be set before JS loads (no flash).

## Frontend structure

- `resources/js/pages/` — one file per route; these are Inertia page components
- `resources/js/layouts/` — `AppLayout` (authenticated), `AuthLayout` (login/register), plus split/card variants
- `resources/js/components/ui/` — shadcn/vue library (do not hand-edit; managed via shadcn CLI)
- `resources/js/components/` — custom app components (sidebar, header, nav, breadcrumbs, etc.)
- `resources/js/composables/` — `useAppearance`, `useInitials`
- `resources/js/lib/utils.ts` — `cn()` for class merging (clsx + tailwind-merge)
- `resources/css/app.css` — Tailwind v4 entry point with CSS variable theme tokens

**Route helpers:** Use `route('name')` (Ziggy) in Vue files, not hardcoded strings.
**Forms:** Use Inertia's `useForm` — it handles loading state, errors, and reset automatically.
**Date math:** Luxon is available (`import { DateTime } from 'luxon'`).

## Backend structure

- `app/Http/Controllers/` — thin controllers; business logic stays in models/services
- `app/Models/TrumpName.php` — soft-deletes, unique `name`, fillable `[name, author]`
- `routes/web.php` — public routes (home, trump-names)
- `routes/auth.php` — authentication (register, login, password reset, email verify)
- `routes/settings.php` — authenticated settings (profile, password, appearance)

## The main page

`resources/js/pages/Welcome.vue` is the public-facing page. It shows a full-bleed background image (`/img/turd_reich__Led_by_Donkeys.png`), a Luxon-powered countdown to Jan 20 2029, and a slide-in side panel where visitors can submit and browse nicknames for Trump (stored in the `trump_names` table via `TrumpNameController`).
