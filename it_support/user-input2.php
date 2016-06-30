<?php include('akses-user.php'); ?>
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
			font-size: 16px;"> <?php echo "Welcome|<strong>".$_SESSION['guest']."</strong>  "; ?> <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
			</div>
       </nav>   
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<li class="text-center">
                    <img src="assets/img/logo.jpg" class="user-image img-responsive"/>
					</li>
				    
                   	<li  >
                        <a class="active-menu" href="user-input.php"><i class="fa fa-edit fa-3x"></i>Form Input</a>
                    </li>					
                    <li  >
                        <a href="user-list.php"><i class="fa fa-table fa-3x"></i>List Your Data</a>
                    </li>
					<li>
                        <a href="user-view-list.php"><i class="fa fa-desktop fa-3x"></i>View All Data</a>
                    </li>
					<li>
                        <a  href="user-settings.php"><i class="fa fa-qrcode fa-3x"></i>Change Password</a>
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
											<?php
											$login=$_SESSION['guest'];
											include ('koneksi.php');
											$view=mysql_query("SELECT * FROM `user_em` WHERE username ='$login'");
											$v=mysql_fetch_array($view); 
											?>
                                            <input class="form-control" <?php echo "value='$v[nama]' name=pic-name id=pic-name"; ?>  readonly />
											<input type="hidden" class="form-control" <?php echo "value='$v[id]' name=pic id=pic"; ?> />
                                            <!--input class="form-control" type="text" name="pic" placeholder="Please insert PIC name" required /-->
                                     </div>
									 <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" onChange="changetextbox();" class="form-control" required>
												<option selected="true" style="display:none;">Choose Status</option>
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
												document.getElementById("datetarget").hidden='';
												document.getElementById("dateclosed").hidden='true';
												document.getElementById("process").hidden='';
												document.getElementById("verify").value = "On Progress";
											} else {
												
												document.getElementById("gambar2").disabled='';
												document.getElementById("keterangan2").disabled='';
												document.getElementById("datetarget").hidden='true';
												document.getElementById("dateclosed").hidden='';
												document.getElementById("process").hidden='';
												document.getElementById("verify").value = "Checking";
											}
										}
										</script>
								</div>
										
			<div id="process" hidden="hidden">
			   <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Before Process
                        </div>
                        <div class="panel-body">
									<p> <div class="form-group">
                                            <label>Date Open</label>
                                             <input class="form-control" type="date" name="date1" placeholder="yyyy-mm-dd (ex : 2015-12-31)"  required /> <label>Format : yyyy-mm-dd <br>(ex : 2015-12-31) </label>
                                        </div>                                     
                                        <div class="form-group">
                                            <label>Picture</label><br>
											<input type="file" name="gambar1" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Problem</label><br>
                                            <textarea class="form-control" name="keterangan1" id="keterangan1" rows="3" required ></textarea>
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
                                            <label id="datetarget" hidden="hidden">Date Target</label>
											<label id="dateclosed" hidden="hidden">Date Closed</label>
											<input class="form-control" id="date2" type="date" name="date2" placeholder="yyyy-mm-dd (ex : 2015-12-31)"  required /> <label>Format : yyyy-mm-dd <br>(ex : 2015-12-31) </label>
                                       
									   </div>                                     
                                        <div class="form-group">
                                            <label>Picture</label><br>
											<input id="gambar2" type="file" disabled="disabled" name="gambar2" required />
                                        </div>
										
                                        <div class="form-group">
                                            <label>Solution</label><br>
                                            <textarea class="form-control" disabled="disabled" name="keterangan2" id="keterangan2" rows="3" required></textarea>
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
											
											
											<!--select name="verify" id="status" class="form-control" hidden>
												<option selected="true" style="display:none;">Please Verify</option>
                                                <option value="open">Not Yet</option>
                                                <option value="closed">OK</option>
                                            </select-->
                    </div>     
                </div>
				<div class="col-md-6">
					<div class="form-group">
											<br>
											<label>Verification : </label>
											<br>
											<!--input type="text" align="center" value="" color="red" id="verify" name="verify" readonly /-->
											<input class="form-control" value="" type="text" id="verify" name="verify" readonly />
											<!--?php
											if($_POST['status'] == "Open")
												{
													echo "<input type=text value='On Progress' name='verify'/>";
												}
												else
												{
													echo "<input type=text value='Checking' name='verify'/>";
												}
											?>
											<!--input class="form-control" type="text" id="verify" name="verify" required /-->
											<!--input type="text" class="form-control" name="verify" id="verify"/-->
											
					</div>
                </div>
				
			</div>
			</div>
				<input type="submit" value="Submit" name="save">
			</div>
			</div>
			
			</div>
			</div>
			</form>
			</div>
			</div>
			</div>
			</div>
			</div>
			
			<?php
			include "koneksi.php";
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
			
			if($_POST['status'] == "Open")
			{
				echo "<input type=text value='On Progress' name='verify'/>";
			}
			else
			{
				echo "<input type=text value='Checking' name='verify'/>";
			}
			
			  // Simpan ke Database
			$sql = "insert into sheet_em (title, date1, gambar1, keterangan1, date2, gambar2, keterangan2, status, verify, effects, location, pic) values ('".$_POST['title']."','".$_POST['date1']."','$fileName1','".$_POST['keterangan1']."','".$_POST['date2']."','$fileName2','".$_POST['keterangan2']."','".$_POST['status']."','".$_POST['verify']."','$selected_effects','".$_POST['location']."','".$_POST['pic']."')"; 
			echo "<script>alert ('Input Data Saved !'); document.location='user-list.php' </script> ";

			mysql_query($sql);
			  // Simpan di Folder Gambar
			  move_uploaded_file($_FILES['gambar1']['tmp_name'], "gambar1/".$_FILES['gambar1']['name']);
			  move_uploaded_file($_FILES['gambar2']['tmp_name'], "gambar2/".$_FILES['gambar2']['name']);
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
