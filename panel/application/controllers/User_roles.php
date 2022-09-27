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
