	<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />  

	<title>Outsource Television</title>

	<!--Favicon-->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png" />

	<!--Cascading Style Sheets-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tabs.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/table.css" />

	<!--Javascript Library and Plugins-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.innerfade.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.innerfade.config.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/elementHeight.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/equalizer.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tabs.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tabs.config.js"></script>
</head>

<body>
	<div class="page ">

	
		<header class="header-wrapper wide">
			<div class="header-inner">

				<div class="branding">
					<div class="logo">
						<a href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url(); ?>assets/images/logo.png">
						</a>
					</div><!-- /logo -->
				</div><!-- /branding -->

				<nav class="navigation">
					<ul>
						<li class="headlink page-home"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="headlink page-jobs"><a href="<?php echo base_url(); ?>index.php/home/jobs">Jobs</a></li>
						<li class="headlink page-services">
							<a href="<?php echo base_url(); ?>index.php/home/services">Service Directory</a>
							<ul class="sub-menu">
                                                               <?php
                                                    
                                                        foreach ($services as $loop) {                                                           
                                                       ?> 
                                                            <li><a href="<?php echo base_url(); ?>index.php/home/services/camera-crew">Camera Crew</a></li>
							
                                                           <?php }?>
								<li><a href="<?php echo base_url(); ?>index.php/home/services/camera-crew">Camera Crew</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/home/services/equipment-hire">Equipment Hire</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/home/services/outside-broadcast-facility">Outside Broadcast Facility</a></li>
							</ul>
						</li>
						<li class="headlink page-equipment"><a href="<?php echo base_url(); ?>index.php/home/equipment">Equipment</a></li>
						<li class="headlink page-about"><a href="<?php echo base_url(); ?>index.php/home/about">About Us</a></li>
						<li class="headlink page-contact"><a href="<?php echo base_url(); ?>index.php/home/contact">Contact us</a></li>


						<?php if ($this->session->userdata('logged_in')) { ?>
						<li class="headlink page-user">
							<a href="<?php echo base_url(); ?>index.php/user">My Profile</a>
							<ul class="sub-menu">
								<li><a href="<?php echo base_url(); ?>index.php/user/service">Create Service</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/user/job">Create Job</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/user/item">Add Item</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/user/logout">Log Out</a></li>
							</ul>
						</li>
						<?php } ?>


					</ul>
					<ul class="account-links">
						<li class="headlink page-login"><a class="button" href="<?php echo base_url(); ?>index.php/home/login">Login</a></li>
						<li class="headlink page-register"><a class="button" href="<?php echo base_url(); ?>index.php/home/register">Register</a></li>
					</ul>
				</nav><!-- /navigation -->

			</div><!-- /header-inner -->
		</header><!-- /header -->		

