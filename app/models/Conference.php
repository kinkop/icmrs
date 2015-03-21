<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 8/10/2557
 * Time: 23:05 น.
 */

class Conference extends BaseModel {

    protected $uploadConferenceUrl;

    function __construct()
    {
        parent::__construct();
        $this->uploadConferenceUrl = \Config::get('upload.conference_url');
    }


    public function getAll()
    {
        $result = DB::table('conferences');

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

    protected  function generateData($data)
    {
        $data->viewUrl = $this->getAdminViewUrl($data->id);
        $data->imageFullUrl = '';
        if (!empty($data->image_file)) {
            $data->imageFullUrl = $this->uploadConferenceUrl . '/' . $data->image_file . '?rand=' . microtime();
        }

        $data->frontEndViewUrl = URL::to($data->url_slug);
    }

    public function getAdminViewUrl($conferenceId)
    {
        return URL::to('admin/conferences/manage/' . $conferenceId);
    }

    public function get($id)
    {
        $result = DB::table('conferences')
                  ->where('id', $id);

        return $result->first();
    }

    public function updateConference($id, $data)
    {
        $conference = static::find($id);

        if (!$conference) {
            $this->message->add('conference_not_found', 'Conference not found.');
            return false;
        }

        $conference->url_slug = $data['url_slug'];
        $conference->code = $data['code'];
        $conference->name = $data['name'];
        $conference->conference_date = $data['conference_date'];
        $conference->location = $data['location'];

        if (!$conference->save()) {
            $this->message->add('could_not_update_conference', 'Could not update Conference.');
            return false;
        }

        return true;
    }

    public function updateFileImage($conferenceId, $fileName)
    {
        $conference = static::find($conferenceId);

        if (!$conference) {
            $this->message->add('conference_not_found', 'Conference not found.');
            return false;
        }

        $conference->image_file = $fileName;
        $conference->save();

        return true;
    }

    public function getByUrlSlug($urlSlug, $includeDetail = false)
    {
        $conference = DB::table('conferences as c');

        if ($includeDetail) {
            $conference->join('conference_details as cd', 'cd.conference_id', '=', 'c.id');
        }

        $conference->where('c.url_slug', $urlSlug);

        return $conference->first();
    }

    public function getConferenceUrl($id)
    {
        $conference = static::find($id);

        if ($conference) {
            return URL::to($conference->url_slug);
        }

        return '';
    }


} 