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
                                <li class="active"><a href="<?=site_url('/Cleaning_service/back/')?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages/')?>"><i class="menu-icon icon-user">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Cleaning Service </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="<?=site_url('/cleaning_service/')?>"><i class="icon-inbox"></i>Penugasan Harian </a></li>
                                        <li><a href="<?=site_url('/cleaning_service/bersih/')?>"><i class="icon-inbox"></i>Tugas Yang Terselesaikan</a></li>
                                        <li><a href="<?=site_url('/cleaning_service/ACC/')?>"><i class="icon-inbox"></i>Tugas Yang Telah DI ACC</a></li>
                                        <li><a href="<?=site_url('/cleaning_service/tambahan/')?>"><i class="icon-inbox"></i>Penugasan Tambahan</a></li>
                                    </ul>
                                </li>
								 <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages1/')?>"><i class="icon-chevron-down pull-right">
                                </i><i class="fa fa-cube"></i><i class="icon-chevron-up pull-right">
                                </i>&nbsp; &nbsp; Kondisi Pengecekan Barang </a>
                                    <ul id="togglePages1" class="collapse unstyled">
                                        <li><a href="<?=site_url('/cleaning_service/tampil_barang_keluar/')?>"><i class="icon-inbox"></i>Kondisi Pengecekan Barang</a></li>
                                        <li><a href="<?=site_url('/Cleaning_service/read_permintaan/')?>"><i class="icon-inbox"></i>Data Pengajuan Barang</a></li>
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
                                    <h3>DATA PENUGASAN YANG TELAH DISELESAIKAN</h3>
                                </div>
                               <div class="module-body">
                                    <div class="row" style="margin-bottom: 10px">
										<div class="col-md-4 text-center">
											<div style="margin-top: 4px"  id="message">
												<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
											</div>
										</div>
									</div>
									<h3>MENUNGGU PROSES ACC DARI BAGIAN KEPEGAWAIAN</h3>
									<table class="table table-bordered table-striped" id="mytable">
										<thead>
											<tr>
												<th width="80px">No</th>
										<th>ID_LAPORAN</th>
										<th>NIK</th>
										<th>LAST_NAME</th>
										<th>TANGGAL PELAPORAN</th>
										<th>RUANGAN</th>
										<th>FASILITAS</th>
										<th>TUGAS</th>
										<th>STATUS PENUGASAN</th>
										<th>STATUS ACC</th>
											</tr>
										</thead>
									<tbody>
										<?php
										$start = 0;
										foreach ($cleaning_service_data as $cleaning_service)
										{
											?>
											<tr>
										<td><?php echo ++$start ?></td>
										<td><?php echo $cleaning_service->ID_LAPORAN ?></td>
										<td><?php echo $cleaning_service->NIK ?></td>
										<td><?php echo $cleaning_service->LAST_NAME ?></td>
										<td><?php echo $cleaning_service->DATE_LPLK ?></td>
										<td><?php echo $cleaning_service->NAMA_RUANGAN ?></td>
										<td><?php echo $cleaning_service->FASILITAS ?></td>
										<td><?php echo $cleaning_service->JENIS_TUGAS ?></td>
										<td><?php echo $cleaning_service->STATUS_PENUGASAN ?></td>
										<td><?php echo $cleaning_service->STATUS_ACC ?></td>
										
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