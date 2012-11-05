<?php
/**
 * User: Kevin Daudt
 * Date: 10/29/12
 * Time: 9:55 PM
 */

namespace Integrator;

interface UseCase
{
    public function execute(Request $request_model);
}