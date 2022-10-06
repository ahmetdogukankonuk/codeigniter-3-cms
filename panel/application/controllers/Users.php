<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_roles_model");
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

    public function new_form(){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        $viewData = new stdClass();

        $viewData->user_roles = $this->user_roles_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function admin_register(){

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

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            
        }

    }

    public function update_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
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

        $this->load->helper("tools");

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function update_user($id){

        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("name", "User Name", "required|trim");
        $this->form_validation->set_rules("surname", "User Surname", "required|trim");
        $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email|is_unique[users.email]");
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

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

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

    public function update_password_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
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

    public function update_password($id){

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
}
