﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PAMIT Improvement Sheet</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
   
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- Button Alert -->
	<link href="assets/css/button.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/button2.css" rel="stylesheet" type="text/css" />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
  
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo_pt.jpg" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="it_support/"><i class="fa fa-desktop fa-3x"></i>IT Support</a>
                    </li>		
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Project Administration Monitoring IT</h2>   
                        <h5>PT XYZ - Semarang </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                <hr />
				
				        <div class="row">                     
                      
                    
                    
				</div>
				 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
					<!-- JQUERY SCRIPTS -->
					<script src="assets/js/jquery-1.10.2.js"></script>
					  <!-- BOOTSTRAP SCRIPTS -->
					<script src="assets/js/bootstrap.min.js"></script>
					<!-- METISMENU SCRIPTS -->
					<script src="assets/js/jquery.metisMenu.js"></script>
				 <!-- MORRIS CHART SCRIPTS -->
					<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
					<script src="assets/js/morris/morris.js"></script>
					<script type="text/javascript">
					(function ($) {
						"use strict";
						var mainApp = {

						main_fun: function () {
							/*====================================
							METIS MENU 
							======================================*/
							$('#main-menu').metisMenu();

							/*====================================
							  LOAD APPROPRIATE MENU BAR
						   ======================================*/
							$(window).bind("load resize", function () {
								if ($(this).width() < 768) {
									$('div.sidebar-collapse').addClass('collapse')
								} else {
									$('div.sidebar-collapse').removeClass('collapse')
								}
							});

							
						/*====================================
						  MORRIS DONUT CHART EM
						======================================*/
							<?php include ('it_support/koneksi.php');
								$query1=mysql_query("Select Count(Status) as open From sheet_em where status='open'");
								$openem=mysql_fetch_array($query1);
								$query2=mysql_query("Select Count(Status) as close From sheet_em where status='closed'");
								$closeem=mysql_fetch_array($query2);
							?>
							Morris.Donut({
								element: 'morris-donut-chart',
								data: [{
									label: "Open Status",
									value: <?php echo $openem['open'];?>
								}, {
									label: "Closed Status",
									value: <?php echo $closeem['close'];?>
								}],
								resize: true
							});

						/*====================================
						MORRIS DONUT CHART WM
						======================================*/
							<?php include ('ehs_wm/koneksi.php');
								$query3=mysql_query("Select Count(Status) as open From sheet_wm where status='open'");
								$openwm=mysql_fetch_array($query3);
								$query4=mysql_query("Select Count(Status) as close From sheet_wm where status='closed'");
								$closewm=mysql_fetch_array($query4);
							?>
							Morris.Donut({
								element: 'morris-donut-chart2',
								data: [{
									label: "Closed Status",
									value: <?php echo $closewm['close'];?>
								}, {
									label: "Open Status",
									value: <?php echo $openwm['open'];?>
								}],
								resize: true
							});
						   
					 
						},

						initialization: function () {
							mainApp.main_fun();

						}

					}
					// Initializing ///

					$(document).ready(function () {
						mainApp.main_fun();
					});

				}(jQuery));
				   </script>
	
				
			<div class="row">
                <div class="col-md-12">
					<div class="panel panel-primary">
                        <div class="panel-heading">
                            Data PAMIT Improvement Sheet
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="em">
                                    <h4>IT Support</h4>
                                    <p>
										
									<div class="panel panel-default">
									<div class="panel-heading">
										 Data Improvement Sheet IT Support
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
							
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
									<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="memberModalLabel">PAMIT Improvement Sheet</h4>
										</div>
									<div class="ct">
								  
									</div>

									</div>
									</div>
									</div>
							
								<div class="panel-body">
									<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>ID Pekerjaan </th>
											<th>Tanggal Mulai </th>
											<th>Tanggal Selesai </th>
											<th width='100px' align='center'>Judul</th>	
											<th>PIC </th>
											<th>Status </th>
											<th>Waktu </th>
											<th>Verifikasi </th>
										</tr>
                                    </thead>
										<tbody>
														<?php
															include 'it_support/koneksi.php';
																$a=mysql_query("Select sheet_em.id, DATE_FORMAT(sheet_em.date1, '%d-%m-%Y') as tanggal1, DATE_FORMAT(sheet_em.date2, '%d-%m-%Y') as tanggal2, sheet_em.title, user_em.nama, sheet_em.status, sheet_em.verify from sheet_em, user_em where sheet_em.pic = user_em.id order by id");
																$no=1;
																while($b=mysql_fetch_array($a)){
														?>
																<tr>
																	<?php  	$tahun = $b['tanggal1'];
																			$thn = substr($tahun,6,4);
																	?>
																	<td><?php echo $b['id'];
																		echo "-";
																		echo $thn;?></td>
																	<td><?php echo $b['tanggal1'] ?></td>
																	<td><?php echo $b['tanggal2'] ?></td>
																	<td><?php echo $b['title'] ?></td>
																	<td><?php echo $b['nama'] ?></td>
																	<td align="center">
																	<?php 
																	$status=$b['status'];
																	if($status == "open")
																	{
																		echo "<a class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-whatever='$b[id]'>". $status ."</a>";
																	}
																	else
																	{
																		echo "<a class='btn btn-success' data-toggle='modal' data-target='#exampleModal' data-whatever='$b[id]'>". $status ."</a>";
																	}
																	?></td>
																	<td align="center"> 
																	<?php
																	 date_default_timezone_set('Asia/Jakarta');
																	 $now = time(); // or your date as well
																	 $your_date = strtotime($b['tanggal2']);
																	 $remaining =  $your_date - $now;
																	 $days_remaining = floor($remaining / 86400);
																	 $hitung=$days_remaining+1;
																	 if($status == "closed")
																	 {
																		 echo "<a class='btn btn-success' href='view-em.php?id=$b[id]'> Finished </a>";
																	 }
																	 else
																	 {
																		if($hitung == 0 )
																		{
																			echo"<a class='button' href='view-em.php?id=$b[id]'>Today !</a>";
																
																		}
																		elseif($hitung <= 0 )
																			{
																			echo"<a class='button' href='view-em.php?id=$b[id]'>Late ". $hitung ." days </a>";
																		
																			//echo"<a class='button' href='admin-edit.php?id=$b[id]'>Today !</a>";
																			}
																		else
																		{
																			echo "<a class='button2' href='view-em.php?id=$b[id]'>". $hitung ." days again </a> ";
																		}
																	 }
															
																	?>
																	</td>
																	<td align="center">
																	<?php
																	$verify=$b['verify'];
																	if($verify == "On Progress")
																	{
																		echo "<a class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-whatever='$b[id]'>On Progress</a>";
																	}
																	else if($verify == "Checking") 
																	{
																		echo "<a class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-whatever='$b[id]'>Checking</a>";
																	}
																	else
																	{
																		echo "<a class='btn btn-success' data-toggle='modal' data-target='#exampleModal' data-whatever='$b[id]'>Completed</a>";
																	}
																	?>
																</tr>
														<?php
															}
														?>
														
										</tbody>
									</table>
								</div>
                            
							</div>
						
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
										url: "view-modal-em.php",
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
						
							<!--End Advanced Tables -->
					</div>
									
								</p>
							
                                </div>
                                
                           </div>
                        </div>
                    </div>
        
				</div>
			</div>
				
			
              


			
			</div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
            <div class="row">
           



		   </div>
                <!-- /. ROW  -->
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
	 <script>
            $(document).ready(function () {
                $('#dataTables-example1').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
