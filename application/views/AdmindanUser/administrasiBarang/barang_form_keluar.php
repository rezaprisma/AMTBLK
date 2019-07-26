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
										<div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Penggantian Barang.</div>
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
									<form action="<?php echo $action; ?>" method="post">
									<div class="form-group">
										<label for="varchar">KODE MERK <?php echo form_error('KODEBARCODE') ?></label>
										<input type="text" class="form-control" name="KODEBARCODE" id="KODEBARCODE" placeholder="KODE MERK" value="<?php echo $KODEBARCODE; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar"><?php echo form_error('NO_BON') ?></label>
										<input type="hidden" class="form-control" name="NO_BON" id="NO_BON" placeholder="NO BON" value="<?php echo $NO_BON; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar">NAMA BARANG <?php echo form_error('NAMA_BARANG') ?></label>
										<input type="text" class="form-control" name="NAMA_BARANG" id="NAMA_BARANG" placeholder="NAMA BARANG" value="<?php echo $NAMA_BARANG; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar"><?php echo form_error('STATUS_BARANG') ?></label>
										<input type="hidden" class="form-control" name="STATUS_BARANG" id="STATUS_BARANG" placeholder="STATUS BARANG" value="Keluar" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="date"><?php echo form_error('TANGGAL_MASUK') ?></label>
										<input type="hidden" class="form-control" name="TANGGAL_MASUK" id="TANGGAL_MASUK" placeholder="TANGGAL MASUK" value="<?php echo $TANGGAL_MASUK; ?>" />
									</div>
									<div class="form-group">
										<label for="varchar">LOKASI <?php echo form_error('LOKASI') ?></label>
										<select name="LOKASI">
										  <option value="Ruang CS">Ruang CS</option>
										  <option value="Ruang Security">Ruang Security</option>
										</select>
										<!--<input type="text" class="form-control" name="LOKASI" id="LOKASI" placeholder="LOKASI" value="<?php echo $LOKASI; ?>" />-->
									</div>
									<div class="form-group">
										<label for="date">TANGGAL KELUAR <?php echo form_error('TANGGAL_KELUAR') ?></label>
										<input type="text" class="form-control" name="TANGGAL_KELUAR" id="TANGGAL_KELUAR" placeholder="TANGGAL_KELUAR" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('m-d-Y')?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar" class="form-control">Untuk Bagian</label>
										<div class="col-sm-4">
											<?php
												$setting_user='class="form-control" id="USER_GROUP"';
												echo form_dropdown('USER_GROUP',$USER_GROUP,'',$setting_user);
												//echo form_dropdown('USER_GROUP',array('Pilih tugas'=>'- Pilih tugas -'),'',$setting_user);
											?>
										</div>
									</div>
									<div class="form-group">
										<label for="varchar">KONDISI <?php echo form_error('KONDISI') ?></label>
										<input type="text" class="form-control" name="KONDISI" id="KONDISI" placeholder="KONDISI" value="<?php echo $KONDISI; ?>" readonly="readonly"/>
									</div>
									<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
									<a href="<?php echo site_url('c_data_barang') ?>" class="btn btn-default">Cancel</a>
								</form>
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