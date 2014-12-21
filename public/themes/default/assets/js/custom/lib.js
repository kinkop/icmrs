/**
 * Created by Pakin on 9/21/14.
 */

var CustomLib = {

    ajaxForm: function(formObj, dataType, normalText, loadingText, callbackObj, beforeSendCallback, successCallback, errorCallback, autoManageResponse, autoHideReponse)
    {
        formObj.ajaxForm({
            dataType: dataType,
            beforeSend: function()
            {
                $('.change-loading-text', formObj).val(loadingText);
                $('.ajax-loader', formObj).show();

                if (beforeSendCallback) {
                    if (!callbackObj) {
                        callbackObj = this;
                    }
                    return beforeSendCallback.apply(callbackObj, [formObj]);
                } else {
                    return true;
                }
            },
            success: function(result)
            {
                $('.change-loading-text', formObj).val(normalText);
                $('.ajax-loader', formObj).hide();

                if (autoManageResponse) {
                    if (typeof result == 'object') {
                        $('.alert.error', formObj).hide();
                        $('.alert.success', formObj).hide();

                        var alertBox = null;
                        if (result.status) {
                            alertBox = $('.alert.success', formObj);
                        } else {
                            alertBox = $('.alert.error', formObj)
                        }
                        alertBox.html(result.message).fadeIn();

                        if (autoHideReponse) {
                            setTimeout(function(){
                                    alertBox.fadeOut();
                            },
                            5000)
                        }
                    } else {
                        alert('Error while processing!');
                    }
                }

                if (successCallback) {
                    if (!callbackObj) {
                        callbackObj = this;
                    }
                    successCallback.apply(callbackObj, [formObj, result]);
                }


            },
            error: function()
            {
                $('.change-loading-text', formObj).val(normalText);
                $('.ajax-loader', formObj).hide();

                if (errorCallback) {
                    if (!callbackObj) {
                        callbackObj = this;
                    }
                    errorCallback.apply(callbackObj, [formObj]);
                }

            }
        });
    },

    formReset: function(form)
    {
        $('input[type="text"], input[type="password"], input[type="checkbox"], input[type="radio"], textarea, select', form).val('').prop('checked', false).prop('selected', false);
    }

}
