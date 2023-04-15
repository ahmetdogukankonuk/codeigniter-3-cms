<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "products_v";

        $this->load->model("product_categories_model");
        $this->load->model("products_model");
        $this->load->model("product_images_model");

    }

    /* Index function is the index page of the URL request */
    public function index(){
       
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
        }
        
	    $viewData = new stdClass();

        $items = $this->products_model->get_products(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    /* New Record Page */
    public function new_form(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to add new record to this module, if not we send them back */
        if(!isAllowedWriteModule()){
            redirect(base_url("products"));
        }

        $viewData = new stdClass();

        $viewData->product_categories = $this->product_categories_model->get_categories(
            array(
                "isActive"  => 1
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function add_product(){

        /* Here we check if the user logged in is allowed to add new record to this module, if not we send them back */
        if(!isAllowedWriteModule()){
            redirect(base_url("products"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("categoryID", "Product Category", "required|trim");
        $this->form_validation->set_rules("title", "Product Name English", "required|trim");
        $this->form_validation->set_rules("price", "Product Price", "required|trim");
        
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->products_model->add(
                array(
                    "categoryID"            => $this->input->post("categoryID"),
                    "title"                 => $this->input->post("title"),
                    "title_tr"              => $this->input->post("title_tr"),
                    "description"           => $this->input->post("description"),
                    "description_tr"        => $this->input->post("description_tr"),
                    "video"                 => $this->input->post("video"),
                    "price"                 => $this->input->post("price"),
                    "isActive"              => 1,
                    "isOnMain"              => 0,
                    "isSuggested"           => 0,
                    "createdAt"             => date("Y-m-d H:i:s"),
                    "updatedAt"             => date("Y-m-d H:i:s")
                )
            );

            if($insert){

                $alert = array(
                    "title" => $this->lang->line('operation-is-succesfull-message'),
                    "text" => $this->lang->line('record-added-text'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                    "text" => $this->lang->line('record-could-not-added-text'),
                    "type"  => "error"
                );
                
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder       = $this->viewFolder;
            $viewData->subViewFolder    = "add";
            $viewData->form_error       = true;

            $viewData->product_categories = $this->product_categories_model->get_categories(
                array(
                    "isActive"  => 1
                )
            );    

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            
        }

    }

    /* Update Record Page */
    public function update_form($id){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("products"));
        }

        $viewData = new stdClass();

        $item = $this->products_model->get(
            array(
                "id"    => $id,
            )
        );
        
        $viewData->product_categories = $this->product_categories_model->get_categories(
            array(
                "isActive"  => 1
            )
        );

        $this->load->helper("tools");

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    /* Here we update the specific record by id */
    public function update_product($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("products"));
        }

        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("categoryID", "Product Category", "required|trim");
        $this->form_validation->set_rules("title", "Product Name English", "required|trim");
        $this->form_validation->set_rules("price", "Product Price", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->products_model->update(
                array(
                        "id" => $id
                ),
                array(
                    "categoryID"            => $this->input->post("categoryID"),
                    "title"                 => $this->input->post("title"),
                    "title_tr"              => $this->input->post("title_tr"),
                    "description"           => $this->input->post("description"),
                    "description_tr"        => $this->input->post("description_tr"),
                    "video"                 => $this->input->post("video"),
                    "price"                 => $this->input->post("price"),
                    "updatedAt"             => date("Y-m-d H:i:s")
                )
            );

            if($update){

                $alert = array(
                    "title" => $this->lang->line('operation-is-succesfull-message'),
                    "text"  => $this->lang->line('record-updated-text'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                    "text"  => $this->lang->line('record-could-not-updated-text'),
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("products"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->products_model->get(
                array(
                    "id"    => $id,
                )
            );

            $viewData->product_categories = $this->product_categories_model->get_categories(
                array(
                    "isActive"  => 1
                )
            );    

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    /* Product Images Page */
    public function image_form($id){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
        }
        
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->products_model->get(
            array(
                "id"    => $id
            )
        );

        $viewData->item_images = $this->product_images_model->get_all(
            array(
                "productID"    => $id
            ), "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function image_upload($id){

        // Validate the user's input and check if the uploaded file is actually an image
        if(!isAllowedWriteModule() || empty($_FILES["file"]) || !in_array($_FILES["file"]["type"], array("image/jpg", "image/jpeg", "image/png", "image/webp", "image/svg", "image/gif"))){
            die();
        }
    
        // Generate a secure file name
        $file_name = bin2hex(random_bytes(8)) . '.' . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    
        // Move uploaded files outside of the web root directory to prevent direct access and execution of uploaded files
        $upload_path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $this->viewFolder . DIRECTORY_SEPARATOR;
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
    
        $config["allowed_types"] = "jpg|jpeg|png|webp|svg";
        $config["upload_path"]   = $upload_path;
        $config["file_name"] = $file_name;
    
        $this->load->library("upload", $config);
    
        try {
            // Use a try-catch block to handle exceptions that may occur during the upload process
            $upload = $this->upload->do_upload("file");
    
            if($upload){
    
                $uploaded_file = $file_name;
    
                $this->product_images_model->add(
                    array(
                        "imgUrl"        => $file_name,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "isCover"       => 0,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "productID"     => $id
                    )
                );
                
            } else {
                echo "islem basarisiz";
            }
            
        } catch (Exception $e) {
            // Log the error or handle it in some other way
            echo $e;
        }
    }

    /* Activity Setter */
    public function isActiveSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }
        
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->products_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }

    }

    /* On Home Page Setter */
    public function isOnMainSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isOnMain = ($this->input->post("data") === "true") ? 1 : 0;

            $this->products_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isOnMain"  => $isOnMain
                )
            );
        }
    }

    /* Suggested Record Setter */
    public function isSuggestedSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isSuggested = ($this->input->post("data") === "true") ? 1 : 0;

            $this->products_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isSuggested"  => $isSuggested
                )
            );
        }
    }


    public function imageIsActiveSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_images_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }


    public function isCoverSetter($id, $parent_id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id && $parent_id){

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_images_model->update(
                array(
                    "id"        => $id,
                    "productID" => $parent_id
                ),
                array(
                    "isCover"   => $isCover
                )
            );

            $this->product_images_model->update(
                array(
                    "id !="     => $id,
                    "productID" => $parent_id
                ),
                array(
                    "isCover"   => 0
                )
            );

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->product_images_model->get_all(
                array(
                    "productID"    => $parent_id
                ), "rank ASC"
            );

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;

        }
    }

    /* Deleting specific record by its id */
    public function delete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("products"));
        }

        $delete = $this->products_model->delete(
            array(
                "id"    => $id
            )
        );

        if($delete){

            $alert = array(
                "title" => $this->lang->line('operation-is-succesfull-message'),
                "text"  => $this->lang->line('record-deleted-text'),
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => $this->lang->line('operation-is-succesfull-message'),
                "text"  => $this->lang->line('record-could-not-deleted-text'),
                "type"  => "error"
            );

        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("products"));

    }

    public function refresh_image_list($id){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->product_images_model->get_all(
            array(
                "productID"    => $id
            )
        );

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

        echo $render_html;

    }

    /* Image Rank Setter */
    public function imageRankSetter(){

        if(!isAllowedUpdateModule()){
            die();
        }

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->product_images_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

     /* Deleting specific record by its id */
     public function imageDelete($id, $parent_id){

        /* Here we check if the user logged in is allowed to delete the module, if not we don't give permission to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("products"));
        }
    
        $fileName = $this->product_images_model->get(array("id" => $id));
    
        if (!$fileName) {
            redirect(base_url("products/images/$parent_id"));
        }
    
        $delete = $this->product_images_model->delete(array("id" => $id));
    
        if($delete){
            unlink("uploads/{$this->viewFolder}/{$fileName->imgUrl}");
            redirect(base_url("products/images/$parent_id"));
        } else {
            $this->session->set_flashdata('error', 'Image deletion failed.');
            redirect(base_url("products/images/$parent_id"));
        }
    }
}
