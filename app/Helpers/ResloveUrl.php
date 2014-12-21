<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 19/10/2557
 * Time: 18:20
 */

class ResloveUrl {

    public static function reslove($url, $avoidNull = true)
    {
        $url = trim($url);
        if ($avoidNull) {
            if (strcmp($url, '') == 0) {
                return $url;
            }
        }

        if (!preg_match('/^(http:\/\/).+$/', $url)) {
            $url = 'http://' . $url;
        }

        return $url;
    }

} 