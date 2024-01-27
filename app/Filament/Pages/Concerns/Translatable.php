<?php

namespace App\Filament\Pages\Concerns;

use Filament\Resources\Concerns\Translatable as ResourceTranslatable;

trait Translatable
{
    use ResourceTranslatable;

    public ?string $activeLocale = null;

    public static function getTranslatableAttributes(): array
    {
        return [];
    }

    public function mountTranslatable(): void
    {
        $this->activeLocale = static::getDefaultTranslatableLocale();
        $this->setLocale(static::getDefaultTranslatableLocale());
    }

    public static function getTranslatableLocales(): array
    {
        return filament('spatie-laravel-translatable')->getDefaultLocales();
    }

    public function updatedActiveLocale(): void
    {
        $this->setLocale($this->activeLocale);
        $this->fillForm();
    }

    public function setLocale(string $lang)
    {
        app()->setLocale($lang);
    }

    public function beforeSave()
    {
        $this->setLocale($this->activeLocale);
    }
}