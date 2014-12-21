<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 8/8/2557
 * Time: 15:06 น.
 */

namespace Conference\Repositories\User;


interface UserInterface {

    public function get($id);
    public function all();

} 