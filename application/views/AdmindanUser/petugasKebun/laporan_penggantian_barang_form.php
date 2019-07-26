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
                                        <li><a href="<?=site_url('/Petugas_kebun/tambahan/')?>"><i class="icon-inbox"></i>Penugasan Tambahan</a></li>
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
                                 <h2 style="margin-top:0px">Barang <?php echo $button ?></h2>
									<form action="<?php echo $action; ?>" method="post">
									<div class="form-group">
										<label for="varchar">KODEBARCODE <?php echo form_error('KODEBARCODE') ?></label>
										<input type="text" class="form-control" name="KODEBARCODE" id="KODEBARCODE" placeholder="KODEBARCODE" value="<?php echo $KODEBARCODE; ?>"readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar"> <?php echo form_error('NO_BON') ?></label>
										<input type="hidden" class="form-control" name="NO_BON" id="NO_BON" placeholder="NO BON" value="<?php echo $NO_BON; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar">NAMA BARANG <?php echo form_error('NAMA_BARANG') ?></label>
										<input type="text" class="form-control" name="NAMA_BARANG" id="NAMA_BARANG" placeholder="NAMA BARANG" value="<?php echo $NAMA_BARANG; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar">STATUS BARANG <?php echo form_error('STATUS_BARANG') ?></label>
										<input type="text" class="form-control" name="STATUS_BARANG" id="STATUS_BARANG" placeholder="STATUS BARANG" value="<?php echo $STATUS_BARANG; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="date"> <?php echo form_error('TANGGAL_MASUK') ?></label>
										<input type="hidden" class="form-control" name="TANGGAL_MASUK" id="TANGGAL_MASUK" placeholder="TANGGAL MASUK" value="<?php echo $TANGGAL_MASUK; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar">LOKASI <?php echo form_error('LOKASI') ?></label>
										<input type="text" class="form-control" name="LOKASI" id="LOKASI" placeholder="LOKASI" value="<?php echo $LOKASI; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="date">TANGGAL KELUAR <?php echo form_error('TANGGAL_KELUAR') ?></label>
										<input type="text" class="form-control" name="TANGGAL_KELUAR" id="TANGGAL_KELUAR" placeholder="TANGGAL KELUAR" value="<?php echo $TANGGAL_KELUAR; ?>" readonly="readonly"/>
									</div>
									<div class="form-group">
										<label for="varchar">KONDISI <?php echo form_error('KONDISI') ?></label>
										<select name="KONDISI">
										  <option value="Rusak">Rusak</option>
										  <option value="Habis">Habis</option>
										</select>
									</div>
									<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
									<a href="<?php echo site_url('Petugas_kebun') ?>" class="btn btn-default">Cancel</a>
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