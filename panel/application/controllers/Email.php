<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "email_v";

        $this->load->model("email_model");
        $this->load->model("sent_emails_model");
        $this->load->model("newsteller_model");
        $this->load->model("users_model");
        $this->load->helper("email");

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

        $items = $this->sent_emails_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    /* New Record Page */
    public function new_form(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        
        /* Here we check if the user logged in is allowed to add new record to this module, if not we send them back */
        if(!isAllowedWriteModule()){
            redirect(base_url("mailer"));
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
    

    public function multiple_email(){
        
        $this->load->model('users_model');
        $this->load->model('newsteller_model');

        $this->load->library("form_validation");

        $this->form_validation->set_rules("receiver", "Receiver", "required|trim");
        $this->form_validation->set_rules("subject", "Subject", "required|trim");
        $this->form_validation->set_rules("message", "Message", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> is a required place!",
                "valid_email" => "<b>{field}</b> Please enter a valid email!",
                "is_unique" => "<b>{field}</b> You already have an account with this email!",
                "matches" => "<b>{field}</b> Passwords do not match!"
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {
            $receiver = $this->input->post("receiver");
            $subject = $this->input->post("subject");
            $message = $this->input->post("message");

            if ($receiver == 'all') {
                // If the receiver is 'all', send emails to all users and all newsletter subscribers.
                $users = $this->users_model->get_all_users_email();
                foreach ($users as $user) {
                    $toEmail = $user->email;
                    send_email($toEmail, $subject, $message);
                }

                $newstellers = $this->newsteller_model->get_all_newstellers_email();
                foreach ($newstellers as $newsteller) {
                    $toEmail = $newsteller->email;
                    send_email($toEmail, $subject, $message);
                }
            } elseif ($receiver == 'users') {
                // If the receiver is 'users', send emails to all users.
                $users = $this->users_model->get_all_users_email();
                foreach ($users as $user) {
                    $toEmail = $user->email;
                    send_email($toEmail, $subject, $message);
                }
            } elseif ($receiver == 'newstellers') {
                // If the receiver is 'newstellers', send emails to all newsletter subscribers.
                $newstellers = $this->newsteller_model->get_all_newstellers_email();
                foreach ($newstellers as $newsteller) {
                    $toEmail = $newsteller->email;
                    send_email($toEmail, $subject, $message);
                }
            } else {
                // If an invalid receiver is specified, show an error message.
                $alert = array(
                    "title" => "Email could not be sent!",
                    "text" => "Please try again later",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("mailer/new"));
            }

            $this->sent_emails_model->add(
                array(
                    "sender" => "CMS",
                    "email" => "noreply@ahmetdogukankonuk.com",
                    "subject" => $subject,
                    "message" => $message,
                    "sendTime" => date("Y-m-d H:i:s")
                )
            );

            // If form validation fails, show an error message.
            $alert = array(
                "title" => "Email has been sent!",
                "text" => "Thanks.",
                "type" => "success"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("mailer"));

        } else {
            // If form validation fails, show an error message.
            $alert = array(
                "title" => "Email could not be sent!",
                "text" => "Please try again later.",
                "type" => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("mailer/new"));
        }
    } 


    /* Update Record Page */
    public function view_form($id){
        
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("mailer"));
        }

        $viewData = new stdClass();

        $item = $this->sent_emails_model->get(
            array(
                "id"    => $id,
            )
        );
        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "view";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    /* Deleting specific record by its id */
    public function delete($id) {
        /* Here we check if the user logged in is allowed to delete the module, if not we don't give permission to delete this record */
        if (!isAllowedDeleteModule()) {
            redirect(base_url("mailer"));
            exit();
        }
    
        $fileName = $this->sent_emails_model->get(array("id" => $id));
    
        if (!$fileName) {
            redirect(base_url("mailer"));
            exit();
        }
    
        $delete = $this->sent_emails_model->delete(array("id" => $id));
    
        if ($delete) {
            if (file_exists("uploads/{$this->viewFolder}/{$fileName->imgUrl}")) {
                if (unlink("uploads/{$this->viewFolder}/{$fileName->imgUrl}")) {
                    $this->session->set_flashdata('success', 'Record deleted successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Image deletion failed.');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Record deletion failed.');
        }
    
        redirect(base_url("mailer"));
    }
    
}