<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Outsource tv</title>
	<meta name="description" content="Outsource TV">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Tv,camera man,crew">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
	<!-- end: CSS -->
	<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><span>Outsource tv</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Dennis Ji
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
                                            <li><a target="frame" href="<?php echo base_url() . "index.php/admin/start/home"; ?>"><i class="icon-chevron-right"></i>Dashboard</a>
				<li><a target="frame" href="<?php echo base_url() . "index.php/admin/user"; ?>"><i class="icon-chevron-right"></i> Users</a></li>	
						<li><a target="frame" href="<?php echo base_url() . "index.php/admin/service"; ?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Service type</span></a></li>
						<li><a target="frame" href="<?php echo base_url() . "index.php/admin/transaction"; ?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Transaction</span></a></li>
						<li><a target="frame" href="<?php echo base_url() . "index.php/admin/news"; ?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> News</span></a></li>
						<li><a target="frame" href="<?php echo base_url() . "index.php/admin/banner"; ?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> /Adverts</span></a></li>
						
						<li><a target="frame" href="<?php echo base_url() . "index.php/admin/about"; ?>"><i class="icon-edit"></i><span class="hidden-tablet">About us</span></a></li>
						<li><a target="frame" href="<?php echo base_url() . "index.php/admin/contact"; ?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Contact us</span></a></li>
							</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			
			<!-- start: Content -->
			<div id="content" class="span12">
		
                              <iframe id="frame" style="margin-top: 5px;" name="frame" frameborder="no" border="0" scrolling="no" height="1500" width="650" class="span12" src="<?php echo base_url() . "index.php/admin/start/home"; ?>"> </iframe>

                        </div>

	  
	
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.ui.touch-punch.js"></script>
	
		<script src="<?php echo base_url(); ?>js/modernizr.js"></script>
	
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>
	
		<script src='<?php echo base_url(); ?>js/fullcalendar.min.js'></script>
	
		<script src='<?php echo base_url(); ?>js/jquery.dataTables.min.js'></script>

		<script src="<?php echo base_url(); ?>js/excanvas.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.pie.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.flot.resize.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.chosen.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.uniform.min.js"></script>
		
		<script src="<?php echo base_url(); ?>js/jquery.cleditor.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.noty.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.elfinder.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.raty.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.iphone.toggle.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.imagesloaded.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.masonry.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.knob.modified.js"></script>
	
		<script src="<?php echo base_url(); ?>js/jquery.sparkline.min.js"></script>
	
		<script src="<?php echo base_url(); ?>js/counter.js"></script>
	
		<script src="<?php echo base_url(); ?>js/retina.js"></script>

		<script src="<?php echo base_url(); ?>js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
