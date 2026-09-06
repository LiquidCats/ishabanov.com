import { cp, readdir } from "node:fs/promises";
import { join } from "node:path";
import { loadNuxt } from "nuxt";

const output = ".output/public";
const nuxt = await loadNuxt({ cwd: process.cwd(), dev: false });

try {
  await Promise.all([
    ...(await readdir("public")).map((file) => cp(`public/${file}`, `${output}/${file}`, { recursive: true })),
    cp(join(nuxt.options.buildDir, "dist/client/_nuxt"), `${output}/_nuxt`, { recursive: true }),
  ]);
} finally {
  await nuxt.close();
}
