
<form id="loginform" action="index.php?login_attempt=1" method="post">
    <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
    <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
    <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Masuk</button></p>
    
</form>
<?php
if(isset($_GET['login_attempt']))
{
	$spf=sprintf("Select * from user_login where Username='%s' and Password='%s'",$_POST['username'],md5($_POST['password']));
	$rs=mysql_query($spf);
	$rw=mysql_fetch_array($rs);
	$rc=mysql_num_rows($rs);
	
	if($rc==1)
	{
		$_SESSION['login_hash']=$rw['LoginHash'];
		$_SESSION['id_user']=$rw['IdUserLogin'];
		$_SESSION['login_user']=$rw['Username'];
		$_SESSION['login_pass']=$rw['Password'];
		$_SESSION['id_petugas']=$rw['IdPetugas'];			
		echo "<script>window.location='dashboard.php'</script>";
	}
}
?>