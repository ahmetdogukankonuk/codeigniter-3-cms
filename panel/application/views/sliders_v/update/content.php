        <div class="px-4 page-title title-color">
            <h3> <?php echo $this->lang->line('update-slider'); ?> </h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("sliders/update_slider/$item->id"); ?>" method="post" enctype="multipart/form-data">
                                    
                                    <div class="row">
                                        <div class="col-md-12 my-3">
                                            <img class="img-fluid rounded-4" src="<?php echo base_url("uploads/sliders_v/$item->imgUrl"); ?>" alt="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title" class="form-label text-color"><?php echo $this->lang->line('title'); ?></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo $this->lang->line('title'); ?>" value="<?php echo $item->title; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="buttonTitle" class="form-label text-color"><?php echo $this->lang->line('button-title'); ?></label>
                                                <input type="text" class="form-control" name="buttonTitle" id="buttonTitle" placeholder="<?php echo $this->lang->line('button-title'); ?>" value="<?php echo $item->buttonTitle; ?>"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="buttonLink" class="form-label text-color"><?php echo $this->lang->line('button-link'); ?></label>
                                                <input type="text" class="form-control" name="buttonLink" id="buttonLink" placeholder="<?php echo $this->lang->line('button-link'); ?>" value="<?php echo $item->buttonLink; ?>"></input>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="imgUrl" class="form-label"><?php echo $this->lang->line('select-an-image'); ?></label>
                                            <input class="form-control" type="file" name="imgUrl" id="imgUrl">
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid mt-3">
                                        <button type="submit" class="btn btn-theme rounded-4 p-2">
                                            <?php echo $this->lang->line('update'); ?>
                                        </button>
                                    </div>
                                    <div class="d-grid mt-2">
                                        <button type="submit" class="btn btn-outline-primary rounded-4 p-2">
                                            <?php echo $this->lang->line('cancel'); ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>