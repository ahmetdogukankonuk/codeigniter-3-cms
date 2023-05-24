        <div class="px-4 page-title title-color">
            <h3> New Email </h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("email/multiple_email"); ?>" method="post" enctype="multipart/form-data">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="receiver" class="form-label text-color">Recevier</label>
                                                <select class="form-select" name="receiver" id="receiver"  aria-label="Default select example">
                                                    <option selected> Select a receiver </option>
                                                    <option value="all"> All </option>
                                                    <option value="users"> Users </option>
                                                    <option value="newstellers"> Newstellers </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="subject" class="form-label text-color"> Subject </label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="message" class="form-label text-color"> Message </label>
                                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid mt-3">
                                        <button type="submit" class="btn btn-theme rounded-4 p-2">
                                            Send
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