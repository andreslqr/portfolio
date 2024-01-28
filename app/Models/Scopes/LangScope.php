<?php

namespace App\Models\Scopes;

use App\Models\Scopes\Concerns\HasMakeMethod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LangScope implements Scope
{
    use HasMakeMethod;
    
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('lang', app()->getLocale());
    }
}
