<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/22/14
 * Time: 11:22 AM
 */

class Country extends BaseModel {

    public function getAll()
    {
        $result = DB::table('countries')
                  ->orderBy('id', 'ASC');

        return $result->get();
    }

} 