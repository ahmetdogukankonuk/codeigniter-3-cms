        <div class="px-4 page-title title-color">
            <h3> <?php echo $this->lang->line('sliders'); ?> </h3>
            <a href="<?php echo base_url("sliders/new") ?>" class="btn add-new-button text-white rounded-4 shadow float-end">
                <span><i class="bi bi-file-earmark-plus"></i> <?php echo $this->lang->line('add-new'); ?></span>
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
                                            <th scope="col"> <?php echo $this->lang->line('id'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('title'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('image'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('situation'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('action'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable" class="text-center" style="vertical-align: baseline;">
                                        
                                        <?php foreach($items as $item) { ?>
                                            <tr id="ord-<?php echo $item->id; ?>">
                                                <td class="sortable"><i class="bi bi-list fs-5"></i></td>
                                                <td> <?php echo $item->id; ?> </td>
                                                <td> <?php echo $item->title; ?> </td>
                                                <td>
                                                    <img class="img-fluid rounded-3" src="<?php echo base_url("uploads/sliders_v/$item->imgUrl"); ?>" width="120px" alt="category">
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input 
                                                            data-url="<?php echo base_url("sliders/isActiveSetter/$item->id"); ?>"
                                                            class="situationSetter form-check-input fs-4" 
                                                            type="checkbox" role="switch" id="situationSetter" 
                                                            dataID="<?php echo $item->id; ?>"
                                                            <?php echo ($item->isActive == 1) ? "checked" : ""; ?>
                                                        />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="<?php echo base_url("sliders/update/$item->id"); ?>">
                                                            <i class="bi bi-pencil-square fs-5 text-info mx-2"></i>
                                                        </a>
                                                        <a class="remove-btn" data-url="<?php echo base_url("sliders/delete/$item->id"); ?>">
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
                                            <th scope="col"> <?php echo $this->lang->line('title'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('image'); ?> </th>
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