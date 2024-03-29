<?php

namespace App\Models\Scopes;

use App\Models\Scopes\Concerns\HasMakeMethod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Carbon;

class IsPublishedScope implements Scope
{   
    use HasMakeMethod;
    
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where(function(Builder $query): void {
            $query->where('is_active', true)
                ->where(function(Builder $query): void {
                    $query->where('published_at', '<=', Carbon::now())
                        ->where(fn(Builder $q) => $q->whereNull('expired_at')
                                                    ->orWhere('expired_at', '>=', Carbon::now()));
                });
        });
    }
}
