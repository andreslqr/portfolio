<?php

namespace App\Models\Scopes\Concerns;

trait HasMakeMethod
{
    /**
     * Returns an instance of the class
     * 
     * @return static
     */
    public static function make(): static
    {
        return app(static::class);
    }
}