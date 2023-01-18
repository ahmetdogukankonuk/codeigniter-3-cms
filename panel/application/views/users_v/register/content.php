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
                            <form action="<?php echo base_url("userop/admin_registration_application"); ?>" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <input type="text" class="form-control rounded-4" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <input type="text" class="form-control rounded-4" name="surname" id="surname" placeholder="Surname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <input type="mail" class="form-control rounded-4" name="email" id="email" placeholder="E-Mail Address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <input type="password" class="form-control rounded-4" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <input type="password" class="form-control rounded-4" name="re_password" id="re_password" placeholder="Confirm Your Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary rounded-4 p-2">
                                        Register
                                    </button>
                                    <a href="<?php echo base_url("login"); ?>" class="btn btn-outline-primary rounded-4 p-2 mt-2">
                                        Login
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>