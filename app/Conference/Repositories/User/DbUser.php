<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 8/8/2557
 * Time: 15:08 น.
 */

namespace Conference\Repositories\User;
use Conference\Eloquent\User;

class DbUser implements \Conference\Repositories\User\UserInterface
{
    public function get($id)
    {
        return User::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }


} 