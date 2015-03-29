$(function(){
    AdminMainLib.getNotifications();

    setInterval(function(){
        AdminMainLib.getNotifications();
    }, 5000)
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
        if (number < 1) {
            $('.notification_unreads').hide();
        } else {
            $('.notification_unreads').html(number).show();
        }
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
                    '<a href="' + items[i].view_url + '">',
                    '<span class="label label-danger"><i class="fa ' + items[i].icon + '"></i></span>&nbsp;',
                    items[i].message,
                    '<span class="small italic" style="display: block; text-align: right;">' + items[i].ago_time + '</span>',
                    '</a>',
                '</li>'
            ]. join('');

            notificationList.append(item);
        }
    }

};