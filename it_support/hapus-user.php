<?php 
include('koneksi.php');

$id = $_GET['id'];

$query = mysql_query("delete from user_em where id='$id'") or die(mysql_error());

if ($query) {
	echo "<script>alert('Data User DELETED !');document.location='admin-user.php' </script> ";
}
?>