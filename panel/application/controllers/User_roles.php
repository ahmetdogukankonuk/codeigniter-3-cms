<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_roles extends CI_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "user_roles_v";

        $this->load->model("user_roles_model");

    }


    public function index(){
       
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedViewModule()){
            redirect(base_url());
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

        if(!isAllowedWriteModule()){
            redirect(base_url("user-roles"));
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function add_user_role(){

        if(!isAllowedWriteModule()){
            redirect(base_url("user-roles"));
        }
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("title", "Product Name English", "required|trim");
        
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->user_roles_model->add(
                array(
                    "title"                 => $this->input->post("title"),
                    "permissions"           => "null",
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


    public function update_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedUpdateModule()){
            redirect(base_url("user-roles"));
        }

        $viewData = new stdClass();

        $item = $this->user_roles_model->get(
            array(
                "id"    => $id,
            )
        );

        $this->load->helper("tools");

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function update_user_role($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url("user-roles"));
        }

        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("title", "Product Name English", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->user_roles_model->update(
                array(
                        "id" => $id
                ),
                array(
                    "title"                 => $this->input->post("title"),
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

            redirect(base_url("user-roles"));

        } else {

            $viewData = new stdClass();
            
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->user_roles_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function permissions_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedViewModule()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        $item = $this->user_roles_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "permissions";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    
    public function update_permissions($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url("user-roles"));
        }

        $permissions = json_encode($this->input->post("permissions"));

        $update = $this->user_roles_model->update(
            array("id" => $id),
            array(
                "permissions"      => $permissions
            )
        );

        if($update){

            $alert = array(
                "title" => "Operation is Successful!",
                "text"  => "Successfully Updated!",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "Operation is Unsuccessful!",
                "text"  => "There Was a Problem During the Update!",
                "type"  => "error"
            );

        }

        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("user-roles/permissions/$id"));

    }


    public function isActiveSetter($id){

        if(!isAllowedUpdateModule()){
            die();
        }
        
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->user_roles_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }

    }


    public function delete($id){

        if(!isAllowedDeleteModule()){
            redirect(base_url("user-roles"));
        }

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
