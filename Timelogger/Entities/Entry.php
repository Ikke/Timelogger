<?php
/**
 * User: Kevin Daudt
 * Date: 10/28/12
 * Time: 8:29 PM
 */

namespace Timelogger\Entities;

class Entry
{
    public $time_start;
    public $time_stop;
    public $description;
    public $date;


    public function __construct($data = null)
    {
        if($data) {
            $this->time_start = $data['time_start'];
            $this->time_stop = $data['time_stop'];
            $this->description = $data['description'];
            $this->date = $data['date'];
        }
    }
}