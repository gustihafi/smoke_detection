<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <?= $this->session->flashdata('msg')?>
					<div class="page-header">
						<h4 class="page-title">Profile</h4>
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
								<a href="<?= base_url('profile') ?>">Profile</a>
							</li>
						</ul>
					</div>
					<div class="row">
						
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">My Profile</h4>
									</div>
								</div>
								<div class="card-body">
                                <style>
                                    .card {
                                            margin: 0 auto; /* Added */
                                            float: none; /* Added */
                                            margin-bottom: 10px; /* Added */
                                    }
                                </style>
                                <?php 
                                    foreach($profile as $dt):
                                ?>
                                    <div class="card col-md-6">
                                        <img class="card-img-top" src="<?= base_url('assets/images/'.$dt['image']) ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title text-center"><?= $dt['name'] ?></h5>
                                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Administrator</li>
                                            <li class="list-group-item"><?= $dt['email'] ?></li>
                                            <li class="list-group-item"><?= $dt['login_date'] ?> (Login date)</li>
                                        </ul>
                                        <div class="card-body text-center">
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#profile<?= $dt['user_id'] ?>">Edit Profile</button>
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#password<?= $dt['user_id'] ?>">Edit Password</button>
                                        </div>
                                    </div>

                                    <!-- Modal Edit Profile -->
                                    <div class="modal fade" id="profile<?= $dt['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span> 
                                                        <span class="fw-light">
                                                            Profile
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('profile/edit_profile') ?>" method="POST">
                                                            <div class="row">
                                                                <div class="col-md-6 pr-0">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Name</label>
                                                                        <input type="hidden" name="user_id" value="<?= $dt['user_id'] ?>">
                                                                        <input name="name" id="addName" type="text" class="form-control" value="<?= $dt['name'] ?>" placeholder="fill name">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Email</label>
                                                                        <input name="email" id="addEmail" type="email" class="form-control" value="<?= $dt['email'] ?>" placeholder="fill email">
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

                                        <!-- Modal Password -->
                                    <div class="modal fade" id="password<?= $dt['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span> 
                                                        <span class="fw-light">
                                                            Password
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('profile/edit_password') ?>" method="POST">
                                                            <div class="row">
                                                            <style>
                                                                #view_pass{
                                                                float: right;
                                                                margin-right: 10px;
                                                                margin-top: -20px;
                                                                position: relative;
                                                                z-index: 2;
                                                                cursor:pointer
                                                                } 
                                                            </style>
                                                                <div class="col-md-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Last Password</label>
                                                                        <input type="hidden" name="user_id" value="<?= $dt['user_id'] ?>">
                                                                        <input type="hidden" name="pass" value="<?= $dt['pass'] ?>">
                                                                        <input name="last_password" id="LastPass" type="password" class="form-control"  placeholder="fill last password">
                                                                        <span id="view_pass" toggle="#password-field" class="fa fa-eye-slash field_icon last-pass" ></span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>New Password</label>
                                                                        <input name="new_password" id="NewPass" type="password" class="form-control"  placeholder="fill new password">
                                                                        <span id="view_pass" toggle="#password-field" class="fa fa-eye-slash field_icon new-pass" ></span>
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
                                <?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            