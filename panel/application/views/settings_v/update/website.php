                            <div class="tab-pane active" id="website" role="tabpanel">
                                <div class="card border-0 rounded-4 shadow py-2 card-bg">
                                    <div class="card-header card-bg">
                                        <h5 class="card-title text-color mb-0">
                                            <strong><?php echo $this->lang->line('website'); ?></strong>
                                        </h5>
                                    </div>
                                    <div class="card-body mx-2">
                                        <form action="<?php echo base_url("settings/website_update"); ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteTitle" class="form-label text-color"><?php echo $this->lang->line('website-title'); ?></label>
                                                        <input type="text" class="form-control" name="websiteTitle" id="websiteTitle" placeholder="<?php echo $this->lang->line('website-title'); ?>" value="<?php echo $website->websiteTitle; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteDescription" class="form-label text-color"><?php echo $this->lang->line('website-description'); ?></label>
                                                        <input type="text" class="form-control" name="websiteDescription" id="websiteDescription" placeholder="<?php echo $this->lang->line('website-description'); ?>" value="<?php echo $website->websiteDescription; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteAuthor" class="form-label text-color"><?php echo $this->lang->line('website-author'); ?></label>
                                                        <input type="text" class="form-control" name="websiteAuthor" id="websiteAuthor" placeholder="<?php echo $this->lang->line('website-author'); ?>" value="<?php echo $website->websiteAuthor; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteOwner" class="form-label text-color"><?php echo $this->lang->line('website-owner'); ?></label>
                                                        <input type="text" class="form-control" name="websiteOwner" id="websiteOwner" placeholder="<?php echo $this->lang->line('website-owner'); ?>" value="<?php echo $website->websiteOwner; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteKeywords" class="form-label text-color"><?php echo $this->lang->line('website-keywords'); ?></label>
                                                        <input type="text" class="form-control" name="websiteKeywords" id="websiteKeywords" placeholder="<?php echo $this->lang->line('website-keywords'); ?>" value="<?php echo $website->websiteKeywords; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteCopyright" class="form-label text-color"><?php echo $this->lang->line('website-copyright'); ?></label>
                                                        <input type="text" class="form-control" name="websiteCopyright" id="websiteCopyright" placeholder="<?php echo $this->lang->line('website-copyright'); ?>" value="<?php echo $website->websiteCopyright; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="googleVerification" class="form-label text-color"><?php echo $this->lang->line('google-site-verification'); ?></label>
                                                        <input type="text" class="form-control" name="googleVerification" id="googleVerification" placeholder="<?php echo $this->lang->line('google-site-verification'); ?>" value="<?php echo $website->googleVerification; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="pinterestVerification" class="form-label text-color"><?php echo $this->lang->line('pinterest-site-verification'); ?></label>
                                                        <input type="text" class="form-control" name="pinterestVerification" id="pinterestVerification" placeholder="<?php echo $this->lang->line('pinterest-site-verification'); ?>" value="<?php echo $website->pinterestVerification; ?>">
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