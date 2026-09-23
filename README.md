<div class="filament-hidden">

![Filament Ace Editor Field](https://raw.githubusercontent.com/jeffersongoncalves/filament-ace-editor-field/2.x/art/jeffersongoncalves-filament-ace-editor-field.png)

</div>

# Filament Ace Editor Field

[![Buy Me A Coffee](https://img.shields.io/badge/Buy%20Me%20A%20Coffee-support-FFDD00?style=flat-square&logo=buy-me-a-coffee&logoColor=black)](https://buymeacoffee.com/jeffersongoncalves)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-ace-editor-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-ace-editor-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-ace-editor-field/fix-php-code-style-issues.yml?branch=2.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-ace-editor-field/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3A2.x)
[![Tests](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-ace-editor-field/tests.yml?branch=2.x&label=tests&style=flat-square)](https://github.com/jeffersongoncalves/filament-ace-editor-field/actions/workflows/tests.yml?query=branch%3A2.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-ace-editor-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-ace-editor-field)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-ace-editor-field.svg?style=flat-square)](LICENSE.md)

A Laravel Filament v5 field that integrates the Ace code editor into your forms, offering a rich, syntax-highlighted code editing experience with configurable modes and themes.

## Requirements

- PHP 8.2 or higher (tested on 8.2, 8.3 and 8.4)
- Laravel 11.28+, 12.x or 13.x (Laravel 13 requires PHP 8.3+)
- Filament 5.x

| Plugin branch | Filament |
|---------------|----------|
| 1.x           | 4.x      |
| 2.x           | 5.x      |

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-ace-editor-field:^2.0
```

## Usage

Publish config file.

```bash
php artisan vendor:publish --tag=filament-ace-editor-field-config
```

Once installed, you can use the AceEditorInput component in your Filament forms:

```php
use JeffersonGoncalves\Filament\AceEditorField\Forms\Components\AceEditorInput;

// In your form definition
AceEditorInput::make('description')
    ->mode('html')
    ->theme('monokai')
    ->height('200px')
    ->placeholder('Enter your description here')
    ->required(),
```

## Development

You can run tests, code analysis and formatting using the following commands:

```bash
# Run tests
composer test

# Run static analysis
composer analyse

# Format code
composer format
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
