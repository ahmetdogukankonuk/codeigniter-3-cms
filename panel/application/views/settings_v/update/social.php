                            <div class="tab-pane" id="social" role="tabpanel">
                                <div class="card border-0 rounded-4 shadow py-2 card-bg">
                                    <div class="card-header card-bg">
                                        <h5 class="card-title text-color mb-0">
                                            <strong><?php echo $this->lang->line('social-media'); ?></strong>
                                        </h5>
                                    </div>
                                    <div class="card-body mx-2">
                                        <form action="<?php echo base_url("settings/social_update"); ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="facebook" class="form-label text-color">Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $social->facebook; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="instagram" class="form-label text-color">Instagram</label>
                                                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $social->instagram; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="twitter" class="form-label text-color">Twitter</label>
                                                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $social->twitter; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="linkedin" class="form-label text-color">Linkedin</label>
                                                        <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Linkedin" value="<?php echo $social->linkedin; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="pinterest" class="form-label text-color">Pinterest</label>
                                                        <input type="text" class="form-control" name="pinterest" id="pinterest" placeholder="Pinterest" value="<?php echo $social->pinterest; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="youtube" class="form-label text-color">Youtube</label>
                                                        <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Youtube" value="<?php echo $social->youtube; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tiktok" class="form-label text-color">Tiktok</label>
                                                        <input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="Tiktok" value="<?php echo $social->tiktok; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="whatsapp" class="form-label text-color">Whatsapp</label>
                                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="Whatsapp" value="<?php echo $social->whatsapp; ?>">
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