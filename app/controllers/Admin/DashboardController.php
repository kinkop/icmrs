<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 8/10/2557
 * Time: 21:39 น.
 */

namespace Controllers\Admin;


class DashboardController extends \Controllers\Admin\AdminController
{

    protected $layoutName = 'default';

    public function getIndex()
    {
        $this->setActiveMenu('home');

        $breadcrumbs = array();
        $this->setBreadcrumbsContent(array(), 'admin');
        return $this->render('dashboard.index');
    }

} 