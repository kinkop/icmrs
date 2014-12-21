<div class="row register ">
    <form action="{{ URL::to('register/ajax') }}" method="post" id="registerForm">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                        {{ Theme::partial('error', array('hide' => true)) }}
                        {{ Theme::partial('success', array('hide' => true)) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Title *</label>
                    <select name="title" class="form-control" required>
                        <option value="">- Please select -</option>
                        @if ($user_titles)
                            @foreach($user_titles as $key => $val)
                                <option value="{{ $key  }}">{{ $val  }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label>First Name *</label>
                    <input placeholder="First Name" type="text" name="first_name" required>
                </div>
                <div class="col-md-4">
                    <label>Last Name *</label>
                    <input placeholder="Last Name" type="text" name="last_name" required>
                </div>
            </div>
            <div class="row padding_top_mini">
                <div class="col-md-4">
                    <label>Department *</label>
                    <input placeholder="Department" type="text" name="department" required>
                </div>
                <div class="col-md-4">
                    <label>Institution/University *</label>
                    <input placeholder="Institution/University" type="text" name="institution" required>
                </div>
                <div class="col-md-4">
                    <label>Country of Institution *</label>
                    <p>
                        <select class="form-control" name="country_id" required>
                            <option value=""> - Please select - </option>
                            @if ($countries)
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </p>

                </div>
            </div>
            <div class="row padding_top_mini">
                <div class="col-md-4">
                    <label>City of Institution *</label>
                    <input placeholder="City of Institution" type="text" name="city" required>
                </div>
                <div class="col-md-4">
                    <label>E-mail *</label>
                    <input placeholder="E-mail" type="email" name="email" required>
                </div>
                <div class="col-md-4">
                    <label>Confirm E-mail * </label>
                    <input placeholder="Confirm E-mail" type="email" name="confirm_email" required>
                </div>
            </div>
            <div class="row padding_top_mini">
                <div class="col-md-4">
                    <label>Password *</label>
                    <input placeholder="Password" type="password" name="password" required>
                </div>
                <div class="col-md-4">
                    <label>Confirm Password *</label>
                    <input placeholder="Confirm Password" type="password" name="confirm_password" required>
                </div>
                <div class="col-md-4">
                    <label>&nbsp;</label>
                    <p>
                        <input type="checkbox" name="accept" class="form-control" id="accept_term_condition" required value="1" style="width: auto; display: inline; padding: 0; margin: 0; height: auto;"> accept <a href="#term_and_condition_dialog" data-toggle="modal">terms and conditions *</a>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="text-align: right; vertical-align: center;">
            <img src="{{ Theme::asset()->url('img/ajax-loader-dark.gif') }}" class="ajax-loader" /><input type="submit" class="btn btn-primary change-loading-text" value="Register">
        </div>
    </form>

    <div class="modal fade" id="term_and_condition_dialog" tabindex="-1" role="popup" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p>&nbsp;</p>
                    <h4 style="text-align: center;">Terms and Conditions</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="modal-body">
                    <p>
                        Bla  Bla Bla Bla Bla Bla Bla Bla Bla Bla
                    </p>
                    <p>
                        Bla  Bla Bla Bla Bla Bla Bla Bla Bla Bla
                    </p>
                    <p>
                        Bla  Bla Bla Bla Bla Bla Bla Bla Bla Bla
                    </p>
                    <p>
                        Bla  Bla Bla Bla Bla Bla Bla Bla Bla Bla
                    </p>
                    <p style="text-align: center;">
                        <input type="checkbox" id="accept_term_condition_on_dialog" style="display: inline; margin: 0; padding: 0; width: auto; height: auto;"> accept terms and conditions
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
