  <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
               <div class="container-fluid">
				 <!-- Brand and toggle get grouped for better mobile display -->
				 <div class="navbar-header">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					 <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <span class="brand" href="#">Admin Panel</span>
				 </div>
				  <!--.nav-collapse -->
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
						                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><img id="avatar1" class="img-responsive" src="<?php echo base_url('/assets/tampilan/uploads/P_20150910_122750.jpg/')?>">&nbsp;Hector Neil Cornea <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                       <a tabindex="-1" href="change_password_admin.php"><i class="icon-cog"></i>&nbsp;Change Password</a>
									   <a tabindex="-1" href="#myModal3" data-toggle="modal"><i class="icon-picture"></i>&nbsp;Change Picture</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
		<!-- Modal -->
<div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Change Picture</h3>
	</div>
		<div class="modal-body">
					<form method="post" class="form-horizontal" action="admin_pic.php" enctype="multipart/form-data">							
								<div class="control-group">
								<label class="control-label" for="inputPassword">Browse Your Computer</label>
								<div class="controls">
									<input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
								</div>
								</div>
										
					
		</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
						<button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Save</button>
					</div>
					</form>
</div>
<!-- end  Modal -->	        <div class="container-fluid">
            <div class="row-fluid">
			      <div class="span3" id="sidebar">
	              <img id="admin_avatar" class="img-polaroid" src="<?php echo base_url('/assets/tampilan/uploads/P_20150910_122750.jpg/')?>">
	                 				
	 									
										
										 				
	 														
										  				
	 														
										 				
	 														
					                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="background:#fff;">
                           <li class="active"> 
						   <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a> 
						   </li>
						 
						 <!------/.* manage device sidebar*------->						
						 <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs"><i class="icon-chevron-right"></i><i class="icon-tablet icon-large"></i>&nbsp;Manage Device
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs" class="collapse">						
                            <li class="">
                            <a href="device_stocks.php"><i class="icon-chevron-right"></i><i class="icon-desktop"></i> Device / Stocks</a>
                            </li>
                            <li class="">
                            <a href="dev_name.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt"></i> Device Type</a>
                            </li> 
						    <li>
                            <a href="newdevice.php"><i class="icon-chevron-right"></i><i class="icon-laptop"></i> Assign&nbsp;<span class="label label-success">New</span>&nbsp;Device
														</a>
                            </li>						
						    <li>
                            <a href="damage.php"><i class="icon-chevron-right"></i><i class="icon-laptop"></i> Damage Device
														</a>
                            </li>
							<li>
                            <a href="dump_device.php"><i class="icon-chevron-right"></i><i class="icon-remove-sign"></i> Dump Device
														</a>
                            </li>						   							
						    </ul>
						</li>
						
                         <!------/.* manage location sidebar*------->	
					    <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs1"><i class="icon-chevron-right"></i><i class="icon-sitemap"></i>&nbsp;Manage Location
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs1" class="collapse">						
                            <li class="">
                            <a href="device_location.php"><i class="icon-chevron-right"></i><i class="icon-map-marker"></i> Device Location</a>
                            </li>
						    <li class="">
                            <a href="location.php"><i class="icon-chevron-right"></i><i class="icon-sitemap"></i> Add Location</a>
                            </li>
						    </ul>
						</li>
						
					  <!------/.* manage TRIS user sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs2"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage TRIS User
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs2" class="collapse">						
                            <li class="">
                            <a href="client_user.php"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;Technical Staff</a>
                            </li>
						    <li class="">
                            <a href="admin_user.php"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;System User</a>
                            </li>
						    </ul>
						</li>
						
						<!------/.* System Log sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs3"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;System log
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs3" class="collapse">						
                            <li class="">
                            <a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a>
                            </li>
						    <li class="">
                            <a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a>
                            </li>
						    </ul>
						</li>
						
					  <!------/.* notification sidebar*------->
					    <li class="">
				           <a href="notification.php"><i class="icon-chevron-right"></i><i class="icon-globe"></i>&nbsp;Notification
				           				           </a>
			            </li>
						
                         <li class="">
                           <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs4"><i class="icon-chevron-right"></i><i class="icon-search icon-large"></i>&nbsp;Advance Search 
						   <div class="muted pull-right"><i class="caret"></i></div></a>
                           </a>
                           <ul id="bs4" class="collapse">
                           <li>
                           <a href="#myModal" data-toggle="modal" tabindex="1"><i class="icon-chevron-right"></i><i class="icon-search"></i>&nbsp;Device in the location</a>
                           </li>
                          
                           <li>
                           <a href="#myModal1" data-toggle="modal" tabindex="-1" ><i class="icon-chevron-right"></i><i class="icon-search"></i>&nbsp;All Device</a>
                           </li>
                           </ul>
                        </li>
                  </ul>					
				
<!-----------------------------------------------Advance Search Form Modal --------------------------------------------------->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h3 id="myModalLabel">Advance Search Form</h3>
</div>

<div class="modal-body">
    <form class="form-horizontal" method="post" action="advance_search.php">
	
	          <div class="control-group">
		      <label class="control-label" for="inputEmail">Location Name</label>
			  <div class="controls">
			  <select name="stdev_location_name" class="" required/>
			  <option>&larr; Select location &rarr;</option>
			  			  <option>Comlab A</option>
			  			  <option>Comlab B</option>
			  			  <option>PCID</option>
			  			  <option>Library</option>
			  			  <option>OSAS</option>
			  			  <option>Admin Office</option>
			  			  <option>High school</option>
			  			  <option>Elementary</option>
			  			  <option>Mj Dorm</option>
			  			  <option>kcafe</option>
			  			  <option>southland clinic</option>
			  			  <option>AVH</option>
			  			  <option>new location</option>
			  			  </select>
		      </div>
	          </div>
							
			  <div class="control-group">
		      <label class="control-label" for="inputEmail">Device Name</label>
			  <div class="controls">
			  <select name="dev_name" class="" required/>
			  <option>&larr; Select Device Name &rarr;</option>
			  			  <option>kyboard</option>
			  			  <option>Power cord</option>
			  			  <option>mouse</option>
			  			  <option>Central Processing unit (CPU)</option>
			  			  <option>AVR</option>
			  			  <option>aircon</option>
			  			  <option>Monitor</option>
			  			  <option>speaker</option>
			  			  </select>
		      </div>
	          </div>
			  			  			
			  <div class="control-group">
		      <label class="control-label" for="inputEmail">Device Serial Number</label>
			  <div class="controls">
			  <select name="dev_serial"  class="" required/>
			  <option>&larr; Select Device Serial &rarr;</option>
			  			  <option>1234312</option>
			  			  <option>123412erf</option>
			  			  </select>
		      </div>
	          </div>
												
                <div class="control-group">
                <div class="controls">
                <button type="submit" id="search" data-placement="left" title="Click to Search" class="btn btn-primary"><i class="icon-search"></i> Search</button>
				 <script type="text/javascript">
		        $(document).ready(function(){
		        $('#search').tooltip('show');
		        $('#search').tooltip('hide');
		        });
		        </script> 
                </div>
                </div>
				
    </form>
</div>

<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
</div>
</div>				
<!-----------------------------------------------Advance Search Form Modal --------------------------------------------------->
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h3 id="myModalLabel">Advance Search Form</h3>
</div>

<div class="modal-body">
    <form class="form-horizontal" method="post" action="advance_search1.php">
	           
			  <div class="control-group">
		      <label class="control-label" for="inputEmail">Device Name</label>
			  <div class="controls">
			  <select name="dev_name" class="" required/>
			  <option>&larr; Select Device Name &rarr;</option>
			  			  <option>kyboard</option>
			  			  <option>Power cord</option>
			  			  <option>mouse</option>
			  			  <option>Central Processing unit (CPU)</option>
			  			  <option>AVR</option>
			  			  <option>aircon</option>
			  			  <option>Monitor</option>
			  			  <option>speaker</option>
			  			  </select>
		      </div>
	          </div>
			  			  			
			  <div class="control-group">
		      <label class="control-label" for="inputEmail">Device Serial Number</label>
			  <div class="controls">
			  <select name="dev_serial"  class="" required/>
			  <option>&larr; Select Device Serial &rarr;</option>
			  			  <option>1234312</option>
			  			  <option>123412erf</option>
			  			  </select>
		      </div>
	          </div>
			  
			   							
                <div class="control-group">
                <div class="controls">
                <button type="submit" id="search1" data-placement="left" title="Click to Search" class="btn btn-primary"><i class="icon-search"></i> Search</button>
				 <script type="text/javascript">
		        $(document).ready(function(){
		        $('#search1').tooltip('show');
		        $('#search1').tooltip('hide');
		        });
		        </script> 
                </div>
                </div>
				
    </form>
</div>

<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
</div>
</div>										
    </div>		
                <div class="span9" id="content">
                    <div class="row-fluid">
         	                             <div class="col-lg-12">
                      <div class="alert alert-success alert-dismissable">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <img id="avatar1" class="img-responsive" src="<?php echo base_url('/assets/tampilan/uploads/P_20150910_122750.jpg/')?>"><strong> Welcome! Hector Neil Cornea</strong>
                      </div>
                    </div>
     
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Dashboard Data Number</div>
								<div class="muted pull-right"><i class="icon-time"></i>&nbsp;<span id=tick2>			
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
                            <div class="block-content collapse in">
							        <div class="span12">
									
<div class="block-content collapse in">
<div id="page-wrapper">
                        <div class="row-fluid">				
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
                                        <div>All Stocked</div><br/>
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