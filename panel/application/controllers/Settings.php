<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "settings_v";

        $this->load->model("website_model");
        $this->load->model("company_model");
        $this->load->model("social_model");
        $this->load->model("address_model");
        $this->load->model("about_model");
        $this->load->model("mission_model");
        $this->load->model("vision_model");
        $this->load->model("privacy_model");
        $this->load->model("terms_model");
        $this->load->model("logo_model");

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

        $viewData->website = $this->website_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->company = $this->company_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->social = $this->social_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->address = $this->address_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->about = $this->about_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->mission = $this->mission_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->vision = $this->vision_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->privacy = $this->privacy_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->terms = $this->terms_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->logo = $this->logo_model->get(
            array(
                "id"    => 1,
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}


    public function website_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("websiteTitle", "Website Title", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->website_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "websiteTitle"              => $this->input->post("websiteTitle"),
                    "websiteDescription"        => $this->input->post("websiteDescription"),
                    "websiteAuthor"             => $this->input->post("websiteAuthor"),
                    "websiteOwner"              => $this->input->post("websiteOwner"),
                    "websiteKeywords"           => $this->input->post("websiteKeywords"),
                    "websiteCopyright"          => $this->input->post("websiteCopyright"),
                    "googleVerification"        => $this->input->post("googleVerification"),
                    "pinterestVerification"     => $this->input->post("pinterestVerification"),
                    "updatedAt"                 => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->website_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function company_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("companyName", "Company Name", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->company_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "companyName"   => $this->input->post("companyName"),
                    "companyMotto"  => $this->input->post("companyMotto"),
                    "mail1"         => $this->input->post("mail1"),
                    "mail2"         => $this->input->post("mail2"),
                    "phone1"        => $this->input->post("phone1"),
                    "phone2"        => $this->input->post("phone2"),
                    "fax1"          => $this->input->post("fax1"),
                    "fax2"          => $this->input->post("fax2"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->company_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function social_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("whatsapp", "Whatsapp", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->social_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "facebook"      => $this->input->post("facebook"),
                    "instagram"     => $this->input->post("instagram"),
                    "twitter"       => $this->input->post("twitter"),
                    "linkedin"      => $this->input->post("linkedin"),
                    "pinterest"     => $this->input->post("pinterest"),
                    "youtube"       => $this->input->post("youtube"),
                    "tiktok"        => $this->input->post("tiktok"),
                    "whatsapp"      => $this->input->post("whatsapp"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->social_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function address_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("text", "Address", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->address_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "text"          => $this->input->post("text"),
                    "text_tr"       => $this->input->post("text_tr"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->address_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function about_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("text", "Address", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->about_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "text"          => $this->input->post("text"),
                    "text_tr"       => $this->input->post("text_tr"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->about_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function mission_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("text", "Address", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->mission_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "text"          => $this->input->post("text"),
                    "text_tr"       => $this->input->post("text_tr"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->mission_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function vision_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("text", "Address", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->vision_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "text"          => $this->input->post("text"),
                    "text_tr"       => $this->input->post("text_tr"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->vision_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function privacy_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("text", "Address", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->privacy_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "text"          => $this->input->post("text"),
                    "text_tr"       => $this->input->post("text_tr"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->privacy_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function terms_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("text", "Address", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->terms_model->update(
                array(
                        "id" => 1
                ),
                array(
                    "text"          => $this->input->post("text"),
                    "text_tr"       => $this->input->post("text_tr"),
                    "updatedAt"     => date("Y-m-d H:i:s")
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->terms_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


    public function navbar_logo_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");
        $this->load->helper("tools");
        
        $this->form_validation->set_rules("navbarLogoSize", "Navbar Logo Size", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            if($_FILES["navbarLogo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["navbarLogo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["navbarLogo"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("navbarLogo");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "navbarLogoSize"    => $this->input->post("navbarLogoSize"),
                        "navbarLogo"        => $uploaded_file
                    );

                } else {

                    $alert = array(
                        "title" => "Operation is Unsuccessful!",
                        "text"  => "There was a problem while adding data",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("settings"));

                    die();

                }

            } else {

                $data = array(
                    "navbarLogoSize"    => $this->input->post("navbarLogoSize")
                );

            }

            $update = $this->logo_model->update(array("id" => 1), $data);

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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->logo_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }


    public function footer_logo_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");
        $this->load->helper("tools");
        
        $this->form_validation->set_rules("footerLogoSize", "Footer Logo Size", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            if($_FILES["footerLogo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["footerLogo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["footerLogo"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("footerLogo");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "footerLogoSize"    => $this->input->post("footerLogoSize"),
                        "footerLogo"        => $uploaded_file
                    );

                } else {

                    $alert = array(
                        "title" => "Operation is Unsuccessful!",
                        "text"  => "There was a problem while adding data",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("settings"));

                    die();

                }

            } else {

                $data = array(
                    "footerLogoSize"    => $this->input->post("footerLogoSize")
                );

            }

            $update = $this->logo_model->update(array("id" => 1), $data);

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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->logo_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }

    
    public function favicon_update(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("settings"));
        }

        $this->load->library("form_validation");
        $this->load->helper("tools");
        
        $this->form_validation->set_rules("faviconSize", "Favicon Logo Size", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            if($_FILES["favicon"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["favicon"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["favicon"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("favicon");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "faviconSize"    => $this->input->post("faviconSize"),
                        "favicon"        => $uploaded_file
                    );

                } else {

                    $alert = array(
                        "title" => "Operation is Unsuccessful!",
                        "text"  => "There was a problem while adding data",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("settings"));

                    die();

                }

            } else {

                $data = array(
                    "faviconSize"       => $this->input->post("faviconSize")
                );

            }

            $update = $this->logo_model->update(array("id" => 1), $data);

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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->logo_model->get(
                array(
                    "id"    => 1,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }
}
