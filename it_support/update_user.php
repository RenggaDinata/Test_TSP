<?php
include ('koneksi.php');
// tangkap data dari form
$username= $_POST ['username'];
$password= $_POST  ['password'];
$password2 = md5($password);
$nama    = $_POST  ['nama'];
$email   = $_POST  ['email'];
$level   = $_POST  ['level'];
$id = $_POST['id'];


$query = mysql_query("update user_em set username = '$username', password = '$password2', nama = '$nama', email = '$email', level = '$level' where id ='$id'");

if ($query) {
	echo "<script>alert('Success ! User Data Updated ');document.location='admin-user.php' </script> ";
}
?>