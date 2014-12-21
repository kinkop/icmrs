<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 19/10/2557
 * Time: 18:51
 */

namespace Helpers;

class File {

    public static function getFileExtension($fileName)
    {
        $pathinfo = pathinfo($fileName);
        if (isset($pathinfo['extension'])) {
            return strtolower($pathinfo['extension']);
        }

        return null;
    }

} 