<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 9/21/14
 * Time: 2:20 PM
 */

class ConferenceController extends BaseController {

    protected $themeLayout = 'default';
    protected $conferenceId = 1;
    protected $uploadFilePath;
    protected $uploadFileUrl;

    function __construct()
    {
        parent::__construct();

        $this->uploadFilePath = Config::get('upload.file_path');
        $this->uploadFileUrl = Config::get('upload.file_url');
    }

    public function getIndex($conference_slug)
    {
        $conferenceModel = new Conference();
        $conference = $conferenceModel->getByUrlSlug($conference_slug, true);

        if (!$conference) {
            App::abort(404, 'Conference not found.');
        }

        $this->conferenceId = $conference->id;

        $conferenceModel->generateDatas($conference);
        $view['conference'] = $conference;

        $this->setPageTitle($view['conference']->code);
        $this->setPageSubTitle($view['conference']->name);

        Theme::setCurrentConferenceUrl($view['conference']->frontEndViewUrl);
        $this->setGoogleMapStaticMap($this->conferenceId);

        return $this->render('conference.detail', $view);
    }

    public function getContent($conference_slug, $field_name)
    {
        if ($field_name == 'listener_register') {
            $field_name = 'listener_register_detail';
        }

        $titles = array(
            'objectives' => 'Objectives',
            'important_dates' => 'Important Dates',
            'call_for_papers' => 'Call For Papers',
            'key_notes' => 'Key Notes',
            'committees' => 'Committees',
            'organization' => 'Organization',
            'conference_program' => 'Conference Program',
            'conference_proceedings' => 'Conference Proceedings',
            'fees' => 'Registration Fees',
            'listener_register_detail' => 'Listener Register'
        );

        $conferenceModel = new Conference();
        $conference = $conferenceModel->getByUrlSlug($conference_slug, true);

        if (!$conference) {
            App::abort(404, 'Conference not found.');
        }

        $conferenceModel->generateDatas($conference);

        $this->conferenceId = $conference->id;

        $this->setGoogleMapStaticMap($this->conferenceId);

        $conferenceDetailModel = new ConferenceDetail();

        $content = '';
        try {
            $content = $conferenceDetailModel->getByField( $this->conferenceId, $field_name);
        } catch (Exception $e) {
            $content = 'Coming soon.....';
        }


        if ($field_name != 'conference_program'
            || $field_name != 'conference_proceedings'
        ) {

            if ($content === false) {
                App::abort(404, 'Conference not found.');
            }
        }


        $view['content'] = $content;
        $view['title'] = (isset($titles[$field_name])) ? $titles[$field_name] : $field_name;
        $view['conference_id'] = $conference->id;

        Theme::setCurrentConferenceUrl($conference->frontEndViewUrl);


        $this->setPageTitle($conference->code);
        $this->setPageSubTitle($conference->name);

        if ($field_name == 'venue') {
            return $this->conferenceVenue();
        }

        $renderView = 'conference.content';

        if ($field_name == 'listener_register_detail') {
            $renderView = 'conference.listener_register';
        }

        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));

        $conferenceRegisterModel = new ConferenceRegister();
        $view['is_registered'] = $conferenceRegisterModel->isRegistered($conference->id, $this->loginUserId);

        return $this->render($renderView, $view);
    }

    protected function setGoogleMapStaticMap($conferenceId)
    {
        $conferenceDetailModel = new ConferenceDetail();
        $conferenceDetail = $conferenceDetailModel->getByConference($conferenceId);

        $map = '- No map -';
        if ($conferenceDetail) {
            if (!empty($conferenceDetail->venue_lat) && !empty($conferenceDetail->venue_lng)) {
                $conferenceDetail->venue_lat = trim($conferenceDetail->venue_lat);
                $conferenceDetail->venue_lng = trim($conferenceDetail->venue_lng);
                $map = '<img src="http://maps.google.com/maps/api/staticmap?center=' . $conferenceDetail->venue_lat . ',' . $conferenceDetail->venue_lng . '&zoom=13&size=260x260&sensor=true&markers=color:red%7Clabel:C%7C' . $conferenceDetail->venue_lat . ',' . $conferenceDetail->venue_lng . '" width="260" height="260" />';
            }

        }

        Theme::setConferenceMap($map);
    }

    protected function conferenceVenue()
    {
        $view = array();

        $conferenceDetailModel = new ConferenceDetail();
        $conferenceDetail = $conferenceDetailModel->getByConference($this->conferenceId)->toArray();

        \Theme::asset()->container('footer')->add('google-map-main-script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAuG34odmsgOai2Rc_BpjV5zwtp_WtTNTc');
        \Theme::asset()->container('lower-footer')->usePath()->add('google-map-main-script2', 'js/custom/pages/venue.js');
        \Theme::asset()->container('header')->usePath()->writeScript('custom-script-venue', '
            var venueMapLat = ' . $conferenceDetail['venue_lat'] .';
            var venueMapLng = ' . $conferenceDetail['venue_lng'] .';
        ');


        $view['conferenceDetail'] = $conferenceDetail;

        return $this->render('conference.venue', $view);
    }

    public function getAuthorRegister($conference_slug)
    {
        $conferenceModel = new Conference();
        $conference = $conferenceModel->getByUrlSlug($conference_slug, true);

        if (!$conference) {
            App::abort(404, 'Conference not found.');
        }

        $this->conferenceId = $conference->id;
        $conferenceModel->generateDatas($conference);

        $conferenceRegisterModel = new ConferenceRegister();

        $view['data']['id'] = '';
        $view['data']['code'] = '';
        $view['data']['conference_register_id'] = '';
        $view['data']['title'] = '';
        $view['data']['paper_type'] = '';
        $view['data']['presentation_type'] = '';
        $view['data']['authors'] = '';
        $view['data']['abstract'] = '';
        $view['data']['keywords'] = '';
        $view['data']['refs'] = '';
        $view['data']['note'] = '';
        $view['data']['file1'] = '';
        $view['data']['file2'] = '';
        $view['data']['file3'] = '';
        $view['data']['created_at'] = '';
        $view['data']['updated_at'] = '';
        $view['data']['file1_url'] = '';
        $view['data']['file2_url'] = '';
        $view['data']['file3_url'] = '';
        $view['data']['required_file1'] = true;
        $view['data']['conference_topic_id'] = 0;
        $view['data']['conference_topic_parent_id'] = 0;

        $view['submit_button_text'] = 'Submit Paper';
        $view['mode'] = 'add';
        if ($conferenceRegisterModel->isRegistered($this->conferenceId, $this->loginUserId)) {
            $conferencePaperModel = new ConferencePaper();
            $conferencePaper = $conferencePaperModel->getConferencePaperByConference($this->conferenceId, $this->loginUserId);

            if (!$conferencePaper) {
                App::abort(555, 'You\'re already submitted paper as listener.');
            }

            $view['submit_button_text'] = 'Update Paper';
            if ($conferencePaper) {
                $view['mode'] = 'edit';
                $conferencePaperModel->generateDatas($conferencePaper);
                $view['data']['id'] = $conferencePaper->id;
                $view['data']['code'] = $conferencePaper->code;
                $view['data']['conference_register_id'] = $conferencePaper->conference_register_id;
                $view['data']['title'] = $conferencePaper->title;
                $view['data']['paper_type'] = $conferencePaper->paper_type;
                $view['data']['presentation_type'] = $conferencePaper->presentation_type;
                $view['data']['authors'] = $conferencePaper->authors;
                $view['data']['abstract'] = $conferencePaper->abstract;
                $view['data']['keywords'] = $conferencePaper->keywords;
                $view['data']['refs'] = $conferencePaper->refs;
                $view['data']['note'] = $conferencePaper->note;
                $view['data']['file1'] = $conferencePaper->file1;
                $view['data']['file2'] = $conferencePaper->file2;
                $view['data']['file3'] = $conferencePaper->file3;
                $view['data']['created_at'] = $conferencePaper->created_at;
                $view['data']['updated_at'] = $conferencePaper->updated_at;
                $view['data']['file1_url'] = $conferencePaper->file1FullUrl;
                $view['data']['file2_url'] = $conferencePaper->file2FullUrl;
                $view['data']['file3_url'] = $conferencePaper->file3FullUrl;
                $view['data']['required_file1'] = false;
                $view['data']['conference_topic_id'] = $conferencePaper->conference_topic_id;
                $conferenceTopic = ConferenceTopic::find($conferencePaper->conference_topic_id);
                if ($conferenceTopic) {
                    $view['data']['conference_topic_parent_id'] = $conferenceTopic->parent_topic_id;
                }

            }
        }



        $view['conference'] = $conference;

        $conferencePaperModel = new ConferencePaper();
        $view['conference_types'] = $conferencePaperModel->getPaperTypes();
        $view['conference_presentation_types'] = $conferencePaperModel->getPresentationTypes();

        $conferenceTopicModel = new ConferenceTopic();
        $conferenceTopics = $conferenceTopicModel->getAll($this->conferenceId);
        $conferenceTopicsTemp = array();
        if ($conferenceTopics) {
            foreach ($conferenceTopics as $data) {
                if ($data->parent_topic_id == 0 && !isset($conferenceTopicsTemp[$data->id])) {
                    $conferenceTopicsTemp[$data->id] = array();
                    $conferenceTopicsTemp[$data->id]= $data;
                    $conferenceTopicsTemp[$data->id]->items = array();
                }

                if ($data->parent_topic_id > 0 && isset($conferenceTopicsTemp[$data->parent_topic_id])) {
                    $conferenceTopicsTemp[$data->parent_topic_id]->items[] = $data;
                }

            }
        }

        $view['conference_topics'] = $conferenceTopicsTemp;

        $this->setPageTitle($view['conference']->code);
        $this->setPageSubTitle($view['conference']->name);

        Theme::setCurrentConferenceUrl($view['conference']->frontEndViewUrl);
        $this->setGoogleMapStaticMap($this->conferenceId);

        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));

        Theme::asset()->container('lower-footer')->usePath()->add('custom-pages-submit-apaper-script', 'js/custom/pages/submit_paper.js');


        return $this->render('conference.author_register', $view);
    }

    public function postSubmitPaper($conference_slug)
    {
        $conferenceModel = new Conference();
        $conferenceRegisterModel = new ConferenceRegister();

        $conference = $conferenceModel->getByUrlSlug($conference_slug, true);

        if (!$conference) {
            App::abort(404, 'Conference not found.');
        }

        $conferenceModel->generateDatas($conference);
        $this->conferenceId = $conference->id;
        $inputData = Input::all();

        $conferenceRegisterData = array(
            'conference_id' =>  $this->conferenceId ,
            'user_id' => $this->loginUserId,
            'type' => ConferenceRegister::TYPE_AUTHOR
        );

        $paperData = array(
            'conference_register_id' => '',
            'title' => $inputData['title'],
            'paper_type' => $inputData['paper_type'],
            'presentation_type' => $inputData['presentation_type'],
            'authors' => $inputData['authors'],
            'abstract' => $inputData['abstract'],
            'keywords' => $inputData['keywords'],
            'refs' => $inputData['refs'],
            'note' => $inputData['note'],
            'conference_topic_id' => $inputData['conference_topic_id']
        );

        $conferencePaperModel = new ConferencePaper();

        $conferencePaperId = null;
        $type = 'add';
        if ($conferenceRegisterModel->isRegistered( $this->conferenceId, $this->loginUserId)) {
            $type = 'edit';
            $paperData['conference_register_id'] = $inputData['conference_register_id'];
            $conferencePaperId = $conferencePaperModel->editConferencePaper($inputData['id'], $paperData);
        } else {
            $conferenceRegisterId = $conferenceRegisterModel->addConferenceRegister($conferenceRegisterData);
            $paperData['conference_register_id'] = $conferenceRegisterId;
            $conferencePaperId = $conferencePaperModel->addConferencePaper($paperData);
        }


        $this->uploadFile($conferencePaperId, 'file1', 'file1');
        $this->uploadFile($conferencePaperId, 'file2', 'file2');
        $this->uploadFile($conferencePaperId, 'file3', 'file3');

        $conferencePaperModel->sendSubmitPaperEmail($conferencePaperId);


        Session::flash('success_submit_paper', 1);
        Session::flash('success_submit_paper_type', $type);


        $message = 'Submit paper for conference ' . $conference->code . ' ' . $conference->name . ' successful. Thank you for your submission.';
        if ($type == 'edit') {
            $message = 'Updated paper successful.';
        }

        return Redirect::to($conference->frontEndViewUrl . '/submit_paper')->with('response_message', array(
                'type' => 'success',
                'text' => $message
            )
        );
    }

    public function getSuccessSubmitPaper($conference_slug)
    {
        if (!Session::has('success_submit_paper')) {
            App::abort(555, 'Invalid access.');
        }

        $conferenceModel = new Conference();
        $conference = $conferenceModel->getByUrlSlug($conference_slug, true);

        if (!$conference) {
            App::abort(404, 'Conference not found.');
        }

        $conferenceModel->generateDatas($conference);
        $this->conferenceId = $conference->id;

        $this->setPageTitle($conference->code);
        $this->setPageSubTitle($conference->name);

        Theme::setCurrentConferenceUrl($conference->frontEndViewUrl);
        $this->setGoogleMapStaticMap($this->conferenceId);

        $view['conference'] = $conference;
        $view['message'] = Theme::partial('message', array(
            'data' => array(
                'type' => 'success',
                'text' => 'Submit paper for conference ' . $conference->code . ' ' . $conference->name . ' successful. Thank you for your submission.'
            )
        ));

        if (Session::get('success_submit_paper_type') == 'edit') {
            return Redirect::to($conference->frontEndViewUrl . '/submit_paper')->with('response_message', array(
                    'type' => 'success',
                    'text' => 'Updated paper successful.'
                )
            );
        }

        return $this->render('conference.success_submit_paper', $view);
    }

    protected function uploadFile($conferencePaperId, $keyName, $extendName)
    {
        if (Input::hasFile($keyName)) {
            $ext = Helpers\File::getFileExtension(\Input::file($keyName)->getClientOriginalName());

            $newFileName = 'conference_' . $this->conferenceId . '_' . $conferencePaperId . '_' . $extendName . '_' . time() . '.' . $ext;

            Input::file($keyName)->move($this->uploadFilePath, $newFileName);
            @chmod($this->uploadFilePath . DIRECTORY_SEPARATOR . $newFileName, 0755);

            $conferencePaperModel = new ConferencePaper();
            $conferencePaperModel->updateFile($conferencePaperId, $keyName, $newFileName);
        }
    }

    public function getListenerRegister($conference_slug)
    {
        return $this->getContent($conference_slug, 'listener_register_detail');
    }

    public function postConfirmListenerRegister()
    {
        if (!Input::has('confrim') && !Input::has('conference_id')) {
            App::abort(555, 'Invalid access.');
        }

        $inputData = Input::all();

        $conferenceRegisterModel = new ConferenceRegister();

        if ($conferenceRegisterModel->isRegistered($inputData['conference_id'], $this->loginUserId)) {
            App::abort(555, 'You\'re already registered this conference.');
        }


        $data = array(
            'conference_id' => (int)$inputData['conference_id'],
            'user_id' => $this->loginUserId,
            'type' => ConferenceRegister::TYPE_LISTENER
        );
        $conferenceRegisterModel->addConferenceRegister($data);

        $conferenceModel = new Conference();
        $conference = $conferenceModel->get($inputData['conference_id']);
        $conferenceModel->generateDatas($conference);


        return Redirect::to($conference->frontEndViewUrl . '/listener_register')->with('response_message', array(
                'type' => 'success',
                'text' => 'Registered conference as listener successful.'
            )
        );
    }

} 