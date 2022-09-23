<?php

class Userop extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {
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