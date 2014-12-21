<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 28/9/2557
 * Time: 15:01 น.
 */

class CountriesTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        $country = new Country();
        $country->code = 'th';
        $country->name = 'Thailand';
        $country->save();
    }

} 