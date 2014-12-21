$(function(){

    CustomLib.ajaxForm($('#userProfileForm'), 'json', 'save', 'saving...', false, function(formObj){

    }, function(){

    }, function(){

    },
    true,
    true);


    CustomLib.ajaxForm($('#changePasswordForm'), 'json', 'save', 'saving...', false, function(formObj){
            var passed = true;
            var messages = new Array();
            if ($('input[name="new_password"]', formObj).val().length < GlobalData.validate_rules.password.min_length) {
                messages.push('<p><i class="fa fa-times"></i> Password must be 6 characters or grater.</p>');
                passed = passed & false;
            }

            if ($('input[name="new_password"]', formObj).val() != $('input[name="confirm_new_password"]', formObj).val()) {
                messages.push('<p><i class="fa fa-times"></i> Password not match.</p>');
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

            if (result.status) {
                CustomLib.formReset(formObj);
            }


        }, function(){

        },
        true,
        true);

});