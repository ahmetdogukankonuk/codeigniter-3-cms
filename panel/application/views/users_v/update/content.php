        <div class="px-4 page-title title-color">
            <h3> <?php echo $this->lang->line('update-user'); ?> </h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("users/update_user/$item->id"); ?>" method="post">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label text-color"><?php echo $this->lang->line('name'); ?></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $this->lang->line('name'); ?>" value="<?php echo $item->name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="surname" class="form-label text-color"><?php echo $this->lang->line('surname'); ?></label>
                                                <input type="text" class="form-control" name="surname" id="surname" placeholder="<?php echo $this->lang->line('surname'); ?>" value="<?php echo $item->surname; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="email" class="form-label text-color"><?php echo $this->lang->line('e-mail'); ?></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $this->lang->line('e-mail'); ?>" value="<?php echo $item->email; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="userRoleID" class="form-label text-color"><?php echo $this->lang->line('user-role'); ?></label>
                                                <select class="form-select" name="userRoleID" id="userRoleID"  aria-label="Default select example">
                                                    <option selected value="<?php echo $item->userRoleID; ?>" selected><?php echo get_user_role($item->userRoleID); ?></option>
                                                    <?php foreach($user_roles as $user_roles) { ?>
                                                        <option value="<?php echo $user_roles->id; ?>"><?php echo $user_roles->title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="addressTitle" class="form-label text-color"><?php echo $this->lang->line('address-title'); ?></label>
                                                <input type="text" class="form-control" name="addressTitle" id="addressTitle" placeholder="<?php echo $this->lang->line('address-title'); ?>" value="<?php echo $item->addressTitle; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="country" class="form-label text-color"><?php echo $this->lang->line('country'); ?></label>
                                                <select class="form-select" name="country" id="country"  aria-label="Default select example">
                                                    <option selected value="<?php echo $item->country; ?>" selected><?php echo $item->country; ?></option>
                                                    <?php foreach($countries as $countries) { ?>
                                                        <option value="<?php echo $countries->name; ?>"><?php echo $countries->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="city" class="form-label text-color"><?php echo $this->lang->line('city'); ?></label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="<?php echo $this->lang->line('city'); ?>" value="<?php echo $item->city; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="town" class="form-label text-color"><?php echo $this->lang->line('town'); ?></label>
                                                <input type="text" class="form-control" name="town" id="town" placeholder="<?php echo $this->lang->line('town'); ?>" value="<?php echo $item->town; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="postCode" class="form-label text-color"><?php echo $this->lang->line('post-code'); ?></label>
                                                <input type="text" class="form-control" name="postCode" id="postCode" placeholder="<?php echo $this->lang->line('post-code'); ?>" value="<?php echo $item->postCode; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 mt-3">
                                                <label for="address" class="form-label text-color"><?php echo $this->lang->line('address'); ?></label>
                                                <textarea name="address" class="form-control" id="address" placeholder="<?php echo $this->lang->line('address'); ?>" cols="30" rows="12"><?php echo $item->address; ?></textarea>
                                            </div>
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