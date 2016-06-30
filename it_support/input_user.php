<?php
include "koneksi.php";
if (isset($_POST['input'])){
$username =addslashes(strip_tags($_POST['username']));
$password =addslashes(strip_tags($_POST['password']));
$password2 = md5($password);
$nama     =addslashes(strip_tags($_POST['nama']));
$email    =addslashes(strip_tags($_POST['email']));
$level    =addslashes(strip_tags($_POST['level']));
// Ambil data dari database

$query = "INSERT INTO user_em values ('id','$username','$password2','$nama','$email','$level')"; 
$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
		echo "<script>alert('Success ! User Data Added');document.location='admin-user.php' </script> ";
	} else {
		echo "<script>alert('Failed ! Please Try Again');document.location='admin-user.php' </script> ";
	}
    
}

?>