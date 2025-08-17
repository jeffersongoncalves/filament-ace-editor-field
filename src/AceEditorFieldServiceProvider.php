<?php

namespace JeffersonGoncalves\Filament\AceEditorField;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AceEditorFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-ace-editor-field')
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'jeffersongoncalves/filament-ace-editor-field';
    }

    protected function getAssets(): array
    {
        return [
            AlpineComponent::make('filament-ace-editor-field', __DIR__.'/../resources/dist/filament-ace-editor-field.js'),
            Css::make('filament-ace-editor-field', __DIR__.'/../resources/dist/filament-ace-editor-field.css'),
        ];
    }
}
