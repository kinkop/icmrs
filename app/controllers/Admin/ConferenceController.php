<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 8/10/2557
 * Time: 22:46 น.
 */

namespace Controllers\Admin;


class ConferenceController extends \Controllers\Admin\AdminController
{
    protected $layoutName = 'default';
    protected $conferenceSlideId;
    protected $conferenceId;
    protected $uploadSlidePath;
    protected $uploadConferencePath;
    protected $mode = 'add';

    function __construct()
    {
        parent::__construct();
        $this->uploadSlidePath = \Config::get('upload.slide_path');
        $this->uploadConferencePath = \Config::get('upload.conference_path');
        $this->setActiveMenu('conference');
    }

    public function getIndex()
    {
        $conferenceModel = new \Conference();

        $conferences = $conferenceModel->getAll();
        $conferenceModel->generateDatas($conferences);
        $view['conferences'] = $conferences;

        $breadcrumbs = array(
            array(
                'name' => 'Conferences',
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');


        return $this->render('conferences.index', $view);
    }

    public function getManage($id)
    {
        $view = array();

        $conferenceModel = new \Conference();
        $conferenceDetailModel = new \ConferenceDetail();
        $view['conference'] = $conferenceModel->get($id);
        $conferenceModel->generateDatas($view['conference']);

        $view['conferenceDetail'] = $conferenceDetailModel->getByConference($id)->toArray();

        if (!$view['conference']) {
            \App::abort(404);
        }

        $view['conference_url'] = $conferenceModel->getAdminViewUrl($id);

        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));

        $breadcrumbs = array(
            array(
                'name' => 'Conferences',
                'url' => \Url::to('admin/conferences')
            ),
            array(
                'name' =>  $view['conference']->code,
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');


        return $this->render('conferences.manage', $view);
    }

    public function postSave()
    {
        $inputData = \Input::all();

        $this->conferenceId = $inputData['conference_id'];

        $result = $this->doSave($inputData);
        $redirectUrl = 'admin/conferences/manage/' . $inputData['conference_id'];

        if (!$result) {

        }

        return \Redirect::to($redirectUrl)->with('response_message', array(
                'type' => 'success',
                'text' => 'Updated conference successful.'
            )
        );
    }

    protected function doSave($data)
    {
        $this->conferenceId = $data['conference_id'];

        $conferenceModel = new \Conference();
        $result = $conferenceModel->updateConference($data['conference_id'],
            array(
                'code' => $data['code'],
                'url_slug' => $data['url_slug'],
                'name' => $data['name'],
                'conference_date' => $data['conference_date'],
                'location' => $data['location']
            )
        );

        $conferenceDetailModel = new \ConferenceDetail();
        $conferenceDetailModel->updateByField( $this->conferenceId, 'information', $data['information']);

        if (\Input::hasFile('conference_image')) {
            $this->doUploadConferenceImage(\Input::file('conference_image'));
        }

        if (!$result) {
            $this->message = $conferenceModel->getMessage();
            return false;
        }

        return true;
    }

    protected function doUploadConferenceImage($file)
    {
        $ext = \Helpers\File::getFileExtension($file->getClientOriginalName());

        $fileName = 'conference_' . $this->conferenceId . '.' . $ext;
        $file->move($this->uploadConferencePath, $fileName);
        @chmod($this->uploadConferencePath .DIRECTORY_SEPARATOR . $fileName, 0755);

        $conferenceModel = new \Conference();
        $conferenceModel->updateFileImage($this->conferenceId, $fileName);

        return true;
    }

    public function getEditContent($id, $type)
    {
        $conferenceModel = new \Conference();
        $view['conference'] = $conferenceModel->get($id);

        if (!$view['conference']) {
            \App::abort(404);
        }

        $viewFile = 'content';
        $conferenceDetailModel = new \ConferenceDetail();

        $view['content'] = '';
        try {
            $view['content'] = $conferenceDetailModel->getByField($id, $type);
            switch ($type) {
                case 'venue_information':
                    $viewFile = 'venue';
                    \Theme::asset()->container('admin-lower-footer')->add('google-map-main-script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAuG34odmsgOai2Rc_BpjV5zwtp_WtTNTc');
                    \Theme::asset()->container('admin-lower-footer')->usePath()->add('venue-script', 'custom/js/venue.js');
                    break;
            }
        } catch (\Exception $e) {
            switch ($type) {
                case 'conference_slides':
                    $viewFile = 'slide';

                    $conferenceSlideModel = new \ConferenceSlide();
                    $view['slides'] = $conferenceSlideModel->getConferenceSlides($id);
                    $conferenceSlideModel->generateDatas( $view['slides']);
                    break;
            }
        }


        $conferenceDetailModel = new \ConferenceDetail();
        $view['conferenceDetail'] = $conferenceDetailModel->getByConference($id)->toArray();
        $view['page_name'] = ucwords(str_replace('_', ' ', $type));
        $view['conferenceDetailUrl'] = \URL::to('admin/conferences/manage/' . $id);
        $view['type'] = $type;
        $view['id'] = $id;
        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));

        $breadcrumbs = array(
            array(
                'name' => 'Conferences',
                'url' => \Url::to('admin/conferences')
            ),
            array(
                'name' =>  $view['conference']->code,
                'url' => \URL::to('admin/conferences/manage/' . $id)
            ),
            array(
                'name' =>  $view['page_name'],
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');


        return $this->render('conferences.' . $viewFile, $view);
    }

    public function postSaveContent($id, $type)
    {
        $inputData = \Input::all();

        $result = $this->doSaveContent($id, $type, $inputData);


        $redirectUrl = 'admin/conferences/manage/' . $id . '/content/' . $type;

        if (!$result) {

        }

        return \Redirect::to($redirectUrl)->with('response_message', array(
                'type' => 'success',
                'text' => 'Updated ' . str_replace('_', '', $type) . ' successful.'
            )
        );
    }

    public function doSaveContent($id, $type, $data)
    {
        $conferenceDetailModel = new \ConferenceDetail();

        $success = false;
        try {
            if ($conferenceDetailModel->updateByField($id, $type, $data['content'])) {
                $success = true;
            }
        } catch (\Exception $e) {

        }

        return $success;
    }

    public function getContentAdd($id, $type)
    {
        $view = array();
        $viewFile = '';
        switch ($type) {
            case 'conference_slides':
                $view['action_title'] = 'Add Slide';
                $viewFile = 'conference_slides_form';
                $view['conference_slide_id'] = '';
                $view['link'] = '';
                $view['imageFullUrl'] = '';


                break;
        }

        if (empty($viewFile)) {
            \App::abort(404);
        }

        $conferenceModel = new \Conference();
        $view['conference'] = $conferenceModel->get($id);
        $view['id'] = $id;
        $view['type'] = $type;
        $view['conferenceDetailUrl'] = \URL::to('admin/conferences/manage/' . $id . '/content/' . $type);


        $breadcrumbs = array(
            array(
                'name' => 'Conferences',
                'url' => \Url::to('admin/conferences')
            ),
            array(
                'name' =>  $view['conference']->code,
                'url' => \URL::to('admin/conferences/manage/' . $id)
            ),
            array(
                'name' =>  ucwords(str_replace('_', ' ', $type)),
                'url' => \URL::to('admin/conferences/manage/' . $id . '/content/' . $type)
            ),
            array(
                'name' => $view['action_title'],
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');

        return $this->render('conferences.' . $viewFile, $view);
    }

    public function postSaveSlide()
    {
        $inputData = \Input::all();
        $result = $this->doSaveSlide($inputData);

        if (!$result) {

        }

        $text = 'Added slide successful.';
        if ($this->mode == 'edit') {
            $text = 'Edited slide successful.';
        }

        return \Redirect::to('admin/conferences/manage/' . $this->conferenceId . '/content/conference_slides')->with('response_message', array(
                'type' => 'success',
                'text' => $text
            )
        );
    }

    protected function doSaveSlide($data)
    {
        $this->conferenceId = (int) $data['conference_id'];
        $conferenceSlideModel = new \ConferenceSlide();
        $this->conferenceSlideId = (int) $data['conference_slide_id'];

        $slideData = array(
            'conference_id' => $this->conferenceId,
            'link' => $data['link'],
            'file' => ''
        );

        if (empty($this->conferenceSlideId)) {
            $this->mode = 'add';
            $this->conferenceSlideId = $conferenceSlideModel->addConferenceSlide($slideData);
        } else {
            $this->mode = 'edit';
            $this->conferenceSlideId = $conferenceSlideModel->updateConferenceSlide($this->conferenceSlideId, $slideData);
        }



        if (!$this->conferenceSlideId) {
            $this->message = $conferenceSlideModel->getMessage();
            return false;
        }

        $result = $this->doUploadImage();

        if (!$result) {
            return false;
        }

        return true;
    }

    protected function doUploadImage()
    {
        if (\Input::hasFile('image')) {
            $ext = \Helpers\File::getFileExtension(\Input::file('image')->getClientOriginalName());
            $fileName = 'conference_' . $this->conferenceId . '_slide_' . $this->conferenceSlideId . '.' . $ext;

            $result = \Input::file('image')->move($this->uploadSlidePath, $fileName);
            @chmod($this->uploadSlidePath . DIRECTORY_SEPARATOR . $fileName, 0755);
            if(empty($result)) {
                $this->message->add('could_not_upload_image', 'Could not upload image.');
                return false;
            }

            $conferenceSlideModel = new \ConferenceSlide();
            $conferenceSlideModel->updateFile($this->conferenceSlideId, $fileName);

        }

        return true;
    }

    public function getContentEdit($id, $type, $content_id)
    {
        $view = array();
        $viewFile = '';
        switch ($type) {
            case 'conference_slides':
                $view['action_title'] = 'Edit Slide (#' . $content_id . ')';
                $viewFile = 'conference_slides_form';

                $conferenceSlideModel = new \ConferenceSlide();
                $data = $conferenceSlideModel->getConferenceObj($content_id);

                if (!$data) {
                    \App::abort(404, 'Conference slide not found.');
                }

                $conferenceSlideModel->generateData($data);

                $view['conference_slide_id'] = $data->id;
                $view['link'] = $data->link;
                $view['imageFullUrl'] = $data->imageFullUrl;
                break;
        }

        if (empty($viewFile)) {
            \App::abort(404);
        }

        $conferenceModel = new \Conference();
        $view['conference'] = $conferenceModel->get($id);
        $view['id'] = $id;
        $view['type'] = $type;
        $view['conferenceDetailUrl'] = \URL::to('admin/conferences/manage/' . $id . '/content/' . $type);


        $breadcrumbs = array(
            array(
                'name' => 'Conferences',
                'url' => \Url::to('admin/conferences')
            ),
            array(
                'name' =>  $view['conference']->code,
                'url' => \URL::to('admin/conferences/manage/' . $id)
            ),
            array(
                'name' =>  ucwords(str_replace('_', ' ', $type)),
                'url' => \URL::to('admin/conferences/manage/' . $id . '/content/' . $type)
            ),
            array(
                'name' => $view['action_title'],
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');

        return $this->render('conferences.' . $viewFile, $view);
    }

    public function getDeleteSlide($conferenceId, $id)
    {
        $conferenceSlideModel = new \ConferenceSlide();

        $conferenceSlide = $conferenceSlideModel->getConferenceObj($id);

        if (!$conferenceSlide) {
            \App::abort(404, 'Conference slide not found.');
        }

        @unlink($this->uploadSlidePath . DIRECTORY_SEPARATOR . $conferenceSlide->file);

        $conferenceSlideModel->deleteConferenceSlide($id);

        return \Redirect::to('admin/conferences/manage/' .$conferenceId . '/content/conference_slides')->with('response_message', array(
                'type' => 'success',
                'text' => 'Deleted successful.'
            )
        );

    }

    public function postSaveVenue($id, $type)
    {
        $inputData = \Input::all();

        $this->conferenceId = $id;
        $result = $this->doSaveVenue($inputData);

        if (!$result) {

        }

        $redirectUrl = 'admin/conferences/manage/' . $id . '/content/' . $type;

        return \Redirect::to($redirectUrl)->with('response_message', array(
                'type' => 'success',
                'text' => 'Updated ' . str_replace('_', '', $type) . ' successful.'
            )
        );
    }


    protected function doSaveVenue($data)
    {
        $conferenceDetailModel = new \ConferenceDetail();

        $conferenceDetailModel->updateByField($this->conferenceId, 'venue_short_information', $data['venue_short_information']);
        $conferenceDetailModel->updateByField($this->conferenceId, 'venue_information', $data['venue_information']);
        $conferenceDetailModel->updateByField($this->conferenceId, 'venue_lat', $data['lat']);
        $conferenceDetailModel->updateByField($this->conferenceId, 'venue_lng', $data['lng']);


        return true;
    }

} 