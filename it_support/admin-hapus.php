<?php include('akses-admin.php'); ?>
<?php
include ('koneksi.php');
$hapus=mysql_query("delete from sheet_em where id='$_GET[id]' ") or die ("Can't DELETED ! Failed");
echo "<script>alert('Record Data DELETED !');document.location='admin-list.php' </script> ";
?>