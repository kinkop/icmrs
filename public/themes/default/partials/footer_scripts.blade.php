<!-- ======================= JQuery libs =========================== -->
<!-- Always latest version of jQuery-->
<script src="{{ Theme::asset()->url('js/jquery.js') }}"></script>
<!-- jQuery local-->
<script>window.jQuery || document.write('<script src="{{ Theme::asset()->url('js/jquery.js') }}"><\/script>')</script>
<!--Nav-->
<script type="text/javascript" src="{{ Theme::asset()->url('js/nav/tinynav.js') }}"></script>
<script type="text/javascript" src="{{ Theme::asset()->url('js/nav/superfish.js') }}"></script>
<script type="text/javascript" src="{{ Theme::asset()->url('js/nav/hoverIntent.js') }}"></script>
<script src="{{ Theme::asset()->url('js/nav/jquery.sticky.js') }}" type="text/javascript"></script>
<!--Totop-->
<script type="text/javascript" src="{{ Theme::asset()->url('js/totop/jquery.ui.totop.js') }}" ></script>
<!--Slide-->
<script type="text/javascript" src="{{ Theme::asset()->url('js/slide/camera.js') }}" ></script>
<script type='text/javascript' src="{{ Theme::asset()->url('js/slide/jquery.easing.1.3.min.js') }}"></script>
<!--FlexSlider-->
<script src="{{ Theme::asset()->url('js/slide/jquery.easing.1.3.min.js') }}"></script>
<!--Ligbox-->
<script type="text/javascript" src="{{ Theme::asset()->url('js/fancybox/jquery.fancybox.js') }}"></script>
<!-- carousel.js-->
<script src="{{ Theme::asset()->url('js/carousel/carousel.js') }}"></script>
<!-- Twitter Feed-->
<script src="{{ Theme::asset()->url('js/twitter/jquery.tweet.js') }}"></script>
<!-- flickr Feed-->
<script src="{{ Theme::asset()->url('js/flickr/jflickrfeed.min.js') }}"></script>
<!--Scroll-->
<script src="{{ Theme::asset()->url('js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Nicescroll -->
<script src="{{ Theme::asset()->url('js/scrollbar/jquery.nicescroll.js') }}"></script>
<!-- Maps -->
<script src="{{ Theme::asset()->url('js/maps/gmap3.js') }}"></script>
<!-- Filter -->
<script src="{{ Theme::asset()->url('js/filters/jquery.isotope.js') }}" type="text/javascript"></script>
<!--Theme Options-->
<script type="text/javascript" src="{{ Theme::asset()->url('js/theme-options/theme-options.js') }}"></script>
<script type="text/javascript" src="{{ Theme::asset()->url('js/theme-options/jquery.cookies.js') }}"></script>
<!-- Bootstrap.js-->
<script type="text/javascript" src="{{ Theme::asset()->url('js/bootstrap/bootstrap.js') }}"></script>
<!--MAIN FUNCTIONS-->
<script type="text/javascript" src="{{ Theme::asset()->url('js/main.js') }}"></script>
<!-- ======================= End JQuery libs =========================== -->

{{ Theme::asset()->container('footer')->scripts(); }}
{{ Theme::asset()->container('lower-footer')->scripts(); }}