## Filament Ace Editor Field

A Filament form field that integrates the Ace code editor, providing syntax-highlighted code editing with configurable modes, themes, and dark mode support. Requires Filament 5.0+ and PHP 8.2+.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-ace-editor-field:"^2.0"
</code-snippet>
@endverbatim

### Publish Config

@verbatim
<code-snippet name="Publish config file" lang="bash">
php artisan vendor:publish --tag=filament-ace-editor-field-config
</code-snippet>
@endverbatim

### Basic Usage

@verbatim
<code-snippet name="Use AceEditorInput in a form" lang="php">
use JeffersonGoncalves\Filament\AceEditorField\Forms\Components\AceEditorInput;

AceEditorInput::make('code')
    ->mode('html')
    ->theme('monokai')
    ->height('16rem')
    ->required();
</code-snippet>
@endverbatim

### Key Methods

- `mode(string $mode)` - Set Ace editor language mode (e.g., `'html'`, `'php'`, `'javascript'`, `'css'`)
- `theme(string $theme)` - Set Ace editor theme (e.g., `'monokai'`, `'github'`, `'twilight'`)
- `darkTheme(string $theme)` - Set a separate theme for dark mode
- `disableDarkTheme()` - Disable automatic dark theme switching
- `height(string $height)` - Set editor height (default: `'16rem'`)
- `editorOptions(array $options)` - Merge custom Ace editor options
- `editorConfig(array $config)` - Merge custom editor configuration
- `addExtensions(array $extensions)` - Add Ace editor extensions
- `autosize(bool $condition)` - Enable auto-sizing
- `cols(int $cols)` / `rows(int $rows)` - Set columns/rows

### Architecture

- **Namespace**: `JeffersonGoncalves\Filament\AceEditorField`
- **Component**: `AceEditorInput` extends `Filament\Forms\Components\Field`
- **Service Provider**: `AceEditorFieldServiceProvider` (auto-discovered)
- **Config**: `filament-ace-editor-field.php` (base_url, file, extensions, editor_config, editor_options, dark_mode)

### Best Practices

- Always set a `mode()` matching the content language for proper syntax highlighting
- Use `darkTheme()` for consistent appearance across light/dark Filament themes
- Configure extensions and editor options via the published config file for project-wide defaults
- The component extends `Field`, not `TextInput` -- use `placeholder()` and `required()` as usual
