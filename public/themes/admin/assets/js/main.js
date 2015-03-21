$(function(){
    AdminMainLib.getNotifications();

    setInterval(function(){
        AdminMainLib.getNotifications();
    }, 10000)
});


var AdminMainLib = {

    getNotifications: function()
    {
        var me = this;
        $.ajax({
            url: GlobalVars.baseUrl + '/admin/notifications',
            type: 'get',
            dataType: 'json',
            success: function(result)
            {
                me.setNotitificationUnreads(result.data.unreads);
                me.generateNotificationList(result.data.items);
            }
        });
    },

    setNotitificationUnreads: function(number)
    {
        $('.notification_unreads').html(number);
    },

    generateNotificationList: function(items)
    {
        var notificationList = $('#notification-list');
        notificationList.empty();
        for (var i = 0; i < items.length; ++i) {
            var cls = '';
            if (items[i].readed == 0) {
                cls = 'unread';
            }
            var item = [
                '<li class="' + cls + '">',
                    '<a href="#">',
                    '<span class="label label-danger"><i class="fa fa-bolt"></i></span>',
                    'Server #3 overloaded.',
                    '<span class="small italic">34 mins</span>',
                    '</a>',
                '</li>'
            ]. join('');

            notificationList.append(item);
        }
    }

};