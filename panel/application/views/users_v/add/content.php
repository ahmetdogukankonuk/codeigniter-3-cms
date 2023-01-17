        <div class="px-4 page-title title-color">
            <h3> <?php echo $this->lang->line('new-user'); ?> </h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("users/admin_register"); ?>" method="post">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label text-color"><?php echo $this->lang->line('name'); ?></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $this->lang->line('name'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="surname" class="form-label text-color"><?php echo $this->lang->line('surname'); ?></label>
                                                <input type="text" class="form-control" name="surname" id="surname" placeholder="<?php echo $this->lang->line('surname'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label text-color"><?php echo $this->lang->line('e-mail'); ?></label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $this->lang->line('e-mail'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="userRoleID" class="form-label text-color"><?php echo $this->lang->line('user-role'); ?></label>
                                                <select class="form-select" name="userRoleID" id="userRoleID"  aria-label="Default select example">
                                                    <option selected><?php echo $this->lang->line('select-a-role'); ?></option>
                                                    <?php foreach($user_roles as $user_roles) { ?>
                                                        <option value="<?php echo $user_roles->id; ?>"><?php echo $user_roles->title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label text-color"><?php echo $this->lang->line('password'); ?></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $this->lang->line('password'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="re_password" class="form-label text-color"><?php echo $this->lang->line('confirm-password'); ?></label>
                                                <input type="password" class="form-control" name="re_password" id="re_password" placeholder="<?php echo $this->lang->line('confirm-password'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="addressTitle" class="form-label text-color"><?php echo $this->lang->line('address-title'); ?></label>
                                                <input type="text" class="form-control" name="addressTitle" id="addressTitle" placeholder="<?php echo $this->lang->line('address-title'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="country" class="form-label text-color"><?php echo $this->lang->line('country'); ?></label>
                                                <select class="form-select" name="country" id="country"  aria-label="Default select example">
                                                    <option selected value="<?php echo $this->lang->line('select-a-country'); ?>" selected><?php echo $this->lang->line('select-a-country'); ?></option>
                                                    <?php foreach($countries as $countries) { ?>
                                                        <option value="<?php echo $countries->name; ?>"><?php echo $countries->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="city" class="form-label text-color"><?php echo $this->lang->line('city'); ?></label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="<?php echo $this->lang->line('city'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="town" class="form-label text-color"><?php echo $this->lang->line('town'); ?></label>
                                                <input type="text" class="form-control" name="town" id="town" placeholder="<?php echo $this->lang->line('town'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="postCode" class="form-label text-color"><?php echo $this->lang->line('post-code'); ?></label>
                                                <input type="text" class="form-control" name="postCode" id="postCode" placeholder="<?php echo $this->lang->line('post-code'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 mt-3">
                                                <label for="address" class="form-label text-color"><?php echo $this->lang->line('address'); ?></label>
                                                <textarea name="address" class="form-control" id="address" placeholder="<?php echo $this->lang->line('address'); ?>" cols="30" rows="12"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid mt-3">
                                        <button type="submit" class="btn btn-theme rounded-4 p-2">
                                            <?php echo $this->lang->line('save'); ?>
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