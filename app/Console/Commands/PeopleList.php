<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PeopleList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:people-list {--is-old} {--sex}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List people';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
