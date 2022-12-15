<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url('assets/') ?>/images/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $this->session->name ?>
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?php if($menu == 'Dashboard'){ echo "active";} ?>">
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if($menu == 'Monitoring'){ echo "active";} ?>">
                    <a href="<?= base_url('monitoring') ?>">
                        <i class="fas fa-desktop"></i>
                        <p>Monitoring</p>
                    </a>
                </li>
                <li class="nav-item <?php if($menu == 'Dormitory'){ echo "active";} ?>">
                    <a href="<?= base_url('dormitory') ?>">
                        <i class="fas fa-home"></i>
                        <p>Dormitory</p>
                    </a>
                </li>
                <li class="nav-item <?php if($menu == 'Setting'){ echo "active";} ?>">
                    <a href="<?= base_url('setting') ?>">
                        <i class="fas fa-cogs"></i>
                        <p>Setting</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->