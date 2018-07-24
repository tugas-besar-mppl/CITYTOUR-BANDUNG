<?php
session_start();
include("_db.php");
?>

<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DASHBOARD CITYTOUR BDG</title>
	<?php include("_scr.php"); ?>
</head>

<body>

<div class="mainwrapper fullwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">    	
        <div class="logopanel">
        	<h1><a href="dashboard.php">DASHBOARD CITYTOUR BDG</a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget" style="height:21px"></div>

        <div class="plainwidget" style="height:24px">
        	Hari ini: <?php echo date("d M Y"); ?>
        </div><!--plainwidget-->
        <?php include("_main-nav.php"); ?> <!--NAVIGASI MENU UTAMA-->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
            <div class="headerright">
            	<span  style="color:#FFF">                
                </span>
                    <div class="userloggedinfo">
                        <div class="userinfo">
                            <h5><small><?php  echo "Selamat Datang Kembali ".$_SESSION['login_user']; ?></small></h5>
                            <ul>
                                <li><a href="models/system/LogoutProses.php"><span class="icon-off"></span> Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
            </div><!--headerright-->
    	</div><!--headerpanel-->
        
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li></li>
            </ul>
        </div> 
        <!--breadcrumbwidget-->
        
		<div class="pagetitle">
    		<h1><?php echo strtoupper($_GET["title"]); ?></h1> <!--<span>This is a sample description for dashboard page...</span>-->
    	</div><!--pagetitle-->	
        
      <div class="maincontent">
       	<div class="contentinner">
            	<!--<div class="alert alert-info">
                	<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Welcome!</strong> This alert needs your attention, but it's not super important.
                </div>--><!--alert-->
                
                <div class="row-fluid"><!--span8-->
                <?php
				$v_cat = (isset($_REQUEST['cat'])&& $_REQUEST['cat'] !=NULL)?$_REQUEST['cat']:'';
				$v_page = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
				if(file_exists("views/".$v_cat."/".$v_page.".php"))
				{
					include("views/".$v_cat."/".$v_page.".php");
				}else{
					include("views/dashboard/home.php");
				}
				
				
				?>
                
                <!--span4-->
              </div>
                <!--row-fluid-->
          </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
	<!--FOOTER-->
    <?php include("_footer.php"); ?>
    
</div><!--mainwrapper-->
	<!--SLIDE NAVIGASI-->
</div>
</body>
</html>
