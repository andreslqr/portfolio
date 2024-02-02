<?php

namespace App\Models\Blog;

use App\Support\WebContentRender;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

/**
 * @method static \Database\Factories\Blog\PostFactory factory()
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $slug
 * @property string $short_description
 * @property array  $content
 * @property string $author
 * @property \Illuminate\Support\Carbon $published_at
 * @property \Illuminate\Support\Carbon $expired_at
 * @property bool $is_active
 */
class Post extends Model implements Sitemapable
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
        'is_active',
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
        'expired_at' => 'datetime',
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
        'short_description',
        'content',
    ];

    /**
     * Relationship with tags
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)
                    ->withPivot('order')
                    ->withTimestamps();
    }

    /**
     * Related posts 
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function relatedPosts()
    {
        return $this->whereHas('tags', fn(Builder $query) => $query->whereKey($this->tags->pluck('id')))->whereKeyNot($this->getKey());
    }

    public function scopeWebQuery(Builder $query)
    {
        return $query->addSelect('id', 'title', 'slug', 'image', 'published_at')
                    ->latest();
    }

    public function scopeWebFind(Builder $query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeLatestPublished(Builder $query, $column = 'published_at')
    {
        return $query->orderBy($column, 'desc');
    }

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
        if($this->title)
            return Str::of($this->title)->apa()->toString();

        return null;
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

    /**
     * Get the published at read humans
     * 
     * @return string
     */
    public function getWebPublishedAt(): ?string
    {
        return $this->published_at?->diffForHumans();
    }

    /**
     * Get the author of the post for web
     * 
     * @return string
     */
    public function getWebAuthor(): ?string
    {
        return Str::of($this->author)->title()->toString();
    }

    /**
     * Get the web content
     * 
     * @return 
     */
    public function getWebContent()
    {
        return WebContentRender::make($this)->render();
    }

    /**
     * Get the sitemap url
     * 
     * @return \Spatie\Sitemap\Tags\Url|string|array
     */
    public function toSitemapTag(): Url | string | array
    {
        return $this->getWebUrl();
    }
}
