<?php
/**
 * User: Kevin Daudt
 * Date: 11/3/12
 * Time: 9:26 PM
 */

namespace Timelogger\Request;

class LogTime implements \Integrator\Request, \ArrayAccess
{
    use \Tools\Assignable;
    use \Tools\ArrayObject;

    public $time_start;
    public $time_stop;
    public $description;
    public $date;
}