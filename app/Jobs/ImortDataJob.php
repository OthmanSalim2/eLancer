<?php

namespace App\Jobs;

use App\Models\Tag;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImortDataJob implements ShouldQueue
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

    // in this method write the code that will execute
    public function handle(): void
    {
        sleep(30);
        // this code will execute after 30 seconds
        Tag::create([
            'name' => 'PHP Laravel',
            'slug' => 'php-laravel',
        ]);
    }
}
