<?php

class HomeController extends BaseController {

    protected $layoutName = 'home';
    protected $conferenceId;

    function __construct()
    {
        parent::__construct();
        $this->conferenceId = Config::get('misc.default_conference');
    }
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
        $conferenceModel = new Conference();
        $view['conferenceData'] = $conferenceModel->get($this->conferenceId);
        $conferenceModel->generateDatas($view['conferenceData']);

        $conferenceSlideModel = new \ConferenceSlide();
        $conferenceSlides = $conferenceSlideModel->getConferenceSlides($this->conferenceId);
        $conferenceSlideModel->generateDatas($conferenceSlides);

        $view['conferenceSlides'] = $conferenceSlides;

		return $this->render('home.index', $view);
	}

}
