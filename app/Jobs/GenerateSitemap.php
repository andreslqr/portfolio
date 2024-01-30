<?php

namespace App\Jobs;

use App\Models\Blog\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $siteMap = SitemapGenerator::create(config('app.url'))
            ->getSitemap();

        Post::webQuery()->chunk(50, fn($post) => $siteMap->add($post));

        $siteMap->writeToFile(public_path('sitemap.xml'));
    }
}
