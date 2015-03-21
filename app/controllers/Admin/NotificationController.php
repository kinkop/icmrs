<?php
/**
 * Created by PhpStorm.
 * User: pakin_000
 * Date: 2/17/2015
 * Time: 3:46 PM
 */

namespace Controllers\Admin;


class NotificationController extends \Controllers\Admin\AdminController {

    public function getNotifications()
    {
        $datas = array();

        $adminNotificationModel = new \AdminNotification();
        $notifications = $adminNotificationModel->getNotifications();
        $adminNotificationModel->generateNotification($notifications);

        foreach ($notifications as $notification) {
            $datas[] = array(
                'id' => $notification->id,
                'message' => $notification->generated_message,
                'readed' => $notification->readed,
                'date' => $notification->created_at
            );
        }

        $unreads = $adminNotificationModel->getUnreadNotification();
        $allDatas = array(
            'unreads' => $unreads,
            'items' => $datas
        );

        return $this->json(true, 'ok', $allDatas);
    }

}