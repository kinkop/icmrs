<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 28/9/2557
 * Time: 14:56 น.
 */

class UserGroup extends BaseModel
{

    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const REVIWER = 3;
    const USER = 4;

    public function toArray()
    {
        return array(
            static::ADMIN => 'Admin',
            static::REVIWER => 'Reviewer',
            static::USER => 'User'
        );
    }

} 