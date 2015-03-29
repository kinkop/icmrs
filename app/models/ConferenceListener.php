<?php
/**
 * Created by PhpStorm.
 * User: pakin_000
 * Date: 3/9/2015
 * Time: 10:39 PM
 */

class ConferenceListener extends BaseModel
{

    public function addConferenceListener($data)
    {
        $conferenceListener = new static();
        $conferenceListener->conference_register_id = $data['conference_register_id'];
        $conferenceListener->conference_listener_status_id = $data['conference_listener_status_id'];

        if (!$conferenceListener->save()) {
            $this->message->add('could_not_add_conference_listener', 'Could not add conference listener');
            return false;
        }

        return $conferenceListener->id;
    }

    public function sendListenerRegisterEmail($conferenceRegisterId)
    {
        $data = DB::table('conference_registers as cr')
                ->select(DB::raw('
                    c.id as id,
                    c.name as conference_name,
                    c.image_file as image_file,
                    c.code as code,
                    c.url_slug as url_slug,
                    c.location as location,
                    c.conference_date as conference_date,
                    cd.venue_short_information as venue_short_information,
                    cr.user_id as user_id,
                    u.email as email,
                    ud.first_name as first_name,
                    ud.last_name as last_name
                '))
                ->join('conferences as c', 'c.id', '=', 'cr.conference_id')
                ->join('conference_details as cd', 'cd.conference_id', '=', 'c.id')
                ->join('users as u', 'u.id', '=', 'cr.user_id')
                ->join('user_details as ud', 'ud.user_id', '=', 'u.id')
                ->where('cr.id', $conferenceRegisterId)
                ->first();

        $conferenceModel = new Conference();
        $conferenceModel->generateDatas($data);

        $_data['id'] = $data->id;
        $_data['name'] = $data->conference_name;
        $_data['image_file'] = $data->image_file;
        $_data['code'] = $data->id;
        $_data['url_slug'] = $data->url_slug;
        $_data['location'] = $data->location;
        $_data['conference_date'] = $data->conference_date;
        $_data['venue_short_information'] = $data->venue_short_information;
        $_data['user_id'] = $data->user_id;
        $_data['email'] = $data->email;
        $_data['first_name'] = $data->first_name;
        $_data['last_name'] = $data->last_name;
        $_data['frontEndViewUrl'] = $data->frontEndViewUrl;
        $_data['imageFullUrl'] = $data->imageFullUrl;

        $mailBody = View::make('emails.conference.listener_register', $_data)->render();

        Services\Mail::send(array('email' => $_data['email'], 'name' => $_data['first_name'] . ' ' . $_data['last_name']),
            'Listener registration',
            $mailBody);

        return true;
    }

}