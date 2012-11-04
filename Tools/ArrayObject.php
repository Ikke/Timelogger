<?php
/**
 * User: Kevin Daudt
 * Date: 11/4/12
 * Time: 4:07 PM
 */

namespace Tools;

trait ArrayObject
{
    public function offsetExists($offset)
    {
        return property_exists($this, $offset);
    }

    public function offsetGet($offset)
    {
        if($this->offsetExists($offset))
        {
            return $this->$offset;
        }

        throw new \OutOfBoundsException("Key with value $offset not found");
    }

    public function offsetSet($offset, $value)
    {
        throw new \RuntimeException("Method not implemented");
    }

    public function offsetUnset($offset)
    {
        throw new \RuntimeException("Method not implemented");
    }
}