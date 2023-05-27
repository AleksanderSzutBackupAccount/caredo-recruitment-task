<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Src\People\Application\Query\PeopleGetAllWithIsOldQuery;

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


    public function __construct(private PeopleGetAllWithIsOldQuery $queryIsOld)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if($this->option('is-old')) {
            dd($this->queryIsOld->execute());
        }
        if($this->option('is-old')) {
            dd($this->queryIsOld->execute());
        }
    }
}
