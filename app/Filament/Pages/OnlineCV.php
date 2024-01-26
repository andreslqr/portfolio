<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\Translatable;
use App\Settings\CVSettings;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class OnlineCV extends SettingsPage
{
    use Translatable;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Online CV';

    protected static ?string $title = 'Online CV';

    protected static ?string $navigationGroup = 'General';

    protected static string $settings = CVSettings::class;

    protected function getActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('name')
                                ->required()
                                ->string()
                                ->maxLength(255)
                    ])
                    ->grow(false),
                    Section::make([

                    ])
                ])
            ]);
    }

    public function mount(): void
    {
        $this->setLocale(static::getDefaultTranslatableLocale());
        $this->fillForm();
    }

}
