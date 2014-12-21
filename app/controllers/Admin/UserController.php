<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 25/10/2557
 * Time: 11:15 น.
 */

namespace Controllers\Admin;


class UserController extends \Controllers\Admin\AdminController
{
    protected $layoutName = 'default';
    protected $theme = 'admin';
    protected $userId;
    protected $mode = 'add';

    public function getIndex()
    {
        $view = array();

        $userModel = new \User();
        $view['users'] = $userModel->getUsers(true);
        $userModel->generateDatas($view['users']);

        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));

        $this->setActiveMenu('user');
        $breadcrumbs = array(
            array(
                'name' => 'Users',
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');

        return $this->render('user.index', $view);
    }

    public function getAdd()
    {
        $inputData = \Input::all();

        return $this->callForm();
    }

    public function getEdit($userId)
    {
        $this->userId = $userId;

        return $this->callForm();
    }

    protected function callForm()
    {
        $view = array();
        $view['userId'] = $this->userId;
        $view['userUrl'] = \URL::to('admin/user');

        $userModel = new \User();
        $userGroupModel = new \UserGroup();
        $view['user_groups'] = $userGroupModel->toArray();

        $countryModel = new \Country();
        $view['all_countries'] = $countryModel->getAll();

        $title = 'Add User';
        if (!empty($this->userId)) {
            $title = 'Edit User (#' . $this->userId . ')';
        }

        $view['action_title'] = $title;
        $view['user_titles'] = \Config::get('misc.user_titles');


        $view['user_data']['username'] = '';
        $view['user_data']['password'] = '';
        $view['user_data']['user_group_id'] = '';
        $view['user_data']['status'] = 1;
        $view['user_data']['title'] = '';
        $view['user_data']['first_name'] = '';
        $view['user_data']['last_name'] = '';
        $view['user_data']['department'] = '';
        $view['user_data']['institution'] = '';
        $view['user_data']['city'] = '';
        $view['user_data']['country_id'] = '';

        if (!empty($this->userId)) {
            $userData = $userModel->getUser($this->userId, true);
            if (empty($userData)) {
                \App::abort(404, 'User not found.');
            }

            $view['user_data']['username'] = $userData->username;
            $view['user_data']['password'] = '';
            $view['user_data']['user_group_id'] = $userData->user_group_id;
            $view['user_data']['status'] = (int) $userData->status;
            $view['user_data']['title'] = $userData->title;
            $view['user_data']['first_name'] = $userData->first_name;
            $view['user_data']['last_name'] = $userData->last_name;
            $view['user_data']['department'] = $userData->department;
            $view['user_data']['institution'] = $userData->institution;
            $view['user_data']['city'] = $userData->city;
            $view['user_data']['country_id'] = $userData->country_id;
        }

        $breadcrumbs = array(
            array(
                'name' => 'Users',
                'url' => \URL::to('admin/user')
            ),
            array(
                'name' => $title,
                'url' => ''
            )
        );
        $this->setBreadcrumbsContent($breadcrumbs, 'admin');

        return $this->render('user.form', $view);
    }

    public function postSave()
    {
        $inputData = \Input::all();

        $result = $this->doSave($inputData);

        if (!$result) {

        }

        $message = '';
        if ($this->mode == 'add') {
            $message = 'Added user successful.';
        } else {
            $message = 'Updated user successful.';
        }

        return \Redirect::to('admin/user')->with('response_message', array(
                'type' => 'success',
                'text' => $message
            )
        );
    }

    protected function doSave($data)
    {
        $userModel = new \User();
        $this->userId = (int) $data['user_id'];

        $userData = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'status' => $data['status'],
            'user_group_id' => $data['user_group_id']
        );

        $userDetailData = array(
            'title' => $data['title'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'department' => $data['department'],
            'country_id' => $data['country_id'],
            'institution' => $data['institution'],
            'city' => $data['city']
        );

        if (!empty($this->userId) && \User::find($this->userId)) {
            //Edit
            $this->mode = 'edit';
            $userModel->updateUser($this->userId, $userData, $userDetailData);
            if (!empty($data['password'])) {
                $userModel->updatePassword($this->userId, $data['password']);
            }
        } else {
            //Add
            $this->mode = 'add';
            $this->userId = $userModel->addUser($userData, $userDetailData);
        }

        if (empty($this->userId )) {
            $this->message = $userModel->getMessage();
            return false;
        }

        return true;
    }

    public function getDelete($userId)
    {
        $this->userId = (int) $userId;

        $result = $this->doDelete();


        return \Redirect::to('admin/user')->with('response_message', array(
                'type' => 'success',
                'text' => 'Deleted an user successful.'
            )
        );
    }

    protected function doDelete()
    {
        \UserDetail::where('user_id', $this->userId)->delete();
        \User::where('id', $this->userId)->delete();

        return true;
    }

} 