<?php
include "conn.php";
 if (isset($_POST['save'])){
 $fileName1 = $_FILES['gambar1']['name'];
 $fileName2 = $_FILES['gambar2']['name'];
 
$effects = $_POST['effects'];
$selected_effects = "";
foreach ($effects as $efek) 
{
  $selected_effects .= $efek . ", ";
}
$selected_effects = substr($selected_effects, 0, -2);


echo "$selected_effects";


  // Simpan ke Database
$sql = "insert into sheet_em (title, date1, gambar1, keterangan1, date2, gambar2, keterangan2, effects, location, manager) values ('".$_POST['title']."','".$_POST['date1']."','$fileName1','".$_POST['keterangan1']."','".$_POST['date2']."','$fileName2','".$_POST['keterangan2']."','"$selected_effects"','".$_POST['location']."','".$_POST['manager']."')"; 
echo "<script>alert ('Input Data Saved !'); document.location='table.php' </script> ";

  mysql_query($sql);
  // Simpan di Folder Gambar
  move_uploaded_file($_FILES['gambar1']['tmp_name'], "gambar1/".$_FILES['gambar1']['name']);
  move_uploaded_file($_FILES['gambar2']['tmp_name'], "gambar2/".$_FILES['gambar2']['name']);
 } 
?>