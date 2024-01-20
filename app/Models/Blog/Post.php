<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

/**
 * @method static \Database\Factories\Blog\PostFactory factory()
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'slug',
        'short_description',
        'content',
        'author',
        'published_at',
        'expired_at',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'content' => 'array',
        'published_at' => 'datetime',
        'expired_at' => 'datetime' 
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => false,
        'content' => '[]',
    ];

    /**
     * The model's translatable attributes
     * 
     * @var array
     */
    public $translatable = [
        'title',
        'slug',
        'short_description',
        'content'
    ];

    /**
     * check if the model is published
     * 
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function isPublished(): Attribute
    {
        return Attribute::make(
            get: function(null $value, array $attributes): bool {
                if(! $attributes['is_active'])
                    return false;
                
                $now = Carbon::now();

                return $now->greaterThanOrEqualTo(Carbon::make($attributes['published_at'])) && 
                            (is_null($attributes['expired_at']) || $now->lessThanOrEqualTo(Carbon::make($attributes['expired_at'])));

            }
        );
    }

    /**
     * Get the url for the web rendering
     * 
     * @return string
     */
    public function getWebUrl(): ?string
    {
        return route('blog.show', ['slug' => $this->slug]);
    }

    /**
     * Get the image
     * 
     * @return string
     */
    public function getWebImage(): ?string
    {
        return asset(Storage::url($this->image));
    }

    /**
     * Get the title
     * 
     * @return string
     */
    public function getWebTitle(): ?string
    {
        return Str::of($this->title)->apa()->toString();
    }

    /**
     * Get the short description
     * 
     * @return string
     */
    public function getWebShortDescription(): ?string
    {
        return $this->short_description;
    }
}
