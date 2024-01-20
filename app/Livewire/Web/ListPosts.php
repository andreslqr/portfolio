<?php

namespace App\Livewire\Web;

use App\Models\Blog\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;
    
    #[Computed]
    public function posts(): LengthAwarePaginator
    {
        return Post::paginate(12);
    }

    public function render()
    {
        return view('web::livewire.list-posts');
    }
}
