<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dormitory</h4>
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
								<a href="<?= base_url('dormitory') ?>">Dormitory</a>
							</li>
						</ul>
					</div>
					<div class="row">
						
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Dormitory</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addDorm">
											<i class="fa fa-plus"></i>
											Add
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addDorm" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Add</span> 
														<span class="fw-light">
															Dormitory
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form>
														<div class="row">
															<div class="col-md-6 pr-0">
                                                                <div class="form-group form-group-default">
																	<label>Dormitory Room</label>
																	<input id="addDorm" type="number" class="form-control" placeholder="fill dormitory room">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Dormitory Type</label>
																	<select class="form-control" id="formGroupDefaultSelect">
                                                                        <option></option>
                                                                        <option>North</option>
                                                                        <option>South</option>
                                                                        <option>Xing</option>
                                                                        <option>Yuan</option>
                                                                    </select>
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Location (Maps)</label>
																	<textarea id="addDorm"  class="form-control" placeholder="<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d459.09157370467165!2d120.25442674082689!3d22.996858844847957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e7133113c5551%3A0x6c1acdb9fcf0f5d6!2sKun%20Shan%20University!5e0!3m2!1sen!2stw!4v1670251402847!5m2!1sen!2stw' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>"></textarea>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Dormitory Room</th>
													<th>Type</th>
                                                    <th>Locate</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                    <th>No</th>
													<th>Dormitory Room</th>
													<th>Type</th>
                                                    <th>Locate</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<tr>
													<td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" class="btn btn-xs btn-icon btn-round btn-info">
                                                            <i class="fa fa-pen"></i>
                                                        </button> &nbsp;
                                                        <button type="button" class="btn btn-xs btn-icon btn-round btn-danger">
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