        <section>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-4">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="main-box-text mb-2 text-color">
                                            <?php echo $this->lang->line('USERS'); ?>
                                        </div>
                                        <div>
                                            <span class="people-icon">
                                                <i class="bi bi-people fs-3"></i>
                                            </span>
                                            <span class="main-box-number mx-2">
                                                <?php echo get_users_count(); ?>
                                            </span>
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
                                            <?php echo $this->lang->line('PRODUCTS'); ?>
                                        </div>
                                        <div>
                                            <span class="box-icon">
                                                <i class="bi bi-box fs-3"></i>
                                            </span>
                                            <span class="main-box-number mx-2">
                                                <?php echo get_products_count(); ?>
                                            </span>
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
                                            <?php echo $this->lang->line('ORDERS'); ?>
                                        </div>
                                        <div>
                                            <span class="chat-icon">
                                                <i class="bi bi-bag fs-3"></i>
                                            </span>
                                            <span class="main-box-number mx-2">
                                                <?php echo get_orders_count(); ?>
                                            </span>
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
                                            <?php echo $this->lang->line('REVENUE'); ?>
                                        </div>
                                        <div>
                                            <span class="dollar-icon">
                                                <i class="bi bi-currency-dollar fs-3"></i>
                                            </span>
                                            <span class="main-box-number mx-2">
                                                <?php echo get_orders_sum(); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="my-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow p-4 card-bg">
                            <canvas id="myChart" height="480px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>