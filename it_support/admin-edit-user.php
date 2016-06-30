<?php include('akses-admin.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User Data</title>
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
                   	<li>
                        <a href="admin-input.php"><i class="fa fa-edit fa-3x"></i>Form Input</a>
                    </li>					
                    <li  >
                        <a href="admin-list.php"><i class="fa fa-table fa-3x"></i> List Data</a>
                    </li>
					<li>
                        <a href="admin-view-list.php"><i class="fa fa-desktop fa-3x"></i> View Data</a>
                    </li>
                    <li>
                        <a class="active-menu" href="admin-user.php"><i class="fa fa-sitemap fa-3x"></i>User Data</a> 
                    </li>					
               </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit User Data</h2>   
                        <h5>PT Mecoindo - Itron </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                <div class="panel panel-default">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Form Input Data User Auditor
                        </div>
                        <div class="panel-body">
						
						<?php
							include 'connect.php';
							?>
							<style>
								tbody > tr:nth-child(2n+1) > td, tbody > tr:nth-child(2n+1) > th {
									background-color: #ededed;
								}
								table{
									width: 70%;
									margin: auto;
									border-collapse: collapse;
									box-shadow: darkgrey 3px;
								}
								thead tr {
								background-color: #C66;
								}
							</style>
							 <div class="table-responsive">
								<?php
								include "koneksi.php";
									$id = $_GET['id'];
									$query = mysql_query("SELECT * FROM user_em where id ='$id'") or die (mysql_error());
									$data  = mysql_fetch_array($query);
									?>
								<form action="update_user.php" method="POST" name="edit" >
								<input type="hidden" name="id" value="<?php echo $id; ?>" />
								<table cellpadding="4" cellspacing="1" border="0" width="350">
								<tr>
								<td>Username</td>
								<td> : <input type="text" value="<?php echo $data['username']; ?>" name="username" size="50" maxlength="20" /></td></tr>
								<tr>
								<td>Password</td>
								<td> : <input  type="password" value="<?php echo $data['username']; ?>" name="password" size="50" maxlength="20"/></td>
								</tr>
								<tr>
								<td>Nama</td>
								<td> : <input type="text" value="<?php echo $data ['nama'];?>" name="nama" size="50" maxlength="30" /></td>
								</tr>
								<tr>
								<td>Email</td>
								<td> : <input type="text" value="<?php echo $data ['email'];?>" name="email" size="50" maxlength="30"/></td>
								</tr>
								<tr>
								<tr>
								<td>Level</td>
								<td> : 
									<select name="level" id="level" required>
												<?php 
												if($data['level']=="1")
												{
													echo '<option value='.$data['level'].' style=display:none; >Admin</option>';
												}else {
													echo '<option value='.$data['level'].' style=display:none; >User</option>';
												}	
												?>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                    </select>
								</td>
								</tr>
								<tr>
								<td></td>
								<td> : <input type="submit" name="input" value="Simpan" />
								<input type="reset" name="reset" value="Reset"/></td>

								</tr>
								</table>
								</form>

                            </div>
                       </div>
                        <div class="panel-footer">
                            PT Mecoindo-Itron
                        </div>
                    </div>
                </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
	
	 <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "view-modal.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
    </script>

    
   
</body>
</html>
