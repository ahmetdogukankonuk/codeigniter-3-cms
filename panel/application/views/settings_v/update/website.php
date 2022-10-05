                            <div class="tab-pane active" id="website" role="tabpanel">
                                <div class="card border-0 rounded-4 shadow py-2 card-bg">
                                    <div class="card-header card-bg">
                                        <h5 class="card-title text-color mb-0">
                                            <strong>Website Info</strong>
                                        </h5>
                                    </div>
                                    <div class="card-body mx-2">
                                        <form action="<?php echo base_url("settings/website_update"); ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteTitle" class="form-label text-color">Website Title</label>
                                                        <input type="text" class="form-control" name="websiteTitle" id="websiteTitle" placeholder="Website Title" value="<?php echo $website->websiteTitle; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteDescription" class="form-label text-color">Website Description</label>
                                                        <input type="text" class="form-control" name="websiteDescription" id="websiteDescription" placeholder="Website Description" value="<?php echo $website->websiteDescription; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteAuthor" class="form-label text-color">Website Author</label>
                                                        <input type="text" class="form-control" name="websiteAuthor" id="websiteAuthor" placeholder="Website Author" value="<?php echo $website->websiteAuthor; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteOwner" class="form-label text-color">Website Owner</label>
                                                        <input type="text" class="form-control" name="websiteOwner" id="websiteOwner" placeholder="Website Owner" value="<?php echo $website->websiteOwner; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteKeywords" class="form-label text-color">Website Keywords</label>
                                                        <input type="text" class="form-control" name="websiteKeywords" id="websiteKeywords" placeholder="Website Keywords" value="<?php echo $website->websiteKeywords; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="websiteCopyright" class="form-label text-color">Website Copyright</label>
                                                        <input type="text" class="form-control" name="websiteCopyright" id="websiteCopyright" placeholder="Website Copyright" value="<?php echo $website->websiteCopyright; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="googleVerification" class="form-label text-color">Google Site Verification</label>
                                                        <input type="text" class="form-control" name="googleVerification" id="googleVerification" placeholder="Google Site Verification" value="<?php echo $website->googleVerification; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="pinterestVerification" class="form-label text-color">Pinterest Site Verification</label>
                                                        <input type="text" class="form-control" name="pinterestVerification" id="pinterestVerification" placeholder="Pinterest Site Verification" value="<?php echo $website->pinterestVerification; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-3">
                                                <button type="submit" class="btn btn-theme rounded-4 p-2">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>