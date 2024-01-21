<?php

namespace App\Livewire\Web;

use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ListPosts extends Component
{
    use WithPagination;

    #[Url(except: null)]
    public $tag;
    
    #[Computed]
    public function posts(): LengthAwarePaginator
    {
        return Post::query()
                    ->when($this->tag, fn(Builder $query, $tag) => $query->whereRelation('tags', 'name->' . app()->getLocale(), $tag))
                    ->paginate(12);
    }

    public function render()
    {
        return view('web::livewire.list-posts');
    }

    public function paginationView()
    {
        return 'web::pagination.index';
    }
}
