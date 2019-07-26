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
                                    <div class="row" style="margin-bottom: 10px">
										<div class="col-md-4 text-center">
											<div style="margin-top: 4px"  id="message">
												<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
											</div>
										</div>
									</div>
									<table class="table table-bordered table-striped" id="mytable">
									<thead>
										<tr>
											<th width="80px">No</th>
									<th>KODE BARCODE</th>
									<th>NO BON</th>
									<th>NAMA BARANG</th>
									<th>LOKASI</th>
									<th>TANGGAL KELUAR</th>
									<th>KONDISI</th>
									<th>Action</th>
										</tr>
									</thead>
								<tbody>
									<?php
									$start = 0;
									foreach ($c_data_barang_keluar_kebun_data as $c_data_barang_keluar_kebun)
									{
										?>
										<tr>
									<td><?php echo ++$start ?></td>
									<td><?php echo $c_data_barang_keluar_kebun->KODEBARCODE ?></td>
									<td><?php echo $c_data_barang_keluar_kebun->NO_BON ?></td>
									<td><?php echo $c_data_barang_keluar_kebun->NAMA_BARANG ?></td>
									<td><?php echo $c_data_barang_keluar_kebun->LOKASI ?></td>
									<td><?php echo $c_data_barang_keluar_kebun->TANGGAL_KELUAR ?></td>
									<td><?php echo $c_data_barang_keluar_kebun->KONDISI ?></td>
									<td style="text-align:center" width="200px">
									<?php 
									echo anchor(site_url('Petugas_kebun/read2/'.$c_data_barang_keluar_kebun->KODEBARCODE),' ', 'class="fa fa-eye fa-lg" aria-hidden="true"'); 
									echo ' | '; 
									echo anchor(site_url('Petugas_kebun/update2/'.$c_data_barang_keluar_kebun->KODEBARCODE),' ','span style="color: green;"class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"');
									?>
									</td>
									</tr>
										<?php
									}
									?>
									</tbody>
								</table>
									<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
									<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
									<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
									<script type="text/javascript">
										$(document).ready(function () {
											$("#mytable").dataTable();
										});
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