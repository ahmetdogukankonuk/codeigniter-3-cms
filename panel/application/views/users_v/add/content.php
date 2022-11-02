        <div class="px-4 page-title title-color">
            <h3>New User</h3>
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
                                                <label for="name" class="form-label text-color">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="surname" class="form-label text-color">Surname</label>
                                                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label text-color">Mail</label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Mail">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="userRoleID" class="form-label text-color">User Role</label>
                                                <select class="form-select" name="userRoleID" id="userRoleID"  aria-label="Default select example">
                                                    <option selected>Select a Category</option>
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
                                                <label for="password" class="form-label text-color">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="re_password" class="form-label text-color">Confirm Password</label>
                                                <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="addressTitle" class="form-label text-color">Address Title</label>
                                                <input type="text" class="form-control" name="addressTitle" id="addressTitle" placeholder="Address Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="country" class="form-label text-color">Country</label>
                                                <select class="form-select" name="country" id="country"  aria-label="Default select example">
                                                    <option selected value="Select a country" selected>Select a country</option>
                                                    <?php foreach($countries as $countries) { ?>
                                                        <option value="<?php echo $countries->name; ?>"><?php echo $countries->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="city" class="form-label text-color">City</label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="town" class="form-label text-color">Town</label>
                                                <input type="text" class="form-control" name="town" id="town" placeholder="Town">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="postCode" class="form-label text-color">Post Code</label>
                                                <input type="text" class="form-control" name="postCode" id="postCode" placeholder="Post Code">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 mt-3">
                                                <label for="address" class="form-label text-color">Address</label>
                                                <textarea name="address" class="form-control" id="address" placeholder="Address" cols="30" rows="12"></textarea>
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