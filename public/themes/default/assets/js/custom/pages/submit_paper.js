/**
 * Created by kinkop on 2/11/2557.
 */
var peopleDatas = [];

$(function(){

    $('.conference_topic_parent').click(function(){
        $('input[name="conference_topic_id"]').prop('checked', false);

        var id = $(this).attr('data-id');

        $('.conference_topic_wrapper').slideUp();
        $('.conference_topic_parent_id_' + id).slideDown();
    });


    $('#invite_box_btn').fancybox({
        maxWidth	: 800,
        maxHeight	: 600,
        fitToView	: false,
        width		: '800px',
        height		: '400px',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });

    $('#submit_paper_btn').click(function(){
        var saveMode = $('#save_mode').val().trim();

        var submitPaperError = $('.submitPaperError');
        if (saveMode == 'add') {
            if (validateSubmitPaperForm()) {
                $('#invite_box_btn').trigger('click');
                submitPaperError.hide();
            } else {
                var message = '<p>Could not submitting paper, Please see errors above.</p>';
                submitPaperError.html(message).show();
            }

        } else {
            $('#submitPaperForm').submit();
        }
    });

    function validateSubmitPaperForm()
    {
        var validatePassed = true;

        var form = $('#submitPaperForm');
        //Title
        var title = $('input[name="title"]', form);
        if (title.val().trim() == '') {
            validatePassed = validatePassed && false;
            showValidateError('title', title, false);
        } else {
            showValidateError('title', title, true);
        }

        //Conference topic
        var conferenceTopicId = $('input[name="conference_topic_id"]:checked', form);
        if (!conferenceTopicId.val()) {
            validatePassed = validatePassed && false;
            showValidateError('conference_topic_id', null, false);
        } else {
            showValidateError('conference_topic_id', null, true);
        }

        //Presentation type
        var presentationType = $('input[name="presentation_type"]:checked', form);
        if (!presentationType.val()) {
            validatePassed = validatePassed && false;
            showValidateError('presentation_type', null, false);
        } else {
            showValidateError('presentation_type', null, true);
        }

        //Authors
        var authors = $('textarea[name="authors"]');
        if (authors.val().trim() == '') {
            validatePassed = validatePassed && false;
            showValidateError('authors', authors, false);
        } else {
            showValidateError('authors', authors, true);
        }


        return validatePassed;
    }

    function showValidateError(className, input, validatePassed)
    {
        var selector = $('.' + className + '.required_field');

        if (!validatePassed) {
            selector.show();
            if (input) {
                input.addClass('error-input');
            }
        } else {
            selector.hide();
            if (input) {
                input.removeClass('error-input');
            }
        }
    }

    $(document).on('click', '.add_another_people_btn', function(){
        var container = $('#add_people_container');

        var childs = $('tbody tr', container).length;
        $('tbody tr .remove-people-container', container).html('<a class="btn btn-danger remove_people_btn">Remove</a>');

        var html = [
            '<tr style="display: none;">',
            '<td class="number">' + (childs + 1) + '.</td>',
            '<td>',
            '<input type="text" class="form-control" name="first_name">',
            '</td>',
            '<td>',
            '<input type="text" class="form-control" name="last_name">',
            '</td>',
            '<td>',
            '<input type="text" class="form-control" name="email">',
            '</td>',
            '<td style="text-align: right;" class="remove-people-container">',
            '<a class="btn btn-info add_another_people_btn">Add another</a>',
            '</td>',
            '</tr>'
        ] . join('');

        html = $(html);
        $('tbody', container).append(html);
        html.show();
    })

    $(document).on('click', '.remove_people_btn', function(){
        var container = $(this).closest('tr');
        var changed = false;

        $('input', container).each(function(){
            if ($(this).val().trim() != '') {
                changed = (changed | true);
            }
        });

        if (changed) {
            if (confirm('You have edited, You want to remove?')) {
                removePeople(container);
            }
        } else {
            removePeople(container);
        }
    });

    function removePeople(row)
    {
        row.remove();

        var container = $('#add_people_container');
        var i = 1;
        $('tbody tr .number', container).each(function(){
            console.log(this);
            $(this).html(i + '.');
            ++i;
        });
    }


    $(document).on('click', '#save_add_people_btn', function() {
        peopleDatas = [];
        var container = $('#add_people_container');
        var invalidEmail = false;
        var allFieldRequired = false;

        $('tbody tr', container).each(function(){
            var row = $(this);
            var firstName = $('input[name="first_name"]', row);
            var lastName = $('input[name="last_name"]', row);
            var email = $('input[name="email"]', row);

            peopleDatas.push({
                'first_name': firstName.val(),
                'last_name': lastName.val(),
                'email': email.val()
            });


            if (email.val().trim() == '' || !CustomLib.validateEmail(email.val())) {
                if (email.val().trim() == '') {
                    allFieldRequired = allFieldRequired || true;
                } else {
                    allFieldRequired = allFieldRequired || false;
                }

                if (!CustomLib.validateEmail(email.val())) {
                    invalidEmail = invalidEmail || true;
                } else {
                    invalidEmail = invalidEmail || false;
                }

                email.addClass('error-input');
            } else {
                email.removeClass('error-input');
            }

            if (firstName.val().trim() == '') {
                allFieldRequired = allFieldRequired || true;
                firstName.addClass('error-input');
            } else {
                allFieldRequired = allFieldRequired || false;
                firstName.removeClass('error-input');
            }

            if (lastName.val().trim() == '') {
                allFieldRequired = allFieldRequired || true;
                lastName.addClass('error-input');
            } else {
                allFieldRequired = allFieldRequired || false;
                lastName.removeClass('error-input');
            }

            if (invalidEmail || allFieldRequired) {
                var message = '';
                if (allFieldRequired) {
                    message += '<p>- All field are reuired.</p>'
                }

                if (invalidEmail) {
                    message += '<p>- Invalid email address.</p>'
                }

                $('.addPeopleError').html(message).show();
            } else {
                $('.addPeopleError').html('').hide();
            }
        });

        if (invalidEmail == false && allFieldRequired == false) {
            if (isDuplicateEmail()) {
                var message = '<p>- Duplicate email address.</p>';
                $('.addPeopleError').html(message).show();
            } else {
                $('.addPeopleError').html('').hide();
                submitSubmitPaPerForm();
            }
        }
    });

    $(document).on('click', '#skip_add_people_btn', function() {
        var container = $('#add_people_container');

        var changed = false;
        $('tbody tr', container).each(function(){
            var row = $(this);
            $('input', row).each(function(){
                if ($(this).val().trim() != '') {
                    changed = changed || true;
                } else {
                    changed = changed || false;
                }
            });
        });

        $('.add_people_input').remove();

        if (changed) {
            if (confirm('You have edited, You want to remove?')) {
                $('#submitPaperForm').submit();
            }
        } else {
            $('#submitPaperForm').submit();
        }
    });

    function isDuplicateEmail()
    {
        if (peopleDatas.length < 1) {
            return false;
        }

        var emailCount = {};
        for (var i = 0; i < peopleDatas.length; ++i) {
            if (!emailCount[peopleDatas[i].email]) {
                emailCount[peopleDatas[i].email] = 0;
            }

            ++emailCount[peopleDatas[i].email];
        }

        for (var i in emailCount) {
            if (emailCount[i] >= 2) {
                return true;
            }
        }

        return false;
    }

    function submitSubmitPaPerForm()
    {
        var submitPaperForm = $('#submitPaperForm');
        $('.add_people_input').remove();

        var num = 0;
        for (var i in peopleDatas) {
            submitPaperForm.append('<input type="hidden" name="people_first_name[' + num + ']" value="' + peopleDatas[i].first_name + '" class="add_people_input" />');
            submitPaperForm.append('<input type="hidden" name="people_last_name[' + num + ']" value="' + peopleDatas[i].last_name + '" class="add_people_input" />');
            submitPaperForm.append('<input type="hidden" name="people_email[' + num + ']" value="' + peopleDatas[i].email + '" class="add_people_input" />');
            ++num;
        }

        $('#submitPaperForm').submit();
    }
});