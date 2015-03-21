<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 27/1/2558
 * Time: 10:30
 */

namespace Controllers\Admin;


class ConferenceRegisterController extends \Controllers\Admin\AdminController
{
    protected $layoutName = 'default';

    public function getAuthor()
    {
        return $this->conferenceRegisterList(\ConferenceRegister::TYPE_AUTHOR);
    }

    public function getListener()
    {
        return $this->conferenceRegisterList(\ConferenceRegister::TYPE_LISTENER);
    }

    protected function conferenceRegisterList($conferenceRegisterType)
    {
        $view = array();
        $breadcrumbs = array(
            array(
                'name' => 'Conference Registers',
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');

        $view['register_type'] = $conferenceRegisterType;
        $view['conference_registers'] = $this->getConferenceRegisters($conferenceRegisterType);
        return $this->render('conference_register.index', $view);
    }

    protected function getConferenceRegisters($conferenceRegisterType)
    {
        $conferenceRegisterModel = new \ConferenceRegister();
        $conferenceRegisters = $conferenceRegisterModel->getConferenceRegisters($conferenceRegisterType);

        return $conferenceRegisters;
    }

    public function getDetail($conferenceRegisterId)
    {
        $view = array();

        $breadcrumbs = array(
            array(
                'name' => 'Conference Registers',
                'url' => ''
            )
        );

        $this->setBreadcrumbsContent($breadcrumbs, 'admin');
        return $this->render('conference_register.detail', $view);
    }
}