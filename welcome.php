<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="VTP, http://www.ozguninsaat.com/">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/ozgun-96x46.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link href="css/theme.css" rel="stylesheet" media="all">
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   

  
  
  
</head>
<body>
  
  <section class="menu menu2 cid-shhky0Lb92" once="menu" id="menu2-m">
 
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="http://www.ozguninsaat.com/?lang=aze&id=&proje_status=">
                        <img src="assets/images/ozgun-96x46.png" alt="" style="height: 3rem;">
                    </a>
                </span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#">
                
                
                        <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <h3 a class="js-acc-btn" href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h3 class="name">
                                                        <a href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Hesab</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="edit_customer.php">
                                                        <i class="zmdi zmdi-settings"></i>Tənzimləmələr</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                            <a href="logout.php" class="zmdi zmdi-power"> Çıxış</a>
                                            </div>
                                        </div>
                        </div>
                
            </div>
        </div>
    </nav>
</section>

<section class="countdown4 cid-shhcLIYd8A mbr-fullscreen mbr-parallax-background" id="countdown4-k">
    
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(68, 121, 217);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="mbr-section-title mb-5 align-center mbr-fonts-style display-2">
                    <strong>Tezliklə</strong></h3>
                
                <div class="countdown-cont align-center mb-5">
                    <div class="daysCountdown col-xs-3 col-sm-3 col-md-3" title="Gün"></div>
                    <div class="hoursCountdown col-xs-3 col-sm-3 col-md-3" title="Saat"></div>
                    <div class="minutesCountdown col-xs-3 col-sm-3 col-md-3" title="Dəqiqə"></div>
                    <div class="secondsCountdown col-xs-3 col-sm-3 col-md-3" title="Saniyə"></div>
                    <div class="countdown" data-due-date="2021/01/01"></div>
                </div>
                <p class="mbr-text mb-5 align-center mbr-fonts-style display-7">
                    Dəyişikliklərdən xəbərdar olmaq üçün izləmədə qalın</p>
                
                
            </div>
        </div>
    </div>
</section>

<section class="footer6 cid-shhdNB2gpj" once="footers" id="footer6-l">

    

    

    <div class="container">
        <div class="row content mbr-white">
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Address</strong></h5>
                <p class="mbr-text mbr-fonts-style display-7">Işık Sok. No: 20 06570
<br>Tandoğan / ANKARA</p> <br>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 mt-4 display-7"><strong>Əlaqə</strong></h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-7">
                    Email: info@ozguninsaat.com <br>
                    Tel: +90( 312 )229 08 08&nbsp;<br><br></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7"><strong>Haqqımızda</strong><br><div>Şirkətimiz maliyyə baxımdan marka dəyəri, bazar baxımından bazar payının artırılması, insan resursları baxımından ixtisaslı insan resurslarına sahib olmaq kimi dəyərləri əhatə edən korporativ etibarı güclü şirkətdir.</div></h5>
                <ul class="list mbr-fonts-style mb-4 display-4">
                    <li class="mbr-text item-wrap"><br></li>
                </ul>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 mt-5 display-7">
                    <strong>Feedback</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-7">Fikirlərinizi bölüşməkdən çəkinməyin</p>
            </div>
            <div class="col-12 col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCNveGQ9bfpKFwWzQLLftrR9hNiHwdqQG8&amp;q=Işık Sok. No: 20 06570,Tandoğan / ANKARA" allowfullscreen=""></iframe></div>
            </div>
            <div class="col-md-6">
                <div class="social-list align-left">
                    <div class="soc-item">
                        <a href="https://twitter.com/bayburtgruptr/" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.facebook.com/bayburtgruptr/" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.youtube.com/channel/UC9dBp7b-LMkBVai9MnVCuSQ/" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.instagram.com/bayburtgruptr/" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="col-sm-12 copyright pl-0">
                <p class="mbr-text mbr-fonts-style mbr-white display-7">
                    © Copyright 2020 VTP - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"> <a href="https://mobirise.site/h" style="color:#aaa;"></a></p></section>
<script src="assets/web/assets/jquery/jquery.min.js"></script>  
<script src="assets/popper/popper.min.js"></script>  
<script src="assets/tether/tether.min.js"></script>  
<script src="assets/bootstrap/js/bootstrap.min.js"></script>  
<script src="assets/smoothscroll/smooth-scroll.js"></script>  
<script src="assets/countdown/jquery.countdown.min.js"></script>  
<script src="assets/parallax/jarallax.min.js"></script>  
<script src="assets/dropdown/js/nav-dropdown.js"></script>  
<script src="assets/dropdown/js/navbar-dropdown.js"></script>  
<script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  
<script src="assets/theme/js/script.js"></script>  
<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/main.js"></script>

  
  
</body>
</html>