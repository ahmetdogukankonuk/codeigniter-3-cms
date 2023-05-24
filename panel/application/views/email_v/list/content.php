        <div class="px-4 page-title title-color">
            <h3> Emails </h3>
            <a href="<?php echo base_url("mailer/new") ?>" class="btn add-new-button text-white rounded-4 shadow float-end">
                <span><i class="bi bi-file-earmark-plus"></i> <?php echo $this->lang->line('add-new'); ?> </span>
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
                                            <th scope="col"> Sender </th>
                                            <th scope="col"> Email </th>
                                            <th scope="col"> Subject </th>
                                            <th scope="col"> Time </th>
                                            <th scope="col"> <?php echo $this->lang->line('action'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" data-url="<?php echo base_url("email/rankSetter"); ?>" style="vertical-align: baseline;">
                                        
                                        <?php foreach($items as $item) { ?>
                                            <tr id="ord-<?php echo $item->id; ?>">
                                                <td><i class="bi bi-list fs-5"></i></td>
                                                <td> <?php echo $item->id; ?> </td>
                                                <td> <?php echo $item->sender; ?> </td>
                                                <td> <?php echo $item->email; ?> </td>
                                                <td> <?php echo $item->subject; ?> </td>
                                                <td> <?php echo $item->sendTime; ?> </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="<?php echo base_url("mailer/view/$item->id"); ?>">
                                                            <i class="bi bi-eye fs-5 text-info mx-2"></i>
                                                        </a>
                                                        <a class="remove-btn" data-url="<?php echo base_url("email/delete/$item->id"); ?>">
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
                                            <th scope="col"> Sender </th>
                                            <th scope="col"> Email </th>
                                            <th scope="col"> Subject </th>
                                            <th scope="col"> Time </th>
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