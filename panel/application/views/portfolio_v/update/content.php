        <div class="px-4 page-title title-color">
            <h3>Update Project</h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("portfolio/update_project/$item->id"); ?>" method="post" enctype="multipart/form-data">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="date" class="form-label text-color">Project Date</label>
                                                <input type="date" class="form-control" name="date" id="date" placeholder="Project Date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label text-color">Project Name (English)</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Project Name (English)" value="<?php echo $item->title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title_tr" class="form-label text-color">Project Name (Turkish)</label>
                                                <input type="text" class="form-control" name="title_tr" id="title_tr" placeholder="Project Name (Turkish)" value="<?php echo $item->title_tr; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description" class="form-label text-color">Project Description (English)</label>
                                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Project Description (English)"><?php echo $item->description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description_tr" class="form-label text-color">Project Description (Turkish)</label>
                                                <textarea class="form-control" name="description_tr" id="description_tr" cols="30" rows="10" placeholder="Project Description (Turkish)"><?php echo $item->description_tr; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="video" class="form-label text-color">Project Video</label>
                                                <input type="text" class="form-control" name="video" id="video" placeholder="Project Video" value="<?php echo $item->video; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="companyName" class="form-label text-color">Company Name</label>
                                                <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" value="<?php echo $item->companyName; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="companyWebsite" class="form-label text-color">Company Website</label>
                                                <input type="text" class="form-control" name="companyWebsite" id="companyWebsite" placeholder="Company Website" value="<?php echo $item->companyWebsite; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="companyPhone" class="form-label text-color">Company Phone</label>
                                                <input type="text" class="form-control" name="companyPhone" id="companyPhone" placeholder="Company Phone" value="<?php echo $item->companyPhone; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="companyMail" class="form-label text-color">Company Mail</label>
                                                <input type="text" class="form-control" name="companyMail" id="companyMail" placeholder="Company Mail" value="<?php echo $item->companyMail; ?>">
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