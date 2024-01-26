<?php

namespace App\Support\Settings;

use Spatie\LaravelSettings\SettingsRepositories\DatabaseSettingsRepository as SettingsRepository;

class DatabaseSettingsRepository extends SettingsRepository
{
    public function updatePropertiesPayload(string $group, array $properties): void
    {
        $propertiesInBatch = collect($properties)->map(function ($payload, $name) use ($group) {
            return [
                'lang' => app()->getLocale(),
                'group' => $group,
                'name' => $name,
                'payload' => json_encode($payload),
            ];
        })->values()->toArray();

        $this->getBuilder()
            ->where('group', $group)
            ->upsert($propertiesInBatch, ['lang', 'group', 'name'], ['payload']);
    }
}