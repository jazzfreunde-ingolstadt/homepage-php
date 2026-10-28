---
name: upgrade-php-version
description: "Use when upgrading the repository's PHP version in CI, deployment, and Docker."
---

# Upgrade PHP Version

Ask for the target PHP version if not supplied. Before changing anything, check
the [IONOS cron job documentation](https://docs.ionos.space/docs/cronjobs/)
for supported PHP versions. If the target is not listed, stop and ask the user
how to proceed.

Update these three files:

- `.github/actions/install-composer-dependencies/action.yaml`: set `php-version`.
- `.deploy-now/homepage-php/config.yaml`: update all `php<version>-cli` commands.
- `api/.docker/docker-compose.yml`: set both `php_version` build arguments.

Use the same major/minor version everywhere. Leave everything else unchanged.
