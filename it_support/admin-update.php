<?php
include 'koneksi.php';
error_reporting(0);
$effects = $_POST['effects'];
$selected_effects = "";
foreach ($effects as $efek) 
{
  $selected_effects .= $efek . ", ";
}
$selected_effects = substr($selected_effects, 0, -2);
$status  = $_POST['status'];

$fileName1 = $_FILES['gambar1']['name'];
$fileName1_tmp = $_FILES['gambar1']['tmp_name'];
$fileName2 = $_FILES['gambar2']['name'];
$fileName2_tmp = $_FILES['gambar2']['tmp_name'];
$waktu = date("d-m-Y-h-i-s");
$newname1="image".$waktu .$fileName1; 
$newname2="image".$waktu .$fileName2; 
$path1='gambar1/';
$path2='gambar2/';
$pathAndName1 = $path1.$newname1;
$pathAndName2 = $path2.$newname2;



if(empty($fileName1) && empty($fileName2))   //jika kedua gambar kosong atau tidak di ganti
{
                $sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]', verify  = '$_POST[verify]', effects = '$selected_effects', location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='admin-list.php' </script> ";
}

elseif (!empty($fileName1) && empty($fileName2))   //jika gambar1 ganti dan gambar2 tidak ganti
{
				move_uploaded_file($fileName1_tmp, $pathAndName1);//move to folder
				move_uploaded_file($fileName2_tmp, $pathAndName2);//move to folder
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', gambar1='$newname1', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]', verify  = '$_POST[verify]', effects = '$selected_effects', location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='admin-list.php' </script> ";
}

elseif (empty($fileName1) && !empty($fileName2))   //jika gambar1 tidak ganti dan gambar2 ganti
{
				move_uploaded_file($fileName1_tmp, $pathAndName1);//move to folder
				move_uploaded_file($fileName2_tmp, $pathAndName2);//move to folder
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', gambar2='$newname2', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]', verify  = '$_POST[verify]', effects = '$selected_effects', location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='admin-list.php' </script> ";
}

elseif (!empty($fileName1) && !empty($fileName2)) // jika kedua gambar di ganti
{
                move_uploaded_file($fileName1_tmp, $pathAndName1);//move to folder
				move_uploaded_file($fileName2_tmp, $pathAndName2);//move to folder
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', gambar1='$newname1' ,keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', gambar2='$newname2', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]', verify  = '$_POST[verify]', effects = '$selected_effects', location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]'") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='admin-list.php' </script> ";
}
else 
{
	
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', status  = '$_POST[status]', verify  = '$_POST[verify]', effects = '$selected_effects', location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='admin-list.php' </script> ";
}
?>