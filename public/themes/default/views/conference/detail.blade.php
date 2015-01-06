
<!-- Item Post -->
<article class="post">
    <!-- Image Post  -->
    <div class="post-image">
        <img src="{{ $conference->imageFullUrl }}" alt="">
    </div>
    <!-- End Image Post  -->

    <div class="clearfix"></div>

    <!-- Post Meta -->
    <div class="post-meta">
        <span><i class="fa fa-calendar"></i> Nov 10, 2012 </span>
        <a class="btn btn-primary btn-lg pull-right" id="register_conference_btn" href="#register_conference_box">REGISTTER THIS CONFERENCE</a>
        <!--<button class="btn btn-primary btn-lg pull-right"  data-toggle="modal" data-target="#registrationConferenceType">REGISTTER THIS CONFERENCE</button>-->

        <div class="modal fade" id="registrationConferenceType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body" style="text-align: center;">
                        <br />
                        <h4>Choose registration type</h4>
                        <br />
                        <br />
                        <br />
                        <a class="btn btn-primary" href="{{ $conference->frontEndViewUrl  }}/submit_paper">Author Registration</a> |  <a class="btn btn-primary" href="{{ $conference->frontEndViewUrl  }}/listener_register">Listener Registration</a>
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    <!-- End Post Meta -->

    <!-- Info post -->
    <div class="info-post">
        <h2><a href="blog-post.html">{{ $conference->code }} {{ $conference->name }}</a></h2>
        <div>
            {{ $conference->information  }}
        </div>
    </div>
    <!--End Info post -->

</article>
<!-- End Item Post -->


<div id="register_conference_box" style="display: none;">
     <h3 style="text-align: center;">Choose registration type</h3>
     <div style="text-align: center;">
         <a class="btn btn-primary" href="{{ $conference->frontEndViewUrl  }}/submit_paper">Author Registration</a> |  <a class="btn btn-primary" href="{{ $conference->frontEndViewUrl  }}/listener_register">Listener Registration</a>

     </div>
</div>
