        <header class="header" id="header">
            <div class="toggle">
                <i class='bi bi-list title-color' id="header-toggle"></i>
            </div>
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
					<a href="#" data-bs-toggle="dropdown">
                        <img src="<?php echo base_url("assets"); ?>/img/profile.jpeg" width="30px" class="profile-img">
                    </a>
                    <div class="dropdown-menu shadow-lg rounded-4">
                        <a class="dropdown-item" href="<?php echo base_url("profile"); ?>">
                            <i class="bi bi-person dropdown-icon mx-1"></i>
                            <?php echo $this->lang->line('profile'); ?>
                        </a>
                        <a class="dropdown-item" href="<?php echo base_url("settings"); ?>">
                            <i class="bi bi-gear dropdown-icon mx-1"></i>
                            <?php echo $this->lang->line('settings'); ?>
                        </a>
                        <a class="dropdown-item" href="<?php echo base_url("logout"); ?>">
                            <i class="bi bi-box-arrow-left dropdown-icon mx-1"></i>
                            <?php echo $this->lang->line('logout'); ?>
                        </a>
                        <a class="dropdown-item">
                            <div class="form-check form-switch d-flex justify-content-start">
                                <input class="form-check-input fs-6 me-2" type="checkbox" role="switch" id="darkMode" onclick="changeStatus()">
                                <?php echo $this->lang->line('dark-mode'); ?>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </header>