<?php include('akses-admin.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Itron Apps</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">EHS EM Apps</a> 
            </div>
			<div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;"> <?php echo "Welcome|<strong>".$_SESSION['admin']."</strong>  "; ?> <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
       </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<li class="text-center">
                    <img src="assets/img/logo.jpg" class="user-image img-responsive"/>
					</li>
				    
                   	<li  >
                        <a class="active-menu" href="admin-input.php"><i class="fa fa-edit fa-3x"></i>Form Input</a>
                    </li>					
                    <li  >
                        <a href="admin-list.php"><i class="fa fa-table fa-3x"></i> List Data</a>
                    </li>
					<li>
                        <a href="admin-view-list.php"><i class="fa fa-desktop fa-3x"></i> View Data</a>
                    </li>	
					<li>
                        <a href="admin-user.php"><i class="fa fa-sitemap fa-3x"></i>User Data</a> 
                    </li>						
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Form Input</h2>   
                        <h5>PT Mecoindo - Itron</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
				
				
               <div class="row">
                
				<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Improvement Sheet
                        </div>
						<form role="form" id="my_form" action="" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                                                 
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" type="text" name="title" placeholder="Please insert title" required />
                                        </div>	
										<div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" type="text" name="location" placeholder="Please insert location" required />
                                        </div>	
								</div>
								<div class="col-md-6">
									<div class="form-group">
                                            <label>PIC</label>
                                            <!--input class="form-control" type="text" name="pic" placeholder="Please insert PIC name" required /-->
											<select name="pic" class="form-control" required >
											<option selected="true" style="display:none;">Choose PIC</option>
												<?php
												include "koneksi.php";
												$sql = mysql_query("SELECT * FROM user_em ORDER BY nama ASC");
												if(mysql_num_rows($sql) != 0){
													while($row = mysql_fetch_assoc($sql)){
														echo '<option value='.$row['id'].'>'.$row['nama'].'</option>';
													}
												}
												?>
									</select>
                                    </div>
									<div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" onChange="changetextbox();" class="form-control">
                                                <option value="open">Open</option>
                                                <option value="closed">Closed</option>
                                            </select>
                                        </div>
										<script type="text/javascript">
										function changetextbox()
										{
											if(document.getElementById("status").value == "open") {
												
												document.getElementById("gambar2").disabled='true';
												document.getElementById("keterangan2").disabled='true';
											} else {
												
												document.getElementById("gambar2").disabled='';
												document.getElementById("keterangan2").disabled='';
											}
										}
										</script>
								</div>
										
							
			   <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Before Process
                        </div>
                        <div class="panel-body">
									<p> <div class="form-group">
                                            <label>Date</label>
                                             <input class="form-control" type="date" name="date1" placeholder="yyyy-mm-dd (ex : 2015-12-31)"  required /> <label>Format : yyyy-mm-dd <br>(ex : 2015-12-31) </label>
                                        </div>                                     
                                        <div class="form-group">
                                            <label>Picture</label><br>
											<input type="file" name="gambar1" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Problem</label><br>
                                            <textarea class="form-control" name="keterangan1" id="keterangan1" rows="3"></textarea>
                                        </div>   
										
									<p>
						</div>
                        <div class="panel-footer">
                            Before Process
                        </div>
                    </div>
                </div>
				
				<div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            After Process
                        </div>
                        <div class="panel-body">
									<p><div class="form-group">
                                            <label>Date</label>
											<input class="form-control" id="date2" type="date" name="date2" placeholder="yyyy-mm-dd (ex : 2015-12-31)"  required /> <label>Format : yyyy-mm-dd <br>(ex : 2015-12-31) </label>
                                       
									   </div>                                     
                                        <div class="form-group">
                                            <label>Picture</label><br>
											<input id="gambar2" type="file" disabled="disabled" name="gambar2" />
                                        </div>
										
                                        <div class="form-group">
                                            <label>Solution</label><br>
                                            <textarea class="form-control" disabled="disabled" name="keterangan2" id="keterangan2" rows="3"></textarea>
                                        </div> 
										
									<p>
						</div>
                        <div class="panel-footer">
                            After Process
                        </div>
                    </div>
                </div>
				
				<div class="col-md-6">                                                  
					<div class="form-group">
                                            <br>
											<label>Effects : </label>
											<br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="effects" name=effects[] value='Health'/> Health
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="effects" name=effects[] value='Environment'/> Environment
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="effects" name=effects[] value='Safety'/> Safety
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" id="effects" name=effects[] value='5R'/> 5R
											</label>
                    </div>     
				</div>
					
				<div class="col-md-6">
					<div class="form-group">
											<br>
											<label>Verification : </label>
											<br>
											<select name="verify" id="verify" class="form-control" required>
												<option selected="true" style="display:none;">Please Verify</option>
                                                <option value="On Progress">On Progress</option>
                                                <option value="Checking">Checking</option>
												<option value="Competed">Completed</option>												
                                            </select>
					</div>
                </div>
				
				
			</div>
				<input type="submit" value="Submit" name="save">
			</div>
			</div>
			
			</div>
			</form>
			</div>
			
			<?php
			include "koneksi.php";
			 if (isset($_POST['save'])){
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
			 
			$effects = $_POST['effects'];
			$selected_effects = "";
			foreach ($effects as $efek) 
			{
			  $selected_effects .= $efek . ", ";
			}
			$selected_effects = substr($selected_effects, 0, -2);
			echo "$selected_effects";
			

			if(empty($filename2)){
				$moveResult = move_uploaded_file($fileName1_tmp, $pathAndName1);//move to folder
				$moveResult = move_uploaded_file($fileName2_tmp, $pathAndName2);//move to folder
				$sql = "insert into sheet_em (title, date1, gambar1, keterangan1, date2, keterangan2, status, effects, location, pic, verify) values ('".$_POST['title']."','".$_POST['date1']."','$newname1','".$_POST['keterangan1']."','".$_POST['date2']."','".$_POST['keterangan2']."','".$_POST['status']."','$selected_effects','".$_POST['location']."','".$_POST['pic']."', '".$_POST['verify']."')"; 
				echo "<script>alert ('Input Data Saved !'); document.location='admin-list.php' </script> ";
				mysql_query($sql);
			}
			else
			{
				$moveResult = move_uploaded_file($fileName1_tmp, $pathAndName1);//move to folder
				$moveResult = move_uploaded_file($fileName2_tmp, $pathAndName2);//move to folder
				// Simpan ke Database
				$sql = "insert into sheet_em (title, date1, gambar1, keterangan1, date2, gambar2, keterangan2, status, effects, location, pic, verify) values ('".$_POST['title']."','".$_POST['date1']."','$newname1','".$_POST['keterangan1']."','".$_POST['date2']."','$newname2','".$_POST['keterangan2']."','".$_POST['status']."','$selected_effects','".$_POST['location']."','".$_POST['pic']."', '".$_POST['verify']."')"; 
				echo "<script>alert ('Input Data Saved !'); document.location='admin-list.php' </script> ";
				mysql_query($sql);
			}
			
			  // Simpan di Folder Gambar
			  //move_uploaded_file($_FILES['gambar1']['tmp_name'], "gambar1/".$_FILES['gambar1']['name']);
			  //move_uploaded_file($_FILES['gambar2']['tmp_name'], "gambar2/".$_FILES['gambar2']['name']);
			 } 
			?>
				
				
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>			
				
	 <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
