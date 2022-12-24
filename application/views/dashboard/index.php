	
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<?= $this->session->flashdata('msg')?>
								<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Monitoring Smoke Detection</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row">
					<?php 
					foreach($dorm1 as $dt):
					if($dt['smoke_lvl'] < 300){ ?>
                        <div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round card-success">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title"><b><?= $dt['dorm_type'].', '.$dt['room'] ?></b></h4>
												<b><p>No smoke detected</p></b>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }else{ ?>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round card-danger">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title"><b><?= $dt['dorm_type'].', '.$dt['room'] ?></b></h4>
												<b><p>Smoke detected!</p></b>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }
						endforeach; ?>
						<?php 
						foreach($dorm2 as $dt):
						if($dt['smoke_lvl'] < 300){ ?>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round card-success">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title"><b><?= $dt['dorm_type'].', '.$dt['room'] ?></b></h4>
												<b><p>No smoke detected!</p></b>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }else{ ?>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round card-danger">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title"><b><?= $dt['dorm_type'].', '.$dt['room'] ?></b></h4>
												<b><p>Smoke detected!</p></b>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }
						endforeach; ?>
						<?php 
						foreach($dorm3 as $dt):
						if($dt['smoke_lvl'] < 300){ ?>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round card-success">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title"><b><?= $dt['dorm_type'].', '.$dt['room'] ?></b></h4>
												<b><p>No smoke detected</p></b>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }else{ ?>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round card-danger">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title"><b>Location 3</b></h4>
												<b><p>Smoke detected!</p></b>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }
						endforeach; ?>
					</div>
					<!-- Grafik -->
					<div class="row">
						<div class="col-sm-6"></div>
					</div>
				</div>
			</div>
			