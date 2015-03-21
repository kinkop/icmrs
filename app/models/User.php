<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    const STATUS_ENABLED = 1;
    const STATUS_DISABLED =  0;

    public function addUser($data, $userDetails = array())
    {
        $user = new static();
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['username'];
        $user->user_group_id = $data['user_group_id'];

        $status = 1;
        if (isset($data['status'])) {
            $status = $data['status'];
        }

        $invitedUserId = 0;
        if (isset($data['invited_user_id'])) {
            $invitedUserId = $data['invited_user_id'];
        }

        $isSetPassword = 1;
        if (isset($data['is_set_password'])) {
           $isSetPassword = $data['is_set_password'];
        }

        if (isset($data['confirm_register_token'])) {
            $user->confirm_register_token = $data['confirm_register_token'];
        }

        $user->status = $status;
        $user->invited_user_id = $invitedUserId;
        $user->is_set_password = $isSetPassword;
        $user->save();

        if ($user) {
            if (!empty($userDetails)) {
                $userDetailModel = new UserDetail();
                $userDetailModel->addUserDetail($user->id, $userDetails);
            }

            return $user->id;
        }

        return false;
    }

    public function updateUser($userId, $data, $userDetails = array())
    {
        $user = static::find($userId);

        if ($user) {
            $user->username = $data['username'];
            //$user->password = Hash::make($data['password']);
            $user->email = $data['username'];
            $user->user_group_id = $data['user_group_id'];

            if (isset($data['status'])) {
                $user->status = $data['status'];
            }

            if ($user->save()) {
                if (!empty($userDetails)) {
                    $userDetailModel = new UserDetail();
                    $userDetailModel->upUserDetail($userId, $userDetails);
                }
                return true;
            }

        }

        return false;
    }

    public function isEmailExists($email)
    {
        $result = static::where('username', $email)->first();

        if (!empty($result)) {
            return true;
        }

        return false;
    }

    public function sendEmailGreeting($userId)
    {
        $user = static::find($userId);

        if ($user) {
            $userDetail = UserDetail::where('user_id', $user->id)->first();

            if ($userDetail) {
                $mailData['email'] = $user->username;
                $mailData['name'] = $userDetail->first_name . ' ' . $userDetail->last_name;
                $data = array();

                Mail::later(5, 'emails.register.greeting', $data, function($message)  use ($mailData)
                {
                    $message->to( $mailData['email'], $mailData['name'])->subject('Welcome to ICMSR 2015');
                });
            }
        }

        return false;
    }


    public function getUser($userId, $includeUserDetail = false)
    {
        $result = DB::table('users as u');

        if ($includeUserDetail) {
            $result->join('user_details as ud', 'ud.user_id', '=', 'u.id');
        }

        $result->where('u.id', $userId);

        return $result->first();

    }

    public function updatePassword($userId, $password)
    {
        $user = static::find($userId);

        if (!$user) {
            $this->message->add('user_not_found', 'User no longer exists.');
            return false;
        }

        $user->password = Hash::make($password);

        $user->save();

        return true;
    }

    public function getUsers($includeDetail = false)
    {
        $result = DB::table('users as u')
                  ->orderBy('u.user_group_id', 'ASC')
                  ->orderBy('u.id', 'ASC');

        if (!$includeDetail) {
            $result->select(DB::raw('
                u.id as id,
                u.username as username,
                u.created_at  as created_at,
                u.updated_at as updated_at,
                u.status as status,
                (SELECT )
            '));
        } else {
            $result->join('user_details as ud', 'ud.user_id', '=', 'u.id');
            $result->select(DB::raw('
                u.id as id,
                u.username as username,
                u.created_at  as created_at,
                u.updated_at as updated_at,
                u.status as status,
                ud.title as title,
                ud.first_name as first_name,
                ud.last_name as last_name
            '));
        }

        return $result->get();
    }

    public function getStatuses($index = null)
    {
        $statuses = array(
            static::STATUS_ENABLED => 'Enabled',
            static::STATUS_DISABLED => 'Disabled'
        );

        if (!empty($index) && isset($statuses[$index])) {
            return $statuses[$index];
        }

        return $statuses;
    }

    public function generateDatas($datas)
    {
        if (!empty($datas)) {
            if (is_array($datas)) {
                foreach ($datas as $data) {
                    $this->generateData($data);
                }
            } else {
                $this->generateData($datas);
            }
        }
    }

    public function generateData($data)
    {
        $data->statusText = $this->getStatuses($data->status);
        $data->editUrl = URL::to('admin/user/edit/' . $data->id);
        $data->deleteUrl = URL::to('admin/user/delete/' . $data->id);
    }

    public function getUserByEmail($email)
    {
        $result = DB::table('users')
                ->where('email', $email);

        return $result->first();
    }

    public function getUserByConfirmRegisterToken($confirmRegisterToken, $includeUserDetail = false)
    {
        $result = DB::table('users as u');

        if ($includeUserDetail) {
            $result->select(DB::raw('
                u.id as user_id,
                u.*,
                ud.*
            '));
            $result->join('user_details as ud', 'ud.user_id', '=', 'u.id');
        } else {
            $result->select(DB::raw('
                u.id as user_id,
                u.*
            '));
        }

        $result->where('u.confirm_register_token', $confirmRegisterToken);

        return $result->first();
    }

    public function setSetPasswordStatus($userId, $status)
    {
        $user = static::find($userId);

        if ($user) {
            $user->is_set_password = $status;
            $user->save();
        }

        return true;
    }

    public function resetConfirmRegisterToken($userId)
    {
        $user = static::find($userId);

        if ($user) {
            $user->confirm_register_token = '';
            $user->save();
        }

        return true;
    }

}
