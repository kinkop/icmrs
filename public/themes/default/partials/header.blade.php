<!-- Login Client -->
<div class="jBar">
    <div class="container">
        <div class="row">

            <div class="col-md-10">
                <div class="row">
                    <!-- Item service-->
                    <div class="col-md-6">

                        @if (Theme::getIsLogin())

                            <?php
                                $userDetail = Theme::getLoginUserDetail();
                            ?>
                            <h5 style="color: #ffffff;">Welcome, {{ $userDetail['first_name'] }} {{ $userDetail['last_name'] }}</h5>
                            <p><a href="{{ URL::to('logout') }}" class="btn btn-primary">Logout</a></p>


                        @else

                        <h5>Sign in</h5>

                        <form method="post" action="{{ URL::to('login/ajax/authen') }}" id="mainLoginForm">
                            {{ Theme::partial('error', array('hide' => true, 'class' => 'mainLoginFormError')) }}
                            {{ Theme::partial('success', array('hide' => true, 'class' => 'mainLoginFormSuccess')) }}
                            <input type="email" placeholder="E-mail" name="username" required>
                            <input type="password" placeholder="Password" name="password" required>
                            <br />
                            <input type="checkbox" name="remember" value="1" style="width: auto; height: auto;"> Remember
                            <br /><br />
                            <input type="submit" class="btn btn-primary change-loading-text" value="Sign in">
                            <span>Or</span>
                            <a class="btn btn-info" href="{{ URL::to('register') }}">Register</a>
                            <span>&nbsp;</span>
                            <a href="#">Forgot password</a>
                        </form>

                        @endif
                    </div>
                    <!-- End Item service-->

                    <!-- Item service-->
                    <div class="col-md-4">

                    </div>
                    <!-- End Item service-->

                </div>
            </div>

            <div class="col-md-2">

            </div>


            <span class="jTrigger downarrow"><i class="fa fa-minus"></i></span>
        </div>
    </div>
</div>
<span class="jRibbon jTrigger up" title="Login"><i class="fa fa-plus"></i></span>
<div class="line"></div>
<!-- End Login Client -->

<!-- Info Head -->
<section class="info-head">
    <div class="container">
        <ul>
            @if (Theme::getIsLogin())
                <?php
                $userDetail = Theme::getLoginUserDetail();
                ?>
                <li><a href="{{ URL::to('profile')  }}"><i class="fa fa-user"></i> {{ $userDetail['first_name'] }} {{ $userDetail['last_name'] }}</a></li>
                <li><a href="{{ URL::to('logout') }}"><i class="fa fa-unlock"></i> Logout</a></li>
            @else
                <li><a href="#" class=" jTrigger up"><i class="fa fa-lock"></i> Sign in</a></li>
                <li><a href="{{ URL::to('register') }}"><i class="fa fa-user"></i> Register</a></li>
            @endif
        </ul>
    </div>
</section>
<!-- Info Head -->

<!-- Header-->
<header class="animated fadeInDown delay1">
    <div class="container">
        <div class="row" style="padding-bottom: 10px;">

            <!-- Logo-->
            <div class="col-md-3 logo">
                <a href="{{ URL::to('') }}" title="Return Home">
                    <img src="{{ Theme::asset()->url('css/skins/pink/logo.png') }}" alt="Logo" class="logo_img">
                </a>
                <p class="logo-title">
                    International Conference on Multidisciplinary Studies and Research
                </p>
            </div>
            <!-- End Logo-->


            <?php
                $confernceModel = new Conference();
                $conference = $confernceModel->get(Config::get('misc.default_conference'));
                $confernceModel->generateDatas($conference);

                $conferenceUrl = $conference->frontEndViewUrl;
            ?>

            <!-- Nav-->
            <nav class="col-md-9">
                <!-- Menu-->
                <ul id="menu" class="sf-menu">
                    <li><a href="{{ URL::to('') }}">HOME</a></li>
                    @if (Theme::getIsLogin())
                    <li>
                        <?php
                        $userDetail = Theme::getLoginUserDetail();
                        ?>
                        <a href="{{ URL::to('profile')  }}">{{ $userDetail['first_name'] }} <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="{{ URL::to('profile') }}">Profile</a></li>
                            <li><a href="{{ URL::to('profile') }}">Author Register</a></li>
                            <li><a href="{{ URL::to('profile') }}">Listener Register</a></li>
                            <li><a href="{{ URL::to('profile') }}">Papers</a></li>
                            <li><a href="{{ URL::to('profile') }}">Message</a></li>
                            <li><a href="{{ URL::to('profile') }}">Change Password</a></li>
                            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                    @endif
                    <li><a href="{{ $conferenceUrl }}">CONFERENCE</a></li>
                    <li><a href="{{ $conferenceUrl  }}/committees">COMMITEES</a></li>
                    <li><a href="{{ $conferenceUrl  }}/organization">ORGANIZATION</a></li>
                    <li><a href="{{ $conferenceUrl  }}/venue">VENUE</a></li>
                    <li><a href="{{ URL::to('contact') }}">CONTACT</a></li>
                </ul>
                <!-- End Menu-->
            </nav>
            <!-- End Nav-->

        </div><!-- End Row-->
    </div><!-- End Container-->
</header>
<!-- End Header-->
