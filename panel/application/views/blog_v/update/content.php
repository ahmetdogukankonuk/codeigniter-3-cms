        <div class="px-4 page-title title-color">
            <h3>Update Post</h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("blog/update_post/$item->id"); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label text-color">Post Title (English)</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Post Title (English)" value="<?php echo $item->title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title_tr" class="form-label text-color">Post Title (Turkish)</label>
                                                <input type="text" class="form-control" name="title_tr" id="title_tr" placeholder="Post Title (Turkish)" value="<?php echo $item->title_tr; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="text" class="form-label text-color">Post Text (English)</label>
                                                <textarea class="form-control" name="text" id="text" cols="30" rows="10" placeholder="Post Text (English)"><?php echo $item->text; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="text_tr" class="form-label text-color">Post Text (Turkish)</label>
                                                <textarea class="form-control" name="text_tr" id="text_tr" cols="30" rows="10" placeholder="Post Text (Turkish)"><?php echo $item->text_tr; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 my-3">
                                            <img class="img-fluid rounded-4" src="<?php echo base_url("uploads/blog_v/$item->imgUrl"); ?>" alt="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="imgUrl" class="form-label">Select an Image</label>
                                            <input class="form-control" type="file" name="imgUrl" id="imgUrl">
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