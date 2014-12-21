<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/22/14
 * Time: 8:58 AM
 */

class RegisterController extends \BaseController {

    protected $layoutName = 'no_sidebar';

    function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        //Get countries
        $countryModel = new Country();
        $view['countries'] = $countryModel->getAll();

        $view['user_titles'] = Config::get('misc.user_titles');

        $this->registerFormAssets();
        $this->setPageTitle('Register');
        $this->setPageSubTitle('');
        return $this->render('register.index', $view);
    }

    protected function registerFormAssets()
    {
        Theme::asset()->container('lower-footer')->usePath()->add('custom-pages-register-script', 'js/custom/pages/register.js');
    }


    protected function doRegister()
    {
        $inputData = Input::all();

        //Check is email already exists
        $userModel = new User();

        if ($userModel->isEmailExists($inputData['email'])) {
            $this->message->add('email_already_exists', 'This E-mail is not available.');
            return false;
        }

        $userId = $userModel->addUser(array(
            'username' => $inputData['email'],
            'password' => $inputData['password'],
            'user_group_id' => UserGroup::USER
        ), array(
            'title' => $inputData['title'],
            'first_name' => $inputData['first_name'],
            'last_name' => $inputData['last_name'],
            'department'=> $inputData['department'],
            'country_id' => $inputData['country_id'],
            'institution' => $inputData['institution'],
            'city' => $inputData['city'],
            'alternative_email' => ''
        ));

        if (empty($userId)) {
            $this->message->add('could_not_registered', 'Could not registered!.');
            return false;
        }

        Auth::attempt(array('email' => $inputData['email'], 'password' => $inputData['password']), false);

        $userModel->sendEmailGreeting($userId);

        return true;
    }

    public function getSuccess()
    {
        $conferenceModel = new Conference();
        $conference = $conferenceModel->get(Config::get('misc.default_conference'));
        $conferenceModel->generateDatas($conference);

        $view['conference'] = $conference;

        return $this->render('register.success', $view);
    }

} 