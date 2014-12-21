<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 28/10/2557
 * Time: 14:50 น.
 */

class Content extends BaseModel
{

    public function getByAlias($alias)
    {
        $result = static::where('alias', $alias);

        return $result->first();
    }

    public function updateByAlias($alias, $content)
    {
        DB::table('contents')->where('alias', $alias)
            ->update(array('content' => $content));

        return true;
    }

} 