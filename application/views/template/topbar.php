<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Monitoring Smoke Detection</title>
	<script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('assets/') ?>/images/icon.png" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="<?= base_url('assets/') ?>/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url('assets/') ?>/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="<?= base_url('dashboard'); ?>" class="logo">
					<img width="70%" src="<?= base_url('assets/') ?>/images/logo.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification"><?= $count; ?></span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have <?= $count; ?> new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
										<?php 
											foreach($smoke as $dt): ?>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fas fa-exclamation-triangle"></i> </div>
												<div class="notif-content">
													<span class="block">
														<b>Smoke Detected!</b><br><?= $dt['dorm_type'].', '.$dt['room'] ?>
													</span>
													<span class="time"><?= $dt['created_at'] ?></span> 
												</div>
											</a>
											<?php endforeach; ?>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?= base_url('assets/images/'.$this->session->image) ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?= base_url('assets/images/'.$this->session->image) ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $this->session->name ?></h4>
												<p class="text-muted"><?= $this->session->email ?></p><a href="<?= base_url('profile') ?>" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= base_url('login/logout') ?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>