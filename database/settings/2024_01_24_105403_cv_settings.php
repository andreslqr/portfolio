<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        foreach(config('default-cv-settings') as $lang => $settings)
        {
            foreach($settings as $keySetting => $valueSetting)
            {
                app()->setLocale($lang);
                $this->migrator->add("cv.{$keySetting}", $valueSetting);
            }
        }
    }

    public function down(): void
    {

    }
};
