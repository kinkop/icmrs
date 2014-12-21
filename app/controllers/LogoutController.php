<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 5:20 PM
 */

class LogoutController extends \BaseController {

    public function getIndex()
    {
        if (!$this->loginUserId) {
            App::abort(555, 'Invalid access.');
        }

        Auth::logout();

        return Redirect::to('');
    }

} 