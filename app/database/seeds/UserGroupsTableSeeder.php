<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 28/9/2557
 * Time: 15:02 น.
 */

class UserGroupsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        $userGroup = new UserGroup();
        $userGroup->alias = 'super_admin';
        $userGroup->name = 'Super Admin';
        $userGroup->save();


        $userGroup = new UserGroup();
        $userGroup->alias = 'admin';
        $userGroup->name = 'Admin';
        $userGroup->save();


        $userGroup = new UserGroup();
        $userGroup->alias = 'Reviewer';
        $userGroup->name = 'REVIEWER';
        $userGroup->save();


        $userGroup = new UserGroup();
        $userGroup->alias = 'user';
        $userGroup->name = 'User';
        $userGroup->save();

    }


} 