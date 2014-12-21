<?php /*
<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::get('title') }}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        {{ Theme::asset()->styles() }}
        {{ Theme::asset()->scripts() }}
    </head>
    <body>
        {{ Theme::partial('header') }}

        <div class="container">
            {{ Theme::content() }}
        </div>

        {{ Theme::partial('footer') }}

        {{ Theme::asset()->container('footer')->scripts() }}
    </body>
</html>*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>

    {{ Theme::partial('top_header') }}

</head>
<body>


<!-- layout-->
<div id="layout">



{{ Theme::partial('header') }}




{{ Theme::content();  }}

<section style="padding: 1px 0;"></section>


{{ Theme::partial('footer') }}

</div>
<!-- End layout-->

{{ Theme::partial('footer_scripts') }}

</body>
</html>