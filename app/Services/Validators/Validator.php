<?php

namespace Services\Validators;

/*
	|--------------------------------------------------------------------------
	| Validator Service
	|--------------------------------------------------------------------------
	|
	| Here is the validator class for validate any models
	|
	*/

abstract class Validator
{

    /*
    * The validator instance
    *
    * @var Illuminate\Support\Facades\Validator
    */
    protected $validator;

    /*
    * The validate error message instance
    *
    * @var object
    */
    protected $errorMessages;

    /*
    * The attributes array
    *
    * @var mixed
    */
    protected $attributes;

    /*
    * The rules
    * @var mixed
    */
    public static $rules = array();

    /*
    * The custom messages for validator
    * @var mixed
    */
    public static $customMessages = array();

    /*
    *  Constructor
    *
    * @param mixed $attributes
    */
    function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /*
    *  Constructor
    *
    * @return void
    */
    protected function run()
    {
        $this->validator = \Validator::make($this->attributes, static::$rules, static::$customMessages);
    }

    /*
    * Check validator is passed
    *
    * @return void
    */
    public function passes()
    {
        $this->run();
        if ($this->validator->passes()) {
            return true;
        }

        $this->errorMessages = $this->validator->messages();
        return false;
    }

    /*
    * Check validator is failed
    *
    * @return void
    */
    public function fails()
    {
        $this->run();
        if ($this->validator->fails()) {
            $this->errorMessages = $this->validator->messages();
            return true;
        }

        return false;
    }

    /*
    * Get validator error messages
    *
    * @return object
    */
    public function getErrorMessages()
    {
        return $this->errorMessages;
    }

    /**
     * Remove validate rule
     * @param string $field
     * @return void
     */
    public function removeRule($field)
    {
        unset(static::$rules[$field]);
    }

    /**
     * Get validate rules
     * @return mixed
     */
    public function getRules()
    {
        return static::$rules;
    }

}