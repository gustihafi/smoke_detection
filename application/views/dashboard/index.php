	
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
						<div class="col-md-12">
						<div class="card">
								<div class="card-header">
									<h4 class="card-title">Data Graphic</h4>
								</div>
								<div class="card-body">
									<ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-dorm1-tab-nobd" data-toggle="pill" href="#pills-dorm1-nobd" role="tab" aria-controls="pills-dorm1-nobd" aria-selected="true">South, 5701</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-dorm2-tab-nobd" data-toggle="pill" href="#pills-dorm2-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">North, 1405</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-dorm3-tab-nobd" data-toggle="pill" href="#pills-dorm3-nobd" role="tab" aria-controls="pills-dorm3-nobd" aria-selected="false">South, 5921</a>
										</li>
									</ul>
									<div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
										<div class="tab-pane fade show active" id="pills-dorm1-nobd" role="tabpanel" aria-labelledby="pills-dorm1-tab-nobd">
											<div class="chart-container">
												<canvas id="htmlLegendsChart"></canvas>
											</div>
											<div id="myChartLegendDorm1"></div>
										</div>
										<div class="tab-pane fade" id="pills-dorm2-nobd" role="tabpanel" aria-labelledby="pills-dorm2-tab-nobd">
											<div class="chart-container">
												<canvas id="htmlLegendsChartDorm2"></canvas>
											</div>
											<div id="myChartLegendDorm2"></div>
										</div>
										<div class="tab-pane fade" id="pills-dorm3-nobd" role="tabpanel" aria-labelledby="pills-dorm3-tab-nobd">
											<div class="chart-container">
												<canvas id="htmlLegendsChartDorm3"></canvas>
											</div>
											<div id="myChartLegendDorm3"></div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="card">
								<div class="card-header">
									<div class="card-title">Chart with HTML Legends</div>
								</div>
								<div class="card-body">
									<div class="card-sub">
									This is the graphic of smoke levels, so that we know every hour of smoke levels in every dormitory room.
									</div>
									<div class="chart-container">
										<canvas id="htmlLegendsChart"></canvas>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
			