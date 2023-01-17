<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "orders_v";

        $this->load->model("orders_model");

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

        $items = $this->orders_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    /* List of completed orders */
    public function completed_orders(){
       
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
        }

	    $viewData = new stdClass();

        $items = $this->orders_model->get_all(
            array(
                "orderSituation"    => "Order Completed",
            ), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "completed";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

     /* List of incompleted orders */
    public function incomplete_orders(){
       
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
        }

	    $viewData = new stdClass();

        $items = $this->orders_model->get_all(
            array(
                "orderSituation"    => "Order is On Progress",
            ), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "incomplete";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    /* List of cancelled orders */
    public function cancelled_orders(){
       
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
        }
        
	    $viewData = new stdClass();

        $items = $this->orders_model->get_all(
            array(
                "orderSituation"    => "Order Has Been Cancelled",
            ), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "cancelled";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    /* Order Situation Setter */
    public function orderSituationSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }
        
        if($id){

            $orderSituation = ($this->input->post("data") === "true") ? 1 : 0;

            $this->orders_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "orderSituation"  => $orderSituation
                )
            );
        }

    }

    /* Deleting specific record by its id */
    public function delete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("orders"));
        }

        $delete = $this->orders_model->delete(
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
        redirect(base_url("orders"));

    }

    /* Deleting specific record by its id */
    public function cancelledDelete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("orders"));
        }

        $delete = $this->orders_model->delete(
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
        redirect(base_url("cancelled-orders"));

    }

    /* Deleting specific record by its id */
    public function completedDelete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("orders"));
        }

        $delete = $this->orders_model->delete(
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
        redirect(base_url("completed-orders"));

    }

    /* Deleting specific record by its id */
    public function incompleteDelete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("orders"));
        }
        
        $delete = $this->orders_model->delete(
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
        redirect(base_url("incomplete-orders"));

    }
}
