        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?=base_url('/assets/code/index.html/')?>">AMTBLK </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class=""><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-envelope"></i></a></li>
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
                                    <div class="navbar navbar-inner block-header">
										<div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Data Permintaan Barang.</div>
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
								<table class="table">
									<tr><td>BARCODE</td><td><?php echo $KODEBARCODE; ?></td></tr>
									<tr><td>NO BON</td><td><?php echo $NO_BON; ?></td></tr>
									<tr><td>NAMA BARANG</td><td><?php echo $NAMA_BARANG; ?></td></tr>
									<tr><td>STATUS BARANG</td><td><?php echo $STATUS_BARANG; ?></td></tr>
									<tr><td>TANGGAL MASUK</td><td><?php echo $TANGGAL_MASUK; ?></td></tr>
									<tr><td>LOKASI</td><td><?php echo $LOKASI; ?></td></tr>
									<tr><td>TANGGAL KELUAR</td><td><?php echo $TANGGAL_KELUAR; ?></td></tr>
									<tr><td>KONDISI</td><td><?php echo $KONDISI; ?></td></tr>
									<tr><td></td><td><a href="<?php echo site_url('Cleaning_service/tampil_barang_keluar') ?>" class="btn btn-default">Cancel</a></td></tr>
								</table>
								</div> 
						  
            </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->