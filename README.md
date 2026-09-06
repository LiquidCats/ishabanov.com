# ishabanov.com

## Development

```bash
npm install
npm run dev
```

Create the static production site with:

```bash
npm run build
```

The generated site is in `.output/public`.

## Content

Each blog post is a self-contained Vue page in `pages/blog`. Export its typed
`post` metadata and write the article in the page template; the blog index
discovers it automatically at build time. Experience entries live in
`data/experience.ts`.

## Cloudflare Pages

Connect this repository with Cloudflare Pages Git integration and use:

- Production branch: `main`
- Build command: `npm run build`
- Build output directory: `.output/public`
- Node version: `22`

Cloudflare builds and deploys commits to `main`; pull requests receive preview
deployments. Legacy `/posts/:id` URLs are redirected by `public/_redirects`.
