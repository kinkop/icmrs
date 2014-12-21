<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 26/10/2557
 * Time: 13:03 น.
 */

namespace Controllers\Admin;


class LoginController extends \Controllers\Admin\AdminController
{
    protected $layoutName = 'login';

    public function getIndex()
    {
        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));
        return $this->render('login.index', $view);
    }

    public function postIndex()
    {
        $inputData = \Input::all();
        $credential = array(
            'username' => $inputData['username'],
            'password' => $inputData['password']
        );

        if (!\Auth::attempt($credential)) {
            return \Redirect::to('admin/login')->with('response_message', array(
                    'type' => 'error',
                    'text' => 'Invalid username or password.'
                )
            );
        }

        if (!in_array(\Auth::user()->user_group_id, array(1, 2))) {
            return \Redirect::to('admin/login')->with('response_message', array(
                    'type' => 'error',
                    'text' => 'Invalid username or password.'
                )
            );
        }

        return \Redirect::to('admin');
    }

} 