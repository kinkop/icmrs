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

} 