<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 4:58 PM
 */

namespace Controllers\Ajaxs;


class LoginController extends \LoginController {

    public function postAuthen()
    {
        $inputData = \Input::all();

        if ($this->doAuthen($inputData)) {

            $redirectUrl = \URL::to('profile');

            if (\Session::has('login_redirect')) {
                $redirectUrl = \Session::get('login_redirect');
            }

            $outputData = array(
                'redirect_url' => $redirectUrl
            );

            return $this->json(true, '<p>Welcome! ' .  $this->loginUserDetail['first_name'] . ' ' .  $this->loginUserDetail['last_name'] . '</p><p>Signing in successful, Please wait...</p>', $outputData);
        }

        return $this->json(false, 'Signing in error, Invalid email or password.');
    }

} 