<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 5:05 PM
 */

class Debug {

    public static function pr($var, $exit = false)
    {
        echo '<pre>';
        if (is_array($var) || is_object($var)) {
            print_r($var);
        } else {
            echo $var;
        }
        echo '</pre>';

        if ($exit) {
            exit();
        }
    }

    public static function dump($var, $exit = false)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';

        if ($exit) {
            exit();
        }
    }

} 