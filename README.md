<div class="filament-hidden">

![Filament Ace Editor Field](https://raw.githubusercontent.com/jeffersongoncalves/filament-ace-editor-field/2.x/art/jeffersongoncalves-filament-ace-editor-field.png)

</div>

# Filament Ace Editor Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-ace-editor-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-ace-editor-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-ace-editor-field/fix-php-code-style-issues.yml?branch=1.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-ace-editor-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A1.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-ace-editor-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-ace-editor-field)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-ace-editor-field.svg?style=flat-square)](LICENSE.md)

A Laravel Filament v4 field that integrates the Ace code editor into your forms, offering a rich, syntax-highlighted code editing experience with configurable modes and themes.

## Requirements

- PHP 8.2 or higher
- Filament 5.0

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
    ->height(200)
    ->placeholder('Enter your description here')
    ->required(),
```

## Development

You can run code analysis and formatting using the following commands:

```bash
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
