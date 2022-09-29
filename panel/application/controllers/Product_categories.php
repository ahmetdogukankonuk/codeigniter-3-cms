<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_categories extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "product_categories_v";

        $this->load->model("product_categories_model");

    }

    public function index()
	{
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        
	    $viewData = new stdClass();

        $items = $this->product_categories_model->get_all(
            array(), "rank ASC"
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
        $this->load->helper("tools");

        if($_FILES["imgUrl"]["name"] == ""){

            $alert = array(
                "title" => "Operation is Unsuccessful!",
                "text"  => "Please select an image",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("categories/new"));

            die();
        }
        
        $this->form_validation->set_rules("title", "Category Name English", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $file_name = convertToSEO(pathinfo($_FILES["imgUrl"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["imgUrl"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"]   = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("imgUrl");

            if($upload){

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->product_categories_model->add(
                    array(
                        "title"                 => $this->input->post("title"),
                        "title_tr"              => $this->input->post("title_tr"),
                        "description"           => $this->input->post("description"),
                        "description_tr"        => $this->input->post("description_tr"),
                        "imgUrl"                => $uploaded_file,
                        "rank"                  => 0,
                        "isActive"              => 1,
                        "isOnMain"              => 0,
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
                        "title" => "Operation is Unsuccessful!",
                        "text"  => "There was a problem while adding the record",
                        "type"  => "error"
                    );
                    
                }

            } else {

                $alert = array(
                    "title" => "Operation is Unsuccessful!",
                    "text"  => "There was a problem while adding the record",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("categories/new"));

                die();

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("categories"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }
    
    public function delete($id){
        
        $delete = $this->product_categories_model->delete(
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
        redirect(base_url("categories"));

    }
}
