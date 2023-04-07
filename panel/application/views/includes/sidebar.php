        <div class="sidebar" id="navbar">
            <nav class="sidebar-nav">
                <div>
                    <a href="<?php echo base_url(); ?>" class="sidebar-logo">
                        <i class="bi bi-app sidebar-logo-icon"></i>
                        <span class="sidebar-logo-name">Lorem LLC</span>
                    </a>

                    <div>
                        <?php if(isAllowedViewModule("dashboard")) { ?>
                            <a href="<?php echo base_url(); ?>" class="sidebar-link ms-01">
                                <i class="bi bi-graph-down sidebar-icon"></i>
                                <span><?php echo $this->lang->line('dashboard'); ?></span>
                            </a>
                        <?php } ?>

                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#language-collapse" aria-expanded="false">
                                <i class="bi bi-translate sidebar-icon"></i>
                                <?php echo $this->lang->line('language'); ?>
                            </button>
                            <div class="collapse" id="language-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <?php if($this->session->userdata('lang')!="tr"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/tr"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/turkish.png" height="18rem">
                                                <?php echo $this->lang->line('turkish'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="en"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/en"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/english.png" height="18rem">
                                                <?php echo $this->lang->line('english'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="fr"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/fr"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/french.png" height="18rem">
                                                <?php echo $this->lang->line('french'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="ru"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/ru"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/russian.png" height="18rem">
                                                <?php echo $this->lang->line('russian'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="ar"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/ar"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/arabian.png" height="18rem">
                                                <?php echo $this->lang->line('arabian'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="es"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/es"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/spanish.png" height="18rem">
                                                <?php echo $this->lang->line('spanish'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="de"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/de"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/german.png" height="18rem">
                                                <?php echo $this->lang->line('german'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="fa"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/fa"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/persian.png" height="18rem">
                                                <?php echo $this->lang->line('persian'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('lang')!="pt"){ ?>
                                            <a href="<?php echo base_url("dashboard/switchLanguage/pt"); ?>" class="sidebar-sublink rounded">
                                                <img class="sidebar-icon" src="<?php echo base_url("assets"); ?>/img/flags/portuguese.png" height="18rem">
                                                <?php echo $this->lang->line('portuguese'); ?>
                                            </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <?php if(isAllowedViewModule("products")) { ?>
                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                                <i class="bi bi-box sidebar-icon"></i>
                                <?php echo $this->lang->line('products'); ?>
                            </button>
                            <div class="collapse" id="dashboard-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <?php if(isAllowedViewModule("brands")) { ?>
                                            <a href="<?php echo base_url("brands/new"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-app-indicator sub-sidebar-icon"></i>
                                                New Brand
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("brands")) { ?>
                                            <a href="<?php echo base_url("brands"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-app sub-sidebar-icon"></i>
                                                Brands
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("product_categories")) { ?>
                                            <a href="<?php echo base_url("product-categories/new"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-folder-plus sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('new-category'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("product_categories")) { ?>
                                            <a href="<?php echo base_url("product-categories"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-folder sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('categories'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("products")) { ?>
                                            <a href="<?php echo base_url("products/new"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-plus-circle sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('new-product'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("products")) { ?>
                                            <a href="<?php echo base_url("products"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-boxes sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('all-products'); ?>
                                            </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if(isAllowedViewModule("orders")) { ?>
                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                                <i class="bi bi-bag sidebar-icon"></i>
                                <?php echo $this->lang->line('orders'); ?>
                            </button>
                            <div class="collapse" id="orders-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <?php if(isAllowedViewModule("orders")) { ?>
                                            <a href="<?php echo base_url("orders/new"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-bag-plus sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('new-order'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("orders")) { ?>
                                            <a href="<?php echo base_url("cancelled-orders"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-bag-x sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('cancelled-orders'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("orders")) { ?>
                                            <a href="<?php echo base_url("incomplete-orders"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-bag-dash sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('incomplete-orders'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("orders")) { ?>
                                            <a href="<?php echo base_url("completed-orders"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-bag-check sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('completed-orders'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("orders")) { ?>
                                            <a href="<?php echo base_url("orders"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-bag sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('all-orders'); ?>
                                            </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if(isAllowedViewModule("blog")) { ?>
                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#blog-collapse" aria-expanded="false">
                                <i class="bi bi-newspaper sidebar-icon"></i>
                                <?php echo $this->lang->line('blog'); ?>
                            </button>
                            <div class="collapse" id="blog-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <?php if(isAllowedViewModule("blog")) { ?>
                                            <a href="<?php echo base_url("blog/new"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-pencil-square sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('new-post'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("blog")) { ?>
                                            <a href="<?php echo base_url("blog-comments"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-chat-left sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('comments'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("blog")) { ?>
                                        <a href="<?php echo base_url("blog"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-file-earmark-richtext sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('all-posts'); ?>
                                            </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if(isAllowedViewModule("users")) { ?>
                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="false">
                                <i class="bi bi-people sidebar-icon"></i>
                                <?php echo $this->lang->line('users'); ?>
                            </button>
                            <div class="collapse" id="users-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <?php if(isAllowedViewModule("users")) { ?>
                                            <a href="<?php echo base_url("messages"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-chat sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('user-messages'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("users")) { ?>
                                            <a href="<?php echo base_url("users/new"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-person-plus sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('new-user'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("users")) { ?>
                                            <a href="<?php echo base_url("authorized-users"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-person-check sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('authorized-users'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("user_roles")) { ?>
                                            <a href="<?php echo base_url("user-roles"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-person-x sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('user-roles'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("users")) { ?>
                                            <a href="<?php echo base_url("users"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-people sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('all-users'); ?>
                                            </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>
                        
                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#gallery-collapse" aria-expanded="false">
                                <i class="bi bi-images sidebar-icon"></i>
                                <?php echo $this->lang->line('gallery'); ?>
                            </button>
                            <div class="collapse" id="gallery-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <?php if(isAllowedViewModule("portfolio")) { ?>
                                            <a href="<?php echo base_url("portfolio"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-collection sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('portfolio'); ?>
                                            </a>
                                        <?php } ?>
                                        <?php if(isAllowedViewModule("sliders")) { ?>
                                            <a href="<?php echo base_url("sliders"); ?>" class="sidebar-sublink rounded">
                                                <i class="bi bi-images sub-sidebar-icon"></i>
                                                <?php echo $this->lang->line('sliders'); ?>
                                            </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <?php if(isAllowedViewModule("settings")) { ?>
                            <a href="<?php echo base_url("settings"); ?>" class="sidebar-link mt-4 ms-01">
                                <i class="bi bi-gear sidebar-icon"></i>
                                <span><?php echo $this->lang->line('settings'); ?></span>
                            </a>
                        <?php } ?>
                        
                    </div>
                </div>
                <a href="<?php echo base_url("logout"); ?>" class="sidebar-link my-3">
                    <i class="bi bi-box-arrow-left sidebar-icon"></i>
                    <span><?php echo $this->lang->line('logout'); ?></span>
                </a>
            </nav>
        </div>