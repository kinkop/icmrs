<!DOCTYPE html>
<html lang="en">
<head>

    {{ Theme::partial('top_header') }}

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
                <h4 style="margin-left: -13px;"> {{ Theme::getPageSubTitle() }}</h4>
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


<!-- Blog Post -->
<div class="col-md-12">

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