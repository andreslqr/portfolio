<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        foreach(config('default-cv-settings') as $lang => $settings)
        {
            app()->setLocale($lang);
            foreach($settings as $keySetting => $valueSetting)
            {
                $this->migrator->add("cv.{$keySetting}", $valueSetting);
            }
        }
    }

    public function down(): void
    {
        foreach(config('default-cv-settings') as $lang => $settings)
        {
            app()->setLocale($lang);
            foreach($settings as $keySetting => $valueSetting)
            {
                $this->migrator->deleteIfExists("cv.{$keySetting}");
            }
        }
    }
};
