<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("users_model");

    }

    public function index()
	{
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }

	    $viewData = new stdClass();

        $items = $this->users_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    public function authorized_users()
	{
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        
	    $viewData = new stdClass();

        $items = $this->users_model->get_all(
            array(
                "isAuthority"   => 1
            ), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "authorized";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    public function delete($id){

        $delete = $this->users_model->delete(
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
        redirect(base_url("users"));

    }

    public function authorizedDelete($id){

        $delete = $this->users_model->delete(
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
        redirect(base_url("authorized-users"));

    }
}
