$(function(){

    CustomLib.ajaxForm($('#pageLoginForm'), 'json', 'Sign in', 'Siging in...', null,  function(formObj) {
        $('.mainLoginFormError').fadeOut();
        $('.mainLoginFormSuccess').fadeOut();
    }, function(formObj, result){
        CustomLib.formReset(formObj);

        $('.mainLoginFormError').fadeOut();
        $('.mainLoginFormSuccess').fadeOut();

        if (typeof result != 'object'){
            alert('Sigin in error!, please try again.');
        } else {
            if (!result.status) {
                $('.mainLoginFormError').html(result.message).fadeIn();
            } else {
                $('.mainLoginFormSuccess').html(result.message).fadeIn();
                $('input[name="username"]', formObj).val('');
                $('input[name="password"]', formObj).val('');

                setTimeout(function(){
                    window.location = result.data.redirect_url;
                }, GlobalData.redirectTime);

            }
        }

        MainLib.updateScroll();
    });

});