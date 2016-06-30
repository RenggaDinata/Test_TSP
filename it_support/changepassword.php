<?php
require_once "koneksi.php";
$passwordlama = addslashes(strip_tags($_POST['passwordlama']));
$passwordbaru = addslashes(strip_tags($_POST['passwordbaru']));
$konfirmasipassword = addslashes(strip_tags($_POST['confirmpasswordbaru']));
$passwordlama2 = md5($passwordlama);
$passwordbaru2 = md5($passwordbaru);
$konfirmasipassword2 = md5($konfirmasipassword);

$userid = $_POST['userid'];

$query ="select * from user_em where id='$userid'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

if ($data['password'] == $passwordlama2)
{
	//jika password lama benar, maka cek keseuaian password baru 1 dan 2
	if($passwordbaru2 == $konfirmasipassword2)
	{
		// jika password baru 1 dan 2 sama, maka proses update password dilakukan
		$query = "UPDATE user_em SET password = '$passwordbaru2' WHERE id='$userid' ";
		$hasil = mysql_query($query);
		if($hasil)
		echo "<script>alert ('Success ! Password Changed'); document.location='user-settings.php' </script>";
	}
	else echo "<script>alert ('Failed ! Your Confirm New Password Wrong'); document.location='user-settings.php' </script>"; 
}
else echo "<script>alert ('Failed ! Your Old Password Wrong'); document.location='user-settings.php' </script>"; 
?>