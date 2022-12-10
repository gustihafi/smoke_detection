<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <?= $this->session->flashdata('msg')?>
					<div class="page-header">
						<h4 class="page-title">Monitoring</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="<?= base_url('dashboard') ?>">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('monitoring') ?>">Monitoring</a>
							</li>
						</ul>
					</div>
					<div class="row">
						
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Monitoring</h4>
									</div>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Date</th>
													<th>Location</th>
													<th>Temperature</th>
                                                    <th>Humidity</th>
                                                    <th>Smoke Level</th>
                                                    <th>Alarm Status</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                    <th>Date</th>
													<th>Location</th>
													<th>Temperature</th>
                                                    <th>Humidity</th>
                                                    <th>Smoke Level</th>
                                                    <th>Alarm Status</th>
												</tr>
											</tfoot>
											<tbody>
                                                    <tr>
													<td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><button data-toggle="modal" data-target="#" class="btn btn-primary btn-sm">Location</button></td>

                                                    <td>
                                                        <button type="button" data-toggle="modal" data-target="#" class="btn btn-xs btn-icon btn-round btn-info">
                                                            <i class="fa fa-pen"></i>
                                                        </button> &nbsp;
                                                        <button type="button" data-toggle="modal" data-target="#" class="btn btn-xs btn-icon btn-round btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
