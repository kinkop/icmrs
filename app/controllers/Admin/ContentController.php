<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 28/10/2557
 * Time: 13:26 น.
 */

namespace Controllers\Admin;


class ContentController extends \Controllers\Admin\AdminController
{

    public function getIndex()
    {
        $view = array();
        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));

        return $this->render('content.index', $view);
    }

    public function getEdit($alias)
    {
        $contentModel = new \Content();

        $content = $contentModel->getByAlias($alias);

        if (!$content) {
            \App::abort(404, 'Content not found.');
        }

        $content = $content;
        $view['content'] = $content->content;
        $view['response_message'] = \Theme::partial('message', array('data' => \Session::get('response_message')));
        $view['title'] = ucwords(str_replace('_', ' ', $alias));
        $view['alias'] = $alias;

        return $this->render('content.form', $view);
    }

    public function postSave()
    {
        $inputData = \Input::all();

        $result = $this->doSave($inputData);

        if (!$result) {

        }

        return \Redirect::to('admin/contents')->with('response_message', array(
                'type' => 'success',
                'text' => 'Updated content successful.'
            )
        );
    }

    protected function doSave($data)
    {
        $contentModel = new \Content();

        $content = $contentModel->getByAlias($data['alias']);

        if (!$content) {
            \App::abort(404, 'Content not found.');
        }

        $contentModel->updateByAlias($data['alias'], $data['content']);

        return true;
    }

} 