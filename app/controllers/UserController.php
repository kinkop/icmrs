<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 2:37 PM
 */

class UserController extends BaseController {

    protected $layoutName = 'no_sidebar';

    public function getIndex()
    {
        $view['user'] = $this->getUserData();

        if (empty($view['user'])) {
            App::abort(555, 'Something went wrong!');
        }


        $countryModel = new Country();
        $view['countries'] = $countryModel->getAll();

        $view['user_titles'] = Config::get('misc.user_titles');

        $view['author_conferences'] = $this->getRegisteredConferences(ConferenceRegister::TYPE_AUTHOR);
        $view['listener_conferences'] = $this->getRegisteredConferences(ConferenceRegister::TYPE_LISTENER);
        $view['papers'] = $this->getSubmitPapers();

        $this->indexAssets();
        $this->setPageTitle('UER DASHBOARD');

        return $this->render('user.index', $view);
    }

    protected function getUserData()
    {
        $userModel = new User();
        $user = $userModel->getUser($this->loginUserId, true);


        return $user;
    }

    protected function indexAssets()
    {
        Theme::asset()->container('lower-footer')->usePath()->add('custom-pages-profile-script', 'js/custom/pages/profile.js');
    }


    public function postSave()
    {

    }

    protected function doSave()
    {
        $inputData = Input::all();

        $userDetailModel = new UserDetail();
        $userDetailData = array(
            'title' => $inputData['title'],
            'first_name' => $inputData['first_name'],
            'last_name' => $inputData['last_name'],
            'department' => $inputData['department'],
            'institution' => $inputData['institution'],
            'country_id' => (int) $inputData['country'],
            'city' => $inputData['city']
        );

        $result = $userDetailModel->upUserDetail($this->loginUserId, $userDetailData);

        if (!$result) {
            $this->message->add('could_not_update_user_profile', 'Could not update an user profile.');
            return false;
        }

        $this->message->add('profile_has_been_saved', 'Profile has been saved.');

        return true;
    }

    protected function doChangePassword($data)
    {
        $user = User::find($this->loginUserId);

        if (!$user) {
            $this->message->add('user_not_found', 'User no longer exists.');
            return false;
        }

        //Check current password is currect
        if (!Hash::check($data['current_password'], $user->password))
        {
            $this->message->add('current_password_not_correct', 'Current password is not correct.');
            return false;
        }

        $userModel = new User();
        if (!$userModel->updatePassword($this->loginUserId, $data['new_password'])) {
            $this->message = $userModel->getMessage();
            return false;
        }

        $this->message->add('change_password_successful', 'Changed password successful.');

        return true;
    }

    protected function getRegisteredConferences($type)
    {
        $conferenceRegisterModel = new ConferenceRegister();
        $conferenceModel = new Conference();
        $datas = $conferenceRegisterModel->getRegisteredConferences($this->loginUserId, $type);
        $conferenceModel->generateDatas($datas);

        return $datas;
    }

    protected function getSubmitPapers()
    {
        $conferencePaperModel = new ConferencePaper();
        $conferenceModel = new Conference();
        $datas = $conferencePaperModel->getConferencePapers($this->loginUserId);

        $conferenceModel->generateDatas($datas);
        $conferencePaperModel->generateDatas($datas);

        return $datas;
    }

} 