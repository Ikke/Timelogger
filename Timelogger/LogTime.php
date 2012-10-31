<?php
/**
 * User: Kevin Daudt
 * Date: 10/29/12
 * Time: 9:39 PM
 */

namespace Timelogger;

class LogTime implements \Integrator\UseCase
{
    public $entriesRepository;

    public function __construct(Repository_Entries $entriesRepository)
    {
        $this->entriesRepository = $entriesRepository;
    }

    public function execute(array $request_model)
    {
        $entry = new Entities\Entry($request_model);

        $this->entriesRepository->insert($entry);
    }
}