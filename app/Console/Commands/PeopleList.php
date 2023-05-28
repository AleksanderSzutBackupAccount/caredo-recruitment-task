<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Src\People\Application\Query\PeopleByDepartment;
use Src\People\Application\Query\PeopleByGivenSexQuery;
use Src\People\Application\Query\PeopleGetAllWithIsOldQuery;

class PeopleList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:people-list {--is-old} {--sex=} {--department=}';


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
        if($this->option('is-old')) {
            dd((App::make(PeopleGetAllWithIsOldQuery::class))
                ->execute());
        }

        if($this->option('sex')) {
            dd((App::make(PeopleByGivenSexQuery::class))
                ->execute($this->option('sex')));
        }

        if($this->option('department')) {
            dd((App::make(PeopleByDepartment::class))
                ->execute($this->option('department')));
        }
    }
}
