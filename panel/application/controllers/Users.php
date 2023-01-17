<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_roles_model");
        $this->load->model("users_model");
        $this->load->model("country_model");

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

        $items = $this->users_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    /* Admin registration page */
    public function new_form(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to add new record to this module, if not we send them back */
        if(!isAllowedWriteModule()){
            redirect(base_url("users"));
        }

        $viewData = new stdClass();

        $viewData->user_roles = $this->user_roles_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $viewData->countries = $this->country_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    /* Admin registration function */
    public function admin_register(){

        /* Here we check if the user logged in is allowed to add new record to this module, if not we send them back */
        if(!isAllowedWriteModule()){
            redirect(base_url("users"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("name", "User Name", "required|trim");
        $this->form_validation->set_rules("surname", "User Surname", "required|trim");
        $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("userRoleID", "User Role", "required|trim");
        $this->form_validation->set_rules("password", "Password", "required|trim|min_length[6]|max_length[20]");
        $this->form_validation->set_rules("re_password", "Confirm Password", "required|trim|min_length[6]|max_length[20]|matches[password]");
        
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->users_model->add(
                array(
                    "name"                  => $this->input->post("name"),
                    "surname"               => $this->input->post("surname"),
                    "email"                 => $this->input->post("email"),
                    "password"              => md5($this->input->post("password")),
                    "userRoleID"            => $this->input->post("userRoleID"),
                    "addressTitle"          => $this->input->post("addressTitle"),
                    "country"               => $this->input->post("country"),
                    "city"                  => $this->input->post("city"),
                    "town"                  => $this->input->post("town"),
                    "postCode"              => $this->input->post("postCode"),
                    "address"               => $this->input->post("address"),
                    "isActive"              => 1,
                    "isAuthority"           => 1,
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
            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder       = $this->viewFolder;
            $viewData->subViewFolder    = "add";
            $viewData->form_error       = true;

            $viewData->user_roles = $this->user_roles_model->get_all(
                array(
                    "isActive"  => 1
                )
            );
    
            $viewData->countries = $this->country_model->get_all(
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
            redirect(base_url("users"));
        }

        $viewData = new stdClass();

        $item = $this->users_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->user_roles = $this->user_roles_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $viewData->countries = $this->country_model->get_all(
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
    public function update_user($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("users"));
        }

        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("name", "User Name", "required|trim");
        $this->form_validation->set_rules("surname", "User Surname", "required|trim");
        $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email");
        $this->form_validation->set_rules("userRoleID", "User Role", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->users_model->update(
                array(
                        "id" => $id
                ),
                array(
                    "name"                  => $this->input->post("name"),
                    "surname"               => $this->input->post("surname"),
                    "email"                 => $this->input->post("email"),
                    "userRoleID"            => $this->input->post("userRoleID"),
                    "addressTitle"          => $this->input->post("addressTitle"),
                    "country"               => $this->input->post("country"),
                    "city"                  => $this->input->post("city"),
                    "town"                  => $this->input->post("town"),
                    "postCode"              => $this->input->post("postCode"),
                    "address"               => $this->input->post("address"),
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

            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->users_model->get(
                array(
                    "id"    => $id,
                )
            );

            $viewData->user_roles = $this->user_roles_model->get_all(
                array(
                    "isActive"  => 1
                )
            );
		
            $viewData->countries = $this->country_model->get_all(
                array(
                    "isActive"  => 1
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function authorized_users(){
        
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
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

    /* Change password page */
    public function update_password_form($id){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("users"));
        }

        $viewData = new stdClass();

        $item = $this->users_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    /* Here we update the specific record by id */
    public function update_password($id){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("users"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("password", "Password", "required|trim|min_length[6]|max_length[8]");
        $this->form_validation->set_rules("re_password", "Confirm Password", "required|trim|min_length[6]|max_length[8]|matches[password]");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->users_model->update(
                array("id" => $id),
                array(
                    "password"      => md5($this->input->post("password")),
                )
            );
            
            if($update){

                $alert = array(
                    "title" => "Operation is Successful!",
                    "text"  => "The password changed successfully",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Operation is Unsuccessful!",
                    "text"  => "There was a problem while changing the password",
                    "type"  => "error"
                );

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;

            $viewData->item = $this->users_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

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

            $this->users_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }

    }

    /* Authority Setter */
    public function isAuthoritySetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isAuthority = ($this->input->post("data") === "true") ? 1 : 0;

            $this->users_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isAuthority"  => $isAuthority
                )
            );
        }


    }

    /* Deleting specific record by its id */
    public function delete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("users"));
        }

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

    /* Deleting specific record by its id */
    public function authorizedDelete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("users"));
        }

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
