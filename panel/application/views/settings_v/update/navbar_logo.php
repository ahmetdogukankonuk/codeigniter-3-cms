                            <div class="tab-pane" id="navbarlogo" role="tabpanel">
                                <div class="card border-0 rounded-4 shadow py-2 card-bg">
                                    <div class="card-header card-bg">
                                        <h5 class="card-title text-color mb-0">
                                            <strong><?php echo $this->lang->line('navbar-logo'); ?></strong>
                                        </h5>
                                    </div>
                                    <div class="card-body mx-2">
                                        <form action="<?php echo base_url("settings/navbar_logo_update"); ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 mb-4 mt-2">
                                                    <img class="img-fluid rounded-4" src="<?php echo base_url("uploads/settings_v/$logo->navbarLogo"); ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="navbarLogo" class="form-label text-color"><?php echo $this->lang->line('select-a-logo-for-navbar'); ?></label>
                                                        <input class="form-control" type="file" name="navbarLogo" id="navbarLogo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="navbarLogoSize" class="form-label text-color"> Navbar Logo Size (Rem)</label>
                                                        <input type="number" class="form-control" name="navbarLogoSize" id="navbarLogoSize" placeholder="Navbar Logo Size" value="<?php echo $logo->navbarLogoSize; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-3">
                                                <button type="submit" class="btn btn-theme rounded-4 p-2">
                                                    <?php echo $this->lang->line('save'); ?>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>