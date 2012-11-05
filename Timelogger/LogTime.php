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

    /**
     * @param \Integrator\Request $request_model
     * @return void
     */
    public function execute(\Integrator\Request $request_model)
    {
        /** @var $request_model Request\LogTime */

        $entry = new Entities\Entry($request_model);

        $this->entriesRepository->insert($entry);
    }
}