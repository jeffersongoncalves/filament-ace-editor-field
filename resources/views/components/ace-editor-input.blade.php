@php
    use Filament\Support\Facades\FilamentAsset;
    $hasInlineLabel = $hasInlineLabel();
    $isConcealed = $isConcealed();
    $isDisabled = $isDisabled();
    $rows = $getRows();
    $shouldAutosize = $shouldAutosize();
    $statePath = $getStatePath();
    $aceUrl = $getUrl();
    $config = $getConfig();
    $enabledExtensions = $getEnabledExtensions();
    $editorOptions = $getEditorOptions();
@endphp
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <x-slot
        name="label"
        @class([
            'ace-editor-label' => $hasInlineLabel,
        ])
    >
        {{ $getLabel() }}
    </x-slot>
    <div
        @class([
            'ace-editor-wrapper',
            'focus' => $isDisabled,
            'base' => !$errors->has($statePath),
            'danger' => $errors->has($statePath),
        ])>
        <div
            wire:ignore
            x-ignore
            x-load
            x-load-src="{{ FilamentAsset::getAlpineComponentSrc('filament-ace-editor-field', 'jeffersongoncalves/filament-ace-editor-field') }}"
            x-data="aceEditorComponent({
                state: $wire.{{ $applyStateBindingModifiers("entangle('{$statePath}')", isOptimisticallyLive: false) }},
                statePath: '{{ $statePath }}',
                placeholder: @js($getPlaceholder() ?? '// input your code here.'),
                aceUrl: '{{ $aceUrl }}',
                extensions: @js($enabledExtensions),
                config: @js($config),
                options: @js($editorOptions),
                darkTheme: @js($getDarkTheme()),
                disableDarkTheme: @js($isDisableDarkTheme()),
            })"
            x-ref="aceCodeEditor"
            style="min-height: {{ $getHeight() }};"
            class="ace-editor"
        ></div>
    </div>
</x-dynamic-component>
