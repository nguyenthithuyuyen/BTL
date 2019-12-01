<?php
error_reporting("all");
include('../connectdb.php');
$connectdb= new connect();
$con=$connectdb->connect_db();

session_start();
echo $_SESSION[userid];
if($_SESSION[login] != 1)
{
	header("location: ../index.php");
}
?>

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
    <link rel="stylesheet" type="text/css" href="theme-assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>

  <style type="text/css">
    .clr{
      clear: both;
    }
    .living{background: blue !important;}
    .dinning{background: red !important;}

   .content_fan { 
  max-height: 0;
  overflow: hidden;
  }
  </style>

  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns" >
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
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><!--<img src="theme-assets\images\icons\host.jpg" alt="avatar">--><span class="user-name text-bold-700"><?= $_SESSION[fullname]; ?></span></span></a>
                    <div class="dropdown-divider"></div><!--<a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>--><a class="dropdown-item" href="list_device.php"><i class="ft-message-square"></i> List My Device</a>
                    <a class="dropdown-item" href="addevice.php"><i class="ft-message-square"></i> Device Registration</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
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
          <li class="nav-item mr-auto"><a class="navbar-brand" href="home.php"><!--<img class="brand-logo" alt="Chameleon admin logo" src="theme-assets/images/logo/logo1.png"/>-->
            <h3 class="brand-text" style="color: black;"><?= $_SESSION[fullname]; ?></h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="#" class="<?php echo $_GET[active] ?>"><img src="theme-assets\images\ico\iconhome.png" width="20%" /><span class="menu-title" data-i18n="">Living Room</span></a></li>
         <!-- <li class="active"><a class="<?php echo $_GET[active1] ?>" href="diningroom.php?active=dinning"><img src="theme-assets\images\ico\iconhome.png" width="20%" /></i><span class="menu-title" data-i18n="">Dining-room</span></a></li>-->
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>
    <div class="app-content content">


<div style="padding: 0px 10px">

      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
          <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Living Room</h3>
          </div>
        </div>
      

          <!-- Pie charts section start -->
          <section id="chartjs-pie-charts">
            <div class="row">

<?php
	$sql="SELECT d.name, d.status, d.typeid, d.serinum, d.deviceid FROM devices d inner join devicere dr on d.deviceid=dr.deviceid WHERE dr.userid=$_SESSION[userid] and d.placeid=1";
	$resurlt=mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($resurlt))
	{
    $seri=$row[serinum];
    if($row[typeid]==1){
		  echo ' <!--start equiment -->
              <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" style="margin-top:10px">'.$row[name].'</h4>
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
                                <!--Pan Control-->
                                <img id="'.$row[serinum].'" class="collapsible active" src="theme-assets\images\icons\fan'.$row[status].'.gif" width="80%" onclick="changeimg(id)" />
                              
                                <div class="content_fan1">
                                 <input type="button" id="'.$row[serinum].".1".'" name="speed" value="1" class="speed1" onclick="changeimg1(id)" /> 
                                 <input type="button" id="'.$row[serinum].".2".'" name="speed" value="2" class="speed2" onclick="changeimg1(id)" />
                                 <input type="button" id="'.$row[serinum].".3".'" name="speed" value="3" class="speed3" onclick="changeimg1(id)" />
                                 <input type="button" id="'.$row[serinum].".4".'" name="speed" value="4" class="speed4" onclick="changeimg1(id)" />
                                </div>
                                <!--End Pan Control-->
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <!--end equiment-->';
    }
    elseif($row[typeid]==2)
    {
      $seri=$row[serinum];
      echo '<!--begin Equiment-->
                <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">'.$row[name].'</h4>
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
                                <img id ="'.$row[serinum].'" src="theme-assets/images/icons/light'.$row[status].'.png"  alter="light" width="80%" onclick="changimglight(id)" />
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <!--end equiment-->';
    }
    

	}
?>
<!--
<script type="text/javascript">
  $("img").on("click", function(){
    $.ajax({
      url: 'ajax.php'
  }).done(function(ketqua){
    $('#nd').html(ketqua) ;
  });  })
</script>-->

               <!--start equiment -->
              <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" style="margin-top: 10px">Add Device</h4>
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
                                <!--Pan Control-->
                                <a href="addevice.php"><img id="fan" class="collapsible" src="theme-assets\images\icons\add.png" width="80%" /></a>
                                <!--End Pan Control-->
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
  </div>




      <!-- ////////////////////////////////////////////////////////////////////////////-->


      <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div >Bai tap lon hoc phan k18 CDCNTT18D</div>
        <div class="background: red; width: 80px; height: 80px" id="nd">...</div>
      </footer>
      <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
      <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
      <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
</body>
</html>
<script>
  var num=0;
  //tắt quạt
    function changeimg(id) {
      var images = [
        "theme-assets/images/icons/fan0.gif"
      ];
      console.log(id);
        var img = document.getElementById(id);
        img.src = images[num];
        console.log(num);
       $.get('/fan/'+num); //truyen bien trang thai sang python
    }

    // Thay đổi trạng thái quạt
    function changeimg1(id) {
      var images = ["",
        "theme-assets/images/icons/fan1.gif",
        "theme-assets/images/icons/fan2.gif",
        "theme-assets/images/icons/fan3.gif",
        "theme-assets/images/icons/fan4.gif"
        ];
        console.log(id);
        var tmp=id.split(".");
        //console.log(tmp);
        var img = document.getElementById(tmp[0]);
          img.src = images[tmp[1]];
          console.log(tmp[1]);
          $.get('/fan/'+tmp[1]); //truyền biến trạng thái sang python

    }

    // bật tắt đèn
    function changimglight(id){
      var images = [
        "theme-assets/images/icons/light0.png",
        "theme-assets/images/icons/light1.png"
        ];
        console.log(id);
        num++;
        var img = document.getElementById(id);
        if(num>=images.length)
        {
          num=0;
        }
          img.src = images[num];
          console.log(num);
          $.get('/led/'+num); //truyền biến trạng thái sang python
    }
</script>
