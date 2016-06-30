<?php include('akses-admin.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Data</title>
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
                <a class="navbar-brand" href="#">PAMIT Apps</a> 
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
                    <img src="assets/img/logo_pt.jpg" class="user-image img-responsive"/>
					</li>
				    
                   	<li>
                        <a  href="admin-input.php"><i class="fa fa-edit fa-3x"></i>Tambah Data</a>
                    </li>					
                    <li  >
                        <a href="admin-list.php"><i class="fa fa-table fa-3x"></i> List Data</a>
                    </li>
					<li>
                        <a class="active-menu" href="admin-view-list.php"><i class="fa fa-desktop fa-3x"></i> Lihat Data</a>
                    </li>
					<li>
                        <a href="admin-user.php"><i class="fa fa-sitemap fa-3x"></i>Data Pengguna</a> 
                    </li>				
               </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>User Data</h2>   
                        <h5>PT XYZ </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                <hr />
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="memberModalLabel">PAMIT Support Sheet</h4>
						</div>
						<div class="ct">
					  
						</div>

					</div>
				</div>
			</div>
     		<br>
		<a href="admin-add-user.php" class="btn btn-primary"><i class="fa fa-edit "></i> Tambah Pengguna </a>
		<br><br>
            <div class="row">
                <div class="col-md-12">
                    <!-- Table Data -->
					
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data PAMIT Support Sheet
                        </div>
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
                        <div class="panel-body">
						<!--form action="" method="get">
							<div class="form-group input-group">
									<input type="text" name="search" id="search" placeholder="Search ..." class="form-control">
									<span class="input-group-btn">
										<button class="btn btn-default" type="Submit"><i class="fa fa-search"></i>
										</button>
									</span>
							</div>
						</form-->						

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
											<th>ID </th>
                                            <th>Nama Pengguna</th>
											<th>Nama Depan</th>
											<th>Email</th>	
											<th>Level</th>
											<th>Aksi</th>

                                        </tr>
                                    </thead>
									<tbody>
										<?php
											include 'koneksi.php';
												if(isset($_GET['search'])){
													$search=$_GET['search'];
													$a=mysql_query("Select id, DATE_FORMAT(date1, '%d-%m-%Y') as tanggal1, DATE_FORMAT(date2, '%d-%m-%Y') as tanggal2, title, status, verify from sheet_em where title like '%$search%' or keterangan1 like '%$search%' or keterangan2 like '%$search%' or status like '%$search%' or effects like '%$search%' or pic like '%$search%' or location like '%$search%' order by id");
												}else{
													$a=mysql_query("Select id, username, password, nama, email, level from user_em order by id");
												}
												$no=1;
												while($b=mysql_fetch_array($a)){
										?>
												<tr>
													<td><?php echo $b['id'];?></td>
													<td><?php echo $b['username'] ?></td>
													<td><?php echo $b['nama']?></td>
													<td><?php echo $b['email']?></td>
													<td><?php 
														if($b['level'] == 1) {
															echo "Admin";
														} else {
															echo "User";
														} ?></td>
													<td align="center">
														<a href="admin-edit-user.php?id=<?php echo $b['id'] ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Ubah</button></a>
														<a href="hapus-user.php?id=<?php echo $b['id'] ?>" onclick="return confirm('Are you sure to DELETE this record ?')"><button class="btn btn-danger"><i class="fa fa-pencil"></i> Hapus</button></a>
														<!-- <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="< ?php echo $b['id']; ?>">Lihat</a></td-->
													</td>
												</tr>
										<?php
											}
										?>
                                        
                                    </tbody>
                                </table>
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
