<?php
/**
 * User: Kevin Daudt
 * Date: 11/3/12
 * Time: 10:48 PM
 */

namespace Tools;

trait Assignable
{
    public function __construct(array $data)
    {
        foreach($data as $field => $value)
        {
            if(property_exists($this, $field))
            {
                $this->$field = $data[$field];
            }
        }
    }
}