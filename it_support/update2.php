<?php
include 'koneksi.php';

$effects = $_POST['effects'];
$selected_effects = "";
foreach ($effects as $efek) 
{
  $selected_effects .= $efek . ", ";
}
$selected_effects = substr($selected_effects, 0, -2);
$status  = $_POST['status'];
$filename1=$_FILES['gambar1']['name'];
$filename2=$_FILES['gambar2']['name'];

if($status=="closed") {
if(empty($filename1) && empty($filename2))   //jika kedua gambar kosong atau tidak di ganti
{
				$filename1=$_FILES['gambar1']['name'];
				$move1=move_uploaded_file($_FILES['gambar1']['tmp_name'],'gambar1/'.$filename1);
				$filename2=$_FILES['gambar2']['name'];
				$move2=move_uploaded_file($_FILES['gambar2']['tmp_name'],'gambar2/'.$filename2);

                $sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]' , effects = '$selected_effects' , verify  = '$_POST[verify]' , location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='user-list.php' </script> ";
}

elseif (!empty($filename1) && empty($filename2))   //jika gambar1 ganti dan gambar2 tidak ganti
{
                $filename1=$_FILES['gambar1']['name'];
				$move1=move_uploaded_file($_FILES['gambar1']['tmp_name'],'gambar1/'.$filename1);
				$filename2=$_FILES['gambar2']['name'];
				$move2=move_uploaded_file($_FILES['gambar2']['tmp_name'],'gambar2/'.$filename2);
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', gambar1='$filename1', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]', effects = '$selected_effects', verify  = '$_POST[verify]' , location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='user-list.php' </script> ";
}

elseif (empty($filename1) && !empty($filename2))   //jika gambar1 tidak ganti dan gambar2 ganti
{
                $filename1=$_FILES['gambar1']['name'];
				$move1=move_uploaded_file($_FILES['gambar1']['tmp_name'],'gambar1/'.$filename1);
				$filename2=$_FILES['gambar2']['name'];
				$move2=move_uploaded_file($_FILES['gambar2']['tmp_name'],'gambar2/'.$filename2);
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', gambar2='$filename2', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]', effects = '$selected_effects', verify  = '$_POST[verify]' , location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='user-list.php' </script> ";
}

elseif (!empty($filename1) && !empty($filename2)) // jika kedua gambar di ganti
{
                $filename1=$_FILES['gambar1']['name'];
				$move1=move_uploaded_file($_FILES['gambar1']['tmp_name'],'gambar1/'.$filename1);
				$filename2=$_FILES['gambar2']['name'];
				$move2=move_uploaded_file($_FILES['gambar2']['tmp_name'],'gambar2/'.$filename2);
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', gambar1='$filename1' ,keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', gambar2='$filename2', keterangan2  = '$_POST[keterangan2]', status  = '$_POST[status]', effects = '$selected_effects', verify  = '$_POST[verify]' , location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]'") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='user-list.php' </script> ";
}
}
else 
{
	
				$sql=mysql_query("UPDATE sheet_em SET title = '$_POST[title]', date1 = '$_POST[date1]', keterangan1 = '$_POST[keterangan1]', date2 = '$_POST[date2]', status  = '$_POST[status]', effects = '$selected_effects', verify  = '$_POST[verify]' , location  = '$_POST[location]', pic  = '$_POST[pic]' WHERE id = '$_POST[id]' ") or die ("UPDATE Failed !");
				echo "<script>alert ('Success ! Record Updated');document.location='user-list.php' </script> ";
}
?>