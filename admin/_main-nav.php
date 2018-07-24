<!--NAVIGASI MENU UTAMA-->
<div class="leftmenu">
  <ul class="nav nav-tabs nav-stacked">
    <li class="nav-header">Main Navigation</li>
    <li><a href="dashboard.php"><span class="icon-align-justify"></span> Dashboard</a></li>
<?php   
  $strMenu = "SELECT
				  menu.id,
				  menu.text,
				  menu.menu_id,
				  menu.parent_id,
				  menu.link,
				  user_login.IdUserLogin,
				  user_login.Username,
				  user_login.Password
				FROM menu
				  INNER JOIN user_group_menu
					ON menu.menu_id = user_group_menu.menu_id
				  INNER JOIN user_login
					ON user_login.IdGroup = user_group_menu.id_group
				WHERE menu.parent_id = '0'
					AND user_login.IdUserLogin='".$_SESSION["id_user"]."' 
						AND user_login.Password='".$_SESSION["login_pass"]."' 
				GROUP BY menu.menu_id
				ORDER BY menu.id";
  //echo $strMenu;			  
  $hasil=mysql_query($strMenu);
  while($row=mysql_fetch_object($hasil))
  {
?>    
    <!--MENU GUDANG-->
    <li class="dropdown"><a href="<?php echo $row->link;?>"><span class="icon-th-list"></span><?php echo $row->text;?></a>
 <?php
$strMenu_1 = "SELECT
  menu.id,
  menu.text,
  menu.menu_id,
  menu.parent_id,
  menu.link,
  user_login.IdUserLogin,
  user_login.username,
  user_login.password
FROM menu
  INNER JOIN user_group_menu
    ON menu.menu_id = user_group_menu.menu_id
  INNER JOIN user_login
    ON user_login.IdGroup = user_group_menu.id_group 
              WHERE menu.parent_id= '".$row->menu_id."'
					AND user_login.IdUserLogin='".$_SESSION["id_user"]."' 
						AND user_login.Password='".$_SESSION["login_pass"]."' 
				GROUP BY menu.menu_id
				ORDER BY menu.id";
//echo $strMenu_1;			  
$hasil_1=@mysql_query($strMenu_1);
if($hasil_1 && mysql_num_rows($hasil_1)>0) {
?>
      <ul <?php if($_GET["menu"]==$row->menu_id)  echo 'style="display: block"';?>>
	  <?php	 while($row_1=@mysql_fetch_object($hasil_1)) { ?>	      
        <li><a href="<?php echo $row_1->link;?>&menu=<?php echo $row_1->parent_id;?>&title=<?php echo $row_1->text;?>"><?php echo $row_1->text;?></a></li>
        <?php
	  		}
		?>
        <!--        <li><a href="?cat=master&page=Satuan_grid">Satuan</a></li>-->         
      </ul>    
<?php
}
?>
    </li>
<?php
  }
?>
  </ul>
</div>
<!--leftmenu-->

</div>
<!--mainleft--> 
<!-- END OF LEFT PANEL -->