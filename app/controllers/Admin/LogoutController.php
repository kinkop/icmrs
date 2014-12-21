<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 26/10/2557
 * Time: 13:35 น.
 */

namespace Controllers\Admin;


class LogoutController extends \Controllers\Admin\AdminController
{

    public function getIndex()
    {
        \Auth::logout();

        return \Redirect::to('admin/login');
    }

} 