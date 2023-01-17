        <div class="px-4 page-title">
            <h3 class="title-color"> <?php echo $this->lang->line('cancelled-orders'); ?> </h3>
            <a href="" class="btn add-new-button text-white rounded-4 shadow float-end">
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
                                            <th scope="col"> <?php echo $this->lang->line('customer-name'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('customer-surname'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('date'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('situation'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('action'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-color" style="vertical-align: baseline;">
                                    
                                        <?php foreach($items as $item) { ?>
                                            <tr>
                                                <td> <i class="bi bi-list fs-5"></i> </td>
                                                <td> <?php echo $item->id; ?> </td>
                                                <td> <?php echo get_user_name($item->userID); ?> </td>
                                                <td> <?php echo get_user_surname($item->userID); ?> </td>
                                                <td> <?php echo $item->orderTime; ?> </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input 
                                                            data-url="<?php echo base_url("orders/orderSituationSetter/$item->id"); ?>"
                                                            class="situationSetter form-check-input fs-4" 
                                                            type="checkbox" role="switch" id="situationSetter" 
                                                            dataID="<?php echo $item->id; ?>"
                                                            <?php echo ($item->orderSituation == 1) ? "checked" : ""; ?>
                                                        />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="order-images.html">
                                                            <i class="bi bi-images fs-5 text-info mx-2"></i>
                                                        </a>
                                                        <a href="index.html">
                                                            <i class="bi bi-pencil-square fs-5 text-secondary mx-2"></i>
                                                        </a>
                                                        <a class="remove-btn" data-url="<?php echo base_url("orders/delete/$item->id"); ?>">
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
                                            <th scope="col"> <?php echo $this->lang->line('customer-name'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('customer-surname'); ?> </th>
                                            <th scope="col"> <?php echo $this->lang->line('date'); ?> </th>
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