<?php include('akses-user.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ganti Password</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

		<link rel='stylesheet' type='text/css' href='stylesheet.css'/>
        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
        <script type='text/javascript' src='script.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>   

		<script type="text/javascript">

		function ButtonClicked()
		{
		   document.getElementById("formsubmitbutton").style.display = "none"; // to undisplay
		   document.getElementById("buttonreplacement").style.display = ""; // to display
		   return true;
		}
		var FirstLoading = true;
		function RestoreSubmitButton()
		{
		   if( FirstLoading )
		   {
			  FirstLoading = false;
			  return;
		   }
		   document.getElementById("formsubmitbutton").style.display = ""; // to display
		   document.getElementById("buttonreplacement").style.display = "none"; // to undisplay
		}
		// To disable restoring submit button, disable or delete next line.
		document.onfocus = RestoreSubmitButton;
		</script>

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
                <a class="navbar-brand" href="#">PAMIT Apps</a> 
            </div>
			<div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;"> <?php echo "Welcome|<strong>".$_SESSION['guest']."</strong>  "; ?> <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
       </nav>   
	  
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo_pt.jpg" class="user-image img-responsive"/>
					</li>
                   	<li>
                        <a  href="user-input.php"><i class="fa fa-edit fa-3x"></i>Tambah Data</a>
                    </li>					
                    <li>
                        <a  href="user-list.php"><i class="fa fa-table fa-3x"></i>List Data</a>
                    </li>
					<li>
                        <a  href="user-view-list.php"><i class="fa fa-desktop fa-3x"></i>Lihat Semua Data</a>
                    </li>
					<li>
                        <a  class="active-menu" href="user-settings.php"><i class="fa fa-qrcode fa-3x"></i>Ganti Password</a>
                    </li>					
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Akun Anda</h2>   
                        <h5>PT XYZ</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
				 
				<div class="panel panel-default">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ID Anda
                        </div>
						<div class="panel-body">
                    <!-- Form Elements -->
					<form id="formuser" name="formuser" method="post" action="changepassword.php">

					<div class="form-group">
						<label>Nama User Login</label>
						<?php
						$login=$_SESSION['guest'];
						include ('koneksi.php');
						$view=mysql_query("SELECT * FROM `user_em` WHERE username ='$login'");
						$v=mysql_fetch_array($view); 
						?>
                        <input class="form-control" <?php echo "value='$v[username]' name=name id=name;" ?> readonly />
						<input type="hidden" class="form-control" <?php echo "value='$v[id]' name=userid id=userid; " ?> />
						<input type="hidden" class="form-control" <?php echo "value='$v[id]' name=userid id=userid; " ?> />
                    </div>
				
					</div>
					</div>
					</div>
					
					<div class="panel panel-default">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ganti Password
                        </div>
						<div class="panel-body">
                    <!-- Form Elements -->
					
					<div class="form-group">
						<label>Password Sebelum</label>
						<!--input type="text" class="form-control" < ?php echo "value='$v[password]' name=passwordlama id=passwordlama "; ?> /-->
                        <input class="form-control" type="password" name="passwordlama" id="passwordlama" />
                    </div>
					<div class="form-group">
						<label>Password Baru</label>
                        <input class="form-control" type="password" name="passwordbaru" id="passwordbaru" />
                    </div
					<div class="form-group">
						<label>Konfirmasi Password Baru</label>
                        <input class="form-control" type="password" name="confirmpasswordbaru" id="confirmpasswordbaru" />
                    </div>
					<div id="formsubmitbutton" align="center">
						<input class="btn btn-primary" type="submit" onclick="ButtonClicked()" value="Change Password" name="save">
						<input class="btn btn-primary" type="reset"  value="Reset" name="reset">
					</div>
                    <div id="buttonreplacement" style="display:none;">
						<center>
						<img src="http://www.willmaster.com/images/preload.gif" alt="loading...">
						</center>
					</div>  
					</form>
					<div class="form-group">
					
                    </div>
					</div>
				
					</div>
					   
				
					</div>
                </div>					
                    						
                                                                   
    </div>
                                
                             
                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
    </div>
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