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
										<div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Dashboard Data Number</div>
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
                                  <div class="container-fluid">
									<div class="row-fluid">	
										<div class="row-fluid">
											<div class="block">
																
												<div class="block-content collapse in">
													<div class="span12">			
														<div class="block-content collapse in">
															<div id="page-wrapper">			
																<div class="span6">
																	<div class="panel panel-red">
																		<div class="panel-heading">
																			<div class="container-fluid">
																				<div class="row-fluid">
																					<div class="span3"><br/>
																						<i class="fa fa-times-circle fa-5x"></i><br/>
																					</div>
																					<div class="span8 text-right"><br/>
																						<div class="huge"><?php
																							if($jumlah_brg_rsk!=null){
																								foreach ($jumlah_brg_rsk as $data)
																								{
																								
																								 echo $data->jumlah_brg_rsk; 
																								
																								
																								
																								}
																							}else{
																								echo 0;
																							}
																								?>
																						</div>
																							<div>Barang Rusak</div><br/>
																					</div>
																				</div>
																			</div>	
																		</div>
																		<a href="<?=site_url('/C_Data_Barang/permintaan_barang/')?>">							  
																			<div class="modal-footer">
																				<span class="pull-left">View Details</span>
																				<span class="pull-right"><i class="icon-chevron-right"></i></span>
																				<div class="clearfix"></div>
																			</div>							  
																		</a>
																	</div>
																</div>
																							
																<div class="span6">
																	<div class="panel panel-green">
																		<div class="panel-heading">
																			<div class="container-fluid">
																				<div class="row-fluid">
																					<div class="span3"><br/>
																						<i class="fa fa-cubes fa-5x"></i><br/>
																					</div>
																					<div class="span8 text-right"><br/>
																						<div class="huge">
																							<?php
																							if($jumlah_brg_tot!=null){
																								foreach ($jumlah_brg_tot as $data)
																								{
																								
																								 echo $data->jumlah_brg_tot; 
																								
																								
																								
																								}
																							}else{
																								echo 0;
																							}
																								?>
																						</div>
																							<div>Data Barang</div><br/>
																					</div>
																				</div>
																			</div>	
																		</div>
																		<a href="<?=site_url('/C_Data_Barang/')?>">							  
																			<div class="modal-footer">
																				<span class="pull-left">View Details</span>
																				<span class="pull-right"><i class="icon-chevron-right"></i></span>
																				<div class="clearfix"></div>
																			</div>							  
																		</a>
																	</div>
																</div>
															</div>
														</div> 				 							
														<div id="page-wrapper">
															<div class="row-fluid">		
																<div class="span6">
																	<div class="panel panel-primary">
																		<div class="panel-heading">
																			<div class="container-fluid">
																				<div class="row-fluid">
																					<div class="span3"><br/>
																						<i class="fa fa-support fa-5x fa-spin"></i><br/>
																					</div>
																					<div class="span8 text-right"><br/>
																						<div class="huge">
																							<?php
																							if($jumlah_brg_klr!=null){
																								foreach ($jumlah_brg_klr as $data)
																								{
																								
																								 echo $data->jumlah_brg_klr; 
																								
																								
																								
																								}
																							}else{
																								echo 0;
																							}
																								?>
																						</div>
																							<div>Barang Keluar</div><br/>
																					</div>
																				</div>
																			</div>	
																		</div>
																		<a href="<?=site_url('/C_Data_Barang_Keluar/')?>">							  
																			<div class="modal-footer">
																				<span class="pull-left">View Details</span>
																				<span class="pull-right"><i class="icon-chevron-right"></i></span>
																				<div class="clearfix"></div>
																			</div>							  
																		</a>
																	</div>
																</div>						
																<div class="span6">
																	<div class="panel panel-yellow">
																		<div class="panel-heading">
																			<div class="container-fluid">
																				<div class="row-fluid">
																					<div class="span3"><br/>
																						<i class="fa fa-share-square fa-5x"></i><br/>
																					</div>
																					<div class="span8 text-right"><br/>
																						<div class="huge">
																							<?php
																							if($jumlah_pnrm_brg!=null){
																								foreach ($jumlah_pnrm_brg as $data)
																								{
																								
																								 echo $data->jumlah_pnrm_brg; 
																								
																								
																								
																								}
																							}else{
																								echo 0;
																							}
																								?>
																						</div>
																							<div>Penerimaan barang</div><br/>
																					</div>
																				</div>
																			</div>	
																		</div>
																		<a href="<?=site_url('/C_Penerimaan_Barang/')?>">							  
																			<div class="modal-footer">
																				<span class="pull-left">View Details</span>
																				<span class="pull-right"><i class="icon-chevron-right"></i></span>
																				<div class="clearfix"></div>
																			</div>							  
																		</a>
																	</div>
																</div>   				
															</div>	       
														</div>  		
													</div>
												</div>
											</div>
											<!-- /block -->					
										</div>
									</div>
								</div>
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