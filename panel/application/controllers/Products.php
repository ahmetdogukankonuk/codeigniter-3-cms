<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "products_v";

        $this->load->model("product_categories_model");
        $this->load->model("products_model");
        $this->load->model("product_images_model");

    }

    public function index()
	{
       
        if(!get_active_user()){
            redirect(base_url("login"));
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

    public function save(){

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

    public function image_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
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

    public function delete($id){

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
