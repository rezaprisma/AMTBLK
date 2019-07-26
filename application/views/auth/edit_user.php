<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AMTBLK</title>
		 <title>AMTBLK</title>	
        <meta name="description" content="AMTBLK">
		<meta name="author" content="REZA PRISMA NURANI">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="<?=base_url('/assets/tampilan/images/logcil.png/')?>" rel="icon" type="image">
        <link type="text/css" href="<?=base_url('/assets/code/bootstrap/css/bootstrap.min.css/')?>" rel="stylesheet">
        <link type="text/css" href="<?=base_url('/assets/code/bootstrap/css/bootstrap-responsive.min.css/')?>" rel="stylesheet">
        <link type="text/css" href="<?=base_url('/assets/code/css/theme.css/')?>" rel="stylesheet">
        <link type="text/css" href="<?=base_url('/assets/code/images/icons/css/font-awesome.css/')?>" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
			
		
		<!--	<link href="<?=base_url('/assets/tampilan/bootstrap/css/background.css/')?>" rel="stylesheet" media="screen"> -->
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/bootstrap.min.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/bootstrap-responsive.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/font-awesome.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/font-awesome-4.1.0/css/font-awesome.min.css/')?>" rel="stylesheet" type="text/css">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/my_style.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/print.css/')?>" rel="stylesheet" media="print">			
			<link href="<?=base_url('/assets/tampilan/vendors/easypiechart/jquery.easy-pie-chart.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/assets/styles.css/')?>" rel="stylesheet" media="screen">				
		    <link href="<?=base_url('/assets/tampilan/bootstrap/css/bootstrap.min1.css/')?>" rel="stylesheet" media="screen">
		    <link href="<?=base_url('/assets/tampilan/bootstrap/css/sb_admin.css/')?>" rel="stylesheet" media="screen">	
			
		<script src="<?php echo base_url('/assets/tampilan/bootstrap/js/html5.js/')?>"></script>
		<link href="<?=base_url('/assets/tampilan/vendors/fullcalendar/fullcalendar.css/')?>" rel="stylesheet" media="screen">
		<script src="<?php echo base_url('/assets/tampilan/vendors/jquery-1.9.1.min.js/')?>"></script>
        <script src="<?php echo base_url('/assets/tampilan/vendors/modernizr-2.6.2-respond-1.1.0.min.js/')?>"></script>
		<!-- data table -->
		<link href="<?=base_url('/assets/tampilan/assets/DT_bootstrap.css/')?>" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="<?=base_url('/assets/tampilan/vendors/jGrowl/jquery.jgrowl.css/')?>" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/tampilan/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css/')?>"></link>
		
	
		<script src="<?php echo base_url('/assets/tampilan/vendors/jGrowl/jquery.jgrowl.js/')?>"></script>	
    </head>
    <body>


  <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?=base_url('/assets/code/index.html/')?>">AMTBLK </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class=""><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-envelope"></i></a></li>
                            <li class="nav-user dropdown"><a href="<?=base_url('/assets/code/#/')?>" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url('/assets/code/images/user.png/')?>" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Your Profile</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Edit Profile</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Account Settings</a></li>
                                    <li class="divider"></li>
									<li>
										<a href="<?php echo site_url('Auth/logout');?>"><i class="icon_key_alt"></i> Log Out</a>
									</li>
									
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?=site_url('/c_kepegawaian/back/')?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages1/')?>"><i class="menu-icon icon-user">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Pantauan Petugas CS</a>
                                    <ul id="togglePages1" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan2/')?>"><i class="icon-inbox"></i>Data Laporan Pantauan Petugas CS</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/ACC/')?>"><i class="icon-inbox"></i>ACC Laporan Petugas CS</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan2/')?>"><i class="icon-inbox"></i>Pembagian Tugas </a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/tugas_tambahan/')?>"><i class="icon-inbox"></i>Tugas Tambahan </a></li>
                                    </ul>
                                </li>
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages3/')?>"><i class="fa fa-pagelines" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Pantauan Petugas Kebun</a>
                                    <ul id="togglePages3" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan1/')?>"><i class="icon-inbox"></i>Data Laporan Pantauan Petugas Kebun</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/ACC/')?>"><i class="icon-inbox"></i>ACC Laporan Petugas Kebun</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan1/')?>"><i class="icon-inbox"></i>Pembagian Tugas </a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/tugas_tambahan1/')?>"><i class="icon-inbox"></i>Tugas Tambahan </a></li>
                                    </ul>
                                </li>
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages4/')?>"><i class="fa fa-shield" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Pantauan Petugas Security</a>
                                    <ul id="togglePages4" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan3/')?>"><i class="icon-inbox"></i>Data Laporan Kejadian</a></li>
                                        <li><a href="<?=base_url('/assets/code/other-user-profile.html/')?>"><i class="icon-inbox"></i>Tugas Tambahan </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="<?=site_url('/c_kepegawaian/tampil/')?>"><i class="menu-icon icon-book"></i>Data User </a></li>
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages2/')?>"><i class="fa fa-sitemap" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Master Ruangan</a>
                                    <ul id="togglePages2" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_master_ruangan/index/')?>"><i class="icon-inbox"></i>Tambah Ruangan</a></li>
                                        <li><a href="<?=site_url('/c_master_fasilitas/index/')?>"><i class="icon-inbox"></i>Tambah Fasilitas</a></li>
                                        <li><a href="<?=site_url('/c_master_tugas/index/')?>"><i class="icon-inbox"></i>Tambah Tugas </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
								 <li><a href="<?=base_url('/assets/code/form.html/')?>"><i class="menu-icon icon-paste"></i>Notifikasi</a></li>
                                <li><a href="<?php echo site_url('Auth/logout');?>"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp &nbsp Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            
                            <!--/#btn-controls-->
                            <div class="module">
                                <div class="module-head">
                                    <div class="navbar navbar-inner block-header">
										<div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Dashboard Data Number</div>
										<div class="muted pull-right"><i class="icon-time"></i>&nbsp;
											<span id=tick2>			
												<script>
													function show2(){
													if (!document.all&&!document.getElementById)
													return
													thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
													var Digital=new Date()
													var hours=Digital.getHours()
													var minutes=Digital.getMinutes()
													var seconds=Digital.getSeconds()
													var dn="PM"
													if (hours<12)
													dn="AM"
													if (hours>12)
													hours=hours-12
													if (hours==0)
													hours=12
													if (minutes<=9)
													minutes="0"+minutes
													if (seconds<=9)
													seconds="0"+seconds
													var ctime=hours+":"+minutes+":"+seconds+" "+dn
													thelement.innerHTML=ctime
													setTimeout("show2()",1000)
													}
													window.onload=show2
													//-->
												</script>
											</span>
											&nbsp;|&nbsp;Today is
											Thursday, July 21st, 2016				   
										</div>
									</div>
                                </div>
								<div class="module-body">
									<h1><?php echo lang('edit_user_heading');?></h1>
									<p><?php echo lang('edit_user_subheading');?></p>

									<div id="infoMessage"><?php echo $message;?></div>

									<?php echo form_open(uri_string());?>

										  <p>
												<?php echo lang('edit_user_NIK_label', 'NIK');?> <br />
												<?php echo form_input($NIK);?>
										  </p>
										  <p>
												<?php echo lang('edit_user_fname_label', 'first_name');?> <br />
												<?php echo form_input($first_name);?>
										  </p>

										  <p>
												<?php echo lang('edit_user_lname_label', 'last_name');?> <br />
												<?php echo form_input($last_name);?>
										  </p>

										  <p>
												<?php echo lang('edit_user_company_label', 'company');?> <br />
												<?php echo form_input($company);?>
										  </p>

										  <p>
												<?php echo lang('edit_user_phone_label', 'phone');?> <br />
												<?php echo form_input($phone);?>
										  </p>

										  <p>
												<?php echo lang('edit_user_password_label', 'password');?> <br />
												<?php echo form_input($password);?>
										  </p>

										  <p>
												<?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
												<?php echo form_input($password_confirm);?>
										  </p>

										  <?php if ($this->ion_auth->is_admin()): ?>

											  <h3><?php echo lang('edit_user_groups_heading');?></h3>
											  <?php foreach ($groups as $group):?>
												  <label class="checkbox">
												  <?php
													  $gID=$group['id'];
													  $checked = null;
													  $item = null;
													  foreach($currentGroups as $grp) {
														  if ($gID == $grp->id) {
															  $checked= ' checked="checked"';
														  break;
														  }
													  }
												  ?>
												  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
												  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
												  </label>
											  <?php endforeach?>

										  <?php endif ?>

										  <?php echo form_hidden('id', $user->id);?>
										  <?php echo form_hidden($csrf); ?>

										  <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

									<?php echo form_close();?>
								</div>
								   
                                </div>
                            </div>
                            <!--/.module-->
                  
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
     <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2016 AMTBLK - Reza Prisma Nurani </b>All rights reserved.
            </div>
        </div>
        <script src="<?=base_url('/assets/code/scripts/jquery-1.9.1.min.js/')?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/code/scripts/jquery-ui-1.10.1.custom.min.js/')?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/code/bootstrap/js/bootstrap.min.js/')?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/code/scripts/flot/jquery.flot.js/')?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/code/scripts/flot/jquery.flot.resize.js/')?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/code/scripts/datatables/jquery.dataTables.js/')?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/code/scripts/common.js" type="text/javascript/')?>"></script>
      
    </body>