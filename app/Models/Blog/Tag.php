<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

/**
 * @method static \Database\Factories\Blog\PostFactory factory()
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Tag extends Model
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
        'name',
        'description',
    ];

    /**
     * The model's translatable attributes
     * 
     * @var array
     */
    public $translatable = [
        'name',
        'description',
    ];

    /**
     * Relationship with posts
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)
                    ->withPivot('order')
                    ->withTimestamps()
                    ->orderByPivot('order');
    }

    /**
     * Get the name for web
     * 
     * @return string
     */
    public function getWebName(): ?string
    {
        return Str::of($this->name)->ucfirst()->toString();
    }
}
