                                <table id="example" class="table" width="100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"> <?php echo $this->lang->line('id'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('image-title'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('image'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('cover-image'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('situation'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('action'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable" class="sortable text-center" data-url="<?php echo base_url("products/imageRankSetter"); ?>" style="vertical-align: baseline;">
                                    
                                        <?php foreach($item_images as $items){ ?>
                                            <tr id="ord-<?php echo $items->id; ?>">
                                                <td><i class="bi bi-list fs-5"></i></td>
                                                <td> <?php echo $items->id; ?> </td>
                                                <td> <?php echo $items->imgUrl; ?> </td>
                                                <td>
                                                    <img class="img-fluid rounded-3" src="<?php echo base_url("uploads/products_v/$items->imgUrl"); ?>" width="120px" alt="category">
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input 
                                                            data-url="<?php echo base_url("products/isCoverSetter/$items->id/$items->productID"); ?>"
                                                            class="isCover form-check-input fs-4" 
                                                            type="checkbox" role="switch" id="isCover" 
                                                            dataID="<?php echo $items->id; ?>"
                                                            <?php echo ($items->isCover == 1) ? "checked" : ""; ?>
                                                        />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input 
                                                            data-url="<?php echo base_url("products/imageIsActiveSetter/$items->id"); ?>"
                                                            class="situationSetter form-check-input fs-4" 
                                                            type="checkbox" role="switch" id="isActive" 
                                                            dataID="<?php echo $items->id; ?>"
                                                            <?php echo ($items->isActive == 1) ? "checked" : ""; ?>
                                                        />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a class="remove-btn" data-url="<?php echo base_url("products/imageDelete/$items->id/$items->productID"); ?>">
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
                                            <th scope="col"> <?php echo $this->lang->line('image-title'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('image'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('cover-image'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('situation'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('action'); ?> </th>
                                        </tr>
                                    </tfoot>
                                </table>