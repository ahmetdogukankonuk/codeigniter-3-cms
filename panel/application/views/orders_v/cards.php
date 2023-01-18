        <section>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="main-box-text mb-2 text-color">
                                            <a href="<?php echo base_url("cancelled-orders"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('CANCELLED-ORDERS'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("cancelled-orders"); ?>">
                                                <span class="cancelled-orders-icon">
                                                    <i class="bi bi-bag-x fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_cancelled_orders_count(); ?>
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
                                            <a href="<?php echo base_url("incomplete-orders"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('INCOMPLETE-ORDERS'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("incomplete-orders"); ?>">
                                                <span class="incomplete-orders-icon">
                                                    <i class="bi bi-bag-dash fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_incomplete_orders_count(); ?>
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
                                            <a href="<?php echo base_url("completed-orders"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('COMPLETED-ORDERS'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("completed-orders"); ?>">
                                                <span class="completed-orders-icon">
                                                    <i class="bi bi-bag-check fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_completed_orders_count(); ?>
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
                                            <a href="<?php echo base_url("orders"); ?>" class="main-box-text mb-2 text-color">
                                                <?php echo $this->lang->line('ALL-ORDERS'); ?>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url("all-orders"); ?>">
                                                <span class="all-orders-icon">
                                                    <i class="bi bi-bag fs-3"></i>
                                                </span>
                                                <span class="main-box-number mx-2">
                                                    <?php echo get_orders_count(); ?>
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