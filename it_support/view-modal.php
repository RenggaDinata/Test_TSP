<?php
	include 'koneksi.php';
	//$username = "root";
    //$password = "";
    //$hostname = "localhost";
    //$db_name = "itron"; 

    //connection to the database
    //$dbhandle = mysql_connect($hostname, $username, $password)
    //    or die("Unable to connect to MySQL");
    //$selected = mysql_select_db($db_name,$dbhandle)
    //    or die("Could not select examples");
    $id = $_GET['id'];  

    /* if (isset($_POST['submit'])) {
    	$id = $_POST['id'];
    	$name = $_POST['name'];
    	$phone = $_POST['phone'];
    	$address = $_POST['address'];
    	$email = $_POST['email'];
    	$qryUpt = "UPDATE `details` SET `name` = '$name', `phone` = '$phone', `address`='$address', `email`='$email' WHERE `sn`=$id";
    	mysql_query($qryUpt) or die(mysql_error());
    	header("location:index.php");
    } */

    $qryMem = "select sheet_em.id, sheet_em.title, sheet_em.date1, sheet_em.gambar1, sheet_em.keterangan1, sheet_em.date2, sheet_em.gambar2, sheet_em.keterangan2, sheet_em.status, sheet_em.verify, sheet_em.effects, sheet_em.location, sheet_em.pic, user_em.nama from sheet_em, user_em where sheet_em.pic=user_em.id and sheet_em.id='$_GET[id]'";
    $memresult =  mysql_query($qryMem) or die(mysql_error());
    $e = mysql_fetch_assoc($memresult) or die(mysql_error());
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
   
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
	<link href="assets/css/button.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/button2.css" rel="stylesheet" type="text/css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <title>View Data</title>

    <!-- Bootstrap Core CSS -->
    
</head>
<body>
<form method="post" action="editdata.php" role="form">
		<div class="modal-body">
		<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                        <?php echo "<input type=hidden name=id value=$e[id]>";?>                    
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" type="text" name="title" <?php echo "value='$e[title]'"; ?> placeholder="Please insert title" required />
                                        </div>	
										<div class="form-group">
                                            <label>Lokasi</label>
                                            <input class="form-control" type="text" name="location" <?php echo "value='$e[location]'"; ?> placeholder="Please insert location" required />
                                        </div>	
								</div>
								<div class="col-md-6">
									<div class="form-group">
                                            <label>PIC</label>
                                            <input class="form-control" type="text" name="pic-nama" <?php echo "value='$e[nama]'"; ?> placeholder="Please insert PIC name" required />
											<input class="form-control" type="hidden" name="pic" <?php echo "value='$e[pic]'"; ?> placeholder="Please insert PIC name" required />
                                     
									 </div>
									 <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="open" <?php if ($e['status'] === 'closed') echo 'selected="selected"' ?> >Dimulai</option>
                                                <option value="closed" <?php if ($e['status'] === 'closed') echo 'selected="selected"' ?> >Ditutup</option>
                                            </select>
                                            </select>
                                        </div>
										
								</div>
										
							
			   <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Sebelum Diperbaiki
                        </div>
                        <div class="panel-body">
									<p> <div class="form-group">
                                            <label>Tanggal</label>
                                             <input class="form-control" type="date" name="date1" placeholder="yyyy-mm-dd (ex : 2015-12-31)" <?php echo "value='$e[date1]'"; ?> required /> <label>Format : yyyy-mm-dd <br>(ex : 2015-12-31) </label>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Gambar</label><br>
											<?php 
											if(!empty($e['gambar1']))
											{
												echo "<img src='gambar1/$e[gambar1]' width=200 height=200 >";
											}
											else {
												
												echo "<img src='gambar2/No_Image_Available.png' width=200 height=200 >"; 
											}
											?>
											
                                        </div>
                                        <div class="form-group">
                                            <label>Kerusakan</label><br>
                                            <textarea class="form-control" name="keterangan1" id="keterangan1" rows="3"><?php echo "$e[keterangan1]"; ?></textarea>
                                        </div>   
										
									<p>
						</div>
                        <div class="panel-footer">
                            Sebelum Diperbaiki
                        </div>
                    </div>
                </div>
				
				<div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Sesudah Diperbaiki
                        </div>
                        <div class="panel-body">
									<p><div class="form-group">
                                            <label>Tanggal</label>
											<input class="form-control" id="date2" type="date" name="date2" placeholder="yyyy-mm-dd (ex : 2015-12-31)" <?php echo "value='$e[date2]'"; ?>  required /> <label>Format : yyyy-mm-dd <br>(ex : 2015-12-31) </label>
                                       
									   </div>                                     
                                        <div class="form-group">
                                            <label>Gambar</label><br>
											<?php 
											if(!empty($e['gambar2']))
											{
												echo "<img src='gambar2/$e[gambar2]' width=200 height=200 >";
											}
											else {
												
												echo "<img src='gambar2/No_Image_Available.png' width=200 height=200 >"; 
											}
											?>
											
                                        </div>
										
                                        <div class="form-group">
                                            <label>Solusi</label><br>
                                            <textarea class="form-control" name="keterangan2" id="keterangan2" rows="3"><?php echo "$e[keterangan2]"; ?></textarea>
                                        </div> 
										
									<p>
						</div>
                        <div class="panel-footer">
                            Sesudah Diperbaiki
                        </div>
                    </div>
                </div>
				
				<div class="col-md-12">
                                                                  
                    <div class="form-group">
                                            <br>
											<label>Efek : </label>
											<br>
											<?php 
												$effects=explode(", ",$e["effects"]);
											?>
											<label class="checkbox-inline">
                                                <input type="checkbox" id="effects" name=effects[] value='Lambat'/> Lambat
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="effects" name=effects[] value='Rusak'/> Rusak
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="effects" name=effects[] value='Penggantian'/> Penggantian
                                            </label>
                    </div>     
                </div>
				
				
			</div>
				<!--input type="submit" value="Submit" name="save"-->
			</div>
			</div>
			
			</div>
			</form>
			</div>	
					

	<div class="modal-footer">
			<!--input type="submit" class="btn btn-primary" name="submit" value="Update" /-->&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>
