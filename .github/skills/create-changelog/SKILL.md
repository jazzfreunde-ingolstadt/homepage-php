---
name: create-pr-changelog
description: "Create a concise, non-technical, user-facing changelog for a release pull request from development to master. Use when preparing a release PR summary by reviewing all commits, changed files, and referenced GitHub issues."
---

# Create a release PR changelog

Create a ready-to-paste changelog for the website's users. Explain what changed from their point of view, not how it was implemented.

## Procedure

1. Identify the release pull request from the active PR context or the user's link/number. Confirm that it targets `master` from `development`. If the intended PR is unclear, ask which PR to use instead of guessing.
2. Review the complete PR: read every commit title and body, then inspect the full list of changed files and their diffs. Understand the user-visible effect of each substantive change; do not infer it from filenames or commit messages alone. Consider related changes together and check removed or modified behavior as well as additions.
3. Find every `#<number>` issue reference in the PR title and description and in all commit titles and bodies. Resolve each reference in the repository's GitHub context, deduplicate them, and use the issue description and the code changes to understand the outcome. Do not guess issue summaries or links. If an issue cannot be retrieved, state that limitation rather than inventing details.
4. Decide which changes matter to website users. Include new capabilities and meaningful improvements or fixes. Leave out internal refactors, maintenance, tests, dependency updates, and other implementation details when they have no user-visible effect. Do not inflate minor changes or add promotional language.
5. Classify included issue-backed changes as features or bug fixes. Put features first, then bug fixes. Include the issue number as a Markdown link to its GitHub issue and a short summary written for users. Include other noteworthy user-facing changes without an issue link when appropriate.
6. Return a concise, ready-to-paste changelog. Use short bullets grouped under headings such as `Features` and `Bug fixes`, omitting empty sections. Keep technical terms out unless users need them; when necessary, explain them in plain language. Do not add a generic introduction, implementation notes, or fluff. If the PR contains no user-visible changes, say so plainly.

## Output example

### Features
- [#123](https://github.com/owner/repository/issues/123) — Visitors can now filter upcoming events by venue.

### Bug fixes
- [#124](https://github.com/owner/repository/issues/124) — Fixed an issue that prevented some event details from displaying.