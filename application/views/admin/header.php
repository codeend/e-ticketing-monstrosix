<!doctype html>
<html class="fixed has-top-menu">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard</title>
		<link rel="icon" type="image/png" href="<?php echo base_url();?>temp/home/images/logo.png">
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/morris.js/morris.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/dropzone/basic.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/dropzone/dropzone.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/codemirror/theme/monokai.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/elusive-icons/css/elusive-icons.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>temp/admin/assets/vendor/modernizr/modernizr.js"></script>

		<script src="<?php echo base_url(); ?>temp/admin/assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url(); ?>temp/admin/assets/vendor/jquery-ui/jquery-ui.js"></script>

		<!-- CKEDITOR -->
		<script src="<?php echo base_url(); ?>temp/ckeditor/ckeditor.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header header-nav-menu">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="<?php echo base_url();?>temp/home/images/logo.png" height="40" />
					</a>
					<button class="btn header-btn-collapse-nav hidden-md hidden-lg" data-toggle="collapse" data-target=".header-nav">
						<i class="fa fa-bars"></i>
					</button>
			
					<!-- start: header nav menu -->
					<div class="header-nav collapse">
						<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
							<nav>
								<ul class="nav nav-pills" id="mainNav">
									<li class="">
										<a href="<?php echo site_url('Dashboard'); ?>">
									        Dashboard
									    </a>    
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" href="#">
									        Event
									    </a>
									    <ul class="dropdown-menu">
									    	<li class="">
												<a href="<?php echo site_url('Acara'); ?>">
											        Acara
											    </a>    
											</li>
									    	<li class="">
												<a href="<?php echo site_url('Kategori'); ?>">
											        Kategori
											    </a>    
											</li>
											<li class="">
												<a href="<?php echo site_url('Merch'); ?>">
											        Merch
											    </a>    
											</li>
									    </ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" href="#">
									        Tiket
									    </a>
									    <ul class="dropdown-menu">
									    	<li class="">
												<a href="<?php echo site_url('Pemesan'); ?>">
											        Pemesan
											    </a>    
											</li>
									    </ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" href="#">
									        Menejemen
									    </a>
									    <ul class="dropdown-menu">
									    	<li class="">
												<a href="<?php echo site_url('Pengguna'); ?>">
									        		Pengguna
									    		</a>   
											</li>
											<li class="">
												<a href="<?php echo site_url('Rekening'); ?>">
											        Rekening
											    </a>    
											</li>
											<li class="">
												<a href="<?php echo site_url('Cod'); ?>">
											        COD
											    </a>    
											</li>
									    </ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- end: header nav menu -->
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">

					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url(); ?>temp/admin/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">Administrator</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo site_url('Login/Keluar'); ?>"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<section role="main" class="content-body">