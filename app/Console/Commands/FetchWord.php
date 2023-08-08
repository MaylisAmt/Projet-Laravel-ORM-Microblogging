<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info("In handle() function");

        $wordOfTheDay = Http::get('https://random-word-api.vercel.app/api?words=1');
        $word = $wordOfTheDay[0];

        \Log::info("Word fetched: ", $word);
    }
}
