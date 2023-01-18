<section>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="main-box-text mb-2 text-color">
                                            <a href="<?php echo base_url("products"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('INACTIVE-PRODUCTS'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("products-orders"); ?>">
                                                <span class="cancelled-orders-icon">
                                                    <i class="bi bi-bag-x fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_inactive_products_count(); ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="main-box-text mb-2">
                                            <a href="<?php echo base_url("products"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('ACTIVE-PRODUCTS'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("products"); ?>">
                                                <span class="incomplete-orders-icon">
                                                    <i class="bi bi-bag-dash fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_active_products_count(); ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="main-box-text mb-2">
                                            <a href="<?php echo base_url("products"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('SUGGESTED-PRODUCTS'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("products"); ?>">
                                                <span class="completed-orders-icon">
                                                    <i class="bi bi-bag-check fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_suggested_products_count(); ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="main-box-text mb-2">
                                            <a href="<?php echo base_url("products"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('PRODUCTS-ON-HOMEPAGE'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("products"); ?>">
                                                <span class="all-orders-icon">
                                                    <i class="bi bi-bag fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_on_main_products_count(); ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>