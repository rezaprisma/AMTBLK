      	  
		  <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?=base_url('/assets/code/index.html/')?>">AMTBLK </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="<?=base_url('/assets/code/#/')?>" class="dropdown-toggle" data-toggle="dropdown">
                                HI, <?php echo $this->session->userdata('identity');?>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Edit Profile</a></li>
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
                                        <li><a href="<?=site_url('/c_kepegawaian/list_ACC/')?>"><i class="icon-inbox"></i>Data Laporan Pantauan Petugas CS</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/ACC/')?>"><i class="icon-inbox"></i>ACC Laporan Petugas CS</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan2/')?>"><i class="icon-inbox"></i>Pembagian Tugas </a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/tugas_tambahan2/')?>"><i class="icon-inbox"></i>Tugas Tambahan </a></li>
                                    </ul>
                                </li>
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages3/')?>"><i class="fa fa-pagelines" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Pantauan Petugas Kebun</a>
                                    <ul id="togglePages3" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_kepegawaian/list_ACC_kebun/')?>"><i class="icon-inbox"></i>Data Laporan Pantauan Petugas Kebun</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/ACC_kebun/')?>"><i class="icon-inbox"></i>ACC Laporan Petugas Kebun</a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan1/')?>"><i class="icon-inbox"></i>Pembagian Tugas </a></li>
                                        <li><a href="<?=site_url('/c_kepegawaian/tugas_tambahan1/')?>"><i class="icon-inbox"></i>Tugas Tambahan </a></li>
                                    </ul>
                                </li>
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages4/')?>"><i class="fa fa-shield" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Pantauan Petugas Security</a>
                                    <ul id="togglePages4" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_kepegawaian/laporan3/')?>"><i class="icon-inbox"></i>Data Laporan Kejadian</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="<?=site_url('/c_kepegawaian/tampil/')?>"><i class="menu-icon icon-book"></i>Data User </a></li>
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages2/')?>"><i class="fa fa-sitemap" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp; &nbsp; Master Ruangan</a>
                                    <ul id="togglePages2" class="collapse unstyled">
                                        <li><a href="<?=site_url('/c_master_ruangan/index/')?>"><i class="icon-inbox"></i>Tambah Ruangan</a></li>
                                        <li><a href="<?=site_url('/c_master_fasilitas/index/')?>"><i class="icon-inbox"></i>Tambah Fasilitas</a></li>
                                        <li><a href="<?=site_url('/c_master_tugas/index/')?>"><i class="icon-inbox"></i>Tambah Tugas </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
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
										<div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>INPUT PENUGASAN CS</div>
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
											&nbsp;|&nbsp;			   
										</div>
									</div>
                                </div>
								<div class="module-body">
										<div class="panel-body">
												<p>Masukan data tugas pada form dibawah ini.<?php
											echo validation_errors();
												  ?></p>
											  
												<form role="form" class="form-horizontal" method="POST" role="form" class="form-horizontal" action="<?php echo base_url();?>c_kepegawaian/tambah/">
												<div class="form-group">

												 <label for="id_laporan" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_id_laporan=array('type'=>'hidden','name'=>'id_laporan','class'=>'form-control input-sm','placeholder'=>'id_laporan');
													echo form_input($setting_id_laporan);
													?>
													</div>
												</div>
												
												</br>
												<div class="form-group">
													<label for="NIK" class="control-label col-sm-3">Nama Pegawai</label>
													<div class="col-sm-5">
													<?php
													$setting_last_name='class="form-control input-sm" id="last_name" onChange="tampilNIK()"';
													echo form_dropdown('last_name',$last_name,'',$setting_last_name);
													?>
													</div>
												</div>
												<div class="form-group">
													<label for="user_group" type="hidden" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_user_group=array('type'=>'hidden','name'=>'user_group','class'=>'form-control input-sm','placeholder'=>'user_group','size'=>'4', 'value'=>'CS');
													echo form_input($setting_user_group);
													?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="master_ruangan" class="control-label col-sm-3">NIK</label>
													<div class="col-sm-4">
														<?php
														$setting_NIK='class="form-control input-sm" id="NIK"';
														echo form_dropdown('NIK',array('Pilih last name'=>'- Pilih last name -'),'',$setting_NIK);
														?>
													</div>
												</div>
												<div class="form-group">
													<label for="date_lplk" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_date_lplk=array('type'=>'hidden','name'=>'date_lplk','class'=>'form-control input-sm','placeholder'=>'date_lplk','size'=>'4');
													date_default_timezone_set("Asia/Jakarta"); echo form_input($setting_date_lplk, date('m-d-Y'));
													?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="jam_lplk" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_jam_lplk=array('type'=>'hidden','name'=>'jam_lplk','class'=>'form-control input-sm','placeholder'=>'jam_lplk','size'=>'4');
													date_default_timezone_set("Asia/Jakarta"); echo form_input($setting_jam_lplk, date('H:i:s'));
													?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="master_ruangan" class="control-label col-sm-3">Ruangan</label>
													<div class="col-sm-4">
													<?php
													$style_ruangan='class="form-control input-sm" id="id_ruangan"  onChange="tampilFasilitas()"';
													echo form_dropdown('id_ruangan',$ruangan,'',$style_ruangan);
													?>
												</div>
												</div>
												</br>
												<div class="form-group">
													<label for="master_ruangan" class="control-label col-sm-3">FASILITAS</label>
													<div class="col-sm-4">
														<?php
														$style_fasilitas='class="form-control input-sm" id="id_fasilitas"  onChange="tampilTugas()"';
														echo form_dropdown('id_fasilitas',array('Pilih Fasilitas'=>'- Pilih Fasilitas -'),'',$style_fasilitas);
														?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="master_ruangan" class="control-label col-sm-3">TUGAS</label>
													<div class="col-sm-4">
														<?php
														$style_tugas='class="form-control input-sm" id="id_tugas"';
														echo form_dropdown('id_tugas',array('Pilih tugas'=>'- Pilih tugas -'),'',$style_tugas);
														?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="status_penugasan" class="control-label col-sm-3"> </label>
													<div class="col-sm-5">
													<?php
													$setting_status_penugasan=array('type'=>'hidden','name'=>'status_penugasan','class'=>'form-control input-sm','placeholder'=>'status_penugasan', 'value'=>'Belum Dikerjakan');
													echo form_input($setting_status_penugasan);
													?>
													</div>
												</div>
												<div class="form-group">
													<label for="status_acc" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_status_acc=array('type'=>'hidden','name'=>'status_acc','class'=>'form-control input-sm','placeholder'=>'status_acc','size'=>'4', 'value'=>'Belum ACC');
													echo form_input($setting_status_acc);
													?>
													</div>
												</div>
												<div class="form-group">
													<label for="keterangan_tugas" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_status_keterangan=array('type'=>'hidden','name'=>'keterangan_tugas','class'=>'form-control input-sm','placeholder'=>'keterangan_tugas','size'=>'4', 'value'=>'Tugas Rutin');
													echo form_input($setting_status_keterangan);
													?>
													</div>
													</br>
													<div class="col-sm-1"><button type="text" class="btn btn-primary btn-sm">Simpan</button></div>
												</div>
												
												
											</form>
										</div>
										 
										<script src="<?php echo base_url();?>dist/js/jquery-2.1.1.js"></script>
										<script>
										function tampilFasilitas()
										 {
											 kdfasilitas = document.getElementById("id_ruangan").value;
											 $.ajax({
												 url:"<?php echo base_url();?>c_kepegawaian/pilih_fasilitas/"+kdfasilitas+"",
												 success: function(response){
												 $("#id_fasilitas").html(response);
												 },
												 dataType:"html"
											 });
											 return false;
										 }
										 
										 function tampilTugas()
										 {
											 kdtugas = document.getElementById("id_fasilitas").value;
											 $.ajax({
												 url:"<?php echo  base_url();?>c_kepegawaian/pilih_tugas/"+kdtugas+"",
												 success: function(response){
												 $("#id_tugas").html(response);
												 },
												 dataType:"html"
											 });
											 return false;
										 }
										 function tampilNIK()
										 {
											 kdName = document.getElementById("last_name").value;
											 $.ajax({
												 url:"<?php echo  base_url();?>c_kepegawaian/pilih_NIK/"+kdName+"",
												 success: function(response){
												 $("#NIK").html(response);
												 },
												 dataType:"html"
											 });
											 return false;
										 }

										</script>
								   
                                </div>
								
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