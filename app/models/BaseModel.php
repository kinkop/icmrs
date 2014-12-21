<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 4:32 PM
 */

class BaseModel extends Eloquent {

    protected $message;

    function __construct()
    {
        parent::__construct();

        $this->message = new Illuminate\Support\MessageBag(array());
    }

    public function getMessage()
    {
        return $this->message;
    }

} 