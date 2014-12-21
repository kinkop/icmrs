<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 9/10/2557
 * Time: 22:54 น.
 */

class ConferenceDetail extends BaseModel
{

    public function getByField($conferenceId, $field)
    {
        $result = DB::table('conference_details')
                  ->select($field)
                  ->where('conference_id', $conferenceId);

        $data = $result->first();

        if ($data) {
            return $data->{$field};
        }

        return false;
    }

    public function updateByField($conferenceId, $field, $content)
    {
        $conference = static::find($conferenceId);

        if (!$conference) {
            $this->message->add('conference_not_found', 'Conference not found.');
            return false;
        }

        $conference->{$field} = $content;

        if (!$conference->save()) {
            $this->message->add('could_not_save_conference', 'Could not save conference.');
            return false;
        }

        return true;
    }

    public function getByConference($conferenceId)
    {
        $conferenceDetail = static::where('conference_id', $conferenceId)->first();

        return $conferenceDetail;
    }

} 