<?php

namespace App\Console\Commands;

use App\Jobs\GenerateSitemap as GenerateSitemapJob;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap for the front';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        GenerateSitemapJob::dispatch();
    }
}
