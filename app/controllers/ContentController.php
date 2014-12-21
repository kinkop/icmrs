<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 29/10/2557
 * Time: 20:00 น.
 */

class ContentController extends BaseController
{

    protected $layoutName = 'no_sidebar';

    function __construct()
    {
        parent::__construct();
    }

    public function getContent()
    {
        $content = $this->getData('contact');

        if ($content === false) {
            App::abort(404);
        }

        $view['content'] = $content->content;
        $this->setPageTitle($content->title);

        return $this->render('content.index', $view);
    }

    protected function getData($alias)
    {
        $contentModel = new Content();
        $content = $contentModel->getByAlias($alias);

        if (!$content) {
            return false;
        }

        return $content;
    }

} 