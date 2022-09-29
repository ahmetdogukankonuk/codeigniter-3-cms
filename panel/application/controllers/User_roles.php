<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_roles extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "user_roles_v";

        $this->load->model("user_roles_model");

    }

    public function index()
	{
       
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        
	    $viewData = new stdClass();

        $items = $this->user_roles_model->get_all(
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

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("title", "Product Name English", "required|trim");
        
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->user_roles_model->add(
                array(
                    "title"                 => $this->input->post("title"),
                    "isActive"              => 1,
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
            redirect(base_url("user-roles"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder       = $this->viewFolder;
            $viewData->subViewFolder    = "add";
            $viewData->form_error       = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            
        }

    }

    public function delete($id){

        $delete = $this->user_roles_model->delete(
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
        redirect(base_url("user-roles"));

    }
}
