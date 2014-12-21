        <div class="tabs user-dashboard">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Profile" data-toggle="tab">Profile</a></li>
                        <li class=""><a href="#AuthorRegister" data-toggle="tab">Author Register</a></li>
                        <li class=""><a href="#ListenerRegister" data-toggle="tab">Listener Register</a></li>
                        <li class=""><a href="#Papers" data-toggle="tab">Papers</a></li>
                        <li class=""><a href="#Messages" data-toggle="tab">Messages</a></li>
                        <li class=""><a href="#ChangePassword" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">


                        <div class="tab-pane active" id="Profile">
                            <div class="row register padding-top-mini">
                                <form action="{{ URL::to('profile/ajax/save')  }}" id="userProfileForm" method="post">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-12">

                                                {{ Theme::partial('error', array('hide' => true)) }}
                                                {{ Theme::partial('success', array('hide' => true)) }}

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Title</label>
                                                <select name="title" class="form-control" required>
                                                                        <option value="">- Please select -</option>
                                                                        @if ($user_titles)
                                                                            @foreach($user_titles as $key => $val)
                                                                                <option value="{{ $key  }}" <?php echo ($key == $user->title) ? 'selected="selected"' : ''; ?>>{{ $val  }}</option>
                                                                            @endforeach
                                                                        @endif
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>First Name</label>
                                                <input placeholder="First Name" type="text" name="first_name" value="{{ $user->first_name  }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Last Name</label>
                                                <input placeholder="Last Name" name="last_name" type="text" value="{{ $user->last_name  }}"  required>
                                            </div>
                                        </div>
                                        <div class="row padding_top_mini">
                                            <div class="col-md-4">
                                                <label>Department</label>
                                                <input placeholder="Department" name="department" type="text" value="{{ $user->department  }}"  required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Institution/University</label>
                                                <input placeholder="Institution/University" type="text" name="institution" value="{{ $user->institution  }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Country of Institution</label>
                                                <p>
                                                    <select name="country" class="form-control" required>
                                                        <option> - Country of Institution - </option>
                                                        @if ($countries)

                                                            @foreach ($countries as $country)

                                                                <option value="{{ $country->id  }}" <?php echo ($country->id == $user->country_id) ? 'selected="selected"' : ''; ?>>{{ $country->name  }}</option>

                                                            @endforeach

                                                        @endif
                                                    </select>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="row padding_top_mini">
                                            <div class="col-md-4">
                                                <label>City of Institution</label>
                                                <input placeholder="City of Institution" type="text" name="city" value="{{ $user->city  }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>E-mail
                                                <input placeholder="E-mail" type="email" name="email" value="{{ $user->username  }}" disabled required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12" style="text-align: right; vertical-align: center;">
                                         <img src="{{ Theme::asset()->url('img/ajax-loader-dark.gif') }}" class="ajax-loader" /> <input type="submit" class="btn btn-primary change-loading-text" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="tab-pane" id="AuthorRegister">


                        @if ($author_conferences)

                            @foreach($author_conferences as $conference)

                            <div class="accordion-trigger active"><img src="{{ $conference->imageFullUrl  }}" width="120"> {{ $conference->code  }} : {{ $conference->name  }}
                                                        <p class="pull-right" style="padding-right: 20px;">
                                                            <i class="fa fa-calendar"></i> {{$conference->conference_date  }} at {{ $conference->location  }}
                                                        </p>
                                                    </div>


                                                    <div class="accordion-container">
                                                                                <p><strong>Conference: {{$conference->code  }} :</strong> {{$conference->name  }}</p>
                                                                                <p><strong>Date :</strong> {{$conference->conference_date  }}</p>
                                                                                <p><strong>Location :</strong> {{$conference->location  }}</p>
                                                                                <p><strong>Venue :</strong> {{$conference->venue_short_information  }}</p>
                                                                                <p>
                                                                                    <button class="btn btn-primary btn-xs" onclick="location='{{ $conference->frontEndViewUrl  }}'">Conference Page</button>
                                                                                    <button class="btn btn-primary btn-xs" onclick="location='{{ $conference->frontEndViewUrl  }}/submit_paper'"> Submission</button>
                                                                                    <button class="btn btn-primary btn-xs">Conference Registration</button>
                                                                                    <button class="btn btn-primary btn-xs">Presentation Upload</button>
                                                                                    <button class="btn btn-primary btn-xs">Conference Flyer</button>
                                                                                    <button class="btn btn-primary btn-xs">Conference Program</button>
                                                                                    <button class="btn btn-primary btn-xs">Certificate</button>
                                                                                    <button class="btn btn-primary btn-xs">Name Tag </button>
                                                                                </p>

                                                                            </div>
                            @endforeach

                        @endif





                        </div>

                        <div class="tab-pane" id="ListenerRegister">



                        @if ($listener_conferences)

                            @foreach($listener_conferences as $conference)

                            <div class="accordion-trigger active"><img src="{{ $conference->imageFullUrl  }}" width="120"> {{ $conference->code  }} : {{ $conference->name  }}
                                                        <p class="pull-right" style="padding-right: 20px;">
                                                            <i class="fa fa-calendar"></i> {{$conference->conference_date  }} at {{ $conference->location  }}
                                                        </p>
                                                    </div>


                                                    <div class="accordion-container">
                                                                                <p><strong>Conference: {{$conference->code  }} :</strong> {{$conference->name  }}</p>
                                                                                <p><strong>Date :</strong> {{$conference->conference_date  }}</p>
                                                                                <p><strong>Location :</strong> {{$conference->location  }}</p>
                                                                                <p><strong>Venue :</strong> {{$conference->venue_short_information  }}</p>
                                                                                <p>
                                                                                    <button class="btn btn-primary btn-xs" onclick="location='{{ $conference->frontEndViewUrl  }}'">Conference Page</button>
                                                                                    <button class="btn btn-primary btn-xs" onclick="location='{{ $conference->frontEndViewUrl  }}/submit_paper'"> Submission</button>
                                                                                    <button class="btn btn-primary btn-xs">Conference Registration</button>
                                                                                    <button class="btn btn-primary btn-xs">Presentation Upload</button>
                                                                                    <button class="btn btn-primary btn-xs">Conference Flyer</button>
                                                                                    <button class="btn btn-primary btn-xs">Conference Program</button>
                                                                                    <button class="btn btn-primary btn-xs">Certificate</button>
                                                                                    <button class="btn btn-primary btn-xs">Name Tag </button>
                                                                                </p>

                                                                            </div>
                            @endforeach

                        @else
                            <p style="text-align: center; margin-top: 30px;">- No conference -</p>
                        @endif



                        </div>

                        <div class="tab-pane" id="Papers">

                            @if ($papers)

                                @foreach ($papers as $paper)


                            <div class="accordion-trigger"><i class="fa fa-book"></i><strong>{{ $paper->paper_code  }}</strong> : {{ $paper->paper_title  }}
                            </div>
                            <div class="accordion-container">
                                <p>
                                    <strong>Paper Code :</strong> {{ $paper->paper_code  }}
                                </p>
                                <p>
                                    <strong>Paper Title :</strong> {{ $paper->paper_title  }}
                                </p>
                                <p>
                                    <strong>Conference Link :</strong> <a href="{{ $paper->frontEndViewUrl  }}">{{ $paper->url_slug  }}</a>
                                </p>
                                <p>
                                    <strong>Invitation Letter :</strong> -<!--You can download your  <a href="#">invitation letter.</a>-->
                                </p>
                                <p>
                                    <strong>Files :</strong>
                                    @if (!empty($paper->file1FullUrl))
                                        <a href="{{ $paper->file1FullUrl  }}" target="_blank">File 1</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endif

                                    @if (!empty($paper->file2FullUrl))
                                        <a href="{{ $paper->file2FullUrl  }}" target="_blank">File 2</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endif

                                    @if (!empty($paper->file3FullUrl))
                                        <a href="{{ $paper->file3FullUrl  }}" target="_blank">File 3</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endif
                                </p>
                                <p>
                                    <strong>Paper Type :</strong> {{ $paper->paper_type_text  }}
                                </p>
                                <p>
                                    <strong>Paper Presentation :</strong> {{ $paper->presentation_type_text  }}
                                </p>
                                <p>
                                    <strong>Paper Publication :</strong> - <!--<a href="#">You have 1 review(s)</a>-->
                                </p>
                                <p>
                                    <strong>Review Process :</strong> - <!--<a href="#"> download review process</a>-->
                                </p>
                                <p>
                                    <strong>Paper Acceptance :</strong> - <!--our paper is accepted, you can download <a href="#">acceptance letter</a>-->
                                </p>
                                <p>
                                    <strong>Blind Pape :</strong> -
                                </p>

                                <p>
                                    <button class="btn btn-primary btn-xs" onclick="location='{{ $paper->frontEndViewUrl  }}/submit_paper'">Edit Paper Details</button>
                                    <!--<button class="btn btn-primary btn-xs">Upload Revised Paper</button>-->
                                </p>

                            </div>

                                @endforeach

                            @endif


                        </div>

                        <div class="tab-pane" id="Messages">

                            <div class="message-box-container">

                            <!--
                                <div class="message-item other">
                                    <div class="message-sender">
                                        <img src="img/05_operator.png">
                                        <br />
                                        Admin
                                        <br />
                                    </div>
                                    <div class="message-arrow">

                                    </div>
                                    <div class="message-detail">
                                        <p class="date">2014-07-05 09:49:00</p>
                                        <p>
                                            PARIS JULY 2014 As many delegates insert their USB devices into the laptop computer provided for presentation we can not avoid Cyber/Computer viruses. Therefore, TILL JULY 18 you are kindly advised to upload your conference presentations at: http://waset.org/apply/2014/07/paris/ICCISE?step=10 Your presentation will be availabe at the conference computer before your presentation. Presentations can be shared on the WASET webpage at: http://www.waset.org/presentations If you want to share your presentation on the WASET website; please choose visibility as: Yes, I want to share my presentation at waset.org
                                        </p>
                                    </div>
                                    <div style="clear: both;"></div>

                                </div>


                                <div class="message-item owner">



                                    <div class="message-sender">
                                        <img src="img/user.png">
                                        <br />
                                        You
                                        <br />
                                    </div>

                                    <div class="message-arrow">

                                    </div>

                                    <div class="message-detail">
                                        <p class="date">2014-07-05 09:49:00</p>
                                        <p>
                                            I confirm attending conference in paris ICCISE.
                                        </p>
                                    </div>


                                    <div style="clear: both;"></div>

                                </div>
                                -->

                            </div>
                            <form>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div>
                                                <label>Select Title: *</label><br />
                                                <select>
                                                    <option>- Please select title -</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label>Message *</label><br />
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div>
                                                <input type="submit" value=Send class="btn btn-primary btn-lg" style="margin-top:15px; width: 150px; height: 50px;" data-loading-text="Loading...">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane" id="ChangePassword">
                            <div class="row register padding-top-mini">
                                <form action="{{ URL::to('profile/ajax/change-password')  }}" method="post" id="changePasswordForm">
                                    <div class="col-md-12">
                                         <div class="row">

                                                                                    <div class="col-md-12">

                                                                                        {{ Theme::partial('error', array('hide' => true)) }}
                                                                                        {{ Theme::partial('success', array('hide' => true)) }}

                                                                                    </div>
                                                                                </div>

                                        <div class="row padding_top_mini">
                                            <div class="col-md-4">
                                                <label>Current Password</label>
                                                <input placeholder="Current Password" type="password" name="current_password" required>
                                            </div>
                                        </div>
                                        <div class="row padding_top_mini">
                                            <div class="col-md-4">
                                                <label>New Password</label>
                                                <input placeholder="New Password" type="password" name="new_password" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Confirm New Password</label>
                                                <input placeholder="Confirm New Password" type="password" name="confirm_new_password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: right; vertical-align: center;">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>