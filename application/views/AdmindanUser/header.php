<?php if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--<meta http-equiv="refresh" content="30">-->
        <title>AMTBLK</title>
        <meta name="description" content="AMTBLK">
		<meta name="author" content="REZA PRISMA NURANI">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="<?=base_url('/assets/tampilan/images/logcil.png/')?>" rel="icon" type="image">
        <link type="text/css" href="<?=base_url('/assets/code/bootstrap/css/bootstrap.min.css/')?>" rel="stylesheet">
        <link type="text/css" href="<?=base_url('/assets/code/bootstrap/css/bootstrap-responsive.min.css/')?>" rel="stylesheet">
        <link type="text/css" href="<?=base_url('/assets/code/css/theme.css/')?>" rel="stylesheet">
        <link type="text/css" href="<?=base_url('/assets/code/images/icons/css/font-awesome.css/')?>" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
			
		
		<!--	<link href="<?=base_url('/assets/tampilan/bootstrap/css/background.css/')?>" rel="stylesheet" media="screen"> -->
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/bootstrap.min.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/bootstrap-responsive.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/font-awesome.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/font-awesome-4.1.0/css/font-awesome.min.css/')?>" rel="stylesheet" type="text/css">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/my_style.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/bootstrap/css/print.css/')?>" rel="stylesheet" media="print">			
			<link href="<?=base_url('/assets/tampilan/vendors/easypiechart/jquery.easy-pie-chart.css/')?>" rel="stylesheet" media="screen">
			<link href="<?=base_url('/assets/tampilan/assets/styles.css/')?>" rel="stylesheet" media="screen">				
		    <link href="<?=base_url('/assets/tampilan/bootstrap/css/bootstrap.min1.css/')?>" rel="stylesheet" media="screen">
		    <link href="<?=base_url('/assets/tampilan/bootstrap/css/sb_admin.css/')?>" rel="stylesheet" media="screen">	
			
		<script src="<?php echo base_url('/assets/tampilan/bootstrap/js/html5.js/')?>"></script>
		<link href="<?=base_url('/assets/tampilan/vendors/fullcalendar/fullcalendar.css/')?>" rel="stylesheet" media="screen">
		<script src="<?php echo base_url('/assets/tampilan/vendors/jquery-1.9.1.min.js/')?>"></script>
        <script src="<?php echo base_url('/assets/tampilan/vendors/modernizr-2.6.2-respond-1.1.0.min.js/')?>"></script>
		<!-- data table -->
		<link href="<?=base_url('/assets/tampilan/assets/DT_bootstrap.css/')?>" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="<?=base_url('/assets/tampilan/vendors/jGrowl/jquery.jgrowl.css/')?>" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/tampilan/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css/')?>"></link>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
		<!--<link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css/')?>" type="text/css">        
		<link rel="stylesheet" href="<?php echo base_url('/assets/plugins/datepicker-bootstrap/css/bootstrap-datepicker.min.css/')?>" type="text/css">-->
		
	
		<script src="<?php echo base_url('/assets/tampilan/vendors/jGrowl/jquery.jgrowl.js/')?>"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/n/jquery-1.4.3.min.js"></script>
    
    </head>
    <body>

