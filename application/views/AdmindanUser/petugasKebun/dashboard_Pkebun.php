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
						</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
							<div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="<?=site_url('/Petugas_kebun/')?>" class="btn-box big span4"><i class="fa fa-clock-o"></i><b><?php
									if($jumlah!=null){
										foreach ($jumlah as $data)
										{
										
										 echo $data->jumlah; 
										
										
										
										}
									}else{
										echo 0;
									}
										?></b>
                                        <p class="text-muted">
                                            Penugasan Harian</p>
                                    </a><a href="<?=site_url('/Petugas_kebun/tambahan/')?>" class="btn-box big span4"><i class="fa fa-rocket"></i><b><?php
									if($jumlah_tbh!=null){
										foreach ($jumlah_tbh as $data)
										{
										
										 echo $data->jumlah_tbh; 
										
										
										
										}
									}else{
										echo 0;
									}
										?></b>
                                        <p class="text-muted">
                                            Penugasan Tambahan</p>
                                    </a><a href="<?=site_url('/Petugas_kebun/tampil_barang_keluar/')?>" class="btn-box big span4"><i class="fa fa-cube fa-spin"></i><b><?php
									if($jumlah_brg!=null){
										foreach ($jumlah_brg as $data)
										{
										
										 echo $data->jumlah_brg; 
										
										
										
										}
									}else{
										echo 0;
									}
										?></b>
                                        <p class="text-muted">
                                            Pengecekan Barang</p>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                            
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