        <div class="px-4 page-title title-color">
            <h3>Authorized Users</h3>
            <a href="" class="btn add-new-button text-white rounded-4 shadow float-end">
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Surname</th>
                                            <th scope="col">E-Mail</th>
                                            <th scope="col">User Role</th>
                                            <th scope="col">Situation</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" style="vertical-align: baseline;">
                                        
                                        <?php foreach($items as $item) { ?>
                                            <tr>
                                                <td> <i class="bi bi-list fs-5"></i> </td>
                                                <td> <?php echo $item->id; ?> </td>
                                                <td> <?php echo $item->name; ?> </td>
                                                <td> <?php echo $item->surname; ?> </td>
                                                <td> <?php echo $item->email; ?> </td>
                                                <td> <?php echo get_user_role($item->userRoleID); ?> </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="#">
                                                            <i class="bi bi-pencil-square fs-5 text-secondary mx-2"></i>
                                                        </a>
                                                        <a class="remove-btn" data-url="<?php echo base_url("users/authorizedDelete/$item->id"); ?>">
                                                            <i class="bi bi-trash fs-5 text-danger mx-2"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="bi bi-lock-fill fs-5 text-black mx-2"></i>
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Surname</th>
                                            <th scope="col">E-Mail</th>
                                            <th scope="col">User Role</th>
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