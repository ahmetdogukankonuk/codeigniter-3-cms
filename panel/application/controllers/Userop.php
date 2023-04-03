<?php

class Userop extends CI_Controller {

    public $viewFolder = "";

    public function __construct(){
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("users_model");
        $this->load->model("user_logins_model");

    }

    /* Logout function kills user session and redirects to login page */
    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("login"));
        
    }

    /* Login page */
    public function login(){

        if(get_active_user()){
            redirect(base_url());
        }
        
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    /* Login function sets userdata session and redirects to home page */
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
                
                // Load the user_agent library
                $this->load->library('user_agent');

                // Get the user's IP address
                $ip_address = $this->input->ip_address();

                // Get the user's MAC address
                $mac_address = shell_exec('getmac');

                $this->load->library("form_validation");

                $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email");
                
                $validate = $this->form_validation->run();

                $email = $this->input->post("email");

                if($validate){

                    $insert = $this->user_logins_model->add(
                        array(
                            "userID"        => $user->id,
                            "userRoleID"    => $user->userRoleID,
                            "email"         => $email,
                            "ipAddress"     => $ip_address,
                            "macAdress"     => $mac_address,
                            "panel"         => "Admin Panel",
                            "time"          => date("Y-m-d H:i:s")
                        )
                    );

                } else {

                    $alert = array(
                        "title" => "Login Unsuccessful!",
                        "text"  => "Please check your login details",
                        "type"  => "error"
                    );
    
                    $this->session->set_flashdata("alert", $alert);
    
                    redirect(base_url("login"));    

                }

                if(!$this->session->userdata('lang')){
                    $dil=$this->session->set_userdata('lang', 'en');
                }
        
                $dil=$this->session->userdata('lang');
                
                $this->lang->load($dil,$dil);

                $alert = array(
                    "title" => $this->lang->line('login-succesfull-message'),
                    "text"  => "$user->name",
                    "type"  => "success"
                );
                
                setUserRoles();
                
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {

                $alert = array(
                    "title" => "Login Unsuccessful!",
                    "text"  => "Please check your login details",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));

            }

        }
    }

    /* Admin registration application page */
    public function register(){

        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "register";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    /* Admin registration application function */
    public function admin_registration_application(){
        
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

                $toEmail = $this->input->post("email");

                $send = send_email($toEmail, "Welcome to CMS", "<center><h3> Welcome to CMS! You have been succesfully signed up to CMS. You need to wait to get authority to CMS Panel. </h3></center>");

                $alert = array(
                    "title" => $this->lang->line('registration-succesfull-message'),
                    "text" => $this->lang->line('registration-succesfull-text'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                    "text" => $this->lang->line('registration-unsuccesfull-text'),
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

    /* Forget password page */
    public function forget_password(){
        
        if(get_active_user()){
            redirect(base_url());
        }
        
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
    
    public function reset_password(){
        
        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "valid_email"   => "Lütfen sisteme önceden kayıtlı bir email adresi giriniz.",
            )
        );

        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {
            
            $user = $this->users_model->get(
                array(
                    "isActive"  => 1,
                    "email"     => $this->input->post("email")
                )
            );

            if($user){

                $this->load->helper("string");

                $temp_password = random_string('alnum', 8);

                $send = send_email($user->email, "Reset Your Password", "<center><h3> Password changed. You can login to system with this password: </h3></center> <center><h1><b>$temp_password</b></h1></center>");
        
                if($send){

                    $this->users_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );

                    $alert = array(
                        "title" => $this->lang->line('operation-is-succesfull-message'),
                        "text"  => "We have sent a new password to your mail",
                        "type"  => "success"
                    );
    
                    $this->session->set_flashdata("alert", $alert);
    
                    redirect(base_url("login"));
    
                    die();

                }else{
                    
                    $alert = array(
                        "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                        "text"  => "Somethings went wrong please try again",
                        "type"  => "error"
                    );
    
                    $this->session->set_flashdata("alert", $alert);
    
                    redirect(base_url("forget-password"));
    
                    die();

                }

            }else{

                $alert = array(
                    "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                    "text"  => "Böyle bir kullanıcı bulunamadı",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("forget-password"));

                die();
                
            }
        }

    }
    
}