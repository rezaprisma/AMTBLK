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
										<div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Form Penerimaan Barang Dari Supplier.</div>
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
                                 <h2 style="margin-top:0px">Silahkan Masukkan Data Barang Dari Supplier Dibawah Ini.</h2>
								<form action="<?php echo $action; ?>" method="post">
								<div class="form-group">
									<label for="varchar">ID_DETAIL <?php echo form_error('ID_DETAIL') ?></label>
									<input type="text" class="form-control" name="ID_DETAIL" id="ID_DETAIL" placeholder="ID_DETAIL" value="<?php echo $ID_DETAIL; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">NAMA BARANG <?php echo form_error('NAMA_BARANG') ?></label>
									<input type="text" class="form-control" name="NAMA_BARANG" id="NAMA_BARANG" placeholder="NAMA BARANG" value="<?php echo $NAMA_BARANG; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">MERK BARANG <?php echo form_error('MERK_BARANG') ?></label>
									<input type="text" class="form-control" name="MERK_BARANG" id="MERK_BARANG" placeholder="MERK BARANG" value="<?php echo $MERK_BARANG; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">JENIS BARANG <?php echo form_error('JENIS_BARANG') ?></label>
									<input type="text" class="form-control" name="JENIS_BARANG" id="JENIS_BARANG" placeholder="JENIS BARANG" value="<?php echo $JENIS_BARANG; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">TIPE BARANG <?php echo form_error('TIPE_BARANG') ?></label>
									<input type="text" class="form-control" name="TIPE_BARANG" id="TIPE_BARANG" placeholder="TIPE BARANG" value="<?php echo $TIPE_BARANG; ?>" />
								</div>
								<div class="form-group">
									<label for="int">JUMLAH BARANG <?php echo form_error('JUMLAH_BARANG') ?></label>
									<input type="text" class="form-control" name="JUMLAH_BARANG" id="JUMLAH_BARANG" placeholder="JUMLAH BARANG" value="<?php echo $JUMLAH_BARANG; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">SATUAN <?php echo form_error('SATUAN') ?></label>
									<input type="text" class="form-control" name="SATUAN" id="SATUAN" placeholder="SATUAN" value="<?php echo $SATUAN; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">KETERANGAN <?php echo form_error('KETERANGAN') ?></label>
									<input type="text" class="form-control" name="KETERANGAN" id="KETERANGAN" placeholder="KETERANGAN" value="<?php echo $KETERANGAN; ?>" />
								</div>
								<!--<input type="hidden" name="ID_DETAIL" value="<?php echo $ID_DETAIL; ?>" /> -->
								<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
								<a href="<?php echo site_url('c_detail_pengadaan') ?>" class="btn btn-default">Cancel</a>
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