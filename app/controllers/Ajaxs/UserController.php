<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 4:57 PM
 */

namespace Controllers\Ajaxs;


class UserController extends \UserController
{

    public function postSave()
    {
        $result = $this->doSave();

        $messages = $this->getMessageOutput('<p>:message</p>');
        if (!$result) {
            return $this->json(false, $messages['messages_raw']);
        }

        return $this->json(true, $messages['messages_raw']);
    }

    public function postChangePassword()
    {
        $inputData = \Input::all();

        $result = $this->doChangePassword($inputData);

        $messages = $this->getMessageOutput('<p>:message</p>');
        if (!$result) {
            return $this->json(false, $messages['messages_raw']);
        }

        return $this->json(true, $messages['messages_raw']);
    }

} 