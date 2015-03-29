<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 29/3/2558
 * Time: 16:54
 */

namespace Services;


class MyDateTime {

    public static function getAgo($date)
    {
        $currentDate = new \DateTime();
        $checkTime = new \DateTime($date);
        $diff = $currentDate->diff($checkTime);

        if ($diff->d > 1) {
            return $checkTime->format('d m Y H:i:s');
        }

        if ($diff->i < 1) {
            return  $diff->s . ' secs ago';
        } else if ($diff->h < 1) {
            return $diff->i . ' mins ago';
        }

        return $diff->h . ' hours ago';
    }

}