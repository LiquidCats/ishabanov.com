# ishabanov.com

## Development

```bash
npm install
npm run dev
```

Build the Worker and its static assets with:

```bash
npm run build
```

Nuxt generates the Worker entry point in `.output/server` and its assets in
`.output/public`.

## Content

Each blog post is a self-contained Vue page in `pages/blog`. Export its typed
`post` metadata and write the article in the page template; the blog index
discovers it automatically at build time. Experience entries live in
`data/experience.ts`.

## Cloudflare Workers

Connect this repository with Cloudflare Workers Builds and use:

- Production branch: `main`
- Build command: `npm run build`
- Deploy command: `npx wrangler deploy`
- Node version: `24`

Nuxt generates the Wrangler deployment configuration during the build. Legacy
`/posts/:id` URLs are redirected by `public/_redirects`.
