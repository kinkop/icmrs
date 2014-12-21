<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 4:32 PM
 */

class UserDetail extends BaseModel {

    public function saveUserDetail($userId, $data)
    {
        $userDetail = static::find($userId);
        if (!$userDetail) {
            return $this->addUserDetail($userId, $data);
        }

        return $this->upUserDetail($userId, $data);
    }

    public function addUserDetail($userId, $data)
    {
        $userDetail = new static();
        $userDetail->user_id = $userId;
        $userDetail->title = $data['title'];
        $userDetail->first_name = $data['first_name'];
        $userDetail->last_name = $data['last_name'];
        $userDetail->department = $data['department'];
        $userDetail->country_id = $data['country_id'];
        $userDetail->institution = $data['institution'];
        $userDetail->city = $data['city'];

        if ($userDetail->save()) {
            return true;
        }

        return false;
    }

    public function upUserDetail($userId, $data)
    {
        $userDetail = static::where('user_id', $userId)->first();
        if ($userDetail) {
            $userDetail = static::find($userDetail->id);
            if ($userDetail) {
                $userDetail->user_id = $userId;
                $userDetail->title = $data['title'];
                $userDetail->first_name = $data['first_name'];
                $userDetail->last_name = $data['last_name'];
                $userDetail->department = $data['department'];
                $userDetail->country_id = $data['country_id'];
                $userDetail->institution = $data['institution'];
                $userDetail->city = $data['city'];

                if ($userDetail->save()) {
                    return true;
                }

                return false;
            }
        }


        return false;
    }

} 