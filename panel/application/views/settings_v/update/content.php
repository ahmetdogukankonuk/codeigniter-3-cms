        <div class="px-4 page-title title-color">
            <h3><?php echo $this->lang->line('settings'); ?></h3>
        </div>
        
        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">

                    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabs"); ?>

                    <div class="col-md-9">
                        <div class="tab-content">

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/website"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/email"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/company"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/social"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/address"); ?>
                            
                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/about"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/mission"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/vision"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/privacy"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/terms"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/navbar_logo"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/footer_logo"); ?>

                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/favicon"); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>