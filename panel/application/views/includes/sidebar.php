        <div class="sidebar" id="navbar">
            <nav class="sidebar-nav">
                <div>
                    <a href="<?php echo base_url(); ?>" class="sidebar-logo">
                        <i class="bi bi-app sidebar-logo-icon"></i>
                        <span class="sidebar-logo-name">Lorem LLC</span>
                    </a>

                    <div>
                        <a href="<?php echo base_url(); ?>" class="sidebar-link ms-01">
                            <i class="bi bi-graph-down sidebar-icon"></i>
                            <span>Dashboard</span>
                        </a>

                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                                <i class="bi bi-box sidebar-icon"></i>
                                Products
                            </button>
                            <div class="collapse" id="dashboard-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <a href="<?php echo base_url("new-category"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-folder-plus sub-sidebar-icon"></i>
                                            New Category
                                        </a>
                                        <a href="<?php echo base_url("categories"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-folder sub-sidebar-icon"></i>
                                            Categories
                                        </a>
                                        <a href="<?php echo base_url("new-product"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-plus-circle sub-sidebar-icon"></i>
                                            New Product
                                        </a>
                                        <a href="<?php echo base_url("products"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-boxes sub-sidebar-icon"></i>
                                            All Products
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                                <i class="bi bi-bag sidebar-icon"></i>
                                Orders
                            </button>
                            <div class="collapse" id="orders-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <a href="<?php echo base_url("new-order"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-bag-plus sub-sidebar-icon"></i>
                                            New Order
                                        </a>
                                        <a href="<?php echo base_url("cancelled-orders"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-bag-x sub-sidebar-icon"></i>
                                            Cancelled Orders
                                        </a>
                                        <a href="<?php echo base_url("incomplete-orders"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-bag-dash sub-sidebar-icon"></i>
                                            Incomplete Orders
                                        </a>
                                        <a href="<?php echo base_url("completed-orders"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-bag-check sub-sidebar-icon"></i>
                                            Completed Orders
                                        </a>
                                        <a href="<?php echo base_url("orders"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-bag sub-sidebar-icon"></i>
                                            All Orders
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#blog-collapse" aria-expanded="false">
                                <i class="bi bi-newspaper sidebar-icon"></i>
                                Blog
                            </button>
                            <div class="collapse" id="blog-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <a href="<?php echo base_url("new-post"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-pencil-square sub-sidebar-icon"></i>
                                            New Post
                                        </a>
                                        <a href="<?php echo base_url("blog-comments"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-chat-left sub-sidebar-icon"></i>
                                            Comments
                                        </a>
                                        <a href="<?php echo base_url("blog"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-file-earmark-richtext sub-sidebar-icon"></i>
                                            All Posts
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="false">
                                <i class="bi bi-people sidebar-icon"></i>
                                Users
                            </button>
                            <div class="collapse" id="users-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <a href="<?php echo base_url("messages"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-chat sub-sidebar-icon"></i>
                                            User Messages
                                        </a>
                                        <a href="<?php echo base_url("new-user"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-person-plus sub-sidebar-icon"></i>
                                            New User
                                        </a>
                                        <a href="<?php echo base_url("authorized-users"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-person-check sub-sidebar-icon"></i>
                                            Authorized Users
                                        </a>
                                        <a href="<?php echo base_url("user-roles"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-person-x sub-sidebar-icon"></i>
                                            User Roles
                                        </a>
                                        <a href="<?php echo base_url("users"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-people sub-sidebar-icon"></i>
                                            All Users
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li>
                            <button class="btn btn-toggle sidebar-link align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#gallery-collapse" aria-expanded="false">
                                <i class="bi bi-images sidebar-icon"></i>
                                Gallery
                            </button>
                            <div class="collapse" id="gallery-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pt-2 small">
                                    <li>
                                        <a href="<?php echo base_url("portfolio"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-collection sub-sidebar-icon"></i>
                                            Portfolio
                                        </a>
                                        <a href="<?php echo base_url("sliders"); ?>" class="sidebar-sublink rounded">
                                            <i class="bi bi-images sub-sidebar-icon"></i>
                                            Sliders
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <a href="<?php echo base_url("settings"); ?>" class="sidebar-link mt-4 ms-01">
                            <i class="bi bi-gear sidebar-icon"></i>
                            <span>Settings</span>
                        </a>
                    </div>
                </div>
                <a href="<?php echo base_url("logout"); ?>" class="sidebar-link my-3">
                    <i class="bi bi-box-arrow-left sidebar-icon"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </div>