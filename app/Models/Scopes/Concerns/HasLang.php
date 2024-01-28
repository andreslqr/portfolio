<?php

namespace App\Models\Scopes\Concerns;

use App\Models\Scopes\LangScope;
use Illuminate\Database\Eloquent\Builder;

trait HasLang
{
    /**
     * the lang column
     * 
     * @var string
     */
    protected static string $lang = 'lang';

    /**
    * Boot the has lang trait for a model.
    *
    * @return void
    */
    public static function bootHasLang()
    {
        static::addGlobalScope(LangScope::make());

        static::creating(fn($model) => $model->fill([
            'lang' => app()->getLocale()
        ]));
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeWithoutLang(Builder $query)
    {
        $query->withoutGlobalScope(LangScope::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeWhereLang(Builder $query, $lang)
    {
        $query->withoutLang()
            ->where(static::$lang, $lang);
    }
}
