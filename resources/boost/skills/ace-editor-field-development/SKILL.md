---
name: ace-editor-field-development
description: Build and work with the Filament Ace Editor Field plugin, including code editor forms, syntax highlighting modes, themes, dark mode support, and editor configuration.
---

# Ace Editor Field Development

## When to use this skill

Use this skill when:
- Adding a code editor field to a Filament form
- Configuring syntax highlighting modes (HTML, PHP, JavaScript, CSS, etc.)
- Customizing Ace editor themes and dark mode behavior
- Setting editor dimensions, options, and extensions
- Troubleshooting Ace editor rendering or asset loading issues

## Architecture

### Namespace
```
JeffersonGoncalves\Filament\AceEditorField
```

### Key Classes

| Class | Path | Description |
|-------|------|-------------|
| `AceEditorInput` | `src/Forms/Components/AceEditorInput.php` | Main form field component extending `Filament\Forms\Components\Field` |
| `AceEditorFieldServiceProvider` | `src/AceEditorFieldServiceProvider.php` | Service provider that registers views, config, and assets |

### Dependencies
- `filament/filament: ^5.0`
- `spatie/laravel-package-tools: ^1.14.0`

## Configuration

### Publish Config

```bash
php artisan vendor:publish --tag=filament-ace-editor-field-config
```

The config file `filament-ace-editor-field.php` contains:
- `base_url` - Base URL for Ace editor CDN assets
- `file` - Ace editor main JS file path
- `extensions` - Available Ace extensions map
- `enabled_extensions` - Extensions enabled by default
- `editor_config` - Default editor configuration
- `editor_options` - Default Ace editor options
- `dark_mode.enable` - Whether dark mode theme switching is enabled
- `dark_mode.theme` - Theme to use in dark mode

## Features

### Basic Code Editor

```php
use JeffersonGoncalves\Filament\AceEditorField\Forms\Components\AceEditorInput;

AceEditorInput::make('code')
    ->mode('php')
    ->theme('monokai')
    ->height('20rem')
    ->required();
```

### Setting Language Mode

The `mode()` method sets the Ace editor language mode. It automatically prepends `ace/mode/`:

```php
AceEditorInput::make('content')
    ->mode('html');       // Sets ace/mode/html

AceEditorInput::make('script')
    ->mode('javascript'); // Sets ace/mode/javascript

AceEditorInput::make('styles')
    ->mode('css');        // Sets ace/mode/css
```

### Setting Themes

The `theme()` method sets the light mode theme. It automatically prepends `ace/theme/`:

```php
AceEditorInput::make('code')
    ->theme('github');    // Sets ace/theme/github
```

### Dark Mode Support

Configure a separate theme for dark mode, or disable automatic dark mode switching:

```php
// Set a dark mode theme
AceEditorInput::make('code')
    ->theme('chrome')
    ->darkTheme('twilight');

// Disable dark mode theme switching entirely
AceEditorInput::make('code')
    ->theme('monokai')
    ->disableDarkTheme();
```

### Custom Editor Options

Merge additional Ace editor options (these are passed directly to the Ace API):

```php
AceEditorInput::make('code')
    ->mode('php')
    ->editorOptions([
        'fontSize' => 14,
        'showGutter' => true,
        'showPrintMargin' => false,
        'tabSize' => 4,
        'useSoftTabs' => true,
        'wrap' => true,
    ]);
```

### Editor Configuration

```php
AceEditorInput::make('code')
    ->editorConfig([
        'basePath' => '/custom/ace/path',
    ]);
```

### Adding Extensions

```php
AceEditorInput::make('code')
    ->addExtensions(['emmet', 'language_tools']);

// With a custom callback
AceEditorInput::make('code')
    ->addExtensions(['emmet'], function ($existing, $new) {
        return $existing->merge($new)->unique();
    });
```

### Sizing

```php
AceEditorInput::make('code')
    ->height('30rem')     // Set height (default: '16rem')
    ->cols(80)            // Set columns
    ->rows(20)            // Set rows
    ->autosize();         // Enable auto-sizing
```

### Read-Only Mode

The editor automatically enters read-only mode when the field is disabled:

```php
AceEditorInput::make('code')
    ->mode('json')
    ->disabled();
```

## Internal Behavior

### State Management

- `afterStateHydrated`: Sets the component state from the model value
- `afterStateUpdated`: Validates the field path on the Livewire component
- `initializeConfigurations()`: Reads all defaults from the published config file on `setUp()`

### Editor Options Resolution

`getEditorOptions()` merges custom options with a `readOnly` flag derived from `$this->isDisabled()`.

## Troubleshooting

### Editor Not Rendering
**Cause**: Assets not loaded or Alpine component not registered.
**Solution**: Ensure the service provider is auto-discovered. Clear caches with `php artisan filament:assets` and `php artisan view:clear`.

### Syntax Highlighting Not Working
**Cause**: Incorrect mode name.
**Solution**: Use the Ace mode name without the `ace/mode/` prefix (e.g., `'php'` not `'ace/mode/php'`). The `mode()` method adds the prefix automatically.

### Dark Theme Not Switching
**Cause**: Dark mode disabled in config or `disableDarkTheme()` called.
**Solution**: Check `filament-ace-editor-field.dark_mode.enable` in config, or ensure `disableDarkTheme()` is not called on the component.

### Extensions Not Loading
**Cause**: Extension not defined in config file.
**Solution**: Publish the config and ensure the extension is listed in the `extensions` array with its CDN URL.
