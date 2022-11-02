<?php

class Userop extends CI_Controller {

    public $viewFolder = "";

    public function __construct(){
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("users_model");

    }


    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("login"));
        
    }


    public function login(){

        if(get_active_user()){
            redirect(base_url());
        }
        
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function do_login(){
        
        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Password", "required|trim|min_length[6]|max_length[20]");

        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            $user = $this->users_model->get(
                array(
                    "email"         => $this->input->post("email"),
                    "password"      => md5($this->input->post("password")),
                    "isAuthority"   => 1,
                    "isActive"      => 1
                )
            );

            if($user){

                $alert = array(
                    "title" => "Login Successful!",
                    "text"  => "Welcome $user->name",
                    "type"  => "success"
                );
                
                setUserRoles();
                
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {

                $alert = array(
                    "title" => "Login Unsuccessful!",
                    "text"  => "Please check your login details!",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));

            }

        }
    }


    public function register(){

        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "register";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function admin_register(){
        
        $this->load->library("form_validation");

        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("surname", "Surname", "required|trim");
        $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "Password", "required|trim|min_length[6]|max_length[20]");
        $this->form_validation->set_rules("re_password", "Confirm Password", "required|trim|min_length[6]|max_length[20]|matches[password]");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> is a required place!",
                "valid_email" => "<b>{field}</b> Please enter a valid email!",
                "is_unique" => "<b>{field}</b> You already have an account with this email!",
                "matches"   => "<b>{field}</b> Passwords does not match!"
            )
        );
        
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->users_model->register_admin(
                array(
                    "name"          => $this->input->post("name"),
                    "surname"       => $this->input->post("surname"),
                    "email"         => $this->input->post("email"),
                    "password"      => md5($this->input->post("password")),
                    "isActive"      => 1,
                    "isAuthority"   => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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
                    "text"  => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("users"));

            die();

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "register";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }


    public function forget_password(){
        
        if(get_active_user()){
            redirect(base_url());
        }
        
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
    
}