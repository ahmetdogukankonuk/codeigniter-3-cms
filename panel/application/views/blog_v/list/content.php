        <div class="px-4 page-title title-color">
            <h3>Blog</h3>
            <a href="<?php echo base_url("blog/new"); ?>" class="btn add-new-button text-white rounded-4 shadow float-end">
                <span><i class="bi bi-file-earmark-plus"></i> Add New</span>
            </a>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body mx-3 table-responsive">

                                <table id="example" class="table" width="100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Situation</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable" class="text-center" style="vertical-align: baseline;">
                                        
                                        <?php foreach($items as $item) { ?>
                                            <tr id="ord-<?php echo $item->id; ?>">
                                                <td class="sortable"><i class="bi bi-list fs-5"></i></td>
                                                <td> <?php echo $item->id; ?> </td>
                                                <td> <?php echo $item->title; ?> </td>
                                                <td>
                                                    <img class="img-fluid rounded-3" src="<?php echo base_url("uploads/blog_v/$item->imgUrl"); ?>" width="120px" alt="blog">
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="<?php echo base_url("blog/update/$item->id"); ?>">
                                                            <i class="bi bi-pencil-square fs-5 text-info mx-2"></i>
                                                        </a>
                                                        <a class="remove-btn" data-url="<?php echo base_url("blog/delete/$item->id"); ?>">
                                                            <i class="bi bi-trash fs-5 text-danger mx-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Situation</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>