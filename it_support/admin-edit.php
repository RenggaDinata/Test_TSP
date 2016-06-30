<?php include('akses-admin.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XYZ Apps</title>
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
				    
                   	<li  >
                        <a class="active-menu" href="admin-input.php"><i class="fa fa-edit fa-3x"></i>Tambah Data</a>
                    </li>					
                    <li  >
                        <a href="admin-list.php"><i class="fa fa-table fa-3x"></i> List Data</a>
                    </li>
					<li>
                        <a href="admin-view-list.php"><i class="fa fa-desktop fa-3x"></i> Lihat Data</a>
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
                     <h2>Form Edit</h2>   
                        <h5>PT XYZ</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
				
				
               <div class="row">
                
				<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Support Sheet
                        </div>
						<form role="form" id="my_form" action="admin-update.php" method="post" enctype="multipart/form-data"><?php
						include ('koneksi.php');
						$edit=mysql_query("select sheet_em.id, sheet_em.title, sheet_em.date1, sheet_em.gambar1, sheet_em.keterangan1, sheet_em.date2, sheet_em.gambar2, sheet_em.keterangan2, sheet_em.status, sheet_em.verify, sheet_em.effects, sheet_em.location, sheet_em.pic, user_em.nama from sheet_em, user_em where sheet_em.pic=user_em.id and sheet_em.id='$_GET[id]'");
						$e=mysql_fetch_array($edit); ?>
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
											<select name="pic" class="form-control" required >
												<?php 
													echo '<option value='.$e['pic'].' style=display:none; >'.$e['nama'].'</option>';
												?>
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
                                            <!--input class="form-control" type="text" name="pic-nama" < ?php echo "value='$e[nama]'"; ?> placeholder="Please insert PIC name" required />
											<input class="form-control" type="hidden" name="pic" < ?php echo "value='$e[pic]'"; ?> placeholder="Please insert PIC name" required /-->
                                     
									 </div>
									 <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" onChange="changetextbox();" class="form-control">
                                                <option value="open" >Dimulai</option>
                                                <option value="closed" >Ditutup</option>
                                            </select>
                                        </div>
										<script type="text/javascript">
										function changetextbox()
										{
											if(document.getElementById("status").value == "open") {
												
												document.getElementById("gambar2").readonly='true';
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
											<input type="file" name="gambar1"/>
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
                            Setelah Diperbaiki
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
											<input id="gambar2" type="file" readonly="readonly" name="gambar2" />
                                        </div>
										
                                        <div class="form-group">
                                            <label>Solusi</label><br>
                                            <textarea class="form-control" disabled="disabled" name="keterangan2" id="keterangan2" rows="3"><?php echo "$e[keterangan2]"; ?></textarea>
                                        </div> 
										
									<p>
						</div>
                        <div class="panel-footer">
                            Setelah Diperbaiki
                        </div>
                    </div>
                </div>
				
				<div class="col-md-6">
                                                                  
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
			<div class="col-md-6">
					<div class="form-group">
											<br>
											<label>Verifikasi : </label>
											<br>
											<select name="verify" id="status" class="form-control" required>
												<?php 
													echo '<option value='.$e['verify'].' style=display:none; >'.$e['verify'].'</option>';
												?>
                                                <option value="On Progress">Menunggu Antrian</option>
                                                <option value="Checking">Dalam Proses Perbaikan</option>
												<option value="Completed">Selesai Diperbaiki</option>
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