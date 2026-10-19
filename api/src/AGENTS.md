# AGENTS

## Coding Standards

**Symfony** the API project uses the symfony conding standards. A detailed description can be found here https://symfony.com/doc/current/contributing/code/standards.html#symfony-coding-standards-in-detail. Please check on composer.json for the current version of the standards.

**General**
- Always check existing implementations and follow the established patterns and conventions.
- Avoid using inline namespace imports. Use the full namespace instead. This is to improve readability and maintainability of the code. This includes php types (example: `use InvalidArgumentException;` instead of `\InvalidArgumentException`).

## Documentation Standards

- Ensure that the PHPDoc comments are clear, concise, and accurately describe the functionality of the code. Do not summarize the code itself; focus on its purpose and usage.
- All interfaces, classes and traits must have PHPDoc comments describing their purpose and usage.
- Any inherited methods must use @inheritdoc to avoid duplicating documentation.
- All public methods must have PHPDoc comments describing their purpose, parameters, return type, and any exceptions they may throw.
- All public properties must have PHPDoc comments describing their purpose and type.
- Psalm annotations should be used to provide additional information that cannot be expressed using native PHPDoc.

## API Documentation
The API documentation is generated using the configured tooling. Run this command any time a change is made to the API code.
```bash
composer run-script api:generate && npm run api:generate
```