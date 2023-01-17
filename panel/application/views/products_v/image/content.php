        <div class="px-4 page-title title-color">
            <h3> <?php echo $this->lang->line('product-images'); ?> </h3>
        </div>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-3 card-bg">
                            <div class="card-body mx-3 table-responsive">
                                <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
                                    <div class="dz-message">
                                        <h3 class="m-h-lg"> <?php echo $this->lang->line('drag-and-drop-files-here-to-upload'); ?> </h3>
                                        <p class="m-b-lg text-muted"> <?php echo $this->lang->line("you-can-drag-and-drop-your-images-to-upload-or-you-can-click and-select-here"); ?> </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-2 mt-5 card-bg">
                            <div class="card-body mx-3 table-responsive image_list_container">
                                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/image_list_v"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>