        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?=base_url('/assets/code/index.html/')?>">AMTBLK </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="<?=base_url('/assets/code/#/')?>" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo $this->session->userdata('identity');?>
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
                                <li class="active"><a href="<?=site_url('/C_Data_Barang/back/')?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages1/')?>"><i class="fa fa-cube" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Permintaan Barang </a>
                                    <ul id="togglePages1" class="collapse unstyled">
                                        <li><a href="<?=site_url('/C_Data_Barang/permintaan_barang/')?>"><i class="icon-inbox"></i>Lihat Permintaan Barang</a></li>
                                    </ul>
                                </li>
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages2/')?>"><i class="fa fa-cubes" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Data Barang </a>
                                    <ul id="togglePages2" class="collapse unstyled">
                                        <li><a href="<?=site_url('/C_Data_Barang/')?>"><i class="icon-inbox"></i>Lihat Data Barang </a></li>
                                    </ul>
                                </li>
								
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages3/')?>"><i class="fa fa-exchange" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Pengeluaran Barang </a>
                                    <ul id="togglePages3" class="collapse unstyled">
                                        <li><a href="<?=site_url('/C_Data_Barang_Keluar/')?>"><i class="icon-inbox"></i>Data Barang Keluar </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages5/')?>"><i class="fa fa-briefcase" aria-hidden="true">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp &nbsp Penerimaan Barang </a>
                                    <ul id="togglePages5" class="collapse unstyled">
                                        <li><a href="<?=site_url('/C_Penerimaan_Barang/')?>"><i class="icon-inbox"></i>Data Barang Masuk </a></li>
                                    </ul>
                                </li>
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
										<div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Form Penggantian Barang Petugas</div>
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
								<div class="panel-body">
												<p>Silahkan Isi Data Dibawah Ini.<?php
													echo validation_errors();
												  ?></p>
											  
												<form role="form" class="form-horizontal" method="POST" role="form" class="form-horizontal" action="<?php echo base_url();?>C_Data_Barang/tambah/">
												<div class="form-group">
													<label for="KODEBARCODE" class="control-label col-sm-3">Nama Barang	:</label>
													<div class="col-sm-5">
													<?php
													$setting_KODEBARCODE='class="form-control input-sm" id="KODEBARCODE" onChange="tampilBarang()"';
													echo form_dropdown('KODEBARCODE',$KODEBARCODE,'',$setting_KODEBARCODE);
													?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="NAMA_BARANG" class="control-label col-sm-3">Kode	:</label>
													<div class="col-sm-4" type="hidden">
														<?php
														$setting_NAMA_BARANG='class="form-control input-sm" id="NAMA_BARANG" type="hidden"';
														echo form_dropdown('NAMA_BARANG',array('Pilih Barang'=>'- Pilih Barang -'),'',$setting_NAMA_BARANG);
														?>
													</div>
												</div>
												
												<div class="form-group">

												 <label for="STATUS_BARANG" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_STATUS_BARANG=array('type'=>'hidden','name'=>'STATUS_BARANG','class'=>'form-control input-sm','placeholder'=>'STATUS_BARANG','value'=>'Keluar');
													echo form_input($setting_STATUS_BARANG);
													?>
													</div>
												</div>
												<div class="form-group">
												</br>
												 <label for="TANGGAL_TERIMA" class="control-label col-sm-3">Tanggal Masuk:</label>
													<div class="col-sm-3">
													<?php
													$setting_TANGGAL_TERIMA=array('type'=>'date','name'=>'TANGGAL_TERIMA','class'=>'form-control input-sm','placeholder'=>'TANGGAL_TERIMA');
													echo form_input($setting_TANGGAL_TERIMA);
													?>
													</div>
												</div>
												<div class="form-group">
												</br>
												 <label for="JUMLAH_BARANG" class="control-label col-sm-3">Jumlah Barang ini :</label>
													<div class="col-sm-3">
													<?php
													$setting_JUMLAH_BARANG=array('type'=>'text','name'=>'JUMLAH_BARANG','class'=>'form-control input-sm','placeholder'=>'JUMLAH_BARANG');
													echo form_input($setting_JUMLAH_BARANG);
													?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="varchar" class="control-label col-sm-3">SATUAN	: <?php echo form_error('SATUAN') ?></label>
													<select name="SATUAN">
													  <option value="Botol">Botol</option>
													  <option value="Pcs">Pcs</option>
													  <option value="Biji">Biji</option>
													</select>
													<!--<input type="text" class="form-control" name="LOKASI" id="LOKASI" placeholder="LOKASI" value="<?php echo $LOKASI; ?>" />-->
												</div>
												</br>
												</br>
												<div class="form-group">
													<label for="varchar" class="control-label col-sm-3">LOKASI :<?php echo form_error('LOKASI') ?></label>
													<select name="LOKASI">
													  <option value="Ruang CS">Ruang CS</option>
													  <option value="Ruang Security">Ruang Security</option>
													</select>
													<!--<input type="text" class="form-control" name="LOKASI" id="LOKASI" placeholder="LOKASI" value="<?php echo $LOKASI; ?>" />-->
												</div>
												<div class="form-group">

												 <label for="TANGGAL_KELUAR" class="control-label col-sm-3"></label>
													<div class="col-sm-3">
													<?php
													$setting_TANGGAL_KELUAR=array('type'=>'hidden','name'=>'TANGGAL_KELUAR','class'=>'form-control input-sm','placeholder'=>'TANGGAL_KELUAR');
													echo form_input($setting_TANGGAL_KELUAR);
													?>
													</div>
												</div>
												</br>
												<div class="form-group">
													<label for="varchar" class="control-label col-sm-3">Untuk Bagian :</label>
													<div class="col-sm-4">
														<?php
															$setting_user='class="form-control" id="USER_GROUP"';
															echo form_dropdown('USER_GROUP',$USER_GROUP,'',$setting_user);
															//echo form_dropdown('USER_GROUP',array('Pilih tugas'=>'- Pilih tugas -'),'',$setting_user);
														?>
													</div>
												</div>
												<div class="form-group">
												</br>
												 <label for="KONDISI" class="control-label col-sm-3">Kondisi:</label>
													<div class="col-sm-3">
													<?php
													$setting_KONDISI=array('type'=>'text','name'=>'KONDISI','class'=>'form-control input-sm','placeholder'=>'KONDISI', 'value'=>'Bagus', 'readonly'=>'readonly');
													echo form_input($setting_KONDISI);
													?>
													</div>
													</br>
													</br>
													<div class="col-sm-1"><button type="text" class="btn btn-primary btn-sm">Simpan</button></div>
												</div>
											</form>
										</div>
										<script src="<?php echo base_url();?>dist/js/jquery-2.1.1.js"></script>
										<script>
										 function tampilBarang()
										 {
											 kdBarang = document.getElementById("KODEBARCODE").value;
											 $.ajax({
												 url:"<?php echo  base_url();?>C_Data_Barang/pilih_barang/"+kdBarang+"",
												 success: function(response){
												 $("#NAMA_BARANG").html(response);
												 },
												 dataType:"html"
											 });
											 return false;
										 }

										</script>
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