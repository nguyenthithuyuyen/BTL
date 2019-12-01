<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>My Home</title>
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/style.css">
  </head>

  <style type="text/css">
    .clr{
      clear: both;
    }

   .content_fan { 
  max-height: 0;
  overflow: hidden;
  }
  </style>

  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
         <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            
                <ul class="dropdown-menu">
                  <li class="arrow_box">
                    <form>
                      <div class="input-group search-box">
                        <div class="position-relative has-icon-right full-width">
                          <input class="form-control" id="search" type="text" placeholder="Search here...">
                          <div class="form-control-position navbar-search-close"><i class="ft-x">   </i></div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
           
            <ul class="nav navbar-nav float-right">
              
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="theme-assets\images\icons\host.jpg" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="theme-assets\images\icons\host.jpg" alt="avatar"><span class="user-name text-bold-700 ml-1">Uyen Nguyen</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="home.html"><img class="brand-logo" alt="Chameleon admin logo" src="theme-assets/images/logo/logo1.png"/>
              <h3 class="brand-text">NGUYEN UYEN</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="home.html"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Living Room</span></a></li>
          <li class="active"><a href="#"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Dining-room</span></a></li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
          <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Dining-room</h3>
          </div>
        </div>
      

          <!-- Pie charts section start -->
          <section id="chartjs-pie-charts">
            <div class="row">
              <!--begin Equiment-->
              <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Light</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          </ul>
                      </div>
                    </div>
                    <div class="card-content collapse show" style="background-color: white;">
                        <div class="card-body">
                            <div class="height-400">
                              <div>
                                <img src="theme-assets/images/icons/lightoff.png" id ="light" alter="light" width="80%" onclick="changimglight()" />
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <!--end equiment-->
            </div>    
          </section>
          <!-- // Pie charts section end -->
          </div>
      </div>

      <!-- ////////////////////////////////////////////////////////////////////////////-->


      <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div >Bai tap lon hoc phan k18 CDCNTT18D</div>
      </footer>
      <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
      <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
      <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
</body>
</html>
<script>

  var coll = document.getElementsByClassName("collapsible");
      var i;
      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.maxHeight){
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          } 
        });
      }


    var images = [
        "theme-assets/images/icons/fanoff.gif",
        "theme-assets/images/icons/fanon.gif"
    ];
    var num=0;
    function changeimg() {
        var img = document.getElementById("fan");
        num++;
        if(num >= images.length)
        {
          num = 0;
        }
          img.src = images[num];
          console.log(num);
    }

    function changeimg1(num) {
      var images = ["","",
        "theme-assets/images/icons/fanon1.gif",
        "theme-assets/images/icons/fanon2.gif",
        "theme-assets/images/icons/fanon3.gif"
        ];
        var img = document.getElementById("fan");
          img.src = images[num];
          console.log(num);
    }
    function changimglight(){
      var images = [
        "theme-assets/images/icons/lightoff.png",
        "theme-assets/images/icons/lighton.png"
        ];
        num++;
        var img = document.getElementById("light");
        if(num>=images.length)
        {
          num=0;
        }
           img.src = images[num];
           console.log(num);
    }
</script>

