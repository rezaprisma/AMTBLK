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
                                <li class="active"><a href="<?=site_url('/Petugas_kebun/back/')?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages/')?>"><i class="menu-icon icon-user">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Petugas Kebun</a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="<?=site_url('/Petugas_kebun/')?>"><i class="icon-inbox"></i>Penugasan Harian </a></li>
                                        <li><a href="<?=site_url('/Petugas_kebun/bersih/')?>"><i class="icon-inbox"></i>Tugas Yang Terselesaikan</a></li>
                                        <li><a href="<?=site_url('/Petugas_kebun/ACC/')?>"><i class="icon-inbox"></i>Tugas Yang Telah DI ACC</a></li>
                                        <li><a href="<?=site_url('/Petugas_kebun/')?>"><i class="icon-inbox"></i>Penugasan Tambahan</a></li>
                                    </ul>
                                </li>
								 <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages1/')?>"><i class="icon-chevron-down pull-right">
                                </i><i class="fa fa-cube"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp; &nbsp; Kondisi Pengecekan Barang </a>
                                    <ul id="togglePages1" class="collapse unstyled">
                                        <li><a href="<?=site_url('/Petugas_kebun/tampil_barang_keluar/')?>"><i class="icon-inbox"></i>Kondisi Pengecekan Barang</a></li>
                                        <li><a href="<?=site_url('/Petugas_kebun/read_permintaan/')?>"><i class="icon-inbox"></i>Data Pengajuan Barang</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="<?=base_url('/assets/code/#"><i class="menu-icon icon-signout/')?>"></i>Logout </a></li>
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
                                    <h3>
                                        Profit Chart</h3>
                                </div>
                                <div class="module-body">
                                    <h2 style="margin-top:0px">Silahkan Isi Data Dibawah <?php echo $button ?></h2>
								<form action="<?php echo $action; ?>" method="post">
									<div class="form-group">
										<label for="varchar"><?php echo form_error('ID_LAPORAN') ?></label>
										<input type="text" class="form-control" name="ID_LAPORAN" id="ID_LAPORAN" placeholder="ID_LAPORAN" value="<?php echo $ID_LAPORAN; ?>" disabled="disabled" />
									</div>
									<div class="form-group">
										<label for="varchar"><?php echo form_error('NIK') ?></label>
										<input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="<?php echo $NIK; ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
											<label for="varchar"><?php echo form_error('USER_GROUP') ?></label>
											<input type="text" class="form-control" name="USER_GROUP" id="USER_GROUP" placeholder="USER_GROUP" value="<?php echo $USER_GROUP; ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
											<label for="varchar"><?php echo form_error('LAST_NAME') ?></label>
											<input type="text" class="form-control" name="LAST_NAME" id="LAST_NAME" placeholder="LAST_NAME" value="<?php echo $LAST_NAME; ?>"disabled="disabled" />
									</div>
									<div class="form-group">
										<label for="varchar">DATE LPLK <?php echo form_error('DATE_LPLK') ?></label>
										<input type="text" class="form-control" name="DATE_LPLK" id="DATE_LPLK" placeholder="DATE LPLK" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('m-d-Y')?>"disabled="disabled" />
									</div>
									<div class="form-group">
										<label for="varchar">WAKTU <?php echo form_error('JAM_LPLK') ?></label>
										<input type="text" class="form-control" name="JAM_LPLK" id="JAM_LPLK" placeholder="JAM" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('H:i:s')?>"disabled="disabled" />
									</div>
									<div class="form-group">
										<label for="varchar">ID_RUANGAN <?php echo form_error('ID_RUANGAN') ?></label>
										<input type="text" class="form-control" name="ID_RUANGAN" id="ID_RUANGAN" placeholder="ID_RUANGAN" value="<?php echo $ID_RUANGAN; ?>" disabled="disabled"/>
									</div>
									
									<div class="form-group">
										<label for="varchar">ID_FASILITAS<?php echo form_error('ID_FASILITAS') ?></label>
										<input type="text" class="form-control" name="ID_FASILITAS" id="ID_FASILITAS" placeholder="ID_FASILITAS" value="<?php echo $ID_FASILITAS; ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
										<label for="varchar">ID_TUGAS<?php echo form_error('ID_TUGAS') ?></label>
										<input type="text" class="form-control" name="ID_TUGAS" id="ID_TUGAS" placeholder="ID_TUGAS" value="<?php echo $ID_TUGAS; ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
										<label for="varchar"><?php echo form_error('STATUS_PENUGASAN') ?></label>
										<input type="text" class="form-control" name="STATUS_PENUGASAN" id="STATUS_PENUGASAN" placeholder="STATUS_PENUGASAN" value="<?=set_value('STATUS_PENUGASAN', 'Sudah Dikerjakan');?>" disabled="disabled"/>
									</div>
									<div class="form-group">
										<label for="varchar"><?php echo form_error('STATUS_ACC') ?></label>
										<input type="text" class="form-control" name="STATUS_ACC" id="STATUS_ACC" placeholder="STATUS_ACC" value="<?=set_value('STATUS_ACC', 'Belum ACC');?>" disabled="disabled"/>
									</div>
									<div class="form-group">
										<label for="varchar">KETERANGAN_TUGAS<?php echo form_error('KETERANGAN_TUGAS') ?></label>
										<input type="text" class="form-control" name="KETERANGAN_TUGAS" id="KETERANGAN_TUGAS" placeholder="KETERANGAN_TUGAS" value="<?php echo $KETERANGAN_TUGAS; ?>" disabled="disabled"/>
									</div>
									
									<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
									<a href="<?php echo site_url('Petugas_kebun/create/') ?>" class="btn btn-default">Cancel</a>
								</form>
								   
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