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

}