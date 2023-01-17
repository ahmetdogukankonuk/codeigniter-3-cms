        <?php $permissions = json_decode($item->permissions); ?>

        <div class="px-4 page-title title-color">
            <h3> <?php echo $this->lang->line('user-permissions'); ?> </h3>
        </div>

        <section class="mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow py-2 card-bg">
                            <div class="card-body mx-3 table-responsive">

                                <form action="<?php echo base_url("user_roles/update_permissions/$item->id"); ?>" method="post">

                                    <table id="example" class="table" width="100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col"> <?php echo $this->lang->line('module-name'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('view'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('add'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('update'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('delete'); ?> </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center sortable" style="vertical-align: baseline;">
                                            
                                            <?php foreach (getControllerList() as $controllerName) { ?>

                                                <tr>
                                                    <td><i class="bi bi-list fs-5"></i></td>
                                                    <td>
                                                        <?php echo $controllerName; ?>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch d-flex justify-content-center">
                                                            <input class="form-check-input fs-4" type="checkbox" role="switch" id="read"
                                                            name="permissions[<?php echo $controllerName; ?>][read]" 
                                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->read)) ? "checked" : ""; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch d-flex justify-content-center">
                                                            <input class="form-check-input fs-4" type="checkbox" role="switch" id="write" 
                                                            name="permissions[<?php echo $controllerName; ?>][write]" 
                                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->write)) ? "checked" : ""; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch d-flex justify-content-center">
                                                            <input class="form-check-input fs-4" type="checkbox" role="switch" id="update"
                                                            name="permissions[<?php echo $controllerName; ?>][update]" 
                                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->update)) ? "checked" : ""; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch d-flex justify-content-center">
                                                            <input class="form-check-input fs-4" type="checkbox" role="switch" id="delete" 
                                                            name="permissions[<?php echo $controllerName; ?>][delete]" 
                                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->delete)) ? "checked" : ""; ?>>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                            <?php } ?>

                                        </tbody>
                                        <tfoot class="text-center">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col"> <?php echo $this->lang->line('module-name'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('view'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('add'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('update'); ?> </th>
                                                <th scope="col"> <?php echo $this->lang->line('delete'); ?> </th>
                                            </tr>
                                        </tfoot>
                                    </table>


                                    <div class="d-grid gap-2 col-12 mx-auto mt-4">
                                        <button class="btn btn-theme rounded-4" type="submit"> <?php echo $this->lang->line('save'); ?> </button>
                                    </div>

                                    <div class="d-grid mt-2">
                                        <a href="<?php echo base_url("user-roles") ?>" class="btn btn-outline-primary rounded-4 p-2">
                                            <?php echo $this->lang->line('user-roles'); ?>
                                        </a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
