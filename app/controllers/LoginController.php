<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 3:17 PM
 */

class LoginController extends BaseController {

    protected $layoutName = 'no_sidebar';

    function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $view = array();

        Theme::asset()->container('lower-footer')->usePath()->add('custom-pages-login-script', 'js/custom/pages/login.js');
        $this->setPageTitle('Sign in');
        return $this->render('login.index', $view);
    }

    public function doAuthen($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $remember = (isset($data['remember']) && (int) $data['remember'] == 1) ? true : false;

        if (Auth::attempt(array('username' => $username, 'password' => $password), $remember))
        {
           $userDetail = UserDetail::where('user_id', Auth::user()->id)->first()->toArray();
           $this->loginUserDetail = $userDetail;
           return true;
        }

        //Check reason why connit login in the future

        return false;
    }

} 