        <div class="px-4 page-title title-color">
            <h3>New Product</h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-5 card-bg">
                            <div class="px-xl-5 px-4">
                                <form action="<?php echo base_url("products/save"); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="categoryID" class="form-label text-color">Product Category</label>
                                                <select class="form-select" name="categoryID" id="categoryID"  aria-label="Default select example">
                                                    <option selected>Select a Category</option>
                                                    <?php foreach($product_categories as $product_categories) { ?>
                                                        <option value="<?php echo $product_categories->id; ?>"><?php echo $product_categories->title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label text-color">Product Name (English)</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Product Name (English)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title_tr" class="form-label text-color">Product Name (Turkish)</label>
                                                <input type="text" class="form-control" name="title_tr" id="title_tr" placeholder="Product Name (Turkish)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description" class="form-label text-color">Product Description (English)</label>
                                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Product Description (English)"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description_tr" class="form-label text-color">Product Description (Turkish)</label>
                                                <textarea class="form-control" name="description_tr" id="description_tr" cols="30" rows="10" placeholder="Product Description (Turkish)"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="video" class="form-label text-color">Product Video</label>
                                                <input type="text" class="form-control" name="video" id="video" placeholder="Product Video">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="price" class="form-label text-color">Product Price ($)</label>
                                                <input type="number" class="form-control" name="price" id="price" placeholder="Product Price ($)">
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