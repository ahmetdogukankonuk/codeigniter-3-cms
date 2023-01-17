                            <div class="tab-pane" id="company" role="tabpanel">
                                <div class="card border-0 rounded-4 shadow py-2 card-bg">
                                    <div class="card-header card-bg">
                                        <h5 class="card-title text-color mb-0">
                                            <strong><?php echo $this->lang->line('company'); ?></strong>
                                        </h5>
                                    </div>
                                    <div class="card-body mx-2">
                                        <form action="<?php echo base_url("settings/company_update"); ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="companyName" class="form-label text-color"><?php echo $this->lang->line('company-name'); ?></label>
                                                        <input type="text" class="form-control" name="companyName" id="companyName" placeholder="<?php echo $this->lang->line('company-name'); ?>" value="<?php echo $company->companyName; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="companyMotto" class="form-label text-color"><?php echo $this->lang->line('company-motto'); ?></label>
                                                        <input type="text" class="form-control" name="companyMotto" id="companyMotto" placeholder="<?php echo $this->lang->line('company-motto'); ?>" value="<?php echo $company->companyMotto; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="mail1" class="form-label text-color"><?php echo $this->lang->line('e-mail'); ?> 1</label>
                                                        <input type="text" class="form-control" name="mail1" id="mail1" placeholder="<?php echo $this->lang->line('e-mail'); ?> 1" value="<?php echo $company->mail1; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="mail2" class="form-label text-color"><?php echo $this->lang->line('e-mail'); ?> 2</label>
                                                        <input type="text" class="form-control" name="mail2" id="mail2" placeholder="<?php echo $this->lang->line('e-mail'); ?> 2" value="<?php echo $company->mail2; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phone1" class="form-label text-color"><?php echo $this->lang->line('phone'); ?> 1</label>
                                                        <input type="tel" class="form-control" name="phone1" id="phone1" placeholder="<?php echo $this->lang->line('phone'); ?> 1" value="<?php echo $company->phone1; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phone2" class="form-label text-color"><?php echo $this->lang->line('phone'); ?> 2</label>
                                                        <input type="tel" class="form-control" name="phone2" id="phone2" placeholder="<?php echo $this->lang->line('phone'); ?> 2" value="<?php echo $company->phone2; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="fax1" class="form-label text-color"><?php echo $this->lang->line('fax'); ?> 1</label>
                                                        <input type="tel" class="form-control" name="fax1" id="fax1" placeholder="<?php echo $this->lang->line('fax'); ?> 1" value="<?php echo $company->fax1; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="fax2" class="form-label text-color"><?php echo $this->lang->line('fax'); ?> 2</label>
                                                        <input type="tel" class="form-control" name="fax2" id="fax2" placeholder="<?php echo $this->lang->line('fax'); ?> 2" value="<?php echo $company->fax2; ?>">
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