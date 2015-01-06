<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 30/10/2557
 * Time: 21:28 น.
 */

class ConferencePaper extends BaseModel
{

    const PAPER_TYPE_ABSTRACT = 'abstract';
    const PAPER_TYPE_REVIEW = 'review';
    const PAPER_TYPE_ORIGINAL_RESEARCH = 'original_research';
    const PAPER_TYPE_FULL = 'full';

    const PAPER_PRESENTATION_TYPE_ORAL = 'oral';
    const PAPER_PRESENTATION_TYPE_POSTER = 'poster';

    protected $uploadFileUrl = '';

    function __construct()
    {
        parent::__construct();

        $this->uploadFileUrl = Config::get('upload.file_url');
    }

    public function getPaperTypes($key = null)
    {
        $datas = array(
            static::PAPER_TYPE_ABSTRACT => 'Abstract',
            static::PAPER_TYPE_REVIEW => 'Review',
            static::PAPER_TYPE_ORIGINAL_RESEARCH => 'Original Research',
            static::PAPER_TYPE_FULL => 'Full Paper'
        );

        if (!empty($key) && isset($datas[$key])) {
            return $datas[$key];
        }

        return $datas;
    }

    public function getPresentationTypes($key = null)
    {
        $datas = array(
            static::PAPER_PRESENTATION_TYPE_ORAL => 'Oral',
            static::PAPER_PRESENTATION_TYPE_POSTER => 'Poster'
        );

        if (!empty($key) && isset($datas[$key])) {
            return $datas[$key];
        }

        return $datas;
    }

    public function addConferencePaper($data)
    {
        $conferencePaper = new static();
        $conferencePaper->conference_register_id = $data['conference_register_id'];
        $conferencePaper->code = microtime();
        $conferencePaper->title = $data['title'];
        $conferencePaper->paper_type = $data['paper_type'];
        $conferencePaper->presentation_type = $data['presentation_type'];
        $conferencePaper->authors = $data['authors'];
        $conferencePaper->abstract = $data['abstract'];
        $conferencePaper->keywords = $data['keywords'];
        $conferencePaper->refs = $data['refs'];
        $conferencePaper->note = $data['note'];
        $conferencePaper->conference_topic_id = $data['conference_topic_id'];

        $conferencePaper->save();

        $this->updateConferenceCode($conferencePaper->id);

        return $conferencePaper->id;
    }

    public function updateConferenceCode($id)
    {
        $result = DB::table('conference_papers as cp')
                    ->select(DB::raw(
                        'c.code as code,
                        cp.presentation_type as presentation_type,
                        cp.id as id'
                    ))
                    ->join('conference_registers as cr', 'cr.id', '=', 'cp.conference_register_id')
                    ->join('conferences as c', 'c.id', '=', 'cr.conference_id')
                    ->where('cp.id', $id);

        $data = $result->first();

        $code = str_replace(' ', '', $data->code) . '_' . strtoupper(substr($data->presentation_type, 0, 1)) . '_' . $data->id;

        $conferencePaper = static::find($id);
        $conferencePaper->code = $code;
        $conferencePaper->save();

        return $conferencePaper->code;
    }

    public function editConferencePaper($id, $data)
    {
        $conferencePaper = static::find($id);

        if (!$conferencePaper) {
            return false;
        }

        $conferencePaper->conference_register_id = $data['conference_register_id'];
        $conferencePaper->title = $data['title'];
        $conferencePaper->paper_type = $data['paper_type'];
        $conferencePaper->presentation_type = $data['presentation_type'];
        $conferencePaper->authors = $data['authors'];
        $conferencePaper->abstract = $data['abstract'];
        $conferencePaper->keywords = $data['keywords'];
        $conferencePaper->refs = $data['refs'];
        $conferencePaper->note = $data['note'];
        $conferencePaper->conference_topic_id = $data['conference_topic_id'];

        $conferencePaper->save();

        return $conferencePaper->id;
    }

    public function updateFile($id, $fileKey , $fileName)
    {
        $conferencePaper = static::find($id);

        if ($conferencePaper) {
            $conferencePaper->{$fileKey} = $fileName;
            $conferencePaper->save();
            return true;
        }

        return false;
    }

    public function getConferencePapers($userId)
    {
        $result = DB::table('conference_registers as cr')
            ->select(
                DB::raw(
                    'c.id as id,
                        c.code as code,
                        c.name as name,
                        c.url_slug as url_slug,
                        c.image_file as image_file,
                        c.location as location,
                        cd.venue_short_information as venue_short_information,
                        c.conference_date as conference_date,
                        cp.code as paper_code,
                        cp.title as paper_title,
                        cp.file1 as file1,
                        cp.file2 as file2,
                        cp.file3 as file3,
                        cp.paper_type as paper_type,
                        cp.presentation_type as presentation_type'
                )
            )
            ->join('conference_papers as cp', 'cp.conference_register_id', '=', 'cr.id')
            ->join('conferences as c', 'c.id', '=', 'cr.conference_id')
            ->join('conference_details as cd', 'cd.conference_id', '=', 'c.id')
            ->where('cr.user_id', $userId);

        return $result->get();
    }

    public function generateDatas($datas)
    {
        if ($datas) {
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
        $data->file1FullUrl = '';
        $data->file2FullUrl = '';
        $data->file3FullUrl = '';

        if (!empty($data->file1)) {
            $data->file1FullUrl = $this->uploadFileUrl . '/' . $data->file1;
        }

        if (!empty($data->file2)) {
            $data->file2FullUrl = $this->uploadFileUrl . '/' . $data->file2;
        }

        if (!empty($data->file3)) {
            $data->file3FullUrl = $this->uploadFileUrl . '/' . $data->file3;
        }

        $data->paper_type_text = $this->getPaperTypes($data->paper_type);
        $data->presentation_type_text = $this->getPresentationTypes($data->presentation_type);

    }

    public function getConferencePaperByConference($conferenceId, $userId)
    {
        $result = DB::table('conference_papers as cp')
                    ->select(
                        DB::raw('
                            cp.*
                        ')
                    )
                    ->join('conference_registers as cr', 'cr.id', '=', 'cp.conference_register_id')
                    ->where('cr.conference_id', $conferenceId)
                    ->where('cr.user_id', $userId);

        return $result->first();
    }

    public function sendSubmitPaperEmail($id)
    {
        $result = DB::table('conference_papers as cp')
            ->select(DB::raw(
                'c.code as code,
                        cp.presentation_type as presentation_type,
                        c.id as id,
                        c.name as name,
                        c.location as location,
                        c.image_file as image_file,
                        c.conference_date as conference_date,
                        c.url_slug as url_slug,
                        cr.user_id as user_id,
                        cp.code as paper_code,
                        cp.title as paper_title,
                        cp.paper_type as paper_type,
                        cp.presentation_type as presentation_type,
                        cp.authors as authors,
                        cp.abstract as abstract,
                        cp.keywords as keywords,
                        cp.refs as refs,
                        cp.note as note,
                        cp.file1 as file1,
                        cp.file2 as file2,
                        cp.file3 as file3,
                        cd.venue_short_information as venue_short_information
                        '
            ))
            ->join('conference_registers as cr', 'cr.id', '=', 'cp.conference_register_id')
            ->join('conferences as c', 'c.id', '=', 'cr.conference_id')
            ->join('conference_details as cd', 'cd.conference_id', '=', 'c.id')
            ->where('cp.id', $id);

        $data = $result->first();

        $conferenceModel = new Conference();
        $conferenceModel->generateDatas($data);
        $this->generateDatas($data);

        $userModel = new User();
        $user = $userModel->getUser($data->user_id, true);

        $mailData['email'] = $user->username;
        $mailData['name'] = $user->first_name . ' ' . $user->last_name;
        $mailData['data'] = $data;

        $_data = array();
        foreach ($data as $key => $val) {
            $_data[$key] = $val;
        }

        Mail::later(5, 'emails.conference.submit_paper', $_data, function($message)  use ($mailData)
        {
            $message->to( $mailData['email'], $mailData['name'])->subject('Paper submission for ' . $mailData['data']->code . ' ' . $mailData['data']->name);
        });
    }

} 