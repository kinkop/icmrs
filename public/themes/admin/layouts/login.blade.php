<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="{{ Theme::asset()->url('img/favicon.png') }}">

    <title>SSRU CONFERENCE ADMINISTRATION</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ Theme::asset()->url('css/bootstrap.min.css')  }}" rel="stylesheet">
    <link href="{{ Theme::asset()->url('css/bootstrap-reset.css')  }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ Theme::asset()->url('assets/font-awesome/css/font-awesome.css')  }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ Theme::asset()->url('css/style.css')  }}" rel="stylesheet">
    <link href="{{ Theme::asset()->url('css/style-responsive.css')  }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ Theme::asset()->url('js/html5shiv.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/respond.min.js')  }}"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

        {{ Theme::content()  }}

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ Theme::asset()->url('js/jquery.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/bootstrap.min.js')  }}"></script>


  </body>
</html>
