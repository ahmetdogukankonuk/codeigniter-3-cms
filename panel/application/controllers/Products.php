<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "products_v";

        $this->load->model("product_categories_model");
        $this->load->model("products_model");
        $this->load->model("product_images_model");

    }


    public function index(){
       
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedViewModule()){
            redirect(base_url());
        }
        
	    $viewData = new stdClass();

        $items = $this->products_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}


    public function new_form(){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedWriteModule()){
            redirect(base_url("products"));
        }

        $viewData = new stdClass();

        $viewData->product_categories = $this->product_categories_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function add_product(){

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
                    "title" => "Operation is Successful!",
                    "text"  => "The record was added successfully",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Operation is not Successful!",
                    "text"  => "There was a problem while adding data",
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

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            
        }

    }


    public function update_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedUpdateModule()){
            redirect(base_url("products"));
        }

        $viewData = new stdClass();

        $item = $this->products_model->get(
            array(
                "id"    => $id,
            )
        );
        
        $viewData->product_categories = $this->product_categories_model->get_all(
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


    public function update_product($id){

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
                    "title" => "Operation is Successful!",
                    "text"  => "The record was updated successfully",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Operation is Unsuccessful!",
                    "text"  => "There was a problem while updating the record",
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

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function image_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

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

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"]   = "uploads/$this->viewFolder/";
        $config["file_name"] = $file_name;

        $image_720x480 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",720,480, $file_name);
        $image_238x158 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",238,158, $file_name);

        if($image_238x158 && $image_720x480){

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
            echo "There was an error!";
        }

    }


    public function isActiveSetter($id){

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


    public function isOnMainSetter($id){

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


    public function isSuggestedSetter($id){

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

    
    public function delete($id){

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
                "title" => "Operation is Successful!",
                "text"  => "The record was successfully deleted",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "Operation is Successful!",
                "text"  => "There was a problem while deleting the record",
                "type"  => "error"
            );

        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("products"));

    }


    public function imageDelete($id, $parent_id){
        
        if(!isAllowedDeleteModule()){
            redirect(base_url("products"));
        }

        $fileName = $this->product_images_model->get(
            array(
                "id"    => $id
            )
        );

        $delete = $this->product_images_model->delete(
            array(
                "id"    => $id
            )
        );

        if($delete){
            
            unlink("uploads/{$this->viewFolder}/$fileName->img_url");

            redirect(base_url("products/images/$parent_id"));

        } else {

            redirect(base_url("products/images/$parent_id"));
            
        }
        
    }
}
