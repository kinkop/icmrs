<?php
/**
 * Created by PhpStorm.
 * User: pakin_000
 * Date: 2/17/2015
 * Time: 3:13 PM
 */

class AdminNotification extends BaseModel
{

    const NOTIFICATION_TYPE_CONFERENCE = 'conference';
    const NOTIFICATION_ACTION_REGISTER = 'register';

    public function addNotification($type, $action, $elementId, $message = '')
    {
        $adminNotification = new static();
        $adminNotification->type = $type;
        $adminNotification->action = $action;
        $adminNotification->element_id = $elementId;
        $adminNotification->message = $message;

        if (!$adminNotification->save()) {
            return false;
        }

        return $adminNotification->id;
    }

    public function getNotifications()
    {
        $result = DB::table('admin_notifications')
                  ->orderBy('readed', 'ASC')
                  ->orderBy('created_at', 'DESC');

        return $result->get();
    }

    public function generateNotification($notifications)
    {
        if (is_array($notifications)) {
            foreach ($notifications as $notification) {
                $this->_generateNotification($notification);
            }
        } else {
            $this->_generateNotification($notifications);
        }

        return $notifications;
    }

    protected function _generateNotification($notification)
    {
        $notification->generated_message = '';
        switch ($notification->type) {
            case static::NOTIFICATION_TYPE_CONFERENCE:
                $notification->generated_message = $this->getConferenceNotificationMessage($notification);
                break;
        }
    }

    protected function getConferenceNotificationMessage($notification)
    {
        $conferenceRegisterModel = new ConferenceRegister();
        $conferenceRegister = $conferenceRegisterModel->getById($notification->element_id, true);
        $message = '';
        if ($conferenceRegister) {
            $conference = Conference::find($conferenceRegister->conference_id);
            if ($conference) {
                switch ($notification->action) {
                    case static::NOTIFICATION_ACTION_REGISTER:
                        $type = '';
                        switch ($conferenceRegister->type) {
                            case ConferenceRegister::TYPE_AUTHOR:
                                $type = 'author';
                                break;
                            case ConferenceRegister::TYPE_LISTENER:
                                $type = 'listener';
                                break;
                        }
                        $message = $conferenceRegister->title . ' ' . $conferenceRegister->first_name . ' ' . $conferenceRegister->last_name . ' registered a conference "' . $conference->name . '" as ' . $type;
                        break;
                }
            }

        }

        return $message;
    }

    public function getUnreadNotification()
    {
        $result = DB::table('admin_notifications')
                    ->where('readed', 0);

        return $result->count();
    }

}