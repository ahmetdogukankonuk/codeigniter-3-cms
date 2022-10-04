        <div class="px-4 page-title title-color">
            <h3>New Category</h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("product_categories/add_product_categories"); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label text-color">Category Name (English)</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Category Name (English)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title_tr" class="form-label text-color">Category Name (Turkish)</label>
                                                <input type="text" class="form-control" name="title_tr" id="title_tr" placeholder="Category Name (Turkish)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description" class="form-label text-color">Category Description (English)</label>
                                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Category Description (English)"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description_tr" class="form-label text-color">Category Description (Turkish)</label>
                                                <textarea class="form-control" name="description_tr" id="description_tr" cols="30" rows="10" placeholder="Category Description (Turkish)"></textarea>
                                            </div>
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