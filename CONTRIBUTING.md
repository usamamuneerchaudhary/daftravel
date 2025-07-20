# Contributing

Contributions are welcome and will be fully credited.

## Pull Requests

- **PSR-2 Coding Standard** - The easiest way to apply the conventions is to install [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer).

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](https://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](https://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

## Running Tests

```bash
composer test
```

## Coding Style

This project follows the PSR-2 coding standard and the PSR-4 autoloading standard.

You can check the coding style by running:

```bash
composer check-style
```

You can fix the coding style by running:

```bash
composer fix-style
```

## Security

If you discover any security related issues, please email the author instead of using the issue tracker.

## Development Setup

1. Fork the repository
2. Clone your fork
3. Install dependencies: `composer install`
4. Create a feature branch: `git checkout -b feature/my-new-feature`
5. Make your changes
6. Add tests for your changes
7. Run tests: `composer test`
8. Check coding style: `composer check-style`
9. Commit your changes: `git commit -am 'Add some feature'`
10. Push to the branch: `git push origin feature/my-new-feature`
11. Submit a pull request

## Testing

All new features must include tests. We use PHPUnit for testing.

### Running Tests

```bash
# Run all tests
composer test

# Run tests with coverage
composer test-coverage

# Run specific test file
vendor/bin/phpunit tests/Feature/ProductServiceTest.php

# Run specific test method
vendor/bin/phpunit --filter testCanGetAllProducts
```

### Writing Tests

- Place unit tests in `tests/Unit/`
- Place feature tests in `tests/Feature/`
- Use descriptive test method names
- Mock external dependencies
- Test both success and failure scenarios

## Documentation

- Update the README.md if you add new features
- Add docblocks to all public methods
- Update the CHANGELOG.md
- Keep examples simple and working

## Code Quality

We maintain high code quality standards:

- All methods must have proper docblocks
- Use type hints where possible
- Follow SOLID principles
- Keep methods small and focused
- Use meaningful variable and method names

## Commit Messages

Please write clear commit messages:

- Use the present tense ("Add feature" not "Added feature")
- Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
- Limit the first line to 72 characters or less
- Reference issues and pull requests liberally

## Questions?

If you have any questions about contributing, please create an issue or contact the maintainers.