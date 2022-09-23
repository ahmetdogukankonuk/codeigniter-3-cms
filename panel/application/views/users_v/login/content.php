        <div class="container">
            <h3 class="text-center pt-6 pb-4">
                <b> Lorem LLC </b>
            </h3>
        </div>
        <section class="mt-6">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card border-0 rounded-4 shadow p-5">
                            <div class="col-md-12">
                                <h6 class="text-center mb-4">
                                    <b> A lot of hard work is hidden behind nice things. </b>
                                </h6>
                            </div>
                            <form action="<?php echo base_url("userop/do_login"); ?>" method="post">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" class="form-control rounded-4" name="email" id="email" placeholder="E-Mail Address">
                                        <?php if(isset($form_error)){ ?>
                                            <small class="text-danger"> <?php echo form_error("email"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="password" class="form-control rounded-4" name="password" id="password" placeholder="Password">
                                        <?php if(isset($form_error)){ ?>
                                            <small class="text-danger"> <?php echo form_error("password"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary rounded-4 p-2">
                                        Login
                                    </button>
                                    <a href="<?php echo base_url("register"); ?>" class="btn btn-outline-primary rounded-4 p-2 mt-2">
                                        Register
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container text-center py-4">
            <a class="text-black no-underline" href="<?php echo base_url("forget-password"); ?>">
                <b>Forgot Password?</b>
            </a>
        </div>