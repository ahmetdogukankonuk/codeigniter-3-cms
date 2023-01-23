                            <div class="tab-pane" id="email" role="tabpanel">
                                <div class="card border-0 rounded-4 shadow py-2 card-bg">
                                    <div class="card-header card-bg">
                                        <h5 class="card-title text-color mb-0">
                                            <strong><?php echo $this->lang->line('email'); ?></strong>
                                        </h5>
                                    </div>
                                    <div class="card-body mx-2">
                                        <form action="<?php echo base_url("settings/email_update"); ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="protocol" class="form-label text-color"> Protocol </label>
                                                        <input type="text" class="form-control" name="protocol" id="protocol" placeholder="Protocol" value="<?php echo $email->protocol; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="host" class="form-label text-color"> Host </label>
                                                        <input type="text" class="form-control" name="host" id="host" placeholder="Host" value="<?php echo $email->host; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="port" class="form-label text-color"> Port </label>
                                                        <input type="text" class="form-control" name="port" id="port" placeholder="Port" value="<?php echo $email->port; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="user" class="form-label text-color"> User </label>
                                                        <input type="text" class="form-control" name="user" id="user" placeholder="User" value="<?php echo $email->user; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label text-color"> Password </label>
                                                        <input type="tel" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $email->password; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label text-color"> From </label>
                                                        <input type="tel" class="form-control" name="from" id="from" placeholder="From" value="<?php echo $email->from; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="to" class="form-label text-color"> To </label>
                                                        <input type="tel" class="form-control" name="to" id="to" placeholder="To" value="<?php echo $email->to; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="userName" class="form-label text-color"> User Name </label>
                                                        <input type="tel" class="form-control" name="userName" id="userName" placeholder="User Name" value="<?php echo $email->userName; ?>">
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