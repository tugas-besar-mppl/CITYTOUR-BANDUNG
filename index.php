<?php
session_start();
//session_destroy();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="http://maps.google.com/maps/api/js"></script>
        <script src="assets/js/gmaps.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>        
		<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>  
                 
		<?php include("_scr.php"); ?>           
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <link rel="stylesheet" href="assets/css/lato-webfont.css" />
        <link rel="stylesheet" href="assets/css/magnific-popup.css">



        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
 
    </head>
    <body>
    

<?php
include "apps/views/header.php";
if($_GET['pages']==''){
include "apps/views/profil.php";
include "apps/views/register.php";
include "apps/views/login.php";
include "apps/views/lupapass.php";
include "apps/views/home.php";
include "apps/views/aboutus.php";
include "apps/views/booking.php";
include "apps/views/detailmobil.php";
include "apps/views/detailbooking.php";
include "apps/views/contactus.php";
}elseif($_GET['pages']=='pembayaran'){
include "apps/views/pembayaran.php";
include "apps/views/contactus.php";
}elseif($_GET['pages']=='pembayarandetail'){
include "apps/views/pembayarandetail.php";
include "apps/views/contactus.php";
}

include "apps/views/footer.php";
 ?>

    </body>
</html>
