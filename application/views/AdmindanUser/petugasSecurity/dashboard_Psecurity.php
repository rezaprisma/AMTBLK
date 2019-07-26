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
                                <li class="active"><a href="<?=site_url('/petugas_security/back/')?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages2/')?>"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Petugas Security </a>
                                    <ul id="togglePages2" class="collapse unstyled">
                                        <li><a href="<?=site_url('/petugas_security/')?>"><i class="icon-inbox"></i>Input Laporan Kerja </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                             
                                <li><a href="<?=base_url('/assets/code/#"><i class="menu-icon icon-signout/')?>"></i>Logout </a></li>
                            </ul>
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
		</br>
		</br>
		</br>
                        </div>
						
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            
                            <!--/#btn-controls-->
                            <div class="module">
                                <div class="module-head">
                                    <h3>Laporan Kejadian</h3>
                                </div>
                                <div class="module-body">
                                   <table class="table table-bordered table-striped" id="mytable">
										<thead>
											<tr>
												<th width="80px">No</th>
										<th>TANGGAL LAPORAN</th>
										<th>WAKTU</th>
										<th>DESKRIPSI LAPORAN</th>
										<th>KETERANGAN</th>
										<th>Action</th>
											</tr>
										</thead>
									<tbody>
										<?php
										$start = 0;
										foreach ($petugas_security_data as $petugas_security)
										{
											?>
											<tr>
										<td><?php echo ++$start ?></td>
										<td><?php echo $petugas_security->tanggal_kejadian ?></td>
										<td><?php echo $petugas_security->jam_kejadian ?></td>
										<td><?php echo $petugas_security->desc_laporan?></td>
										<td><?php echo $petugas_security->keterangan ?></td>
										<td style="text-align:center" width="200px" >
										<?php 
										echo anchor(site_url('petugas_security/read/'.$petugas_security->id_laporan),' ', 'class="fa fa-eye" aria-hidden="true"');
										?>
										</td>
										</tr>
											<?php
										}
										?>
										</tbody>
									</table>
								   
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