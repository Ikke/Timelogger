<?php
/**
 * User: Kevin Daudt
 * Date: 10/29/12
 * Time: 9:48 PM
 */

namespace Timelogger;

class Repository_Gateway_Memory_Entries implements Repository_Entries
{
    public $entries = array();

    public function insert(Entities\Entry $entry)
    {
        $this->entries[] = $entry;
    }


    public function getAll()
    {
        return $this->entries;
    }
}