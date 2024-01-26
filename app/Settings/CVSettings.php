<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CVSettings extends Settings
{
    public string $name;
    public string $lastName;

    public string $profilePicture;

    public string $description;
    public string $location;

    public string $emailContact;
    public string $numberContact;
    public array $extraLinks;
    public array $socialLinks;

    public array $skills;
    public array $softSkills;
    public array $certificacions;
    public array $workExperience;
    public array $schoolCareer;

    public static function group(): string
    {
        return 'cv';
    }
}