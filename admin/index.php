<?php
session_start();
require("_db.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard Citytour BDG</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-250.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
</head>
<body class="loginbody">
<div id="templatemo_header_wrapper">
	<div id="templatemo_header" class="wrapper">
      <div class="logo">
        <h1><a href="index.html"></span> <small>DASHBOARD CITYTOUR BDG</small></a></h1>
      </div>    
    </div>
</div>
<center>
        <div class="loginwrapper">
        <div class="loginwrap">
        <h1 class="logintitle"><span class="iconfa-lock"></span>Dashboard<span class="subtitle">Silahkan login untuk memulai.</span></h1>
            <div class="loginwrapperinner">
				<?php include("login.php") ?>
            </div><!--loginwrapperinner-->
        </div>
        <div class="loginshadow"></div>
        </div><!--loginwrapper--></center>
    <script type="text/javascript">
    jQuery.noConflict();
    
    jQuery(document).ready(function(){
        
        /*var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
        jQuery('.loginwrap').bind(anievent,function(){
            jQuery(this).removeClass('animate2 bounceInDown');
        });*/
        
        jQuery('#username,#password').focus(function(){
            if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
        });
        
        jQuery('#loginform button').click(function(){
            if(!jQuery.browser.msie) {
                if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
                    if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
                    if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
                    /*jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
                        jQuery(this).removeClass('animate0 wobble');
                    });*/
                } else {
                    /*jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
                        jQuery('#loginform').submit();
                    });*/
                }
                return false;
            }
        });
    });
    </script> 
</body>
<tfoot>
<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer" class="wrapper">
    	Copyright © 2014 <a href="#">My Sand Company</a> | Designed by <a href="#http://www.mysand.com" target="_parent">MySand</a>
    </div>
</div>  
</tfoot>
</html>