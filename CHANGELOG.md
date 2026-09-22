# Changelog

All notable changes to this project will be documented in this file.

## 1.1.0 - 2026-09-22

Filament v4 line.

### What's changed

- Tested on PHP 8.2, 8.3 and 8.4 against Laravel 11, 12 and 13 (new Pest suite + CI matrix)
- Ace editor CDN default bumped from 1.32.7 to 1.44.0 (republish the config if you customised it)
- Changelog workflow hardened against template injection
- Build tooling moved to bun; unused `ace-builds` and `npm-run-all2` removed (dist unchanged)
- README: fixed `height()` example (needs a CSS unit, e.g. `'200px'`)

### Note about 1.0.4

`1.0.4` was tagged from the 2.x branch and requires Filament 5. Filament 4 users should use `^1.1`:

```bash
composer require jeffersongoncalves/filament-ace-editor-field:^1.1

```
**Full Changelog**: https://github.com/jeffersongoncalves/filament-ace-editor-field/compare/1.0.6...1.1.0

## 1.0.6 - 2026-08-05

### What's Changed

* build(deps): bump svgo from 3.3.2 to 3.3.3 in the npm_and_yarn group across 1 directory by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/6
* build(deps): bump ramsey/composer-install from 3 to 4 by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/7
* build(deps): bump yaml from 2.8.1 to 2.8.3 in the npm_and_yarn group across 1 directory by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/8
* build(deps): bump picomatch from 2.3.1 to 2.3.2 in the npm_and_yarn group across 1 directory by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/9
* build(deps): bump dependabot/fetch-metadata from 2.5.0 to 3.0.0 by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/10
* build(deps): bump actions/checkout from 6.1.0 to 7.0.1 in the actions-deps group by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/18
* build(deps-dev): bump the actions-deps group with 6 updates by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/19

**Full Changelog**: https://github.com/jeffersongoncalves/filament-ace-editor-field/compare/1.0.5...1.0.6

## 1.0.5 - 2026-03-04

### Breaking Changes

- **Minimum Filament version bumped to `^4.8`** — required due to the new `PageConfiguration` parameter added to `Page::routes()` in [filamentphp/filament#19225](https://github.com/filamentphp/filament/pull/19225)

### What's Changed

- Update `composer.json` to require `filament/filament: ^4.8`

## 1.0.3 - 2025-08-17

**Full Changelog**: https://github.com/jeffersongoncalves/filament-ace-editor-field/compare/1.0.2...1.0.3

## 1.0.2 - 2025-08-17

**Full Changelog**: https://github.com/jeffersongoncalves/filament-ace-editor-field/compare/1.0.1...1.0.2

## 1.0.1 - 2025-08-17

### What's Changed

* build(deps): bump actions/checkout from 4 to 5 by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/1

### New Contributors

* @dependabot[bot] made their first contribution in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/1

**Full Changelog**: https://github.com/jeffersongoncalves/filament-ace-editor-field/commits/1.0.1

## 1.0.0 - 2025-08-17

### What's Changed

* build(deps): bump actions/checkout from 4 to 5 by @dependabot[bot] in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/1

### New Contributors

* @dependabot[bot] made their first contribution in https://github.com/jeffersongoncalves/filament-ace-editor-field/pull/1

**Full Changelog**: https://github.com/jeffersongoncalves/filament-ace-editor-field/commits/1.0.0
