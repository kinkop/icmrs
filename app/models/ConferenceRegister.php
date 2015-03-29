<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 31/10/2557
 * Time: 12:01 น.
 */

class ConferenceRegister extends  BaseModel
{

    const TYPE_AUTHOR = 'author';
    const TYPE_LISTENER = 'listener';

    public function addConferenceRegister($data)
    {
        $conferenceRegister = new static();
        $conferenceRegister->conference_id = $data['conference_id'];
        $conferenceRegister->user_id = $data['user_id'];
        $conferenceRegister->type = $data['type'];
        $conferenceRegister->registered_date = new DateTime();
        $conferenceRegister->status = 1;

        if (isset($data['registered_by'])) {
            $conferenceRegister->registered_by = $data['registered_by'];
        }

        $conferenceRegister->save();

        return $conferenceRegister->id;
    }

    public function isRegistered($conferenceId, $userId)
    {
        $count = static::where('conference_id', $conferenceId)
                ->where('user_id', $userId)
                ->count();

        if ($count > 0) {
            return true;
        }

        return false;
    }

    public function getRegisteredConferences($userId, $type)
    {
        $result = DB::table('conference_registers as cr')
                  ->select(
                      DB::raw(
                        'c.id as id,
                        c.code as code,
                        c.name as name,
                        c.url_slug as url_slug,
                        c.image_file as image_file,
                        c.location as location,
                        cd.venue_short_information as venue_short_information,
                        c.conference_date as conference_date'
                      )
                  )
                    ->join('conferences as c', 'c.id', '=', 'cr.conference_id')
                    ->join('conference_details as cd', 'cd.conference_id', '=', 'c.id')
                    ->where('cr.user_id', $userId)
                    ->where('cr.type', $type);

        return $result->get();
    }

    public function sendInvitePeopleEmail($userId, $conferenceRegisterId, $userAlreadyRegistered)
    {
        $user = User::find($userId);
        $conferenceRegister = ConferenceRegister::find($conferenceRegisterId);
        if ($user && $conferenceRegister) {
            $userDetail = UserDetail::where('user_id', $user->id)->first();

            if ($userDetail) {
                $userModel = new User();
                $conferenceModel = new Conference();
                $data = array();
                $mailData = array();

                $mailData['email'] = $user->email;
                $mailData['name'] = $userDetail->first_name . ' ' . $userDetail->last_name;

                $inviter = $userModel->getUser($conferenceRegister->registered_by, true);
                $data['inviter'] = $inviter->title . ' ' . $inviter->first_name	. ' ' . $inviter->last_name;
                $data['confirm_register_url'] = URL::to('confirm_register/' . $user->confirm_register_token);

                $conference = Conference::find($conferenceRegister->conference_id);
                $mailData['conference_name'] = $conference->name;
                $data['conference_name'] = $conference->name;
                $data['conference_url'] = $conferenceModel->getConferenceUrl($conferenceRegister->conference_id);

                $data['is_already_registered'] = $userAlreadyRegistered;

                $mailBody = View::make('emails.conference.invite', $data)->render();

                Services\Mail::send(array('email' => $mailData['email'], 'name' => $mailData['name']),
                    'ICMRS 2015 - You was added to ' . $mailData['conference_name'] . ' conference as listener',
                    $mailBody);

                /*Mail::later(5, 'emails.conference.invite', $data, function($message)  use ($mailData)
                {
                    $message->to( $mailData['email'], $mailData['name'])->subject('ICMRS 2015 - You was added to ' . $mailData['conference_name'] . ' conference as listener');
                });*/
            }
        }

    }

    public function sendSubmitPaperEmailToAdmins($conferencePaperId)
    {
        $userModel = new User();
        $submitUserData = $userModel->getUser(8, true);
        $conferencePaper = ConferencePaper::find($conferencePaperId);
        if ($conferencePaper && $submitUserData) {
            $adminUsers = User::where('user_group_id', UserGroup::ADMIN)->get();
            if ($adminUsers) {
                foreach ($adminUsers as $admin) {
                    $userData = $admin->toArray();
                    $userDetail = UserDetail::where('user_id', $userData['id'])->first();
                    if ($userDetail) {
                        $userDetail = $userDetail->toArray();
                        $data = array();
                        $mailData = array();
                        $mailData['email'] = $userData['email'];
                        $mailData['name'] = $userDetail['first_name'] . ' ' . $userDetail['last_name'];
                        $data['submitter_user'] = $submitUserData;
                        $data['conference_paper'] = $conferencePaper->toArray();


                        $mailBody = View::make('emails.conference.admin_noti_submit_paper', $data)->render();

                        Services\Mail::send(array('email' => $mailData['email'], 'name' => $mailData['name']),
                            'New paper submitted (' . time() . ')',
                            $mailBody);
                        /*Mail::send('emails.conference.admin_noti_submit_paper', $data, function($message)  use ($mailData)
                        {
                            $message->to( $mailData['email'], $mailData['name'])->subject('New paper submitted (' . time() . ')');
                        });*/
                    }

                }
            }
        }
    }


    public function getById($id, $includeUserData = false)
    {
        $result = DB::table('conference_registers as cr')
                    ->where('cr.id', $id);

        if ($includeUserData) {
            $result->join('user_details as ud', 'ud.user_id', '=', 'cr.user_id');
        }

        return $result->first();
    }

    public function getConferenceRegisters($conferenceRegisterType = null)
    {
        $result = DB::table('conference_registers as cr')
                ->select(DB::raw('
                    cr.id as conference_register_id,
                    cr.registered_date as conference_registered_date,
                    cr.status as conference_register_status,
                    cr.updated_at as conference_register_updated_at,
                    ud.title as user_title,
                    ud.first_name as user_first_name,
                    ud.last_name as user_last_name,
                    c.name as conference_name,
                    cp.title as conference_paper_title,
                    (
                        SELECT
                            name
                        FROM
                            conference_paper_statuses
                        WHERE
                            id = cp.conference_paper_status_id
                        LIMIT 1
                    ) as conference_paper_status,
                    (
                        SELECT
                            cls
                        FROM
                            conference_paper_statuses
                        WHERE
                            id = cp.conference_paper_status_id
                        LIMIT 1
                    ) as conference_paper_status_cls
                '))
                ->join('conferences as c', 'c.id', '=', 'cr.conference_id')
                ->join('users as u', 'u.id', '=', 'cr.user_id')
                ->join('user_details as ud', 'ud.user_id', '=', 'u.id')
                ->leftjoin('conference_papers as cp', function($join){
                    $join->on('cp.conference_register_id', '=', 'cr.id');
                   // $join->on('cr.type', '=', ConferenceRegister::TYPE_AUTHOR);
                });

        if (!empty($conferenceRegisterType)) {
            $result->where('cr.type', $conferenceRegisterType);
        }

        $result->orderBy('registered_date', 'DESC');

        return $result->get();
    }

} 