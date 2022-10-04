        <div class="px-4 page-title title-color">
            <h3>Update User</h3>
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
                                                <label for="name" class="form-label text-color">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $item->name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="surname" class="form-label text-color">Surname</label>
                                                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" value="<?php echo $item->surname; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="email" class="form-label text-color">Mail</label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Mail" value="<?php echo $item->email; ?>"
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="userRoleID" class="form-label text-color">User Role</label>
                                                <select class="form-select" name="userRoleID" id="userRoleID"  aria-label="Default select example">
                                                    <option selected value="<?php echo $item->userRoleID; ?>" selected><?php echo get_user_role($item->userRoleID); ?></option>
                                                    <?php foreach($user_roles as $user_roles) { ?>
                                                        <option value="<?php echo $user_roles->id; ?>"><?php echo $user_roles->title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid mt-3">
                                        <button type="submit" class="btn btn-theme rounded-4 p-2">
                                            Save
                                        </button>
                                    </div>
                                    <div class="d-grid mt-2">
                                        <button type="submit" class="btn btn-outline-primary rounded-4 p-2">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>