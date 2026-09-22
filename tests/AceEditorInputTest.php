<?php

use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Facades\FilamentAsset;
use JeffersonGoncalves\Filament\AceEditorField\Forms\Components\AceEditorInput;
use Livewire\Component;
use Livewire\Livewire;

class AceEditorTestForm extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(['code' => '<?php echo 1;']);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                AceEditorInput::make('code')
                    ->mode('html')
                    ->theme('monokai')
                    ->height('200px')
                    ->required(),
            ])
            ->statePath('data');
    }

    public function render(): string
    {
        return '<div>{{ $this->form }}</div>';
    }
}

it('registers config, views and assets', function () {
    expect(config('filament-ace-editor-field.file'))->toBe('ace.js')
        ->and(view()->exists('filament-ace-editor-field::components.ace-editor-input'))->toBeTrue()
        ->and(FilamentAsset::getAlpineComponentSrc('filament-ace-editor-field', 'jeffersongoncalves/filament-ace-editor-field'))
        ->toContain('filament-ace-editor-field');
});

it('loads defaults from config', function () {
    $field = AceEditorInput::make('code');

    expect($field->getUrl())->toBe('https://cdnjs.cloudflare.com/ajax/libs/ace/1.44.0/ace.js')
        ->and($field->getHeight())->toBe('16rem')
        ->and($field->getDarkTheme())->toBe('ace/theme/dracula')
        ->and($field->isDisableDarkTheme())->toBeFalse()
        ->and($field->getConfig())->toMatchArray(['useWorker' => false, 'basePath' => config('filament-ace-editor-field.base_url')])
        ->and(array_keys($field->getEnabledExtensions()))->toEqualCanonicalizing(['beautify', 'language_tools', 'inline_autocomplete']);
});

it('applies fluent options', function () {
    $field = AceEditorInput::make('code')
        ->mode('javascript')
        ->theme('monokai')
        ->darkTheme('twilight')
        ->disableDarkTheme()
        ->height('10rem')
        ->addExtensions(['emmet']);

    expect($field->getMode())->toBe('ace/mode/javascript')
        ->and($field->getTheme())->toBe('ace/theme/monokai')
        ->and($field->getDarkTheme())->toBe('ace/theme/twilight')
        ->and($field->isDisableDarkTheme())->toBeTrue()
        ->and($field->getHeight())->toBe('10rem')
        ->and($field->getEnabledExtensions())->toHaveKey('emmet');
});

it('renders inside a form and validates state', function () {
    Livewire::test(AceEditorTestForm::class)
        ->assertSee('aceEditorComponent', false)
        ->assertSee('mode\\\\\\/html', false)
        ->assertSee('theme\\\\\\/monokai', false)
        ->assertSee('readOnly\\u0022:false', false)
        ->assertSee('min-height: 200px', false)
        ->assertSet('data.code', '<?php echo 1;')
        ->set('data.code', null)
        ->assertHasErrors(['data.code' => 'required']);
});
