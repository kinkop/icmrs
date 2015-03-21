<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 26/1/2558
 * Time: 22:55
 */

class ConfirmRegisterController extends BaseController
{

    protected $layoutName = 'no_sidebar';

    public function getIndex($token)
    {
        $userModel = new User();
        $user = $userModel->getUserByConfirmRegisterToken($token, true);

        if (!$user) {
            App::abort(404, 'User not found');
        }

        if ($user->is_set_password != 0) {
            App::abort(404, 'User not found');
        }

        $view['email'] = $user->email;
        $view['name'] = $user->title . ' ' . $user->first_name . ' ' . $user->last_name;
        $view['token'] = $token;
        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));
        $this->setPageTitle('Confirm Register');
        return $this->render('confirm_register.index', $view);
    }

    public function postIndex()
    {
        $inputData = Input::all();

        $userModel = new User();
        $user = $userModel->getUserByConfirmRegisterToken($inputData['token'], true);

        if (!$user) {
            App::abort(404, 'User not found');
        }

        if ($user->is_set_password != 0) {
            App::abort(404, 'User not found');
        }

        if (!$this->validate($inputData)) {
            $messages = $this->getMessageOutput('<br />');
            return \Redirect::to('confirm_register/' . $inputData['token'])->with('response_message', array(
                    'type' => 'error',
                    'text' => $messages['messages_raw']
                )
            );
        }

        $userModel->setSetPasswordStatus($user->user_id, 1);
        $userModel->resetConfirmRegisterToken($user->user_id);
        $userModel->updatePassword($user->user_id, $inputData['password']);

        Auth::attempt(array('username' => $user->username, 'password' => $inputData['password']));

        Session::flash('confirm_register_success', 1);

        return \Redirect::to('confirm_register/success')->with('response_message', array(
                'type' => 'success',
                'text' => 'Confirm register successful.<br />'
                         . '<a href="' . URL::to('profile') . '">Click here to continue</a>'
            )
        );
    }

    protected function validate($data)
    {
        $validator = new \Services\Validators\ConfirmRegister($data);

        if ($validator->passes()) {
            return true;
        }

        $this->message = $validator->getErrorMessages();
        return false;
    }

    public function getSuccess()
    {
        if (!Session::get('confirm_register_success')) {
            App::abort(555, 'Invalid access');
        }
        $view = array();
        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));

        $this->setPageTitle('Confirm Register');
        return $this->render('confirm_register.success', $view);
    }

}