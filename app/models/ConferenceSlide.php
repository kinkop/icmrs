<?php
/**
 * Created by PhpStorm.
 * User: Pakin
 * Date: 19/10/2557
 * Time: 13:55
 */

class ConferenceSlide extends BaseModel
{
    protected $url;

    function __construct()
    {
        parent::__construct();

        $this->url = Config::get('upload.slide_url');
    }

    public function addConferenceSlide($data)
    {
        $slide = new static();
        $slide->conference_id = $data['conference_id'];
        $slide->link = ResloveUrl::reslove($data['link']);
        $slide->file = $data['file'];
        $slide->sorting = $this->getLatestSorting() + 1;

        if (!$slide->save()) {
            $this->message->add('could_not_add_conference_slide', 'Could not add conference slide.');
            return false;
        }

        return $slide->id;
    }

    public function updateConferenceSlide($id, $data)
    {
        $conferenceSlide = $this->getConferenceObj($id);

        if (!$conferenceSlide) {
            return false;
        }

        $conferenceSlide->link = ResloveUrl::reslove($data['link']);

        $conferenceSlide->save();

        return $conferenceSlide->id;
    }

    public function getLatestSorting()
    {
        $data = static::orderBy('sorting', 'DESC')->first();

        if (!$data) {
            return 0;
        }

        return $data->sorting;
    }

    public function getConferenceObj($conferenceSlideId)
    {
        $conferenceSlide = static::find($conferenceSlideId);

        if (empty($conferenceSlide)) {
            $this->message->add('conference_slide_not_found', 'Conference slide not found.');
            return false;
        }

        return $conferenceSlide;
    }

    public function updateFile($conferenceSlideId, $fileName)
    {
        $conferenceSlide = $this->getConferenceObj($conferenceSlideId);

        if (!$conferenceSlide) {
            return false;
        }

        $conferenceSlide->file = $fileName;

        $conferenceSlide->save();

        return true;
    }

    public function getConferenceSlides($conferenceId)
    {
        $result = DB::table('conference_slides')
                  ->where('conference_id', $conferenceId)
                  ->orderBy('sorting', 'ASC');

        return $result->get();
    }

    public function generateDatas($datas)
    {
        if (!empty($datas)) {
            if (is_array($datas)) {
                foreach ($datas as $data) {
                    $this->generateData($data);
                }
            } else {
                $this->generateData($datas);
            }
        }
    }

    public function generateData($data)
    {
        $data->imageFullUrl = '';
        if (!empty($data->file)) {
            $data->imageFullUrl =  $this->url . '/' . $data->file . '?rand=' . microtime();
        }

        $data->editUrl = URL::to('admin/conferences/manage/' . $data->conference_id . '/content/conference_slides/edit/' . $data->id);
        $data->deleteUrl = URL::to('admin/conferences/' . $data->conference_id . '/slide/delete/' . $data->id);

    }

    public function deleteConferenceSlide($id)
    {
        DB::table('conference_slides')->where('id', $id)->delete();

        return true;
    }

} 