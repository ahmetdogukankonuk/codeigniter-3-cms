        <div class="px-4 page-title title-color">
            <h3>Blog Comments</h3>
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
                                            <th scope="col"> <?php echo $this->lang->line('id'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('username'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('title'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('situation'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('action'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" style="vertical-align: baseline;">
                                        
                                        <?php foreach($items as $item) { ?>
                                            <tr id="ord-<?php echo $item->id; ?>">
                                                <td><i class="bi bi-list fs-5"></i></td>
                                                <td> <?php echo $item->id; ?> </td>
                                                <td> <?php echo get_user_name($item->userID); ?> <?php echo get_user_surname($item->userID); ?></td>
                                                <td> <?php echo $item->title; ?> </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input 
                                                            data-url="<?php echo base_url("blog/commentIsActiveSetter/$item->id"); ?>"
                                                            class="situationSetter form-check-input fs-4" 
                                                            type="checkbox" role="switch" id="situationSetter" 
                                                            dataID="<?php echo $item->id; ?>"
                                                            <?php echo ($item->isActive == 1) ? "checked" : ""; ?>
                                                        />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="update-product.html">
                                                            <i class="bi bi-eye fs-5 text-info mx-2"></i>
                                                        </a>
                                                        <a class="remove-btn" data-url="<?php echo base_url("blog/commentDelete/$item->id"); ?>">
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
                                            <th scope="col"> <?php echo $this->lang->line('id'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('username'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('title'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('situation'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('action'); ?> </th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>