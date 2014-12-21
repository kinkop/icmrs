<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>SSRU CONFERENCE ADMINISTRATION</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ Theme::asset()->url('css/bootstrap.min.css')  }}" rel="stylesheet">
    <link href="{{ Theme::asset()->url('css/bootstrap-reset.css')  }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ Theme::asset()->url('assets/font-awesome/css/font-awesome.css')  }}" rel="stylesheet" />
    <link href="{{ Theme::asset()->url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')  }}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{ Theme::asset()->url('css/owl.carousel.css')  }}" type="text/css">

      <!--right slidebar-->
      <link href="{{ Theme::asset()->url('css/slidebars.css')  }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ Theme::asset()->url('css/style.css')  }}" rel="stylesheet">
    <link href="{{ Theme::asset()->url('css/style-responsive.css')  }}" rel="stylesheet" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ Theme::asset()->url('js/html5shiv.js')  }}"></script>
      <script src="{{ Theme::asset()->url('js/respond.min.js')  }}"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{ URL::to('admin')  }}" class="logo">SSRU <span>CONFERENCE</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->

                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <!--<input type="text" class="form-control search" placeholder="Search">-->
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ Theme::asset()->url('img/avatar-mini.jpg')  }}">
                            <span class="username">Admin</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="{{ URL::to('admin/logout')  }}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>

                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="<?php echo (Theme::getActiveMenu() == 'home') ? 'active' : ''; ?>" href="{{ URL::to('admin')  }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>


                   <li>
                        <a class="<?php echo (Theme::getActiveMenu() == 'conference') ? 'active' : ''; ?>" href="{{ URL::to('admin/conferences')  }}">
                            <i class="fa fa-globe"></i>
                            <span>Conferences</span>
                        </a>
                   </li>


                     <li>
                                               <a  class="<?php echo (Theme::getActiveMenu() == 'user') ? 'active' : ''; ?>" href="{{ URL::to('admin/contents')  }}">
                                                    <i class="fa fa-user"></i>
                                                    <span>Contents</span>
                                               </a>
                                       </li>


                    <li>
                            <a  class="<?php echo (Theme::getActiveMenu() == 'user') ? 'active' : ''; ?>" href="{{ URL::to('admin/user')  }}">
                                 <i class="fa fa-user"></i>
                                 <span>Users</span>
                            </a>
                    </li>



              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">



          <section class="wrapper" style="min-height: 800px;">


           <!--breadcrumbs start -->
           {{  Theme::getBreadcrumbsContent(); }}
           <!--breadcrumbs end -->


            {{ Theme::content()  }}

          </section>




      </section>
      <!--main content end-->

      <!-- Right Slidebar start -->
      <div class="sb-slidebar sb-right sb-style-overlay">
          <h5 class="side-title">Online Customers</h5>
          <ul class="quick-chat-list">
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="{{ Theme::asset()->url('img/chat-avatar2.jpg')  }}" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>John Doe</strong>
                          <small>Dream Land, AU</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-important">3</span>
                          </div>
                          <strong>Jonathan Smith</strong>
                          <small>United States</small>
                      </div>
                  </div><!-- media -->
              </li>

              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/pro-ac-1.png" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-success">5</span>
                          </div>
                          <strong>Jane Doe</strong>
                          <small>ABC, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/avatar1.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>Anjelina Joli</strong>
                          <small>Fockland, UK</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/mail-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-warning">7</span>
                          </div>
                          <strong>Mr Tasi</strong>
                          <small>Dream Land, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
          </ul>
          <h5 class="side-title"> pending Task</h5>
          <ul class="p-task tasks-bar">
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">40%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">40% Complete (success)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Database Update</div>
                          <div class="percent">60%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60% Complete (warning)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Iphone Development</div>
                          <div class="percent">87%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                              <span class="sr-only">87% Complete</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Mobile App</div>
                          <div class="percent">33%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">33% Complete (danger)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">45%</div>
                      </div>
                      <div class="progress progress-striped active">
                          <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                              <span class="sr-only">45% Complete</span>
                          </div>
                      </div>

                  </a>
              </li>
              <li class="external">
                  <a href="#">See All Tasks</a>
              </li>
          </ul>
      </div>
      <!-- Right Slidebar end -->

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 &copy; SSRU CONFERENCE
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ Theme::asset()->url('js/jquery.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/bootstrap.min.js')  }}"></script>
    <script class="include" type="text/javascript" src="{{ Theme::asset()->url('js/jquery.dcjqaccordion.2.7.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/jquery.scrollTo.min.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/jquery.nicescroll.js')  }}" type="text/javascript"></script>
    <script src="{{ Theme::asset()->url('js/jquery.sparkline.js')  }}" type="text/javascript"></script>
    <script src="{{ Theme::asset()->url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/owl.carousel.js')  }}" ></script>
    <script src="{{ Theme::asset()->url('js/jquery.customSelect.min.js')  }}" ></script>
    <script src="{{ Theme::asset()->url('js/respond.min.js')  }}" ></script>


    <script src="{{ Theme::asset()->url('assets/ckeditor/ckeditor.js')  }}"></script>
    <!--<script src="{{ Theme::asset()->url('js/form-component.js')  }}"></script>-->

    <!--right slidebar-->
    <script src="{{ Theme::asset()->url('js/slidebars.min.js')  }}"></script>

    <!--common script for all pages-->
    <script src="{{ Theme::asset()->url('js/common-scripts.js')  }}"></script>

    <!--script for this page-->
    <script src="{{ Theme::asset()->url('js/sparkline-chart.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/easy-pie-chart.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/count.js')  }}"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  {{ Theme::asset()->container('admin-lower-footer')->scripts(); }}

  </body>
</html>
