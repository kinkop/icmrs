<!DOCTYPE html>
<html lang="en">
<head>

    {{ Theme::partial('top_header') }}

    {{ Theme::asset()->container('header')->styles(); }}

    {{ Theme::asset()->container('header')->scripts(); }}


</head>
<body>

<!-- layout-->
<div id="layout">

{{ Theme::partial('header') }}


<!-- Title Section -->
<section class="title-section">
    <div class="container">
        <!-- crumbs -->
        <div class="row crumbs">
            <div class="col-md-12">
                <a href="index.html">Home</a> / Conference detail
            </div>
        </div>
        <!-- End crumbs -->

        <!-- Title - Search-->
        <div class="row title">
            <!-- Title -->
            <div class="col-md-9">
                <h1>
                     {{ Theme::getPageTitle() }}

                </h1>
                <h4 style="margin-left: -13px;">{{ Theme::getPageSubTitle() }}</h4>
            </div>
            <!-- End Title-->

            <!-- Search-->
            <div class="col-md-3">
                <form class="search" action="#" method="Post">
                    <div class="input-group">
                        <input class="form-control" placeholder="Search..." name="email"  type="email" required="required">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="subscribe" >Go!</button>
                                </span>
                    </div>
                </form>
            </div>
            <!-- End Search-->
        </div>
        <!-- End Title -Search -->

    </div>
</section>
<!-- End Title Section -->


<!-- Works -->
<section class="paddings">
<div class="container">
<div class="row">


<!-- Sidebars -->
<div class="col-md-3 sidebars">

    <aside>
        <h4>Conference Information</h4>
        <ul class="list">
        <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}">Conference Information</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/objectives">Conference Objectives</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/important_dates">Important Dates</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/call_for_papers">Call for Papers</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/key_notes">Key Note</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/committees">Committees</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/organization">Organization</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/conference_program">Conference Program</a></li>
            <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/conference_proceedings">Conference Proceedings</a></li>
        </ul>
    </aside>

     <aside>
            <h4>Conference Registration</h4>
            <ul class="list">
                <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/submit_paper" class="btn btn-primary btn-sm">Author Registration&nbsp;&nbsp;</a></li>
                <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/listener_register" class="btn btn-primary btn-sm">Listener Registration</a></li>
                <li><i class="fa fa-arrow-circle-o-right"></i><a href="{{ Theme::getCurrentConferenceUrl()  }}/fees">Registration Fees</a></li>
            </ul>
     </aside>

    <aside>
        <h4>Conference Venue</h4>
        <p>
            {{ Theme::getConferenceMap()  }}
        </p>
        <p>
            <a href="{{ Theme::getCurrentConferenceUrl()  }}/venue">More detail...</a>
        </p>
    </aside>

</div>
<!-- End Sidebars -->

<!-- Blog Post -->
<div class="col-md-9">

    {{ Theme::content() }}

</div>
<!-- End Blog Post -->





</div>
</div>
<!-- End Container-->
</section>
<!-- End Works-->


{{ Theme::partial('footer') }}

</div>
<!-- End layout-->

{{ Theme::partial('footer_scripts') }}

</body>
</html>