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
                
                $toEmail = $this->input->post("email");

                $userRole = get_user_role($this->input->post("userRoleID"));

                $send = send_email($toEmail, "Welcome to CMS", "<center><h3> Welcome to CMS! You have been added to CMS as $userRole. </h3></center>");

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

                $toEmail = get_user_email_by_id($id);

                $send = send_email($toEmail, "User Information Updated", "<center><h3> Your Information Has Been Updated </h3></center>");

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

        $this->form_validation->set_rules("password", "Password", "required|trim|min_length[6]|max_length[20]");
        $this->form_validation->set_rules("re_password", "Confirm Password", "required|trim|min_length[6]|max_length[20]|matches[password]");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->users_model->update(
                array("id" => $id),
                array(
                    "password"      => md5($this->input->post("password")),
                )
            );
            
            if($update){

                $toEmail = get_user_email_by_id($id);

                $send = send_email($toEmail, "Password Changed", "<center><h3> Your Password Has Been Changed </h3></center>");

                $alert = array(
                    "title" => $this->lang->line('operation-is-succesfull-message'),
                    "text" => $this->lang->line('password-changed-text'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                    "text" => $this->lang->line('password-could-not-changed-text'),
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

            if($isActive == 1){

                $toEmail = get_user_email_by_id($id);

                $send = send_email($toEmail, "Account Has Been Activated", "<center><h3> Your Account Has Been Activated! </h3></center>");
            
            } else{

                $toEmail = get_user_email_by_id($id);

                $send = send_email($toEmail, "You Are Banned", "<center><h3> Access to your account is blocked! </h3></center>");

            }

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

            if($isAuthority == 1){

                $toEmail = get_user_email_by_id($id);

                $send = send_email($toEmail, "You are Authorized", "<center><h3> Your account has been authorized to access the CMS panel. </h3></center>");
            
            } else{

                $toEmail = get_user_email_by_id($id);

                $send = send_email($toEmail, "Your Authority Has Been Revoked", "<center><h3> The permission to access the CMS panel has been revoked from your account. </h3></center>");

            }

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
        redirect(base_url("authorized-users"));

    }
}
