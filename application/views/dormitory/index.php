<?php error_reporting(0); ?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <?= $this->session->flashdata('msg')?>
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
													<form action="<?= base_url('dormitory/add') ?>" method="POST">
														<div class="row">
															<div class="col-md-6 pr-0">
                                                                <div class="form-group form-group-default">
																	<label>Dormitory Room</label>
																	<input name="room" id="addDorm" type="number" class="form-control" placeholder="fill dormitory room">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Dormitory Type</label>
																	<select name="dorm_type" class="form-control" id="formGroupDefaultSelect">
                                                                        <option></option>
                                                                        <option>North</option>
                                                                        <option>South</option>
                                                                        <option>Xing</option>
                                                                        <option>Yuan</option>
                                                                    </select>
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Longitude</label>
																	<input name="long" type="text" id="addLong"  class="form-control" placeholder="">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Latidude</label>
																	<input name="lat" type="text" id="addLat"  class="form-control" placeholder="">
																</div>
															</div>
														</div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
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
                                                    <th style="width: 10%">Locate</th>
													<th>Action</th>
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
                                            <?php 
                                                $no=0;
                                                foreach($dorm as $dt):
                                                    $no++;
                                            ?>
                                                    <tr>
													<td><?= $no; ?></td>
                                                    <td><?= $dt['room']; ?></td>
                                                    <td><?= $dt['dorm_type']; ?></td>
                                                    <script>
                                                        // fungsi initialize untuk mempersiapkan peta
                                                        function initialize() {
                                                        var propertiPeta = {
                                                            center:new google.maps.LatLng(22.9977635,120.2508996),
                                                            zoom:15,
                                                            mapTypeId:google.maps.MapTypeId.ROADMAP
                                                        };
                                                        
                                                        var peta = new google.maps.Map(document.getElementById("googleMap<?= $dt['id_dorm'] ?>"), propertiPeta);

                                                        var marker=new google.maps.Marker({
                                                            position: new google.maps.LatLng(<?= $dt['latitude'] ?>,<?= $dt['longitude'] ?>),
                                                            map: peta
                                                        });
                                                        }

                                                        // event jendela di-load  
                                                        google.maps.event.addDomListener(window, 'load', initialize);
                                                    </script>
                                                    <td><button data-toggle="modal" data-target="#locate<?= $dt['id_dorm'] ?>" class="btn btn-primary btn-sm">Location</button></td>

                                                    <div class="modal fade" id="locate<?= $dt['id_dorm'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">
                                                                        Location</span> 
                                                                        <span class="fw-light">
                                                                            Dormitory
                                                                        </span>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div id="googleMap<?= $dt['id_dorm'] ?>" style="width:100%;height:400px;"></div>
                                                                    <div class="modal-footer no-bd">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <td>
                                                        <button type="button" data-toggle="modal" data-target="#edit<?= $dt['id_dorm'] ?>" class="btn btn-xs btn-icon btn-round btn-info">
                                                            <i class="fa fa-pen"></i>
                                                        </button> &nbsp;
                                                        <button type="button" data-toggle="modal" data-target="#delete<?= $dt['id_dorm'] ?>" class="btn btn-xs btn-icon btn-round btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>

                                                    <!-- Modal Edit -->
                                                <div class="modal fade" id="edit<?= $dt['id_dorm'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header no-bd">
                                                                <h5 class="modal-title">
                                                                    <span class="fw-mediumbold">
                                                                    Edit</span> 
                                                                    <span class="fw-light">
                                                                        Dormitory
                                                                    </span>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= base_url('dormitory/edit') ?>" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Dormitory Room</label>
                                                                                    <input name="room" id="addDorm" type="number" class="form-control" value="<?= $dt['room'] ?>" placeholder="fill dormitory room">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Dormitory Type</label>
                                                                                    <select name="dorm_type" class="form-control" id="formGroupDefaultSelect">
                                                                                        <option></option>
                                                                                        <option <?php if($dt['dorm_type'] == 'North'){ echo "selected";} ?>>North</option>
                                                                                        <option <?php if($dt['dorm_type'] == 'South'){ echo "selected";} ?>>South</option>
                                                                                        <option <?php if($dt['dorm_type'] == 'Xing'){ echo "selected";} ?>>Xing</option>
                                                                                        <option <?php if($dt['dorm_type'] == 'Yuan'){ echo "selected";} ?>>Yuan</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <script>
                                                                                    // fungsi initialize untuk mempersiapkan peta
                                                                                    function initialize() {
                                                                                    var propertiPeta = {
                                                                                        center:new google.maps.LatLng(22.9977635,120.2508996),
                                                                                        zoom:15,
                                                                                        mapTypeId:google.maps.MapTypeId.ROADMAP
                                                                                    };
                                                                                    
                                                                                    var peta = new google.maps.Map(document.getElementById("googleMap<?= $dt['latitude'] ?>"), propertiPeta);

                                                                                    var marker=new google.maps.Marker({
                                                                                        position: new google.maps.LatLng(<?= $dt['latitude'] ?>,<?= $dt['longitude'] ?>),
                                                                                        map: peta
                                                                                    });
                                                                                    }

                                                                                    // event jendela di-load  
                                                                                    google.maps.event.addDomListener(window, 'load', initialize);
                                                                                </script>
                                                                                <div id="googleMap<?= $dt['latitude'] ?>" style="width:100%;height:400px;"></div>
                                                                                </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Longitude</label>
                                                                                    <input name="long" type="text" value="<?= $dt['longitude'] ?>" id="addLong"  class="form-control" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Latidude</label>
                                                                                    <input name="id_dorm" type="hidden" value="<?= $dt['id_dorm'] ?>">
                                                                                    <input name="lat" type="text" value="<?= $dt['latitude'] ?>" id="addLat"  class="form-control" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer no-bd">
                                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Delete -->
                                                    <div class="modal fade" id="delete<?= $dt['id_dorm'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">
                                                                        Delete</span> 
                                                                        <span class="fw-light">
                                                                            Dormitory
                                                                        </span>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>Are you sure delete <b><?= $dt['room'] ?></b>?</h3>
                                                                    <div class="modal-footer no-bd">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
												</tr>
                                            <?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
