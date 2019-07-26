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
                                
								<li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages1/')?>"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Petugas Security </a>
                                    <ul id="togglePages1" class="collapse unstyled">
                                        <li><a href="<?=site_url('/petugas_security/')?>"><i class="icon-inbox"></i>Input Laporan Kerja </a></li>
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
                                     <h2 style="margin-top:0px">Laporan_plk <?php echo $button ?></h2>
									<form action="<?php echo $action; ?>" method="post">
										<div class="form-group">
											<label for="varchar"><?php echo form_error('USER_GROUP') ?></label>
											<input type="hidden" class="form-control" name="USER_GROUP" id="USER_GROUP" placeholder="USER_GROUP" value="<?=set_value('USER_GROUP', 'SECURITY');?>" />
										</div>
										<div class="form-group">
											<label for="varchar">DATE LPLK <?php echo form_error('TANGGAL_KEJADIAN') ?></label>
											<input type="Date" class="form-control" name="TANGGAL_KEJADIAN" id="TANGGAL_KEJADIAN" placeholder="DATE LPLK" value="<?php echo $TANGGAL_KEJADIAN; ?>" />
										</div>
										<div class="form-group">
											<label for="varchar">WAKTU <?php echo form_error('JAM_KEJADIAN') ?></label>
											<input type="text" class="form-control" name="JAM_KEJADIAN" id="JAM_KEJADIAN" placeholder="JAM" value="<?=set_value('JAM_KEJADIAN', date('H:i:s'));?>" />
										</div>
										<div class="form-group">
											<label for="varchar">DESC LAPORAN <?php echo form_error('DESC_LAPORAN') ?></label>
											<input type="text" class="form-control" name="DESC_LAPORAN" id="DESC_LAPORAN" placeholder="DESC LAPORAN" value="<?php echo $DESC_LAPORAN; ?>" />
										</div>
										<div class="form-group">
											<label for="varchar">KETERANGAN <?php echo form_error('KETERANGAN') ?></label>
											<input type="text" class="form-control" name="KETERANGAN" id="KETERANGAN" placeholder="KETERANGAN" value="<?php echo $KETERANGAN; ?>" />
										</div>
										<input type="hidden" name="ID_LAPORAN" value="<?php echo $ID_LAPORAN; ?>" /> 
										<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
										<a href="<?php echo site_url('petugas_security') ?>" class="btn btn-default">Cancel</a>
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