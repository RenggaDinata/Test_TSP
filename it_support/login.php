<?php
include('koneksi-login.php');
if(isset($_POST['login'])){
	$user = mysql_real_escape_string(htmlentities($_POST['username']));
	$pass = mysql_real_escape_string(htmlentities(md5($_POST['password'])));
 
	$sql = mysql_query("SELECT * FROM user_em WHERE username='$user' AND password='$pass'") or die(mysql_error());
	if(mysql_num_rows($sql) == 0){
		echo '<script language="javascript">alert("Failed ! Your Username or Password Wrong"); document.location="index.php";</script>';
	}else{
		$row = mysql_fetch_assoc($sql);
		if($row['level'] == 1){
			$_SESSION['admin']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="admin-list.php";</script>';
		}else{
			$_SESSION['guest']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login Guest!"); document.location="user-list.php";</script>';
		}
	}
}
?>