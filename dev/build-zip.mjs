/**
 * Builds the installable Kirki Classic plugin zip.
 *
 * Run from the plugin root:  npm run customizer:build
 * Optional output dir:       npm run customizer:build -- --out ..
 *
 * The zip is a copy of the plugin tree with dev-only files stripped, wrapped in a
 * single `kirki-classic/` folder so WordPress installs it under the correct slug.
 *
 * Note: `vendor/` and `assets/customizer/` are gitignored but MUST ship — the
 * former holds the Composer autoloader, the latter the Parcel bundles.
 */

import { execFileSync } from "child_process";
import fs from "fs";
import os from "os";
import path from "path";
import { fileURLToPath } from "url";

const PLUGIN_SLUG = "kirki-classic";
const PLUGIN_FILE = `${PLUGIN_SLUG}.php`;

// Run relative to the plugin root regardless of where the script is invoked from.
const ROOT = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "..");
process.chdir(ROOT);

const outFlag = process.argv.indexOf("--out");
const DIST_DIR = path.resolve(outFlag !== -1 ? process.argv[outFlag + 1] : "dist");
// Staged outside the plugin root: copying a tree into its own subdirectory is an error.
const STAGE_DIR = fs.mkdtempSync(path.join(os.tmpdir(), `${PLUGIN_SLUG}-build-`));

/**
 * Excluded by basename at any depth, mirroring rsync's --exclude semantics.
 * Everything not listed here ships, including the `.scss` sources and the
 * `packages/**\/*.js` files — `Scripts.php` registers some of those at runtime,
 * so stripping them silently breaks the plugin.
 */
const EXCLUDE = new Set([
    ".DS_Store",
    ".babelrc",
    ".git",
    ".gitignore",
    ".parcel-cache",
    "CODE_OF_CONDUCT.md",
    "MEMORY.md",
    "composer.json",
    "composer.lock",
    "dev",
    "dist",
    "dist-temp",
    "node_modules",
    "package.json",
    "pnpm-lock.yaml",
    "tsconfig.json",
]);

const isExcluded = (name) => EXCLUDE.has(name) || name.endsWith(".map");

// 1. Read the version straight from the plugin header.
const header = fs.readFileSync(PLUGIN_FILE, "utf-8");
const versionMatch = header.match(/^\s*\*?\s*Version:\s*(\S+)/m);
if (!versionMatch) {
    console.error(`ERROR: no "Version:" header found in ${PLUGIN_FILE}.`);
    process.exit(1);
}
const VERSION = versionMatch[1].trim();
const ZIP_NAME = `${PLUGIN_SLUG}-${VERSION.replace(/\./g, "-")}.zip`;

console.log(`Building ${PLUGIN_SLUG} v${VERSION}...`);

// 2. Clean previous output.
fs.rmSync(path.join(DIST_DIR, ZIP_NAME), { force: true });
fs.mkdirSync(DIST_DIR, { recursive: true });

// 3. Compile the Parcel bundles into assets/customizer/. Controls do not render
//    without this, so a failure here must abort the build rather than ship stale JS.
console.log("Running Parcel build...");
execFileSync("npm", ["run", "build"], { stdio: "inherit" });

// 4. Stage the plugin tree.
console.log("Staging plugin files...");
const stagedRoot = path.join(STAGE_DIR, PLUGIN_SLUG);
fs.cpSync(ROOT, stagedRoot, {
    recursive: true,
    dereference: true,
    filter: (src) => src === ROOT || !isExcluded(path.basename(src)),
});

// Guard against shipping a plugin that cannot boot.
for (const required of ["vendor/autoload.php", "assets/customizer/controls.min.js", PLUGIN_FILE]) {
    if (!fs.existsSync(path.join(stagedRoot, required))) {
        console.error(`ERROR: ${required} missing from the build — refusing to ship.`);
        process.exit(1);
    }
}

// 5. Zip it, with `kirki-classic/` as the single top-level folder.
console.log(`Creating ${ZIP_NAME}...`);
execFileSync("zip", ["-rqX", path.join(DIST_DIR, ZIP_NAME), PLUGIN_SLUG], { cwd: STAGE_DIR });

fs.rmSync(STAGE_DIR, { recursive: true, force: true });

const zipPath = path.join(DIST_DIR, ZIP_NAME);
const fileCount = execFileSync("unzip", ["-Z1", zipPath], { encoding: "utf-8" })
    .split("\n")
    .filter((line) => line && !line.endsWith("/")).length;

console.log(`\nSUCCESS! ${zipPath}`);
console.log(`${fileCount} files, ${(fs.statSync(zipPath).size / 1024 / 1024).toFixed(2)} MB`);
