<?php

namespace JeffersonGoncalves\Filament\AceEditorField\Forms\Components;

use Closure;
use Filament\Forms\Components\Concerns\HasPlaceholder;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasExtraAlpineAttributes;
use Illuminate\Support\Collection;
use Livewire\Component;

class AceEditorInput extends Field
{
    use HasExtraAlpineAttributes;
    use HasPlaceholder;

    protected string $view = 'filament-ace-editor-field::components.ace-editor-input';

    protected int|Closure|null $cols = null;

    protected int|Closure|null $rows = null;

    protected bool|Closure $shouldAutosize = false;

    protected string $url = '';

    protected string $basePath = '';

    protected Collection $extensions;

    protected array $config = [];

    protected array $editorOptions = [];

    protected ?string $mode = null;

    protected ?string $theme = null;

    protected ?bool $disableDarkTheme = false;

    protected ?string $darkTheme = null;

    protected ?string $height = '16rem';

    public function mode(string $mode): static
    {
        $this->mode = "ace/mode/$mode";

        return $this->editorOptions(['mode' => $this->mode]);
    }

    public function editorOptions(array $options): static
    {
        $this->editorOptions = array_merge($this->editorOptions, $options);

        return $this;
    }

    public function theme(string $theme): static
    {
        $this->theme = "ace/theme/$theme";

        return $this->editorOptions(['theme' => $this->theme]);
    }

    public function darkTheme(string $theme): static
    {
        $this->darkTheme = "ace/theme/$theme";

        return $this;
    }

    public function disableDarkTheme(): static
    {
        $this->disableDarkTheme = true;

        return $this;
    }

    public function editorConfig(array $config): static
    {
        $this->config = array_merge($this->config, $config);

        return $this;
    }

    public function height(string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function addExtensions(array $extensions, ?Closure $callback = null): static
    {
        if ($callback) {
            $this->extensions = new Collection(call_user_func($callback, $this->extensions, $extensions));
        } else {
            $newExtensions = new Collection($extensions);
            $this->extensions = $this->extensions->merge($newExtensions)->unique();
        }

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function getDarkTheme(): ?string
    {
        return $this->darkTheme;
    }

    public function isDisableDarkTheme(): ?bool
    {
        return $this->disableDarkTheme;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function getEnabledExtensions(): array
    {
        $extensionsUrls = collect(config('filament-ace-editor-field.extensions'));
        $enabledExtensionsKeys = $this->extensions->flip();
        $enabledExtensions = $extensionsUrls->intersectByKeys($enabledExtensionsKeys);

        return $enabledExtensions->toArray();
    }

    public function getConfig(): array
    {
        $config = [
            'basePath' => $this->getBasePath(),
        ];

        return array_merge($this->config, $config);
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function getEditorOptions(): array
    {
        $editorOptions = [
            'readOnly' => $this->isDisabled(),
        ];

        return array_merge($this->editorOptions, $editorOptions);
    }

    public function autosize(bool|Closure $condition = true): static
    {
        $this->shouldAutosize = $condition;

        return $this;
    }

    public function cols(int|Closure|null $cols): static
    {
        $this->cols = $cols;

        return $this;
    }

    public function rows(int|Closure|null $rows): static
    {
        $this->rows = $rows;

        return $this;
    }

    public function getCols()
    {
        return $this->evaluate($this->cols);
    }

    public function getRows()
    {
        return $this->evaluate($this->rows);
    }

    public function shouldAutosize(): bool
    {
        return (bool) $this->evaluate($this->shouldAutosize);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->initializeConfigurations();

        $this->afterStateHydrated(function (AceEditorInput $component, string|array|null $state): void {
            if (! $state) {
                return;
            }
            $component->state($state);
        });

        $this->afterStateUpdated(function (AceEditorInput $component, Component $livewire): void {
            $livewire->validateOnly($component->getStatePath());
        });
    }

    private function initializeConfigurations(): void
    {
        $this->url = rtrim(config('filament-ace-editor-field.base_url'), '/').'/'.ltrim(config('filament-ace-editor-field.file'), '/');
        $this->basePath = config('filament-ace-editor-field.base_url');
        $this->extensions = collect(config('filament-ace-editor-field.enabled_extensions'));
        $this->config = config('filament-ace-editor-field.editor_config');
        $this->editorOptions = config('filament-ace-editor-field.editor_options');
        $this->disableDarkTheme = ! config('filament-ace-editor-field.dark_mode.enable');
        $this->darkTheme = config('filament-ace-editor-field.dark_mode.theme');
    }
}
