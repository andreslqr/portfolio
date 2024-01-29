<?php

namespace App\Models\Settings;

use App\Models\Scopes\Concerns\HasLang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\LaravelSettings\Models\SettingsProperty as Model;

class SettingsProperty extends Model
{
    use HasFactory;
    use HasLang;
}
