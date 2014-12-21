<!-- footer bottom-->
<footer class="footer-bottom">
    <div class="container">
        <div class="row">

            <!-- Nav-->
            <div class="col-md-8">
                <div class="logo-footer">
                    <h2><span>ICMSR</span> <span class="logo-footer-description">2015</span></h2>
                </div>
                <!-- Menu-->
                 <?php
                                $confernceModel = new Conference();
                                $conference = $confernceModel->get(Config::get('misc.default_conference'));
                                $confernceModel->generateDatas($conference);

                                $conferenceUrl = $conference->frontEndViewUrl;
                            ?>
                <ul class="menu-footer">
                    <li><a href="{{ URL::to('')  }}">HOME</a></li>
                    <li><a href="{{ $conferenceUrl  }}">CONFERENCE</a></li>
                    <li><a href="{{ $conferenceUrl  }}/committees">COMMITEES</a></li>
                    <li><a href="{{ $conferenceUrl  }}/organization">ORGANIZATION</a></li>
                    <li><a href="{{ $conferenceUrl  }}/venue">VENUE</a></li>
                    <li><a href="{{ URL::to('contact')  }}">CONTACT</a></li>
                </ul>
                <!-- End Menu-->

                <!-- coopring-->
                <div class="row coopring">
                    <div class="col-md-8">
                        <p>&copy; 2014 SSRU CONFERENCE All Rights Reserved.</p>
                    </div>
                </div>
                <!-- End coopring-->

            </div>
            <!-- End Nav-->

            <!-- Social-->
            <div class="col-md-4">
                <!-- Menu-->
                <ul class="social">
                    <li data-toggle="tooltip" title data-original-title="Facebook">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li data-toggle="tooltip" title data-original-title="Twitter">
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li data-toggle="tooltip" title data-original-title="Youtube">
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
                <!-- End Menu-->
            </div>
            <!-- End Social-->

        </div>

    </div>
</footer>
<!-- End footer bottom-->