<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use JetBrains\PhpStorm\NoReturn;
use Src\People\Application\Filter\FilterByDepartment;
use Src\People\Application\Filter\FilterBySex;
use Src\People\Application\Query\PeopleByDepartment;
use Src\People\Application\Query\PeopleByGivenSexQuery;
use Src\People\Application\Query\PeopleGetAllQuery;
use Src\People\Application\Query\PeopleGetAllWithIsOldQuery;
use Src\People\Application\Transform\TransformPeople;
use Src\Shared\Domain\Criteria\Filters;
use Src\Shared\Domain\DepartmentType;

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
    #[NoReturn] public function handle(): void
    {
        /** @var PeopleGetAllQuery $peopleGetAllQuery */
        $peopleGetAllQuery = App::make(PeopleGetAllQuery::class);

        $result = $peopleGetAllQuery->execute(
            $this->getFilters(),
            new TransformPeople($this->option('is-old') ?? false)
        );

        dd($result);
    }

    private function getFilters(): Filters {
        $filtersArray = [];

        if($this->option('sex')) {
            $filtersArray[] = new FilterBySex($this->option('sex'));
        }

        if($this->option('department')) {
            $filtersArray[] = new FilterByDepartment(
                DepartmentType::fromName(
                    $this->option('department')
                )
            );
        }

        return new Filters($filtersArray);
    }
}
