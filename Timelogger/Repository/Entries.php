<?php
/**
 * User: Kevin Daudt
 * Date: 10/29/12
 * Time: 9:45 PM
 */

namespace Timelogger;

interface Repository_Entries
{
    public function insert(Entities\Entry $entry);
    public function getAll();
}