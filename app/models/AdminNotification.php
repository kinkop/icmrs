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
        $result = DB::table('admin_notifications as an')
                    ->select(DB::raw('
                        an.*,
                        cr.type as register_type
                    '))
                  ->join('conference_registers as cr', 'cr.id', '=', 'an.element_id')
                  ->orderBy('an.readed', 'ASC')
                  ->orderBy('an.created_at', 'DESC');

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

        $notification->ago_time = Services\MyDateTime::getAgo($notification->created_at);
        $notification->view_url = URL::to('admin/conference_register/detail/' . $notification->id);

        $notification->icon = '';
        switch ($notification->register_type) {
            case 'author':
                $notification->icon = 'fa-user';
                break;
            case 'listener':
                $notification->icon = 'fa-volume-up';
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
                        $message = '<strong>' . $conferenceRegister->title . ' ' . $conferenceRegister->first_name . ' ' . $conferenceRegister->last_name . '</strong>' . ' registered a conference "' . '<span style="color: #4BCAEF;"><strong>' . $conference->name . '</strong></span>' . '" as ' . $type;
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

    public function setReaded($type, $action, $elementId)
    {
        $notification = AdminNotification::where('type', $type)
                        ->where('action', $action)
                        ->where('element_id', $elementId)
                        ->first();

        if ($notification) {
            $notification->readed = 1;
            $notification->save();
        }

        return true;
    }

}