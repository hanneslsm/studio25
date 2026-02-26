# studio25 3.0.0 Migration Log

Migration from v2.0.0 (monolithic) → v3.0.0 (ProLooks architecture).
Reference themes: upa25, hxi25, bittnerkrull25, dawa26.

---

## Phase 1 — Config & Tooling ✅

| Task | Status |
|---|---|
| Replace `webpack.config.js` → `webpack.common.js` + `webpack.dev.js` + `webpack.prod.js` | ✅ |
| Update `package.json` to 3.0.0 (deps, scripts, prettier) | ✅ |
| Update `style.css` header (version 3.0.0, PHP 8.0) | ✅ |
| Add `.stylelintrc.json` | ✅ |
| Add `AGENTS.md` | ✅ |
| Add `README.md` (entry-point) | ✅ |
| Add `docs/` (README, build, deployment, src) | ✅ |
| Update `.gitignore` to ProLooks format | ✅ |
| Add `.github/` (issue templates + workflows) | ✅ |
| Delete old `webpack.config.js` | ✅ |
| Delete old `readme.txt` | ✅ |

## Phase 2 — PHP Architecture ✅

| Task | Status |
|---|---|
| Rewrite `inc/enqueuing.php` (auto-discovery engine, 768 lines) | ✅ |
| Create `inc/block-styles.php` (PHP registration with `style_handle`) | ✅ |
| Create `inc/block-variations.php` (PHP filter) | ✅ |
| Create `inc/prolooks/` (dashboard-widget, dev-remove-defaults, gpdr-remove-emojis, dev-purge-themes-cache) | ✅ |
| Update `functions.php` (new require paths) | ✅ |
| Update `inc/setup.php` (remove old editor style) | ✅ |
| Delete old `inc/dashboard-widget.php`, `inc/dev_remove-defaults.php` | ✅ |

## Phase 3 — Source Restructuring ✅

| Task | Status |
|---|---|
| Restructure `src/scss/` → `global/`, `screen/`, `editor/` with `_index.scss` | ✅ |
| Migrate `src/scss/blocks/` → `src/blocks/core/` (split style.scss + styles/) | ✅ |
| Create `src/includes/parts/` (header, header-fixed, footer) | ✅ |
| Create `src/includes/studio25/` (spotlight, sticker) | ✅ |
| Create `src/includes/utilities/` (steps-border) | ✅ |
| Simplify `src/js/global.js` | ✅ |
| Delete old files (src/js/config/, src/js/custom/, src/js/utilities/, src/scss/blocks/, etc.) | ✅ |

## Phase 4 — Templates & Parts ✅

| Task | Status | Notes |
|---|---|---|
| Update `theme.json` — add `customTemplates` | ✅ | page-without-header registered |
| Rename template "Page without header.html" → `page-without-header.html` | ✅ | |
| Additional templates (page-blank, page-no-title, etc.) | ⏭️ Skipped | Not present in studio25 v2 — add when needed |
| Additional parts (page-comments, etc.) | ⏭️ Skipped | Not present in studio25 v2 — add when needed |

## Phase 5 — Build & Verify ✅

| Task | Status | Notes |
|---|---|---|
| `npm install` (clean) | ✅ | All deps installed successfully |
| `npm run build` | ✅ | webpack compiled successfully |
| SCSS import path fix | ✅ | Fixed `navigation/style.scss` relative import path |
| Build output verification | ✅ | 93 output files confirmed in correct ProLooks structure |

---

## Fixes Applied During Migration

1. **`src/blocks/core/navigation/style.scss`** — SCSS `@use` path was `../../scss/global/variables` (wrong depth from `src/blocks/core/navigation/`). Fixed to `../../../scss/global/variables`.

---

## Included Block Styles (migrated from JS → PHP with `style_handle`)

- `core/button` → brand, base
- `core/details` → chevron
- `core/gallery` → scale-effect
- `core/group` → spotlight
- `core/image` → picture-frame
- `core/list` → checkmark, crossmark, crossmark-2, checkmark-2
- `core/paragraph` → indicator, overline, checkmark

## NOT Included (niche — add later when needed)

### Block styles skipped:
- `core/code` → contrast (hxi, dawa)
- `core/paragraph` → number (hxi only)
- `core/quote` → plain (hxi, dawa)
- `core/table` → compact, stripes (hxi, dawa)
- `core/post-terms` → pill (hxi, dawa)
- `core/post-featured-image` → scale-effect (hxi, dawa)
- `core/read-more` → button (hxi, dawa)
- `core/cover` → card--interactive (upa only)

### Core block styling skipped (no SCSS exists in studio25):
- `core/accordion` — new WP 6.8 block, no design yet
- `core/calendar` — no design exists
- `core/categories` — no design exists
- `core/code` — no design exists
- `core/comments-pagination` — no design exists
- `core/post-content` — no design exists
- `core/post-featured-image` — no design exists
- `core/post-terms` — no design exists
- `core/query` — no design exists
- `core/query-pagination` — no design exists
- `core/quote` — no design exists
- `core/read-more` — no design exists
- `core/search` — no design exists
- `core/site-logo` — no design exists
- `core/spacer` — variation only (migrated), no SCSS
- `core/table` — no design exists

### Other deferred items:
- `src/plugins/` directory (no plugin overrides needed yet)
- `inc/block-restrictions.php` (hxi/dawa feature, not universal)
- WooCommerce / Sugar Calendar / other plugin templates
- Custom post type templates (project-specific)

## Removed
- `gsap` dependency (confirmed unused — no imports anywhere)
- `image-minimizer-webpack-plugin` + `imagemin` + `imagemin-webpack-plugin` (replaced by sharp in webpack.prod.js)
- `glob` (replaced by fast-glob)
- `readme.txt` (replaced by README.md)
