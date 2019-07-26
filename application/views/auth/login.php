		<div class="container">
			<div class="row-fluid">
				<div class="span6">
					<div class="title_index">
						<div class="row-fluid">
							<div class="span12"></div>
								<div class="row-fluid">
									<div class="span10">
										<img class="index_logo" src="<?php echo base_url('/assets/tampilan/images/kk.png')?>">
										<!--<img class="index_logo" src="<?php echo base_url(); ?>assets/tampilan/images/kk.png">-->
									</div>	
									<div class="span12">
										</br>
										<div class="motto">
											<p>WELCOME&nbsp;&nbsp;TO:</p>
											<p>AMTBLK SMAN 8 BANDUNG</p>												
										</div>											
									</div>							
								</div>		   							
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="pull-right">
					<form id="login_form1" class="form-signin" method="post">
					
						<div id="infoMessage"><?php echo $message;?></div>

						<?php //echo form_open("auth/login");?>
						<h3 class="form-signin-heading">
							<i class="icon-lock"></i> Please Login
						</h3>
						<?php echo form_input($identity);?>
						
						<?php echo form_input($password);?>	
						
						
						<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>

						<?php echo form_close();?>

						
						<script type="text/javascript">
						$(document).ready(function(){
						$('#signin').tooltip('show');
						$('#signin').tooltip('hide');
						});
						</script>		
					</form>
					</div>
				</div>
			</div>
			<div class="row-fluid">
			   <div class="offset2">		
				   <div class="span11">
					<div class="index-footer">
						<div class="navbar">
							 <div class="navbar-inner">
								 <div class="container-fluid">
									<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
										<span class="icon-bar"></span>
											<span class="icon-bar"></span>
									</a>
									 
							<div class="nav-collapse collapse">
								<ul class="nav" id="footer_nav">
								  <li class="divider-vertical"></li>
									  <li class="active"><a href="index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
									  <li class="divider-vertical"></li>
									  <li><a href="#"><i class="icon-info-sign"></i>&nbsp;About</a></li>						
									  <li class="divider-vertical"></li>
									  <li><a href="#"><i class="icon-file"></i>&nbsp;History</a></li>
									  <li class="divider-vertical"></li>
									  <li><a href="#"><i class="icon-group"></i>&nbsp;Developers</a></li>
								  <li class="divider-vertical"></li>	
								</ul>
							 </div>
								<!--/.nav-collapse -->
							 </div>
						   </div>
						</div>
					</div>
				</div>		
			   </div>
			</div>
			<center>
				<footer>
					<p>Aplikasi Monitoring Tugas Bgaian Layanan Khusus dan Manajemen Barang Habis Pakai (A.M.T.B.L.K) Copyright 2016</p>	
				</footer>
			</center>
		</div>
