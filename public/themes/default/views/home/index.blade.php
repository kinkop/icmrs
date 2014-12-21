
<!-- Slide -->
<section class="camera_wrap camera_white_skin main-slider" id="slide">

    @if ($conferenceSlides)
        @foreach ($conferenceSlides as $slide)
         <!-- Item Slide style_one no picture-->
            <div  data-src="{{ $slide->imageFullUrl }}">
                <div class="style_one">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item Slide style_one no picture-->
        @endforeach
    @endif



</section>
<!-- End Slide -->

<!-- box-action -->
<section class="box-action">
    <div class="container">
        <div class="title">
            <p class="lead"><span style="color: #ff3d7f;">{{ $conferenceData->code }}</span>  {{ $conferenceData->name  }}</p>
        </div>
        <div class="button" style="margin-top: 20px;">
            <a href="{{ $conferenceData->frontEndViewUrl  }}" style="font-size: 1.4em;">ENTER CONFERENCE</a>
            <span class="arrow_box_action"></span>
        </div>
    </div>
</section>
<!-- End box-action-->