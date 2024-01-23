<?php

namespace App\Support;

use App\Models\Blog\Post;

class WebContentRender
{
    /**
     * The constructor of the class
     * 
     * @param \App\Models\Blog\Post
     */
    public function __construct(
        protected Post $post
    ){}

    /**
     * The make method
     * 
     * @param  \App\Models\Blog\Post
     * @return static
     */
    public static function make(Post $post): static
    {
        return app(static::class, [
            'post' => $post
        ]);
    }

    public function render()
    {
        return view('web::visualizers.index', [
            'blocks' => $this->getBlocks()
        ]);   
    }

    public function getBlocks()
    {
        return array_map(fn($block) => $this->getBlockView($block), $this->post->content ?: []);
    }
    
    public function getBlockView($block)
    {
        return view(match($block['type']) {
            'paragraph' => 'web::visualizers.paragraph',
            'code' => 'web::visualizers.code',
            'image' => 'web::visualizers.image',
            '2_columns', '3_columns' => 'web::visualizers.columns',
            'heading' => 'web::visualizers.heading',
            default => 'web::visualizers.default'
        }, [
            'data' => $block['data'],
            'webContentRender' => $this
        ]);
        
    }
}
