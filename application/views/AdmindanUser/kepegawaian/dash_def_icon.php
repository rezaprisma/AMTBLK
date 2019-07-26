        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?=base_url('/assets/code/index.html/')?>">AMTBLK </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-envelope"></i></a></li>
                            <li><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-eye-open"></i></a></li>
                            <li><a href="<?=base_url('/assets/code/#/')?>"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="<?=base_url('/assets/code/#/')?>" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Item No. 1</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=base_url('/assets/code/#/')?>">Support </a></li>
                            <li class="nav-user dropdown"><a href="<?=base_url('/assets/code/#/')?>" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url('/assets/code/images/user.png/')?>" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Your Profile</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Edit Profile</a></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?=base_url('/assets/code/#/')?>">Logout</a></li>
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
                                <li class="active"><a href="<?=base_url('/assets/code/index.html/')?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="<?=base_url('/assets/code/activity.html/')?>"><i class="menu-icon icon-bullhorn"></i>Petugas CS </a>
                                </li>
                                <li><a href="<?=base_url('/assets/code/message.html/')?>"><i class="menu-icon icon-inbox"></i>Petugas Kebun <b class="label green pull-right">
                                    11</b> </a></li>
                                <li><a href="<?=base_url('/assets/code/task.html/')?>"><i class="menu-icon icon-tasks"></i>Petugas Security <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="<?=base_url('/assets/code/ui-typography.html/')?>"><i class="menu-icon icon-book"></i>Data User </a></li>
                                <li><a href="<?=base_url('/assets/code/form.html/')?>"><i class="menu-icon icon-paste"></i>Data Lokasi LK </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="<?=base_url('/assets/code/#togglePages/')?>"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Sistem Log </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="<?=base_url('/assets/code/other-login.html/')?>"><i class="icon-inbox"></i>Aktivitas Log </a></li>
                                        <li><a href="<?=base_url('/assets/code/other-user-profile.html/')?>"><i class="icon-inbox"></i>User Log </a></li>
                                    </ul>
                                </li>
								 <li><a href="<?=base_url('/assets/code/form.html/')?>"><i class="menu-icon icon-paste"></i>Notifikasi</a></li>
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
											&nbsp;|&nbsp;Today is
											Thursday, July 21st, 2016				   
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
																				<div class="panel panel-primary">
																					<div class="panel-heading">
																						<div class="container-fluid">
																							<div class="row-fluid">
																								<div class="span3"><br/>
																									<i class="fa fa-desktop fa-5x"></i><br/>
																								</div>
																								<div class="span8 text-right"><br/>
																									<div class="huge">2</div>
																									<div>Laporan Petugas CS</div><br/>
																								</div>
																							</div>
																						 </div>	
																					</div>
																					<a href="device_stocks.php">							  
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
																											  <i class="fa fa-share-square fa-5x"></i><br/>
																											</div>
																											<div class="span8 text-right"><br/>
																												<div class="huge">1</div>
																												<div>New Device</div><br/>
																											</div>
																										</div>
																									 </div>	
																									</div>
																									<a href="newdevice.php">							  
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
																								<div class="panel panel-red">
																									<div class="panel-heading">
																									  <div class="container-fluid">
																										<div class="row-fluid">
																											<div class="span3"><br/>
																											  <i class="fa fa-times-circle fa-5x"></i><br/>
																											</div>
																											<div class="span8 text-right"><br/>
																												<div class="huge">0</div>
																												<div>Damage Device</div><br/>
																											</div>
																										</div>
																									 </div>	
																									</div>
																									<a href="damage.php">							  
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
																											   <i class="fa fa-wrench fa-5x"></i><br/>
																											</div>
																											<div class="span8 text-right"><br/>
																												<div class="huge">0</div>
																												<div>Repaired Device</div><br/>
																											</div>
																										</div>
																									 </div>	
																									</div>
																									<a href="device_stocks.php">							  
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
																								<div class="panel panel-red">
																									<div class="panel-heading">
																									  <div class="container-fluid">
																										<div class="row-fluid">
																											<div class="span3"><br/>
																											   <i class="fa fa-support fa-5x"></i><br/>
																											</div>
																											<div class="span8 text-right"><br/>
																												<div class="huge">0</div>
																												<div>Dump Device</div><br/>
																											</div>
																										</div>
																									 </div>	
																									</div>
																									<a href="dump_device.php">							  
																										<div class="modal-footer">
																											<span class="pull-left">View Details</span>
																											<span class="pull-right"><i class="icon-chevron-right"></i></span>
																											<div class="clearfix"></div>
																										</div>							  
																									</a>
																								</div>
																							</div>
																							
																							<div class="span6">
																								<div class="panel panel-primary">
																									<div class="panel-heading">
																									  <div class="container-fluid">
																										<div class="row-fluid">
																											<div class="span3"><br/>
																											   <i class="fa fa-sitemap fa-5x"></i><br/>
																											</div>
																											<div class="span8 text-right"><br/>
																												<div class="huge">13</div>
																												<div>Location</div><br/>
																											</div>
																										</div>
																									 </div>	
																									</div>
																									<a href="device_location.php">							  
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