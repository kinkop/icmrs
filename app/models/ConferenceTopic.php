<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 2/11/2557
 * Time: 15:06 น.
 */

class ConferenceTopic extends BaseModel
{

    public function getAll($conferenceId = null)
    {
        $result = DB::table('conference_topics');

        if (!empty($conferenceId)) {
            $result->where('conference_id', $conferenceId);
        }

        return $result->get();
    }

} 