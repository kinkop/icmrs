<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 27/1/2558
 * Time: 06:47
 */

namespace Services\Validators;


class ConfirmRegister extends \Services\Validators\Validator
{

    public static $rules = array(
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password|min:6'
    );

}