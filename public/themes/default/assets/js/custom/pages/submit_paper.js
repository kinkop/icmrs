/**
 * Created by kinkop on 2/11/2557.
 */
$(function(){

    $('.conference_topic_parent').click(function(){
        $('input[name="conference_topic_id"]').prop('checked', false);

        var id = $(this).attr('data-id');

        $('.conference_topic_wrapper').slideUp();
        $('.conference_topic_parent_id_' + id).slideDown();
    });

});