# Source Structure

## Principles

- Organize by feature, not by file type.
- Put block-owned assets in `blocks/`.
- Keep global styles small and intentional.
- Name things for humans.

## Folders

- `blocks/` - Block styles, scripts, and variations.
- `includes/` - Theme-level components (non-block features).
- `scss/` - Global foundations (tokens, base, utilities).
- `images/`, `svg/` - Static assets copied into `build/`.
- `plugins/` - Plugin-specific overrides when used.

## Conventions

- Prefer `style.scss`, `editor.scss`, `view.js`, `editor.js`, `render.php`.
- Block variations live in `blocks/**/styles/*.scss` and use `.is-style-*`.
- Never reference `src/` assets at runtime; always use `build/`.

## Adding a Feature

1. Decide the owner: `blocks/` (block), `includes/` (theme component), or `scss/` (global).
2. Add only the entry files you need.
3. Run `npm run build` and verify the compiled assets in `build/`.

## Build Entries

Global entries:

- `src/scss/global/_index.scss` → `build/global-styles.css`
- `src/scss/screen/_index.scss` → `build/screen.css`
- `src/scss/editor/_index.scss` → `build/editor.css`

Block entries (any namespace):

- `src/blocks/**/style.scss` → `build/blocks/{namespace}/{block}/style.css`
- `src/blocks/**/editor.scss` → `build/blocks/{namespace}/{block}/editor.css`
- `src/blocks/**/view.js` → `build/blocks/{namespace}/{block}/view.js`
- `src/blocks/**/editor.js` → `build/blocks/{namespace}/{block}/editor.js`
- `src/blocks/**/styles/*.scss` → `build/blocks/{namespace}/{block}/styles/{variation}.css`

Include entries:

- `src/includes/**/*.scss` → `build/includes/{category}/{name}/style.css`
- `src/includes/**/*.js` → `build/includes/{category}/{name}/view.js`
- `src/includes/**/*.php` → Copied to `build/includes/...` and auto-loaded

Plugin entries:

- `src/plugins/{slug}/*.scss` → `build/plugins/{slug}/style.css`
- `src/plugins/{slug}/*.js` → `build/plugins/{slug}/view.js`
- `src/plugins/{slug}/**/*.php` → Copied and auto-loaded when plugin is active
