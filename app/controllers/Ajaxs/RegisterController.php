<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/22/14
 * Time: 11:13 AM
 */

namespace Controllers\Ajaxs;


class RegisterController extends \RegisterController {

    public function postIndex()
    {
        $result = $this->doRegister();

        if (!$result) {
            $messages = $this->getMessageOutput('<p><i class="fa fa-times"></i> :message</p>');
            return $this->json(false, $messages['messages_raw']);
        }

        \Session::put('success_register', 1);

        $data = array(
            'redirect_url' => \URL::to('register/success')
        );

        return $this->json(true, 'Registered successful, Please wait while redirecting.....', $data);
    }

} 