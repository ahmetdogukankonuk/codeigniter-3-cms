        <div class="px-4 page-title title-color">
            <h3> View Mail </h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-header card-bg">
                                <div class="row">
                                    <div class="col-md d-flex">
                                        <img class="rounded-circle" src="<?php echo base_url("assets"); ?>/img/profile.jpeg" height="40px">
                                        <div class="flex-1 ms-2 ps-1 mt-2">
                                            <a href="#">
                                                <span class="ms-1 text-primary">&lt;<?php echo $item->sender; ?>&gt;</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-auto ms-auto d-flex align-items-center"><small> <?php echo $item->sendTime; ?> </small><span class="bi bi-clock ms-2 text-info"></span></div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h4 class="mb-3 text-center"><?php echo $item->subject; ?></h4>
                                <p class="text-center">
                                    <?php echo $item->message; ?>
                                </p>
                                <div class="d-grid mt-4">
                                    <a href="<?php echo base_url("mailer"); ?>" class="btn btn-theme rounded-4 p-2">
                                        Go Back To Messages
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>