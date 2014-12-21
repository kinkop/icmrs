/**
 * Created by Pakin on 9/22/14.
 */
$(function(){

   CustomLib.ajaxForm($('#registerForm'), 'json', 'Register', 'Registering...', false, function(formObj){
       //Check password length
       var passed = true;
       var messages = new Array();
       if ($('input[name="password"]', formObj).val().length < GlobalData.validate_rules.password.min_length) {
           messages.push('<p><i class="fa fa-times"></i> Password must be 6 characters or grater.</p>');
           passed = passed & false;
       }

       if ($('input[name="password"]', formObj).val() != $('input[name="confirm_password"]', formObj).val()) {
           messages.push('<p><i class="fa fa-times"></i> Password not match.</p>');
           passed = passed & false;
       }

       if ($('input[name="email"]', formObj).val() != $('input[name="confirm_email"]', formObj).val()) {
           messages.push('<p><i class="fa fa-times"></i> E-mail not match.</p>');
           passed = passed & false;
       }

       if (!passed) {
           $('.ajax-loader', formObj).hide();
           $('.alert.error', formObj).html(messages.join('')).fadeIn();
       } else {
           $('.alert.error', formObj).html('').fadeOut();
       }

       return passed;
   }, function(formObj, result){
       $('.alert.error', formObj).hide();
       $('.alert.success', formObj).hide();

       if (!result.status) {
           $('.alert.error', formObj).html(result.message).fadeIn();
       } else {
           $('.alert.success', formObj).html(result.message).fadeIn();

           setTimeout(function(){
                window.location = result.data.redirect_url;
           }, GlobalData.redirectTime);
       }

   }, function(formObj){

   });



    $('#accept_term_condition').click(function(){
        if ($('#accept_term_condition').is(':checked')) {
            $('#accept_term_condition_on_dialog').prop('checked', true);
        } else {
            $('#accept_term_condition_on_dialog').prop('checked', false);
        }
    });


    $('#accept_term_condition_on_dialog').click(function(){
        if ($('#accept_term_condition_on_dialog').is(':checked')) {
            $('#accept_term_condition').prop('checked', true);
        } else {
            $('#accept_term_condition').prop('checked', false);
        }
    });

});
