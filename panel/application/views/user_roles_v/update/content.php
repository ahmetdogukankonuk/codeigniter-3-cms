        <div class="px-4 page-title title-color">
            <h3> <?php echo $this->lang->line('update-user-role'); ?> </h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("user_roles/update_user_role/$item->id"); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <label for="title" class="form-label text-color"><?php echo $this->lang->line('title'); ?></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo $this->lang->line('title'); ?>" value="<?php echo $item->title; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid mt-3">
                                        <button type="submit" class="btn btn-theme rounded-4 p-2">
                                            <?php echo $this->lang->line('update'); ?>
                                        </button>
                                    </div>
                                    <div class="d-grid mt-2">
                                        <a href="<?php echo base_url("user-roles") ?>" class="btn btn-outline-primary rounded-4 p-2">
                                            <?php echo $this->lang->line('cancel'); ?>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>