<?php


namespace App\Service;


use App\Common\Common;

abstract class AbstractService
{
    public function setUser($user)
    {
        Common::setUser($user);
    }
}